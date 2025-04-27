<?php

use App\Http\Controllers\MarketController;
use App\Http\Controllers\ShoppingListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function() {
    Route::group(['prefix' => 'markets'], function() {
        Route::get('', [MarketController::class, 'index']);
        Route::post('', [MarketController::class, 'store']);

        Route::group(['prefix' => '{market_id}'], function() {
            Route::get('', [MarketController::class, 'show']);
            Route::put('', [MarketController::class, 'update']);
            Route::delete('', [MarketController::class, 'delete']);
        });
    });

    Route::group(['prefix' => 'shopping-lists'], function() {
        Route::get('', [ShoppingListController::class, 'index']);
        Route::post('', [ShoppingListController::class, 'store']);

        Route::group(['prefix' => '{shopping_list_id}'], function() {
            Route::get('', [ShoppingListController::class, 'show']);
            Route::put('', [ShoppingListController::class, 'update']);
            Route::delete('', [ShoppingListController::class, 'delete']);

            Route::group(['prefix' => 'products'], function() {
                Route::post('', [ShoppingListController::class, 'storeShoppingListProduct']);
                Route::group(['prefix' => '{shopping_list_product_id}'], function() {
                    Route::put('', [ShoppingListController::class, 'updateShoppingListProduct']);
                    Route::delete('', [ShoppingListController::class, 'deleteShoppingListProduct']);
                });
            });
        });
    });

});

// Route::middleware('auth:sanctum')->get('/user', function(Request $request) {
//     return $request->user();
// });
