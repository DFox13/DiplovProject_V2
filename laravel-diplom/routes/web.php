<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CallbackController;
use App\Http\Controllers\DentistsController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use App\Models\Role;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function() { return view('home');});
Route::get('/about', function () {return view('about');
});
Route::get('/contacts', function () {return view('contacts');
});

Route::get('/dentists', [DentistsController::class, 'index']);

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews');

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store')->middleware('auth');

Route::get('/services', [MenuController::class, 'getCategoryTitles'])->name('menu.categories');

Route::get('/stock', [StockController::class, 'index']);


Route::post('/callback', [CallbackController::class, 'store'])->name('callback.store');

Route::middleware('guest')->group(function () {
    Route::get('/auth', [AuthController::class, 'loginForm']);
    Route::post('/auth', [AuthController::class, 'auth']);
    Route::get('/reg', [AuthController::class, 'regForm']);
    Route::post('/reg', [AuthController::class, 'reg']);
});


Route::middleware(['auth'])->group(function () {
   Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::post('/logout', function () {Auth::logout();return redirect('/');})->name('logout');
    
    

    Route::get('/admin/manage-roles', [RoleController::class, 'manageRoles'])->name('admin.manage-roles');
    Route::post('/admin/update-role/{user}', [RoleController::class, 'updateRole'])->name('admin.update-role');


    Route::get('/admin/categories/create', [MenuController::class, 'showAddCategoryForm'])->name('menu.add.category');
    Route::post('/admin/categories/store', [MenuController::class, 'storeCategory'])->name('menu.store.category');
    Route::get('/admin/categories/edit/{id}', [MenuController::class, 'editCategory'])->name('menu.edit.category');
    Route::put('/admin/categories/update/{id}', [MenuController::class, 'updateCategory'])->name('menu.update.category');
    Route::delete('/admin/categories/delete/{id}', [MenuController::class, 'deleteCategory'])->name('menu.delete.category');

    Route::get('/admin/upload', [MenuController::class, 'uploadForm'])->name('upload.form');
    Route::post('/admin/upload', [MenuController::class, 'uploadCSV'])->name('upload.csv');


    Route::get('/admin/sub-items/create', [MenuController::class, 'showAddSubItemForm'])->name('menu.add.sub-item');
    Route::post('/admin/sub-items/store', [MenuController::class, 'storeSubItem'])->name('menu.store.sub-item');
    Route::get('/admin/sub-items/edit/{id}', [MenuController::class, 'editSubItem'])->name('menu.edit.sub-item');
    Route::put('/admin/sub-items/update/{id}', [MenuController::class, 'updateSubItem'])->name('menu.update.sub-item');
    Route::delete('/admin/sub-items/delete/{id}', [MenuController::class, 'deleteSubItem'])->name('menu.delete.sub-item');
    
    Route::get('/stocks-all', [StockController::class, 'adminlist'])->name('menu.list-stock');
    Route::get('/admin/stock/create', [StockController::class, 'create'])->name('admin.stock.create');
    Route::post('/admin/stock/store', [StockController::class, 'store'])->name('admin.stock.store');
    Route::delete('/admin/stock/delete/{id}', [StockController::class, 'destroy'])->name('menu.delete.stock');

    Route::get('/admin/categories', [MenuController::class, 'listCategories'])->name('menu.list.categories');
    Route::get('/admin/sub-items', [MenuController::class, 'listSubItems'])->name('menu.list.sub-items');

    Route::get('/admin/dentists/create', [DentistsController::class, 'create'])->name('admin.dentists.create');
    Route::post('/admin/dentists/store', [DentistsController::class, 'store'])->name('admin.dentists.store');
    Route::get('/admin/dentists', [DentistsController::class, 'adminIndex'])->name('admin.dentists');
    Route::get('/admin/dentists/{id}/edit', [DentistsController::class, 'edit'])->name('admin.dentists.edit');
    Route::put('/admin/dentists/{id}', [DentistsController::class, 'update'])->name('admin.dentists.update');
    Route::delete('/admin/dentists/{id}', [DentistsController::class, 'destroy'])->name('admin.dentists.destroy');

    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

    Route::post('/add-visit-date', [UserController::class, 'addVisitDate'])->name('add.visit.date');

    Route::get('/visit-dates/{user}', [UserController::class, 'getVisitDates'])->name('visit.dates');

    Route::get('/callbacks', [CallbackController::class, 'listcallback'])->name('menu.callbacks');

    Route::get('/notifications/{id}/read', [NotificationController::class, 'markAsRead']);
});
