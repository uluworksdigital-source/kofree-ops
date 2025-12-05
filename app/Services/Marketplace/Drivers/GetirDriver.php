<?php

namespace App\Services\Marketplace\Drivers;

use App\Interfaces\MarketplaceDriverInterface;
use App\Services\Marketplace\MarketplaceOrderService;
use Illuminate\Support\Facades\Log;

class GetirDriver implements MarketplaceDriverInterface
{
    public function pullOrders(): void
    {
        Log::info("[GETIR] pullOrders çalıştı.");

        $payloads = $this->fetchNewOrdersFromApi();

        $normalizer = app(MarketplaceOrderService::class);

        foreach ($payloads as $payload) {
            try {
                $normalizer->fromGetir($payload);
            } catch (\Throwable $e) {
                Log::error("[GETIR] Sipariş işlenemedi", [
                    'error' => $e->getMessage(),
                    'payload' => $payload,
                ]);
            }
        }
    }

    public function syncMenu(): void
    {
        Log::info("[GETIR] Menü senkron başlattı.");
    }

    private function fetchNewOrdersFromApi(): array
    {
        return [];
    }
}
