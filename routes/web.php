<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\WorkshopController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return redirect()->route('user.dashboard');
});

// Ruta para el dashboard del usuario estándar
Route::get('/user-dashboard', function () {
    return view('home'); // Vista home.blade.php
})/*->middleware(['auth', 'verified'])*/->name('user.dashboard');

// Ruta para el dashboard del administrador
Route::get('/admin-dashboard', function () {
    return view('adminHome'); // Vista adminHome.blade.php
})/*->middleware(['auth', 'verified'])*/->name('admin.dashboard');

require __DIR__ . '/auth.php';

// Ruta de los controladores para el usuario estándar
Route::resource('course', CourseController::class);
Route::resource('student', StudentController::class);
Route::resource('workshop', WorkshopController::class);
Route::resource('booking', BookingController::class);


// Ruta de los controladores para el administrador
Route::prefix('admin') // Prefijo para todas las rutas del administrador
    ->name('admin.') // Prefijo de nombres de las rutas
    ->middleware(['auth', 'admin']) // Agregar middleware de autenticación y rol de administrador
    ->group(function () {
        Route::resource('courses', CourseController::class); // Rutas para los cursos del administrador
        Route::resource('student', StudentController::class); // Rutas para los estudiantes del administrador
        Route::resource('workshop', WorkshopController::class); // Rutas para los talleres del administrador
        Route::resource('booking', BookingController::class); // Rutas para las reservas del administrador
    });
