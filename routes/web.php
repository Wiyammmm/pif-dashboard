<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('admin/dashboard', 'admin.dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Backward compatibility: redirect old path to new admin path
Route::redirect('dashboard', 'admin/dashboard');

Route::view('member/dashboard', 'member.dashboard')
    ->middleware(['auth', 'verified'])
    ->name('member.dashboard');

Route::view('member/settings', 'member.settings.index')
    ->middleware(['auth'])
    ->name('member.settings');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::view('settings', 'admin.settings.index')->name('admin.settings');

    // Admin section placeholders
    Route::view('member', 'admin.pages.member')->name('admin.member');
    Route::view('reports', 'admin.pages.reports')->name('admin.reports');
    Route::view('inventory', 'admin.pages.inventory')->name('admin.inventory');
    Route::view('pos', 'admin.pages.pos')->name('admin.pos');
    Route::view('deadline', 'admin.pages.deadline')->name('admin.deadline');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

require __DIR__.'/auth.php';
