<?php

use App\Http\Controllers\Admin\CommunityServiceController as AdminCommunityServiceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OutputController as AdminOutputController;
use App\Http\Controllers\Admin\PartnerController as AdminPartnerController;
use App\Http\Controllers\Admin\ResearchController as AdminResearchController;
use App\Http\Controllers\CommunityServiceController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\OutputController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResearchController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/2', [LandingController::class, 'index2'])->name('landing2');
Route::get('/3', [LandingController::class, 'index3'])->name('landing3');
Route::get('/tentang-kami', [LandingController::class, 'about'])->name('about');
Route::get('/penelitian', [ResearchController::class, 'index'])->name('research.index');
Route::get('/penelitian/{research}', [ResearchController::class, 'show'])->name('research.show');

Route::get('/pengabdian', [CommunityServiceController::class, 'index'])->name('service.index');
Route::get('/pengabdian/{communityService}', [CommunityServiceController::class, 'show'])->name('service.show');

Route::get('/luaran', [OutputController::class, 'index'])->name('output.index');
Route::get('/luaran/{output}', [OutputController::class, 'show'])->name('output.show');

Route::get('/kerjasama', [PartnerController::class, 'index'])->name('partner.index');
Route::get('/kerjasama/{partner}', [PartnerController::class, 'show'])->name('partner.show');

// ==========================================
// ROUTE ADMIN DASHBOARD (Fase 3)
// ==========================================
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('research', AdminResearchController::class)->parameters([
        'research' => 'research', // Memastikan parameter URL selaras
    ]);
    Route::resource('service', AdminCommunityServiceController::class)->parameters([
        'service' => 'communityService', // Menyelaraskan parameter URL dengan model
    ]);
    Route::resource('output', AdminOutputController::class)->parameters([
        'output' => 'output',
    ]);
    Route::resource('partner', AdminPartnerController::class)->parameters([
    'partner' => 'partner'
]);
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
