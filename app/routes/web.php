<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    $data['cards'] = 3;
    return view('home.index', $data);
});

Route::get('/info', function () {
    return phpinfo();
});
require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get('/contact', function(){
    $data['cards'] = 3;
    return view('home.contact',$data);
});

