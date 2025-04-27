<?php

namespace App\Models;

use App\Http\Requests\StoreMarketRequest;
use App\Http\Requests\UpdateMarketRequest;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Market extends Model
{
    use SoftDeletes, HasUuids;

    public $table = 'markets';
    protected $primaryKey = 'uuid';

    public static function storeRecord(StoreMarketRequest $request): self
    {
        $record = new self();
        $record->name = $request->get('name');
        $record->save();

        return $record->refresh();
    }

    public static function updateRecord(string $id, UpdateMarketRequest $request): self
    {
        $record = self::findOrFail($id);
        if ($request->has('name'))
            $record->name = $request->get('name');

        $record->save();
        return $record->refresh();
    }
}
