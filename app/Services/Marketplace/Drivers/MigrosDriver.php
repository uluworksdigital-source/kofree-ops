<?php

namespace App\Services\Marketplace\Drivers;

use App\Interfaces\MarketplaceDriverInterface;
use App\Services\Marketplace\MarketplaceOrderService;
use Illuminate\Support\Facades\Log;

class MigrosDriver implements MarketplaceDriverInterface
{
    public function pullOrders(): void
    {
        Log::info("[MIGROS] pullOrders çalıştı.");

        $payloads = $this->fetchNewOrdersFromApi();

        $normalizer = app(MarketplaceOrderService::class);

        foreach ($payloads as $payload) {
            try {
                // Migros normalizer henüz yok → ekleyeceğiz
                // $normalizer->fromMigros($payload);

                Log::info("[MIGROS] Normalizer henüz hazır değil.");
            } catch (\Throwable $e) {
                Log::error("[MIGROS] Sipariş işlenemedi", [
                    'error' => $e->getMessage(),
                    'payload' => $payload,
                ]);
            }
        }
    }

    public function syncMenu(): void
    {
        Log::info("[MIGROS] Menü senkron başlattı.");
    }

    private function fetchNewOrdersFromApi(): array
    {
        return [];
    }
}
