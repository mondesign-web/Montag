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


Route::get('/dashboard2', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/profiles/createOld', [ProfileController::class, 'create'])->name('profiles.createOld');
    Route::post('/profiles', [ProfileController::class, 'store'])->name('profiles.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profiles/create', [ProfileController::class, 'create'])->name('profiles.create');
    Route::post('/profiles', [ProfileController::class, 'store'])->name('profiles.store');
});


Route::get('/profiles/{profile}/qrcode', [ProfileController::class, 'generateQrCode'])->name('profiles.qrcode');

/*
Route::get('/profiles/create/step1', [ProfileController::class, 'createStep1'])->name('profiles.create.step1');
Route::post('/profiles/create/step1', [ProfileController::class, 'storeStep1'])->name('profiles.store.step1');

Route::get('/profiles/create/step2/{profile}', [ProfileController::class, 'createStep2'])->name('profiles.create.step2');
Route::post('/profiles/create/step2/{profile}', [ProfileController::class, 'storeStep2'])->name('profiles.store.step2');

Route::get('/profiles/create/step3/{profile}', [ProfileController::class, 'createStep3'])->name('profiles.create.step3');
Route::post('/profiles/create/step3/{profile}', [ProfileController::class, 'storeStep3'])->name('profiles.store.step3');
*/


Route::get('/profiles/{profile}', [ProfileController::class, 'show'])->name('profiles.show');

//Route::get('/profiles/{profile}', [ProfileController::class, 'show'])->name('profiles.show');
Route::put('/profiles/{profile}', [ProfileController::class, 'update'])->name('profiles.update');
Route::get('/profiles/{profile}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');

Route::get('/test2', function(){
    return view('test2');
});
require __DIR__.'/auth.php';
