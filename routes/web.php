<?php

use App\Http\Controllers\CidadesController;
use Illuminate\Foundation\Application;
use App\Http\Controllers\FreteController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::prefix('GestaoFrete')->group(function (){
    Route::get('/', [FreteController::class, 'login'])->name('login-page');
    Route::get('/home', [FreteController::class, 'index'])->name('home-index');
    Route::get('/motorista', [FreteController::class, 'index1'])->name('motorista-index');
    Route::get('/create', [FreteController::class, 'create'])->name('motorista-create');
    Route::post('/store1', [FreteController::class, 'store'])->name('motorista-store');
    Route::get('/motorista/{id}/edit', [FreteController::class, 'edit'])->where('id', '[0-9]+')->name('motorista-edit');
    Route::put('/motorista/{id}/', [FreteController::class, 'update'])->where('id', '[0-9]+')->name('motorista-update');
    Route::delete('/motorista/{id}/', [FreteController::class, 'destroy'])->where('id', '[0-9]+')->name('motorista-destroy');
    Route::get('/cliente', [FreteController::class, 'index2'])->name('cliente-index');
    Route::get('/create2', [FreteController::class, 'create2'])->name('cliente-create');
    Route::post('/store2', [FreteController::class, 'store2'])->name('cliente-store');
    Route::get('/cliente/{id}/edit', [FreteController::class, 'edit2'])->where('id', '[0-9]+')->name('cliente-edit');
    Route::put('/cliente/{id}/', [FreteController::class, 'update2'])->where('id', '[0-9]+')->name('cliente-update');
    Route::delete('/cliente/{id}/', [FreteController::class, 'destroy2'])->where('id', '[0-9]+')->name('cliente-destroy');
    Route::get('/caminhao', [FreteController::class, 'index3'])->name('caminhao-index');
    Route::get('/create3', [FreteController::class, 'create3'])->name('caminhao-create');
    Route::post('/store3', [FreteController::class, 'store3'])->name('caminhao-store');
    Route::get('/caminhao/{id}/edit', [FreteController::class, 'edit3'])->where('id', '[0-9]+')->name('caminhao-edit');
    Route::put('/caminhao/{id}/', [FreteController::class, 'update3'])->where('id', '[0-9]+')->name('caminhao-update');
    Route::delete('/caminhao/{id}/', [FreteController::class, 'destroy3'])->where('id', '[0-9]+')->name('caminhao-destroy');
    Route::get('/frete', [FreteController::class, 'index4'])->name('frete-index');
    Route::get('/create4', [FreteController::class, 'create4'])->name('frete-create');
    Route::post('/store4', [FreteController::class, 'store4'])->name('frete-store');
    Route::get('/frete/{id}/edit', [FreteController::class, 'edit4'])->where('id', '[0-9]+')->name('frete-edit');
    Route::get('/mostrar-despesa/{id}', [FreteController::class, 'mostrarDespesa'])->where('id', '[0-9]+')->name('mostrar-despesa');
    Route::put('/frete/{id}/', [FreteController::class, 'update4'])->where('id', '[0-9]+')->name('frete-update');
    Route::delete('/frete/{id}/', [FreteController::class, 'destroy4'])->where('id', '[0-9]+')->name('frete-destroy');
    Route::get('/despesa', [FreteController::class, 'index5'])->name('despesa-index');
    Route::get('/create5', [FreteController::class, 'create5'])->name('despesa-create');
    Route::post('/store5', [FreteController::class, 'store5'])->name('despesa-store');
    Route::get('/despesa/{id}/edit', [FreteController::class, 'edit5'])->where('id', '[0-9]+')->name('despesa-edit');
    Route::put('/despesa/{id}/', [FreteController::class, 'update5'])->where('id', '[0-9]+')->name('despesa-update');
    Route::delete('/despesa/{id}/', [FreteController::class, 'destroy5'])->where('id', '[0-9]+')->name('despesa-destroy');
    Route::get('/despesasfixas', [FreteController::class, 'index6'])->name('despesasfixas-index');
    Route::get('/create6', [FreteController::class, 'create6'])->name('despesasfixas-create');
    Route::post('/store6', [FreteController::class, 'store6'])->name('despesasfixas-store');
    Route::get('/despesasfixas/{id}/edit', [FreteController::class, 'edit6'])->where('id', '[0-9]+')->name('despesasfixas-edit');
    Route::put('/depesasfixas/{id}/', [FreteController::class, 'update6'])->where('id', '[0-9]+')->name('despesasfixas-update');
    Route::delete('/despesasfixas/{id}/', [FreteController::class, 'destroy6'])->where('id', '[0-9]+')->name('despesasfixas-destroy');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
