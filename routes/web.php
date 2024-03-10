<?php

use App\Http\Controllers\AuditoriaController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CustomLoginController;
use App\Http\Controllers\EntrenadorController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PostTasksController;
use App\Http\Controllers\RutinaController;
use App\Http\Controllers\SaludController;
use App\Http\Controllers\UsuarioController;
use App\Livewire\Dashboard;
use App\Livewire\ModalPagar;
use App\Models\Client;
use App\Models\Plan;
use App\Models\Salud;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/login', [CustomLoginController::class, 'store'])->name('login');
Route::post('/register', [CustomLoginController::class, 'createCustom'])->name('register');
Route::get('clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::put('clients', [ClientController::class, 'store'])->name('clients.store');
Route::delete('clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::post('/upload',[ClientController::class,'upload']);
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::resource('usuarios', UsuarioController::class)->names('usuarios');
    Route::resource('planes', PlanController::class)->names('plans');
    Route::resource('rutinas', RutinaController::class)->names('rutinas');
    Route::resource('estado_salud', SaludController::class)->names('saluds');
    Route::resource('auditorias', AuditoriaController::class)->names('auditorias');
    Route::resource('entrenadores', EntrenadorController::class)->names('entrenadores');
    Route::resource('cursos', CursoController::class)->names('cursos');
    Route::get('clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get(
        'clients/comprobante_pdf/{client}',
        [ClientController::class, 'comprobante']
    )->name('clients.comprobante');
});
