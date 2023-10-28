<?php

use App\Http\Controllers\FormationController;

Route::middleware(['auth','admin'])->prefix('admin')->name('admin')->group(function () {

    Route::resource('client', App\Http\Controllers\ClientController::class);

    Route::resource('stock', App\Http\Controllers\StockController::class);

    Route::resource('boutique', App\Http\Controllers\BoutiqueController::class);

    Route::resource('category', App\Http\Controllers\CategoryController::class);

    Route::resource('produit', App\Http\Controllers\ProduitController::class);

    Route::resource('module', App\Http\Controllers\ModuleController::class);

    Route::resource('projet', App\Http\Controllers\ProjetController::class);

    Route::resource('formations',FormationController::class);
});
