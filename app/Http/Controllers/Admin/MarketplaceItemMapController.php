<?php

namespace App\Http\Controllers\Admin\Marketplace;

use App\Http\Controllers\Controller;
use App\Http\Requests\MarketplaceItemMapRequest;
use App\Models\Marketplace\MarketplaceItemMap;
use App\Models\Item;
use Illuminate\Http\Request;

class MarketplaceItemMapController extends Controller
{
    public function index()
    {
        $maps = MarketplaceItemMap::with('') // ek ilişki yok
            ->orderBy('id', 'DESC')
            ->paginate(20);

        return view('admin.marketplace.item-map.index', compact('maps'));
    }

    public function create()
    {
        $items = Item::all();

        return view('admin.marketplace.item-map.create', compact('items'));
    }

    public function store(MarketplaceItemMapRequest $request)
    {
        MarketplaceItemMap::create($request->validated());

        return redirect()
            ->route('admin.marketplace.item-map.index')
            ->with('success', 'Eşleştirme başarılı şekilde eklendi.');
    }

    public function edit($id)
    {
        $map = MarketplaceItemMap::findOrFail($id);
        $items = Item::all();

        return view('admin.marketplace.item-map.edit', compact('map', 'items'));
    }

    public function update(MarketplaceItemMapRequest $request, $id)
    {
        $map = MarketplaceItemMap::findOrFail($id);
        $map->update($request->validated());

        return redirect()
            ->route('admin.marketplace.item-map.index')
            ->with('success', 'Eşleştirme güncellendi.');
    }

    public function destroy($id)
    {
        $map = MarketplaceItemMap::findOrFail($id);
        $map->delete();

        return redirect()
            ->back()
            ->with('success', 'Eşleştirme silindi.');
    }
}
