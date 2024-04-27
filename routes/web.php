<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\ShowMenuController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\MenuController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\HomeController as IndexController;

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


Route::get("/",[IndexController::class,"index"]);

Route::name("dashboard.")->middleware("auth")->group(function(){
    Route::get("dashboard",[HomeController::class,"index"]);

    // Menus
    Route::resource("menus",MenuController::class)->except("create");
    // Categories
    Route::resource("categories",CategoryController::class);
    // Products
    Route::resource("products",ProductController::class);
    // get categories of menu
    Route::get("categoriesMenu",[ProductController::class,"getCategoriesOfMenu"])->name("categoriesMenus");


});
// show menu
Route::get("menu/{menu}",[ShowMenuController::class,"index"]);
// show qr
Route::get("qr/{menu}",[ShowMenuController::class,"showQr"]);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
