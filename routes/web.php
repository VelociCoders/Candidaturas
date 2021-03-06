<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\PromoController;
//use App\Http\Controllers\CandidaturaController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home'); 

Route::get('/escuelas', [SchoolController::class, 'index'])->name('escuelas')->middleware('permission:view-school');

Route::get('/promos', [PromoController::class, 'index'])->name('promos')->middleware('permission:view-promo');

Route::get('/promos/{id}', [PromoController::class, 'getPromosSchool'])->name('promosSchool')->middleware('permission:view-promo');

Route::get('/candidaturas-view/{id}', [PromoController::class, 'show'])->name('candidaturas-view');

Route::group(['middleware' => ['auth']], function(){
	Route::resource('roles', RolController::class);
	Route::resource('users', UserController::class);
	//Route::resource('schools', SchoolController::class);
});

//Route Hooks - Do not delete//
	Route::view('coders', 'livewire.coders.index')->middleware('auth');
	Route::view('tokens', 'livewire.tokens.index')->middleware('permission:view-token');
	//Route::view('candidaturas', 'livewire.candidaturas.index')->middleware('auth');
	Route::view('promos-admin', 'livewire.promos.index')->middleware('permission:view-promo');
	Route::view('escuelas-admin', 'livewire.schools.index')->middleware('permission:view-school');