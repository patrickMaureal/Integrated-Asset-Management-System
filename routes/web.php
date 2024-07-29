<?php

use App\Http\Controllers\BannerPrograms\BannerProgram;
use App\Http\Controllers\BannerPrograms\CornController;
use App\Http\Controllers\BannerPrograms\FisheryController;
use App\Http\Controllers\BannerPrograms\HighValueCropController;
use App\Http\Controllers\BannerPrograms\LivestockController;
use App\Http\Controllers\BannerPrograms\OrgAgricultureController;
use App\Http\Controllers\BannerPrograms\RiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Farmer\FarmerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {

	Route::prefix('dashboard')->group(function () {
		Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
		Route::get('chart', [DashboardController::class, 'showChart'])->name('chart');
	});

	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

	//FARMER PROFILING ROUTING
	Route::prefix('farmers')->group(function () {
		Route::get('table', [FarmerController::class, 'showTable'])->name('table');
	});
	Route::resource('farmers', FarmerController::class);

	Route::prefix('banner-programs')->group(function () {
		Route::get('/', BannerProgram::class)->name('bannerPrograms');

		Route::prefix('corns')->group(function () {
			Route::get('table', [CornController::class, 'showTable'])->name('table');
		});
		Route::resource('corns', CornController::class);

		Route::prefix('rices')->group(function () {
			Route::get('table', [RiceController::class, 'showTable'])->name('table');
		});
		Route::resource('rices', RiceController::class);

		Route::prefix('high-value-crops')->group(function () {
			Route::get('table', [HighValueCropController::class, 'showTable'])->name('table');
		});
		Route::resource('high-value-crops', HighValueCropController::class);

		Route::prefix('organic-agricultures')->group(function () {
			Route::get('table', [OrgAgricultureController::class, 'showTable'])->name('table');
		});
		Route::resource('organic-agricultures', OrgAgricultureController::class);

		Route::prefix('fisheries')->group(function () {
			Route::get('table', [FisheryController::class, 'showTable'])->name('table');
		});
		Route::resource('fisheries', FisheryController::class);

		Route::prefix('livestocks')->group(function () {
			Route::get('table', [LivestockController::class, 'showTable'])->name('table');
		});
		Route::resource('livestocks', LivestockController::class);
	});

	Route::prefix('users')->group(function () {
		Route::get('/', [UserController::class, 'index'])->name('users.index');
		Route::get('table', [UserController::class, 'showTable'])->name('table');
	});
});

require __DIR__ . '/auth.php';
