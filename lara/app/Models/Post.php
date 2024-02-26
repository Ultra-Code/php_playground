<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\SplFileInfo;

class Post
{
    /**
     * @return string[]
     */
    public static function all(): array
    {
        $files = File::files(resource_path('html/'));

        return array_map(static function (SplFileInfo $file): string {
            return (string) file_get_contents($file->getPathname());
        }, $files);
    }

    /**
     * Get an item from the cache, or execute the given Closure and store the result.
     *
     * @template TCacheValue
     *
     * @param  string  $route_wildcard
     * @return string|TCacheValue
     */
    public static function find(string $route_wildcard)
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
