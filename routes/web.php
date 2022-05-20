<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use App\Mail\UserWelcomeEmail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::prefix('cms/')->middleware('guest:admin,user')->group(function () {
    Route::get('{guard}/login', [AuthController::class, 'showLogin'])->name('cms.login');
    Route::post('login', [AuthController::class, 'login']);
    Route::post('user/register', [AuthController::class, 'registerUser']); 
    Route::get('forgot-password', [ResetPasswordController::class, 'showForgotPassword'])->name('password.forgot');
    Route::post('forgot-password', [ResetPasswordController::class, 'sendResetEmail'])->name('password.email');
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordView'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'updatePassword'])->name('password.update');

});


Route::prefix('cms/admin')->middleware(['auth:admin,user', 'verified'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('cms.logout');
    Route::view('/', 'cms.parent')->name('cms.dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('admins', AdminController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('sub-categories',SubCategoryController::class);
    Route::resource('cities', CityController::class);
    Route::resource('users', UserController::class);
    Route::resource('service-providers', ServiceProviderController::class);

});

Route::prefix('cms/admin')->middleware(['auth:admin,user', 'verified'])->group(function () {
    Route::get('roles/{role}/permissions/edit', [RoleController::class, 'editRolePermissions'])->name('roles.edit-permissions');
    Route::put('roles/{role}/permissions/edit', [RoleController::class, 'updateRolePermissions']);
    Route::get('users/{user}/permissions/edit', [UserController::class, 'editUserPermissions'])->name('user.edit-permissions');
    Route::put('users/{user}/permissions/edit', [UserController::class, 'updateUserPermissions']);
    Route::get('edit-password', [AuthController::class, 'editPassword'])->name('password.edit');
    Route::put('update-password', [AuthController::class, 'updatePassword']);
});

Route::prefix('cms/admin')->middleware(['auth:admin,user'])->group(function () {
    Route::get('verify', [EmailVerificationController::class, 'notice'])->name('verification.notice');
    Route::get('send-verification', [EmailVerificationController::class, 'send'])->middleware('throttle:1,1')->name('verification.send');
    Route::get('verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->middleware('signed')->name('verification.verify');
});


Route::get('test',function(){

    return view('cms.auth.change-password');
});



