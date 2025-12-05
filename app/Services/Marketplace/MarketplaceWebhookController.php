<?php

namespace App\Http\Controllers\Marketplace;

use App\Http\Controllers\Controller;
use App\Services\Marketplace\MarketplaceManager;
use App\Services\Marketplace\MarketplaceOrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MarketplaceWebhookController extends Controller
{
    public function handle(string $channel, Request $request)
    {
        Log::info("[WEBHOOK] New order received", [
            'channel' => $channel,
            'payload' => $request->all()
        ]);

        try {
            // 1) Driver seç
            $driver = app(MarketplaceManager::class)->getDriver($channel);

            // 2) Normalize edilmiş veriyi al
            $normalized = $driver->normalize($request->all());

            // 3) OrderService ile DB’ye kaydet
            $order = app(MarketplaceOrderService::class)
                ->importOrder($normalized, $channel, $normalized['branch_id']);

            return response()->json([
                'status' => 'success',
                'order_id' => $order->id
            ]);
        } catch (\Throwable $e) {
            Log::error("[WEBHOOK ERROR] {$e->getMessage()}", [
                'channel' => $channel,
                'payload' => $request->all(),
            ]);

            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
