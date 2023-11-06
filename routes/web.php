<?php

use App\Http\Controllers\admin\AdminLogincontroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::prefix("admin")->name("admin.")->group(function () {
    Route::middleware(["guest:admin"])->group(function () {
        //Route::get('/login',[AdminLogincontroller::class,'index'] )->name('login');
        Route::post('/authenticate',[AdminLogincontroller::class,'authenticate'] )->name('authenticate');
        Route::get('/dashboard', [AdminLogincontroller::class,'dashboard'])->name('dashboard');
    });
    Route::middleware(["auth:admin"])->group(function () {
        
        Route::get('/login',[AdminLogincontroller::class,'index'] )->name('login');
    });

});