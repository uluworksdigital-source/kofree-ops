use App\Http\Controllers\Admin\Marketplace\MarketplaceItemMapController;

Route::prefix('marketplace')->name('marketplace.')->group(function () {

    Route::prefix('item-map')->name('item-map.')->group(function () {
        Route::get('/', [MarketplaceItemMapController::class, 'index'])->name('index');
        Route::get('/create', [MarketplaceItemMapController::class, 'create'])->name('create');
        Route::post('/create', [MarketplaceItemMapController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [MarketplaceItemMapController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [MarketplaceItemMapController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [MarketplaceItemMapController::class, 'destroy'])->name('destroy');
    });

});
