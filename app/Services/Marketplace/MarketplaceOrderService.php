<?php

namespace App\Services\Marketplace;

use App\Http\Requests\MarketplaceOrderRequest;
use App\Models\Marketplace\MarketplaceItemMap;
use App\Services\OrderService;
use Illuminate\Support\Facades\Log;

class MarketplaceOrderService
{
    /**
     * YEMEKSEPETİ → Local format dönüşümü
     */
    public function fromYemeksepeti(array $payload)
    {
        Log::info('YS Payload', $payload);

        $mappedItems = [];

        foreach ($payload['items'] as $item) {
            $mappedItems[] = [
                'local_item_id' => $this->findLocalItem($item['id']),
                'quantity'      => $item['quantity'],
                'note'          => $item['note'] ?? null,
            ];
        }

        $data = [
            'channel'           => 'yemeksepeti',
            'external_order_id' => $payload['orderId'],
            'items'             => $mappedItems,
            'total'             => $payload['totalAmount'],
            'payload'           => $payload
        ];

        // OrderService pipeline
        return app(OrderService::class)->marketplaceOrderStore(new MarketplaceOrderRequest($data));
    }


    /**
     * TRENDYOL → Local format dönüşümü
     */
    public function fromTrendyol(array $payload)
    {
        Log::info('TY Payload', $payload);

        $mappedItems = [];

        foreach ($payload['basket']['items'] as $item) {
            $mappedItems[] = [
                'local_item_id' => $this->findLocalItem($item['productId']),
                'quantity'      => $item['quantity'],
                'note'          => $item['note'] ?? null,
            ];
        }

        $data = [
            'channel'           => 'trendyol_yemek',
            'external_order_id' => $payload['orderNumber'],
            'items'             => $mappedItems,
            'total'             => $payload['totalPrice'],
            'payload'           => $payload
        ];

        return app(OrderService::class)->marketplaceOrderStore(new MarketplaceOrderRequest($data));
    }


    /**
     * GETİR → Local format dönüşümü
     */
    public function fromGetir(array $payload)
    {
        Log::info('Getir Payload', $payload);

        $mappedItems = [];

        foreach ($payload['products'] as $item) {
            $mappedItems[] = [
                'local_item_id' => $this->findLocalItem($item['productId']),
                'quantity'      => $item['quantity'],
                'note'          => $item['description'] ?? null,
            ];
        }

        $data = [
            'channel'           => 'getir_yemek',
            'external_order_id' => $payload['orderUuid'],
            'items'             => $mappedItems,
            'total'             => $payload['grandTotal'],
            'payload'           => $payload
        ];

        return app(OrderService::class)->marketplaceOrderStore(new MarketplaceOrderRequest($data));
    }


    /**
     * Marketplace item → Local item map
     */
    private function findLocalItem($marketplaceItemId)
    {
        $map = MarketplaceItemMap::where('marketplace_item_id', $marketplaceItemId)->first();

        if (!$map) {
            Log::warning("Marketplace item eşleşmedi: " . $marketplaceItemId);
            return null; // eşleşmeyen ürün yine order'a düşer
        }

        return $map->local_item_id;
    }
}
