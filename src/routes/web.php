<?php

use Illuminate\Support\Facades\Route;
use Leeuwenkasteel\Auth\Http\Controllers\AuthController;
use Leeuwenkasteel\Auth\Http\Controllers\RolesController;
use Leeuwenkasteel\Auth\Http\Controllers\PermissionsController;
use Leeuwenkasteel\Auth\Http\Controllers\UsersController;
use Leeuwenkasteel\Auth\Http\Controllers\TeamsController;
use Leeuwenkasteel\Auth\Http\Controllers\TermsController;
use Leeuwenkasteel\Auth\Http\Controllers\ProfileController;
use Leeuwenkasteel\Auth\Http\Controllers\SettingsController;

Route::middleware('web')->group(function() {
	Route::view('login', 'auth::login')->name('login');
	Route::post('login/save', [AuthController::class, 'loginSave'])->name('loginSave');

	Route::view('register', 'auth::register')->name('register');
	Route::post('register/save', [AuthController::class, 'register'])->name('registerSave');
	Route::get('verify/{token}', [AuthController::class, 'verify'])->name('verify');

	Route::view('terms', 'auth::terms')->name('terms');
	Route::view('forgot-password', 'auth::forgot')->name('forgot');

	Route::post('new-token', [AuthController::class, 'new_token'])->name('new_token');
	Route::post('new-password', [AuthController::class, 'new_password'])->name('new_password');
	Route::post('reset-password', [AuthController::class, 'reset_password_save'])->name('reset_password_save');
	Route::get('reset-password/{token}', [AuthController::class, 'reset_password'])->name('reset_password');
	
	Route::middleware('auth')->group(function() {
		Route::post('teams/invited/{team}', [TeamsController::class, 'invited'])->name('team_invited');

		Route::post('settings/auth', [SettingsController::class, 'auth'])->name('settings_auth');
		Route::post('settings/database', [SettingsController::class, 'database'])->name('settings_database');
		Route::post('settings/mail', [SettingsController::class, 'mail'])->name('settings_mail');
		Route::post('settings/menu', [SettingsController::class, 'menu'])->name('settings_menu');
		Route::post('settings/firebase', [SettingsController::class, 'firebase'])->name('settings_firebase');

		Route::resource('roles', RolesController::class);
		Route::resource('permissions', PermissionsController::class);
		Route::resource('teams', TeamsController::class);
		Route::resource('users', UsersController::class);
		Route::resource('terms', TermsController::class);
		Route::resource('settings', SettingsController::class);

		Route::get('profile', [ProfileController::class, 'index'])->name('profile');
		Route::post('profile/save', [ProfileController::class, 'store'])->name('profileSave');
		Route::post('profile/password', [ProfileController::class, 'password'])->name('password');

		Route::get('logout', [AuthController::class, 'logout'])->name('logout');
	});

});