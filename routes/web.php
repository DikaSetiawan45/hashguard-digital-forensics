<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\EvidenceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $stats = [
        'total' => \App\Models\Evidence::count(),
        'valid' => \App\Models\Evidence::where('integrity_status', 'valid')->count(),
        'modified' => \App\Models\Evidence::where('integrity_status', 'modified')->count(),
    ];
    return view('dashboard', compact('stats'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class)->middleware([\App\Http\Middleware\IsAdmin::class]);
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('cases/{case}/report', [CaseController::class, 'report'])->name('cases.report');
    Route::resource('cases', CaseController::class);
    Route::get('evidences/{evidence}/verify', [EvidenceController::class, 'showVerifyForm'])->name('evidences.verify');
    Route::post('evidences/{evidence}/verify', [EvidenceController::class, 'verify'])->name('evidences.verify.submit');
    Route::resource('evidences', EvidenceController::class)->only(['index', 'create', 'store', 'show']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
