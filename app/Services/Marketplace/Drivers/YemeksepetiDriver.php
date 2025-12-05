<?php

namespace App\Services\Marketplace\Drivers;

use App\Interfaces\MarketplaceDriverInterface;
use App\Services\Marketplace\MarketplaceOrderService;
use Illuminate\Support\Facades\Log;

class YemeksepetiDriver implements MarketplaceDriverInterface
{
    public function pullOrders(): void
    {
        Log::info("[YS] pullOrders çalıştı.");

        $payloads = $this->fetchNewOrdersFromApi();

        $normalizer = app(MarketplaceOrderService::class);

        foreach ($payloads as $payload) {
            try {
                $normalizer->fromYemeksepeti($payload);
            } catch (\Throwable $e) {
                Log::error("[YS] Sipariş işlenemedi", [
                    'error' => $e->getMessage(),
                    'payload' => $payload,
                ]);
            }
        }
    }

    public function syncMenu(): void
    {
        Log::info("[YS] Menü senkron başlattı.");

        // Buraya API ile gerçek menü gönderme entegre edilecek.
    }

    /**
     * API üzerinden yeni siparişleri çeker (dummy).
     */
    private function fetchNewOrdersFromApi(): array
    {
        // Şimdilik boş dönüyoruz.
        return [];
    }
}
