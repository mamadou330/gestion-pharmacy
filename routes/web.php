<?php

use App\Http\Controllers\AchatController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FamilleController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\VenteController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Auth::routes();

Route::resource('fournisseur', FournisseurController::class);
Route::resource('produit', ProduitController::class);
Route::resource('option', OptionController::class);
Route::resource('categorie', CategorieController::class);
Route::resource('famille', FamilleController::class);
Route::resource('achat', AchatController::class);
Route::resource('vente', VenteController::class);

Route::get('/home', [HomeController::class, 'index'])->name('home');