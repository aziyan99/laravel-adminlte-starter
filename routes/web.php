<?php

use App\Http\Controllers\Backend\AnnouncementController;
use App\Http\Controllers\Backend\AnnouncementCategoryController;
use App\Http\Controllers\Backend\ArticleCategoryController;
use App\Http\Controllers\Backend\ArticleController;
use App\Http\Controllers\Backend\AssignPermissionController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\GalleryDetailController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ResetPasswordUserController;
use App\Http\Controllers\Backend\SettingController;
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

Route::get('/', function () {
    return redirect()->route('login');
})->name('home.index');

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::group(['prefix' => 'backend', 'as' => 'backend.', 'middleware' => 'auth'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('permission:lihat dasbor');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/update/{id}', [ProfileController::class, 'updateGeneralInformation'])->name('profile.update.information');
    Route::put('/profile/update/password/{id}', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    Route::post('/profile/update/image', [ProfileController::class, 'updateImage'])->name('profile.update.image');

    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', [RoleController::class, 'index'])->name('roles.index')->middleware('permission:lihat role');
        Route::get('/create', [RoleController::class, 'create'])->name('roles.create')->middleware('permission:tambah role');
        Route::post('/', [RoleController::class, 'store'])->name('roles.store')->middleware('permission:tambah role');
        Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit')->middleware('permission:ubah role');
        Route::put('/{role}', [RoleController::class, 'update'])->name('roles.update')->middleware('permission:ubah role');
        Route::delete('/{role}', [RoleController::class, 'destroy'])->name('roles.destroy')->middleware('permission:hapus role');
    });

    Route::group(['prefix' => 'permissions'], function () {
        Route::get('/', [PermissionController::class, 'index'])->name('permissions.index')->middleware('permission:lihat permission');
        Route::get('/create', [PermissionController::class, 'create'])->name('permissions.create')->middleware('permission:tambah permission');
        Route::post('/', [PermissionController::class, 'store'])->name('permissions.store')->middleware('permission:tambah permission');
        Route::get('/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit')->middleware('permission:ubah permission');
        Route::put('/{permission}', [PermissionController::class, 'update'])->name('permissions.update')->middleware('permission:ubah permission');
        Route::delete('/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy')->middleware('permission:hapus permission');
    });

    Route::group(['prefix' => 'assignpermission'], function () {
        Route::get('/', [AssignPermissionController::class, 'index'])->name('assignpermission.index')->middleware('permission:lihat assign permission');
        Route::get('/{role}/edit', [AssignPermissionController::class, 'editRolePermission'])->name('assignpermission.edit')->middleware('permission:ubah assign permission');
        Route::post('/updaterolepermission', [AssignPermissionController::class, 'updateRolePermission'])->name('assignpermission.update')->middleware('permission:ubah assign permission');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index')->middleware('permission:lihat pengguna');
        Route::get('/create', [UserController::class, 'create'])->name('users.create')->middleware('permission:tambah pengguna');
        Route::post('/', [UserController::class, 'store'])->name('users.store')->middleware('permission:tambah pengguna');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('permission:ubah pengguna');
        Route::put('/{user}', [UserController::class, 'update'])->name('users.update')->middleware('permission:ubah pengguna');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('permission:hapus pengguna');
        Route::get('/{user}', [UserController::class, 'show'])->name('users.show')->middleware('permission:lihat pengguna');

        Route::put('/users/{user}/resetpassword', [ResetPasswordUserController::class, 'resetPassword'])->name('users.reset.password')->middleware('permission:ubah pengguna');
    });

    Route::group(['prefix' => 'settings'], function () {
        Route::get('/index', [SettingController::class, 'index'])->name('setting.index')->middleware('permission:lihat pengaturan');
        Route::put('/updateinformation/{setting}/', [SettingController::class, 'updateInformation'])->name('setting.update.information')->middleware('permission:ubah pengaturan');
        Route::put('/updatelogo/{setting}/', [SettingController::class, 'updateLogo'])->name('setting.update.logo')->middleware('permission:ubah pengaturan');
        Route::put('/updatefrontimage/{setting}/', [SettingController::class, 'updateFrontImage'])->name('setting.update.front.image')->middleware('permission:ubah pengaturan');
    });

    Route::group(['prefix' => 'announcementcategories'], function () {
        Route::get('/', [AnnouncementCategoryController::class, 'index'])->name('announcement.category.index')->middleware('permission:lihat kategori pengumuman');
        Route::get('/{announcementCategory}/edit', [AnnouncementCategoryController::class, 'edit'])->name('announcement.category.edit')->middleware('permission:ubah kategori pengumuman');
        Route::post('/store', [AnnouncementCategoryController::class, 'store'])->name('announcement.category.store')->middleware('permission:tambah kategori pengumuman');
        Route::put('/update/{announcementCategory}', [AnnouncementCategoryController::class, 'update'])->name('announcement.category.update')->middleware('permission:ubah kategori pengumuman');
        Route::delete('/delete/{announcementCategory}', [AnnouncementCategoryController::class, 'destroy'])->name('announcement.category.destroy')->middleware('permission:hapus kategori pengumuman');
    });

    Route::group(['prefix' => 'announcements'], function () {
        Route::get('/', [AnnouncementController::class, 'index'])->name('announcements.index')->middleware('permission:lihat pengumuman');
        Route::get('/create', [AnnouncementController::class, 'create'])->name('announcements.create')->middleware('permission:tambah pengumuman');
        Route::post('/', [AnnouncementController::class, 'store'])->name('announcements.store')->middleware('permission:tambah pengumuman');
        Route::get('/{announcement}/edit', [AnnouncementController::class, 'edit'])->name('announcements.edit')->middleware('permission:ubah pengumuman');
        Route::put('/{announcement}', [AnnouncementController::class, 'update'])->name('announcements.update')->middleware('permission:ubah pengumuman');
        Route::delete('/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy')->middleware('permission:hapus pengumuman');
        Route::get('/{announcement}', [AnnouncementController::class, 'show'])->name('announcements.show')->middleware('permission:lihat pengumuman');
    });

    Route::group(['prefix' => 'articlecategories'], function () {
        Route::get('/', [ArticleCategoryController::class, 'index'])->name('article.category.index')->middleware('permission:lihat kategori artikel');
        Route::get('/{articleCategory}/edit', [ArticleCategoryController::class, 'edit'])->name('article.category.edit')->middleware('permission:ubah kategori artikel');
        Route::post('/store', [ArticleCategoryController::class, 'store'])->name('article.category.store')->middleware('permission:tambah kategori artikel');
        Route::put('/update/{articleCategory}', [ArticleCategoryController::class, 'update'])->name('article.category.update')->middleware('permission:ubah kategori artikel');
        Route::delete('/delete/{articleCategory}', [ArticleCategoryController::class, 'destroy'])->name('article.category.destroy')->middleware('permission:hapus kategori artikel');
    });

    Route::group(['prefix' => 'articles'], function () {
        Route::get('/', [ArticleController::class, 'index'])->name('articles.index')->middleware('permission:lihat artikel');
        Route::get('/create', [ArticleController::class, 'create'])->name('articles.create')->middleware('permission:tambah artikel');
        Route::post('/', [ArticleController::class, 'store'])->name('articles.store')->middleware('permission:tambah artikel');
        Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit')->middleware('permission:ubah artikel');
        Route::put('/{article}', [ArticleController::class, 'update'])->name('articles.update')->middleware('permission:ubah artikel');
        Route::delete('/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy')->middleware('permission:hapus artikel');
        Route::get('/{article}', [ArticleController::class, 'show'])->name('articles.show')->middleware('permission:lihat artikel');
    });

    Route::group(['prefix' => 'galleries'], function () {
        Route::get('/', [GalleryController::class, 'index'])->name('galleries.index')->middleware('permission:lihat galeri');
        Route::get('/create', [GalleryController::class, 'create'])->name('galleries.create')->middleware('permission:tambah galeri');
        Route::post('/', [GalleryController::class, 'store'])->name('galleries.store')->middleware('permission:tambah galeri');
        Route::get('/{gallery}/edit', [GalleryController::class, 'edit'])->name('galleries.edit')->middleware('permission:ubah galeri');
        Route::put('/{gallery}', [GalleryController::class, 'update'])->name('galleries.update')->middleware('permission:ubah galeri');
        Route::delete('/{gallery}', [GalleryController::class, 'destroy'])->name('galleries.destroy')->middleware('permission:hapus galeri');
        Route::get('/{gallery}', [GalleryController::class, 'show'])->name('galleries.show')->middleware('permission:lihat galeri');

        Route::post('/{gallery}/details/', [GalleryDetailController::class, 'store'])->name('galleries.details.store')->middleware('permission:ubah galeri');
        Route::delete('/{galleryDetail}/details', [GalleryDetailController::class, 'destroy'])->name('galleries.details.destroy')->middleware('permission:ubah galeri');
    });
});
