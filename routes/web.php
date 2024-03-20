<?php

use App\Livewire\Dashboard;
use App\Http\Controllers\Categories;
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

    Route::get('contract/create', App\Livewire\Contract\Create::class)->name('contract.create');
    Route::get('contract/{contract}/edit', App\Livewire\Contract\Edit::class)->name('contract.edit');
    Route::get('company/{company}/show', App\Livewire\Company\Show::class)->name('company.show');

    Route::get('companies', App\Livewire\Company\Index::class)->name('company.index');
    Route::get('categories', App\Livewire\Category\Index::class)->name('category.index');
    Route::get('contract/{contract}/show', App\Livewire\Contract\Show::class)->name('contract.show');
    Route::get('contract/reports', App\Livewire\Contract\Report::class)->name('contract.report');
    Route::get('contracts', App\Livewire\Contract\Index::class)->name('contract.index');

    Route::get('admin/authentication-logs', App\Livewire\Activity\Index::class)->name('authentication.log');
    Route::get('admin/activity', App\Livewire\Activity\Log::class)->name('activity.log');
    Route::get('admin/personalisation', App\Livewire\Brand\Index::class)->name('branding.index');
    Route::get('admin/permission', App\Livewire\Permission\Index::class)->name('permission.index');
    Route::get('brand/{brand}/edit', App\Livewire\Brand\Edit::class)->name('branding.edit');
    Route::get('admin/backup', App\Livewire\Backup\Index::class)->name('backup.index');
    Route::get('users', App\Livewire\User\Index::class)->name('user.index');
    Route::get('profile/security', App\Livewire\Profile\Security::class)->name('profile.security');
    Route::get('admin/settings', App\Livewire\Settings::class)->name('settings');

    Route::controller(UserProfileController::class)->group(function () {
        Route::get('profile/account', 'account')
            ->name('user.account');
    });

    Route::resource('password-change', ForcePasswordChangeController::class)
    ->only(['edit', 'update'])
    ->withoutMiddleware(['force.password.change']);

});
