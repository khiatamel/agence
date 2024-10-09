<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgrammeOmraController;
use App\Http\Controllers\OmraController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReservationOmraController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\ToastController;

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
Route::get('/dash', [OmraController::class, 'dash'])->name('dash')->middleware('role:admin');
Route::get('/dash/accept/{id}', [ReservationOmraController::class, 'accept'])->name('dash.accept');
Route::get('/dash/refuse/{id}', [ReservationOmraController::class, 'refuse'])->name('dash.refuse');
// In routes/web.php or routes/api.php
Route::get('reservation_omras/index', [OmraController::class, 'dash'])->name('reservation_omras.inde');

Route::get('/reservations/filter/{role}', [ReservationOmraController::class, 'filterByUserRole']);
Route::get('/reservations/filtre/{userId}', 'ReservationController@filterReservationsByUser');
Route::get('/reservation_omras/{omraId}/details', [ReservationController::class, 'filterReservationsByOmra']);
Route::get('/reservations/{omraId}', [ReservationController::class, 'getReservations']);


// web.php (Laravel routes)
Route::get('/reservation_omra/{id}/details', [OmraController::class, 'getDetails']);


Route::get('/calender', function () {
    return view('calender');
})->name('calender');

Route::get('/Aomra', function () {
    return view('Aomra');
})->name('Aomra');

Route::resource('programme_omras', ProgrammeOmraController::class);
Route::get('programme_omras/{id}/edit',  [ProgrammeOmraController::class, 'edit'])->name('programme_omras.edit');
Route::put('/programme_omras/{id}', [ProgrammeOmraController::class, 'update'])->name('programme_omras.update');
Route::get('/programme_omras', [ProgrammeOmraController::class, 'index'])->name('programme_omras.index');

//admin
Route::resource('omras', OmraController::class);
Route::get('omras/{id}/edit',  [OmraController::class, 'edit'])->name('omras.edit');
Route::put('/omras/{id}', [OmraController::class, 'update'])->name('omras.update');
Route::delete('/omras/{id}', [OmraController::class, 'destroy'])->name('omras.destroy');
Route::get('/omras', [OmraController::class, 'index'])->name('omra.index');

Route::put('/reservations/{id}/accept', [ReservationOmraController::class, 'accept'])->name('reservations.accept');

Route::get('commissions/omra/{id}', [CommissionController::class, 'createForOmra'])->name('commissions.createForOmra');
Route::post('commissions/store', [CommissionController::class, 'store'])->name('commissions.store');
Route::delete('commissions/{id}', [CommissionController::class, 'destroy'])->name('commissions.destroy');
Route::put('/commissions/{commission}', [CommissionController::class, 'update'])->name('commissions.update');

//toast
Route::get('/toasts', [ToastController::class, 'index'])->name('toasts.index');
Route::post('/toasts/success', [ToastController::class, 'success'])->name('toasts.success');
Route::post('/toasts/error', [ToastController::class, 'error'])->name('toasts.error');
Route::post('/toasts/warning', [ToastController::class, 'warning'])->name('toasts.warning');
Route::delete('/toasts/{id}', [ToastController::class, 'destroy'])->name('toasts.destroy'); // Ajout de la route de suppression

    //hotels
Route::resource('hotels', HotelController::class);
Route::get('hotels/create', [HotelController::class, 'create'])->name('hotels.create');
Route::post('articles',  [HotelController::class, 'store'])->name('hotels.store');
Route::get('hotels/{id}', [HotelController::class, 'show'])->name('hotels.show');
Route::get('hotels', [HotelController::class, 'index'])->name('hotels.index');
// Route pour afficher le formulaire de modification
Route::get('hotels/{hotel}/edit', [HotelController::class, 'edit'])->name('hotels.edit');
// Route pour mettre à jour l'hôtel
Route::put('hotels/{hotel}', [HotelController::class, 'update'])->name('hotels.update');


Route::get('/AjouterOmra', function () {
    return view('AjouterOmra');
})->name('AjouterOmra');

//Agences
Route::get('/Agence', [OmraController::class, 'afficherAgence'])->name('Agence');
Route::get('/ListReservation', [ReservationOmraController::class, 'afficherReservation'])->name('list.reservation');
// 
Route::middleware(['auth', 'role:agence'])->group(function() {
    Route::get('/agence/reservations', [ReservationOmraController::class, 'viewAgencyReservations'])->name('agence.listReservations');
});


Route::resource('reservation_omras', ReservationOmraController::class);
Route::get('reservation_omras/{id}/edit',  [ReservationOmraController::class, 'edit'])->name('reservation_omras.edit');
Route::put('/reservation_omras/{id}', [ReservationOmraController::class, 'update'])->name('reservation_omras.update');
Route::get('reservation_omras/{id}/index', [ReservationOmraController::class, 'index'])->name('reservation_omras.index');


//client
Route::get('/omra', [OmraController::class, 'afficher'])->name('omra');
Route::get('omra/{id}/détail',  [OmraController::class, 'détail'])->name('omra.détail');

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
