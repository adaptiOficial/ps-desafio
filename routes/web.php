<?php

use App\Http\Controllers\ArmazenamentoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FontesController;
use App\Http\Controllers\GabinetesController;
use App\Http\Controllers\HeadsetsController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\MemoriaController;
use App\Http\Controllers\MonitoresController;
use App\Http\Controllers\MousesController;
use App\Http\Controllers\PlacasdeVideoController;
use App\Http\Controllers\PlacasMaeController;
use App\Http\Controllers\ProcessadoresController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RefrigeracaoController;
use App\Http\Controllers\TecladosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
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

Route::middleware('locale')->group(function () {

    Route::put('/locale', [LocaleController::class, 'setLocale'])->name('locale');

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Auth::routes();

    Route::middleware('auth')->group(function () {

        //Rota para dashboard
        Route::any('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        //Rotas para log
        Route::any('log', [LogController::class, 'index'])->name('log.index');

        //Rotas para CRUD usuário
        Route::resource('user', UserController::class, ['except' => ['show']]);
        Route::resource('categoria', CategoriaController::class, ['except' => ['show']]);
        Route::resource('produto', ProdutoController::class);

        //Rotas para perfil do usuário
        Route::controller(ProfileController::class)->name('profile.')->group(function () {
            Route::get('profile', 'edit')->name('edit');
            Route::put('profile', 'update')->name('update');
            Route::put('profile/password', 'password')->name('password');
        });
    });
});
Route::resource('index', SiteController::class);
Route::resource('processadores', ProcessadoresController::class);
Route::resource('placas-mae', PlacasMaeController::class);
Route::resource('placas-de-video', PlacasdeVideoController::class);
Route::resource('memoria', MemoriaController::class);
Route::resource('armazenamento', ArmazenamentoController::class);
Route::resource('fontes', FontesController::class);
Route::resource('teclados', TecladosController::class);
Route::resource('mouses', MousesController::class);
Route::resource('monitores', MonitoresController::class);
Route::resource('refrigeracao', RefrigeracaoController::class);
Route::resource('gabinetes', GabinetesController::class);
Route::resource('headsets', HeadsetsController::class);

