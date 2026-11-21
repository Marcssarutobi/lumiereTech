<?php

use App\Http\Controllers\SeoController;
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

// robots.txt et sitemap.xml sont générés dynamiquement (voir config/seo.php)
Route::get('/robots.txt', [SeoController::class, 'robots']);
Route::get('/sitemap.xml', [SeoController::class, 'sitemap']);

Route::get('/', [SeoController::class, 'spa'])->name('home');

// Application Vue : renvoie un vrai code 404 pour les URLs qui n'existent pas
Route::get('/{any}', [SeoController::class, 'spa'])->where('any', '^(?!api/?)(?!admins/?).*$');
