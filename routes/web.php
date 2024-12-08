<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     // Si el usuario está autenticado
//     if (Auth::check()) {
//         // Si está autenticado, redirigir al dashboard correspondiente
//         return Auth::user()->isAdmin()
//             ? redirect()->route('admin.dashboard') 
//             : redirect()->route('user.dashboard');
//     }

//     // Si no está autenticado, redirigir al login
//     return redirect()->route('login');
// });

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
Route::resource('course', CourseController::class);
