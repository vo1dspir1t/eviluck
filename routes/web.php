<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PageController;
use \App\Http\Controllers\Admin\AdminController;
use \App\Http\Controllers\RegisterController;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\Admin\AboutsController;
use \App\Http\Controllers\Admin\ContactsController;
use \App\Http\Controllers\Admin\PortfoliosController;

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

Route::get('/', [PageController::class, 'Start'])->name('Start');

Route::get('/about', [PageController::class, 'About'])->name('About');

Route::get('/contacts', [PageController::class, 'Contacts'])->name('Contacts');

Route::get('/portfolio', [PageController::class, 'Pf'])->name('Portfolio');

Route::get('/admin/login', [AdminController::class, 'login'])->name('login');

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/admin/register', [AdminController::class, 'register'])->name('register')->middleware('regStatus');

Route::post('/admin/register', [RegisterController::class, 'save'])->middleware('regStatus');

Route::post('/admin/login', [LoginController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');

    Route::resource('/admin/users', AboutsController::class)->middleware('isAdmin');

    Route::resource('/admin/contacts', ContactsController::class)->middleware('isAdmin');

    Route::resource('/admin/portfolios', PortfoliosController::class)->middleware('isAdmin');

    Route::get('/admin/account', [AdminController::class, 'account'])->name('account');

    Route::post('/admin/account', [AdminController::class, 'accountSave'])->name('accountSave');

    Route::get('/admin/account/delete', [AdminController::class, 'accountDelete'])->name('accountDelete');
});






