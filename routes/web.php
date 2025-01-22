<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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
    return view('home');
})->middleware(['auth'])->name('home');;

/*
Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth'])->name('home');
*/
/*
Route::get('/card', function () {
    return view('card');
})->middleware(['auth'])->name('card');
*/
Route::get('/profiles', [ProfileController::class, 'index'])->middleware('auth')->name('profiles.index');
Route::get('/', [ProfileController::class, 'list'])->middleware('auth')->name('home');
Route::delete('/profiles/{id}', [ProfileController::class, 'destroy'])->name('profiles.destroy');

Route::get('/profiles/{profile}/vcard', [ProfileController::class, 'downloadVCard'])->name('profiles.vcard');


Route::get('/dashboard2', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/profiles/list', [ProfileController::class, 'ShowLink'])->name('profiles.link');

Route::middleware(['auth'])->group(function () {
    Route::get('/profiles/createOld', [ProfileController::class, 'create'])->name('profiles.createOld');
    Route::post('/profiles', [ProfileController::class, 'store'])->name('profiles.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profiles/create', [ProfileController::class, 'create'])->name('profiles.create');
    Route::post('/profiles', [ProfileController::class, 'store'])->name('profiles.store');
});


Route::get('/profiles/{profile}/qrcode', [ProfileController::class, 'generateQrCode'])->name('profiles.qrcode');



Route::get('/profiles/{profile}', [ProfileController::class, 'show'])->name('profiles.show');

//Route::get('/profiles/{profile}', [ProfileController::class, 'show'])->name('profiles.show');
Route::put('/profiles/{profile}', [ProfileController::class, 'update'])->name('profiles.update');
Route::get('/profiles/{profile}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');

Route::get('/test2', function(){
    return view('test2');
});
require __DIR__.'/auth.php';
