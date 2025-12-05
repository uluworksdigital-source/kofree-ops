<?php

namespace App\Http\Controllers\Admin\Marketplace;

use App\Http\Controllers\Controller;
use App\Models\Marketplace\MarketplaceItemMap;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Requests\Marketplace\MarketplaceItemMapRequest;

class MarketplaceItemMapController extends Controller
{
    /**
     * Listeleme (index)
     */
    public function index(Request $request)
    {
        $data['maps'] = MarketplaceItemMap::orderBy('id', 'desc')->paginate(20);
        return view('admin.marketplace.item-map.index', $data);
    }

    /**
     * Yeni kayıt formu (create)
     */
    public function create()
    {
        $data['items'] = Item::all();
        $data['channels'] = [
            'yemeksepeti',
            'trendyol_yemek',
            'getir_yemek'
        ];

        return view('admin.marketplace.item-map.create', $data);
    }

    /**
     * Kayıt ekleme (store)
     */
    public function store(MarketplaceItemMapRequest $request)
    {
        MarketplaceItemMap::create($request->validated());

        return redirect()
            ->route('admin.marketplace.item-map.index')
            ->with('success', 'Ürün eşleştirme başarıyla eklendi.');
    }

    /**
     * Düzenleme formu (edit)
     */
    public function edit($id)
    {
        $data['map'] = MarketplaceItemMap::findOrFail($id);
        $data['items'] = Item::all();
        $data['channels'] = [
            'yemeksepeti',
            'trendyol_yemek',
            'getir_yemek'
        ];

        return view('admin.marketplace.item-map.edit', $data);
    }

    /**
     * Güncelleme (update)
     */
    public function update(MarketplaceItemMapRequest $request, $id)
    {
        $map = MarketplaceItemMap::findOrFail($id);
        $map->update($request->validated());

        return redirect()
            ->route('admin.marketplace.item-map.index')
            ->with('success', 'Ürün eşleştirme başarıyla güncellendi.');
    }

    /**
     * Silme (destroy)
     */
    public function destroy($id)
    {
        MarketplaceItemMap::findOrFail($id)->delete();

        return redirect()
            ->route('admin.marketplace.item-map.index')
            ->with('success', 'Eşleştirme silindi.');
    }
}
