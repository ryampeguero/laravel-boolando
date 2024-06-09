<?php

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
    $path = resource_path();
    $products = config("products");
    $data = compact("products", "path");
    return view('home', $data);
})->name('home');

Route::get('/about', function (){
    return view('about');
})->name('about');