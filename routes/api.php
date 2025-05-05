<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\CareerController;
use App\Http\Controllers\Api\SemesterController;
use App\Http\Controllers\Api\FeeController;
use App\Http\Controllers\Api\PayCardController;
use App\Http\Controllers\Api\PaymentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Grupo de rutas para la API
Route::prefix('v1')->group(function () {
    
    // Estudiantes
    Route::apiResource('students', StudentController::class);

    // Carreras
    Route::apiResource('careers', CareerController::class);

    // Semestres
    Route::apiResource('semesters', SemesterController::class);

    // Fees (conceptos de pago)
    Route::apiResource('fees', FeeController::class);

    // Tarjetas de pago
    Route::apiResource('paycards', PayCardController::class);

    // Pagos
    Route::apiResource('payments', PaymentController::class)->only(['index', 'store', 'show']);
});
