<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentControllerAdmin;
use App\Http\Controllers\CareerControllerAdmin;
use App\Http\Controllers\SemesterControllerAdmin;
use App\Http\Controllers\FeeControllerAdmin;
use App\Http\Controllers\PaymentControllerAdmin;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('careers', CareerControllerAdmin::class);
Route::resource('semesters', SemesterControllerAdmin::class);
Route::resource('fees', FeeControllerAdmin::class);
Route::resource('students', StudentControllerAdmin::class);
Route::resource('payments', PaymentControllerAdmin::class);