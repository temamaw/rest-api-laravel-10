<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
  use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
 

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::controller(ClassController::class)->group(function () {
    Route::get('classes', 'index');
    Route::post('class', 'store');
    Route::get('class/{id}', 'show');
    Route::put('class/{id}', 'update');
    Route::delete('class/{id}', 'destroy');
}); 

Route::controller(SectionController::class)->group(function () {
  Route::get('sections', 'index');
  Route::post('section', 'store');
  Route::get('section/{id}', 'show');
  Route::put('section/{id}', 'update');
  Route::delete('section/{id}', 'destroy');
}); 
Route::controller(SubjectController::class)->group(function () {
  Route::get('subjects', 'index');
  Route::post('subject', 'store');
  Route::get('subject/{id}', 'show');
  Route::put('subject/{id}', 'update');
  Route::delete('subject/{id}', 'destroy');
}); 
Route::controller(StudentController::class)->group(function () {
  Route::get('students', 'index');
  Route::post('student', 'store');
  Route::get('student/{id}', 'show');
  Route::put('student/{id}', 'update');
  Route::delete('student/{id}', 'destroy');
}); 
Route::controller(TodoController::class)->group(function () {
  Route::get('todos', 'index');
  Route::post('todo', 'store');
  Route::get('todo/{id}', 'show');
  Route::put('todo/{id}', 'update');
  Route::delete('todo/{id}', 'destroy');
}); 