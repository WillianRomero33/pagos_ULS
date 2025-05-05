<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/careers/addCareer', function () {
    return view('careers.addCareer');
})->name('careers.addCareer');

// colocar todas las rutas de blade,
// api todas las rutas de la app mobile
// php artisan install:api "Para retornar las rutas api
// con blade, tengo que hacer 2 metodos, 1 para las rutas API y el otro para blade