<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    public static function all(): array<array-key,string>
    {
        $files = File::files(resource_path('html/'));

        return array_map(fn ($file) => $file->getContents(), $files);
    }

    public static function find(string $route_wildcard): string
    {
        if (! file_exists($path = resource_path("html/{$route_wildcard}.html"))) {
            throw new ModelNotFoundException();
            // abort(404);
            // ddd('file '.$path."doesn't exist");
            // return redirect('/');
        }

        return cache()->remember("post.{$route_wildcard}", now()->addSecond(10), static fn (): string => (string) file_get_contents($path));
    }
}
