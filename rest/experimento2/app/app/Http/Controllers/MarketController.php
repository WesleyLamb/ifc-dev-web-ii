<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMarketRequest;
use App\Http\Requests\UpdateMarketRequest;
use App\Http\Resources\MarketResource;
use App\Http\Resources\MarketSummaryResource;
use App\Models\Market;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class MarketController extends Controller
{
    public function index(Request $request)
    {
        return MarketSummaryResource::collection(Market::all());
    }

    public function store(StoreMarketRequest $request)
    {
        return new MarketResource(Market::storeRecord($request));
    }

    public function show(Request $request)
    {
        return new MarketResource(Market::findOrFail($request->route('market_id')));
    }

    public function update(UpdateMarketRequest $request)
    {
        return new MarketResource(Market::updateRecord($request->route('market_id'), $request));
    }

    public function delete(Request $request)
    {
        $market = Market::findOrFail($request->route('market_id'));
        $market->delete();
        return Response::json(null, 204);
    }
}
