<?php

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
})->name('dash');

Route::get('/calender', function () {
    return view('calender');
})->name('calender');

Route::get('/Aomra', function () {
    return view('Aomra');
})->name('Aomra');

Route::get('/AjouterOmra', function () {
    return view('AjouterOmra');
})->name('AjouterOmra');
