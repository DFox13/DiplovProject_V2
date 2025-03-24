<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DentistsController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {return view('home');});
Route::get('/about', function () {return view('about');});
Route::get('/contacts', function () {return view('contacts');});

Route::resource('dentists', DentistsController::class);

Route::get('/reviews', function () {return view('review');})->middleware('auth');
Route::get('/services', function () {return view('service');});
Route::get('/stock', function () {return view('stock');});

Route::middleware('guest')->group(function () {
    Route::get('/auth', [AuthController::class, 'loginForm']);
    Route::post('/auth', [AuthController::class, 'auth']);
    Route::get('/reg', [AuthController::class, 'regForm']);
    Route::post('/reg', [AuthController::class, 'reg']);
});

Route::get('/account', [AccountController::class, 'index'])->middleware('auth');

Route::post('/logout', function () {Auth::logout(); return redirect('/');})->name('logout')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/manage-roles', [RoleController::class, 'manageRoles'])->name('admin.manage-roles');
    Route::post('/admin/update-role/{user}', [RoleController::class, 'updateRole'])->name('admin.update-role');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/categories/create', [MenuController::class, 'showAddCategoryForm'])->name('menu.add.category');
    Route::post('/admin/categories/store', [MenuController::class, 'storeCategory'])->name('menu.store.category');
    Route::get('/admin/categories/edit/{id}', [MenuController::class, 'editCategory'])->name('menu.edit.category');
    Route::put('/admin/categories/update/{id}', [MenuController::class, 'updateCategory'])->name('menu.update.category');
    Route::delete('/admin/categories/delete/{id}', [MenuController::class, 'deleteCategory'])->name('menu.delete.category');

    Route::get('/admin/sub-items/create', [MenuController::class, 'showAddSubItemForm'])->name('menu.add.sub-item');
    Route::post('/admin/sub-items/store', [MenuController::class, 'storeSubItem'])->name('menu.store.sub-item');
    Route::get('/admin/sub-items/edit/{id}', [MenuController::class, 'editSubItem'])->name('menu.edit.sub-item');
    Route::put('/admin/sub-items/update/{id}', [MenuController::class, 'updateSubItem'])->name('menu.update.sub-item');
    Route::delete('/admin/sub-items/delete/{id}', [MenuController::class, 'deleteSubItem'])->name('menu.delete.sub-item');

    Route::get('/admin/categories', [MenuController::class, 'listCategories'])->name('menu.list.categories');
    Route::get('/admin/sub-items', [MenuController::class, 'listSubItems'])->name('menu.list.sub-items');
});