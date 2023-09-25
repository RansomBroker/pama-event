<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BoothController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth.check')->group(function () {

    Route::controller(UserController::class)->name('user.')->group(function () {
        Route::get('/login', 'loginView')->name('login.view')->withoutMiddleware('auth.check');
        Route::post('/login/auth', 'auth')->name('login.process')->withoutMiddleware('auth.check');
        Route::get('/register', 'registerView')->name('register.view')->withoutMiddleware('auth.check');
        Route::post('/register/add', 'register')->name('register.add')->withoutMiddleware('auth.check');
        Route::get('/admin/login', 'loginAdminView')->name('login.admin.view')->withoutMiddleware('auth.check');
        Route::post('/admin/login/auth', 'adminAuth')->name('login.admin.process')->withoutMiddleware('auth.check');
        Route::get('/reset-password', 'resetPasswordView')->name('reset.password.view')->withoutMiddleware('auth.check');
        Route::post('/reset-password/reset', 'resetPassword')->name('reset.password.reset.process')->withoutMiddleware('auth.check');
        Route::post('/logout', 'logout')->name('logout');
        Route::post('/admin/logout', 'logoutAdmin')->name('admin.logout');
    });

    Route::middleware('admin.check')->group(function () {
        Route::controller(AdminController::class)->name('admin.')->group(function () {
            Route::get('/admin' ,'dashboard')->name('dashboard');
            Route::get('/admin/get/user-redeem', 'getUserRedeem')->withoutMiddleware(['auth.check', 'admin.check']);
            /* handle kelola booth*/
            Route::get('/admin/booth', 'boothView')->name('booth.view');
            Route::get('/admin/booth/add', 'boothAddView')->name('booth.add.view');
            Route::post('/admin/boot/add/process', 'boothAdd' )->name('booth.add');
            Route::get('/admin/both/edit/{booth}', 'boothEditView')->name('booth.edit.view');
            Route::patch('/admin/booth/edit/process/{booth}', 'boothEdit')->name('booth.edit');
            Route::delete('/admin/booth/delete/{booth}', 'boothDelete')->name('booth.delete');
        });
    });

    // event controller
    Route::controller(EventController::class)->name('event.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/play', 'play')->name('play');
        Route::get('/leaderboard', 'leaderboard')->name('leaderboard')->withoutMiddleware('auth.check');
        Route::get('/leaderboard/get', 'leaderboardGet')->name('leaderboard.get')->withoutMiddleware('auth.check');
        Route::get('/leaderboard/user/history/{id}', 'leaderboardUserHistory')->name('leaderboard.user.history')->withoutMiddleware('auth.check');
        Route::get('/leaderboard/user/rank/{user}', 'userRank')->name('user.rank')->withoutMiddleware('auth.check');
        Route::get('/redeem/repeat', 'boothRedeemRepeat')->name('booth.redeem.repeat');
        Route::get('/redeem/{booth}', 'boothRedeemPageView')->name('booth.redeem.view');
        Route::post('/redeem/submit/{booth}', 'boothRedeem')->name('booth.redeem');
        Route::get('/redeem/success/{booth}', 'boothRedeemSuccess')->name('booth.redeem.success');
    });
});

// booth controller
Route::controller(BoothController::class)->name('booth.')->group(function () {
    Route::get('/booth/{booth}', 'boothVisitorView')->name('visitor.view');
    Route::get('/booth/get/redeem/{booth}', 'boothVisitorGetRedeem')->name('visitor.get.redeem');
});



