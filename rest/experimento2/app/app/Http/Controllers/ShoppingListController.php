<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShoppingListProductRequest;
use App\Http\Requests\StoreShoppingListRequest;
use App\Http\Requests\UpdateShoppingListProductRequest;
use App\Http\Requests\UpdateShoppingListRequest;
use App\Http\Resources\ShoppingListProductResource;
use App\Http\Resources\ShoppingListResource;
use App\Http\Resources\ShoppingListSummaryResource;
use App\Models\ShoppingList;
use App\Models\ShoppingListProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ShoppingListController extends Controller
{
    public function index(Request $request)
    {
        return ShoppingListSummaryResource::collection(ShoppingList::all());
    }

    public function store(StoreShoppingListRequest $request)
    {
        return new ShoppingListResource(ShoppingList::storeRecord($request));
    }

    public function show(Request $request)
    {
        return new ShoppingListResource(ShoppingList::findOrFail($request->route('shopping_list_id')));
    }

    public function delete(Request $request)
    {
        $ShoppingList = ShoppingList::findOrFail($request->route('shopping_list_id'));
        $ShoppingList->delete();
        return Response::json(null, 204);
    }

    public function storeShoppingListProduct(StoreShoppingListProductRequest $request)
    {
        return new ShoppingListProductResource(ShoppingListProduct::storeRecord($request->route('shopping_list_id'), $request));
    }

    public function updateShoppingListProduct(UpdateShoppingListProductRequest $request)
    {
        return new ShoppingListProductResource(ShoppingListProduct::updateRecord($request->route('shopping_list_product_id'), $request));
    }

    public function deleteShoppingListProduct(Request $request)
    {
        $shoppingListProduct = ShoppingListProduct::findOrFail($request->route('shopping_list_product_id'));
        $shoppingListProduct->delete();
        return Response::json(null, 204);
    }
}
