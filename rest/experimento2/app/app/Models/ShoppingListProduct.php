<?php

namespace App\Models;

use App\Http\Requests\StoreShoppingListProductRequest;
use App\Http\Requests\UpdateShoppingListProductRequest;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ShoppingListProduct extends Model
{
    use HasUuids;

    public $table = 'shopping_list_products';
    protected $primaryKey = 'uuid';

    public static function storeRecord(string $shoppingListId, StoreShoppingListProductRequest $request): self
    {
        $shoppingList = ShoppingList::findOrFail($shoppingListId);
        $record = new self();
        $record->shopping_list_id = $shoppingList->id;
        $record->name = $request->get('name');
        $record->qty = $request->get('qty');
        $record->save();

        return $record->refresh();
    }

    public static function updateRecord(string $id, UpdateShoppingListProductRequest $request): self
    {
        $record = self::findOrFail($id);
        if ($request->has('name'))
            $record->name = $request->get('name');

        if ($request->has('qty'))
            $record->qty = $request->get('qty');

        $record->save();
        return $record->refresh();
    }
}
