<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentControllerAdmin;
use App\Http\Controllers\CareerControllerAdmin;
use App\Http\Controllers\SemesterControllerAdmin;
use App\Http\Controllers\FeeControllerAdmin;
use App\Http\Controllers\PaymentDetailControllerAdmin;
use App\Http\Controllers\EnrollmentController;

Route::redirect('/',  '/students');

Route::resource('careers', CareerControllerAdmin::class);
Route::resource('semesters', SemesterControllerAdmin::class);
Route::resource('fees', FeeControllerAdmin::class);
Route::resource('students', StudentControllerAdmin::class);
Route::resource('payments', PaymentDetailControllerAdmin::class);
Route::get (
    'students/{student}/enroll',
    [EnrollmentController::class, 'create']
)->name('students.enroll.create');

Route::post(
    'students/{student}/enroll',
    [EnrollmentController::class, 'store']
)->name('students.enroll.store');