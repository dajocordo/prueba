<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () { return view('welcome'); });
Route::get('/', [ EmpleadosController::class, "index" ]);
Route::get('/new', [ EmpleadosController::class, "new" ]);
Route::get('/look', [ EmpleadosController::class, "index" ]);
Route::get('/viewEmp/{id}', [ EmpleadosController::class, "show" ]);
Route::get('/editEmp/{id}', [ EmpleadosController::class, "edit" ]);
Route::get('/deleteEmp/{id}', [ EmpleadosController::class, "delete" ]);
Route::get('/nuevoEmpleado', [ EmpleadosController::class, "create_error" ]);
Route::get('/del', [ EmpleadosController::class, "create_error" ]);
Route::post('/look', [ EmpleadosController::class, "search" ]);
Route::post('/update', [ EmpleadosController::class, "update" ]);
Route::post('/nuevoEmpleado', [ EmpleadosController::class, "create" ]);
Route::post('/del', [ EmpleadosController::class, "destroy" ]);



Route::get('/d', [ DepartamentosController::class, "index" ]);
Route::post('/nuevoDepartamento', [ DepartamentosController::class, "create" ]);




