<?php

use App\Http\Controllers\DiaristaController;
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

/*
    Em vez de passar uma função anônima, passo o controller
    dentro da classe DiaristaController acessará o método 'index'
    ->name('diaristas.index'); ---> nomeação de nome da rota
*/

// listagem das diaristas
Route::get('/', [DiaristaController::class, 'index'])->name('diaristas.index');

// inserção de diarista
Route::get('/diaristas/create', [DiaristaController::class, 'create'])->name('diaristas.create');

// requisição de gravação via POST
Route::post('/diaristas', [DiaristaController::class, 'store'])->name('diaristas.store');

// requisição para edição de diarista
Route::get('/diaristas/{id}/edit', [DiaristaController::class, 'edit'])->name('diaristas.edit');

// rota para salvar a alteração no cadastro da diarista
Route::put('/diaristas/{id}', [DiaristaController::class, 'update'])->name('diaristas.update');

// rota para deletar um cadastro de diarista
// obs: poderia usar o delete mas seria necessário utilizar um formulário, e com destroy não
Route::get('/diaristas/{id}', [DiaristaController::class, 'destroy'])->name('diaristas.destroy');