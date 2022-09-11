<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\EntryControllers::class, 'index'])->name('home')->middleware('auth');
Route::get('/view', [App\Http\Controllers\EntryControllers::class, 'view'])->name('view')->middleware('auth');
Route::get('/pdf/{id}', [App\Http\Controllers\EntryControllers::class, 'pdfdata'])->name('pdf')->middleware('auth');
Route::get('/edit/{id}', [App\Http\Controllers\EntryControllers::class, 'edit'])->name('edit')->middleware('auth');
Route::post('/simpan/entry',[App\Http\Controllers\EntryControllers::class, 'simpan'])->name('simpan.data')->middleware('auth');
Route::delete('/delete/{id}', [App\Http\Controllers\EntryControllers::class, 'delete'])->name('delete')->middleware('auth');


Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth','admin');
