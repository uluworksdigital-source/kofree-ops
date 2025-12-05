<?php

namespace App\Services\Marketplace\Drivers;

use App\Interfaces\MarketplaceDriverInterface;
use App\Services\Marketplace\MarketplaceOrderService;
use Illuminate\Support\Facades\Log;

class TrendyolDriver implements MarketplaceDriverInterface
{
    public function pullOrders(): void
    {
        Log::info("[TY] pullOrders çalıştı.");

        $payloads = $this->fetchNewOrdersFromApi();

        $normalizer = app(MarketplaceOrderService::class);

        foreach ($payloads as $payload) {
            try {
                $normalizer->fromTrendyol($payload);
            } catch (\Throwable $e) {
                Log::error("[TY] Sipariş işlenemedi", [
                    'error' => $e->getMessage(),
                    'payload' => $payload,
                ]);
            }
        }
    }

    public function syncMenu(): void
    {
        Log::info("[TY] Menü senkron başlattı.");
    }

    private function fetchNewOrdersFromApi(): array
    {
        return [];
    }
}
