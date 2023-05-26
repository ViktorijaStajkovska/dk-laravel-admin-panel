<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ApplicationStatusController;

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
    return view('auth/login');
})->middleware('auth.user');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('categories',            [CategoryController::class, 'store'])->name('categories.store');
    Route::post('types',            [TypeController::class, 'store'])->name('types.store');
    
    Route::get('blogs',             [BlogController::class, 'index'])->name('blogs.index');
    Route::get('blogs/create',      [BlogController::class, 'create'])->name('blogs.create');
    Route::post('blogs',            [BlogController::class, 'store'])->name('blogs.store');
    Route::get('blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('blogs/{blog}',      [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('blogs/{blog}',   [BlogController::class, 'destroy'])->name('blogs.destroy');
    
    Route::get('videos',             [VideoController::class, 'index'])->name('videos.index');
    Route::get('videos/create',      [VideoController::class, 'create'])->name('videos.create');
    Route::post('videos',            [VideoController::class, 'store'])->name('videos.store');
    Route::get('videos/{video}/edit', [VideoController::class, 'edit'])->name('videos.edit');
    Route::put('videos/{video}',      [VideoController::class, 'update'])->name('videos.update');
    Route::delete('videos/{video}',   [VideoController::class, 'destroy'])->name('videos.destroy');
    
    Route::get('partners',             [PartnerController::class, 'index'])->name('partners.index');
    Route::get('partners/create',      [PartnerController::class, 'create'])->name('partners.create');
    Route::post('partners',            [PartnerController::class, 'store'])->name('partners.store');
    Route::get('partners/{partner}/edit', [PartnerController::class, 'edit'])->name('partners.edit');
    Route::put('partners/{partner}',      [PartnerController::class, 'update'])->name('partners.update');
    Route::delete('partners/{partner}',   [PartnerController::class, 'destroy'])->name('partners.destroy');
    Route::get('/table',  [PartnerController::class, 'partnerTable'])->name('partner.table');

    Route::get('applications',             [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('applications/create',      [ApplicationController::class, 'create'])->name('applications.create');
    Route::get('applications/{application}', [ApplicationController::class, 'show'])->name('applications.show');
    Route::get('applications/{application}/edit', [ApplicationController::class, 'edit'])->name('applications.edit');
    Route::put('applications/{application}',      [ApplicationController::class, 'update'])->name('applications.update');
    Route::delete('applications/{application}',   [ApplicationController::class, 'destroy'])->name('applications.destroy');
    Route::get('/applicationTable',  [ApplicationController::class, 'applicationTable'])->name('application.table');
    Route::put('/applications/{application}/archive', [ApplicationController::class, 'archive'])->name('applications.archive');

    Route::put('/applicationStatus/{application}',  [ApplicationController::class, 'applicationStatus'])->name('applicationStatus.update');

    Route::get('volunteers',             [VolunteerController::class, 'index'])->name('volunteers.index');
    Route::get('volunteers/{volunteer}', [VolunteerController::class, 'show'])->name('volunteers.show');
    Route::delete('volunteers/{volunteer}',   [VolunteerController::class, 'destroy'])->name('volunteers.destroy');
    Route::get('/volunteerTable',  [VolunteerController::class, 'volunteerTable'])->name('volunteer.table');

    Route::get('contacts',             [ContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::delete('contacts/{contact}',   [ContactController::class, 'destroy'])->name('contacts.destroy');
    Route::get('/contactTable',  [ContactController::class, 'contactTable'])->name('contacts.table');
    
    Route::get('donations',             [DonationController::class, 'index'])->name('donations.index');
    Route::get('donations/create',      [DonationController::class, 'create'])->name('donations.create');
    Route::post('donations',            [DonationController::class, 'store'])->name('donations.store');
    Route::get('donations/{donation}/edit', [DonationController::class, 'edit'])->name('donations.edit');
    Route::put('donations/{donation}',      [DonationController::class, 'update'])->name('donations.update');
    Route::delete('donations/{donation}',   [DonationController::class, 'destroy'])->name('donations.destroy');
    Route::get('/donationTable',  [DonationController::class, 'donationTable'])->name('donations.table');

});


require __DIR__.'/auth.php';
