<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',function(){
    return view('layouts.app');
})->name('login');

Route::get('/login',[\App\Http\Livewire\Login::class,'render']);
Route::get('/register',[\App\Http\Livewire\Register::class,'render']);

Route::middleware('auth')->group(function(){
    Route::get('/home', function () {
        return view('welcome');
    })->name('home');
});

Route::get('/posts',function(){
    return view('post-index');
});
