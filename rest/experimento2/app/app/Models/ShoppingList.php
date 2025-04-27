<?php

namespace App\Models;

use App\Http\Requests\StoreShoppingListRequest;
use App\Http\Requests\UpdateShoppingListRequest;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{
    use HasUuids;

    public $table = 'shopping_lists';
    protected $primaryKey = 'uuid';

    public static function storeRecord(StoreShoppingListRequest $request): self
    {
        $record = new self();
        $record->market_id = Market::findOrFail($request->get('market_id'))->id;
        $record->save();

        return $record->refresh();
    }

    public function market()
    {
        return $this->belongsTo(Market::class, 'market_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(ShoppingListProduct::class, 'shopping_list_id', 'id');
    }

}
