<?php

use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider and all of them will
 * | be assigned to the "web" middleware group. Make something great!
 * |
 */

Route::get('/', static function (): View|Factory {
    base_path('.');

    File::files('.', true);

    return view('post');
});

Route::get('post/{wildcard}', static function (string $wildcard): View|Factory {
    return view(
        'post',
        ['post' => Post::find($wildcard)]
    );
})->where('wildcard', '[\w_\-]+');
