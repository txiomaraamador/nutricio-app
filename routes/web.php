<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\FlogsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/inicio', function () {
    return view('inicio');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio');

Route::resource('/patients',PatientsController::class);
Route::post('/patients/create',[PatientsController::class, 'create']);
Route::get('/patients/show/{id}',[PatientsController::class, 'show']);
Route::get('/patients/edit/{id}',[PatientsController::class, 'edit']);
Route::put('/patients/{id}',[PatientsController::class, 'update']);
Route::delete('/patients/delete/{id}',[PatientsController::class, 'destroy']);
//ruta de busqueda
Route::get('/search', [PatientsController::class, 'index'])->name('search');
//ruta de pdf
Route::get('patientspdf',[PatientsController::class, 'Pdf'])->name('listadopatients.pdf');


Route::resource('/flogs',FlogsController::class);
Route::post('/flogs/create',[FlogsController::class, 'create']);
Route::get('/flogs/show/{id}',[FlogsController::class, 'show']);
Route::get('/flogs/edit/{id}',[FlogsController::class, 'edit']);
Route::put('/flogs/{id}',[FlogsController::class, 'update']);
Route::delete('/flogs/delete/{id}',[FlogsController::class, 'destroy']);
//ruta de historial de flogs para cada paciente
Route::get('/patients/{id}/flogs', [FlogsController::class, 'showFlogs'])->name('patients.showFlogs');
//ruta de pdf del historial de cada paciente
Route::get('/patients/{id}/generate-pdf',[FlogsController::class, 'generatePdf'])->name('listado.pdf');
//ruta de busqueda de flogs
Route::get('/searchflog', [FlogsController::class, 'index'])->name('searchflog');

Route::get('flogspdf',[FlogsController::class, 'Pdf'])->name('listadoflogs.pdf');