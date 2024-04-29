<?php

use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ForcePasswordChangeController;


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

Route::middleware(['auth', 'web', 'verified', 'disable.login', 'force.password.change'])->group(function () {

    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('dashboard/metrics', Dashboard\Metrics::class)->name('dashboard.metrics');

    Route::get('document/create', App\Livewire\Document\Create::class)->name('document.create');
    Route::get('document/{document}/edit', App\Livewire\Document\Edit::class)->name('document.edit');
    Route::get('document/{document}/show', App\Livewire\Document\Show::class)->name('document.show');
    Route::get('documents', App\Livewire\Document\Index::class)->name('document.index');

    Route::get('admin/authentication-logs', App\Livewire\Activity\Index::class)->name('authentication.log');
    Route::get('admin/activity', App\Livewire\Activity\Log::class)->name('activity.log');
    Route::get('admin/personalisation', App\Livewire\Brand\Index::class)->name('branding.index');
    Route::get('admin/permission', App\Livewire\Permission\Index::class)->name('permission.index');
    Route::get('brand/{brand}/edit', App\Livewire\Brand\Edit::class)->name('branding.edit');
    Route::get('admin/backup', App\Livewire\Backup\Index::class)->name('backup.index');
    Route::get('users', App\Livewire\User\Index::class)->name('user.index');
    Route::get('user/{user}/edit', App\Livewire\User\Edit::class)->name('user.edit');
    Route::get('profile/security', App\Livewire\Profile\Security::class)->name('profile.security');
    Route::get('admin/settings', App\Livewire\Settings::class)->name('settings');
    Route::get('companies', App\Livewire\Company\Index::class)->name('company.index');
    Route::get('company/{company}/show', App\Livewire\Company\Show::class)->name('company.show');

    Route::get('ticket/create', App\Livewire\Ticket\Create::class)->name('ticket.create');
    Route::get('ticket/{ticket}/edit', App\Livewire\Ticket\Edit::class)->name('ticket.edit');
    Route::get('tickets', App\Livewire\Ticket\Index::class)->name('ticket.index');
    Route::get('admin/tickets', App\Livewire\Ticket\AdminTickets::class)->name('admin.tickets');

    Route::controller(UserProfileController::class)->group(function () {
        Route::get('profile/account', 'account')
            ->name('user.account');
    });

    Route::resource('password-change', ForcePasswordChangeController::class)
    ->only(['edit', 'update'])
    ->withoutMiddleware(['force.password.change']);
});
