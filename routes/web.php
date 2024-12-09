<?php

use App\Http\Controllers\CourseController;
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

// Rutas para el controlador de cursos
// Route::resource('course', CourseController::class);
Route::prefix('admin') // Prefijo para todas las rutas del administrador
    ->name('admin.') // Prefijo de nombres de las rutas
    ->middleware(['auth', 'admin']) // Puedes agregar el middleware que necesites
    ->group(function () {
        Route::resource('courses', CourseController::class); // Esto automáticamente creará las rutas para index, create, store, etc.
    });