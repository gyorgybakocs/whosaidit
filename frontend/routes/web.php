<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    [],
    function () {
        Route::group(
            ['middleware' => 'auth'],
            function () {
                Route::get('logout', [LoginController::class, 'logOut']);

                Route::get('saved', [QuizController::class, 'saved'])->name('saved');
            }
        );

        Route::group(
            [],
            function () {
                Route::get('', function () {
                    return redirect()->action('BaseController@index');
                });
                Route::get('home', [BaseController::class, 'index'])->name('home');

                Route::get('play', [QuizController::class, 'index'])->name('play');
                Route::get('play/{page}', [QuizController::class, 'page'])->name('page');

                Route::get('blog', [BlogController::class, 'blog'])->name('blog');
                Route::get('blog/{post}', [BlogController::class, 'post'])->name('post');

                Route::get('login', [LoginController::class, 'redirect'])->name('login');
            }
        );

        Route::group(
            ['prefix' => 'auth'],
            function () {
                Route::get('callback', [LoginController::class, 'handleCallback']);
            }
        );
    }
);

