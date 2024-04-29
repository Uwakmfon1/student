<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('students', [StudentController::class,'index']);

Route::post('student/store', [StudentController::class,'store']);

Route::get('student/show/{id}', [StudentController::class,'show']);

Route::get('student/show/{id}/edit',[StudentController::class,'edit']);

Route::put('student/show/{id}/edit',[StudentController::class,'update']);

Route::delete('student/{id}/delete',[StudentController::class,'destroy']);






















