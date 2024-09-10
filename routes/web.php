<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgrammeOmraController;
use App\Http\Controllers\OmraController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/omra', function () {
    return view('Omra');
})->name('omra');

Route::get('/mOmra', function () {
    return view('modelOmra');
})->name('mOmra');

Route::get('/reserveOmra', function () {
    return view('reserverOmra');
})->name('rsOmra');

Route::get('/Visa', function () {
    return view('visa');
})->name('visa');

Route::get('/reserveVisa', function () {
    return view('reserverVisa');
})->name('rsVisa');

Route::get('/hotel', function () {
    return view('hotel');
})->name('hotel');

Route::get('/assurance', function () {
    return view('assurance');
})->name('assurance');

Route::get('/rsAssrs', function () {
    return view('rsAssurance');
})->name('rsAssurance');


Route::get('/bateau', function () {
    return view('bateau');
})->name('bateau');

Route::get('/reservationBateau', function () {
    return view('rsBateau');
})->name('rsBateau');

Route::get('/voyageOrganisé', function () {
    return view('voyageOrg');
})->name('voyageOrganisé');

Route::get('/mVoyage', function () {
    return view('mVoyage');
})->name('mVoyage');

Route::get('/rsVoyage', function () {
    return view('rsVoyage');
})->name('rsVoyage');

Route::get('/billet', function () {
    return view('billet');
})->name('billet');

//admin pages
Route::get('/dash', function () {
    return view('dash');
})->name('dash')->middleware('role:admin');

Route::get('/calender', function () {
    return view('calender');
})->name('calender');

Route::get('/Aomra', function () {
    return view('Aomra');
})->name('Aomra');

Route::resource('programme_omras', ProgrammeOmraController::class);
Route::get('programme_omras/{id}/edit',  [ProgrammeOmraController::class, 'edit'])->name('programme_omras.edit');
Route::put('/programme_omras/{id}', [ProgrammeOmraController::class, 'update'])->name('programme_omras.update');
Route::get('/programme_omras', [ProgrammeOmraController::class, 'index'])->name('programme_omra.index');


Route::resource('omras', OmraController::class);
Route::get('omras/{id}/edit',  [OmraController::class, 'edit'])->name('omras.edit');
Route::put('/omras/{id}', [OmraController::class, 'update'])->name('omras.update');
Route::get('/omras', [OmraController::class, 'index'])->name('omra.index');


Route::get('/AjouterOmra', function () {
    return view('AjouterOmra');
})->name('AjouterOmra');
//////////////////////////////////////////////////////////////////////////////

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'manager'])->group(function () {
    Route::get('/manager/dashboard', [DirectionController::class, 'index'])->name('manager.dashboard');
});

Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('/customer/dashboard', [ClientController::class, 'index'])->name('customer.dashboard');
});

Route::middleware(['auth', 'vendor'])->group(function () {
    Route::get('/vendor/dashboard', [AgenceController::class, 'index'])->name('vendor.dashboard');
});
