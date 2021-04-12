<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/chats', [App\Http\Controllers\ChatsController::class, 'index'])->name('chats');
Route::get('/chats/{receiver}', [App\Http\Controllers\ChatsController::class, 'chatsBox'])->name('chats');
Route::get('/contacts', [App\Http\Controllers\ChatsController::class, 'contactList'])->name('contacts');
Route::get('/message/{receiver}', [App\Http\Controllers\ChatsController::class, 'fetchMessage'])->name('fetch-message');
Route::post('/message', [App\Http\Controllers\ChatsController::class, 'sendMessage'])->name('send-message');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Auth::routes();
