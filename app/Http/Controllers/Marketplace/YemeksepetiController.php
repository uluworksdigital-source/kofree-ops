<?php

namespace App\Http\Controllers\Marketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MarketplaceOrderRequest;
use App\Services\Marketplace\MarketplaceOrderService;
use Illuminate\Support\Facades\Log;

class YemeksepetiController extends Controller
{
    public function webhook(Request $request)
    {
        Log::info('Yemeksepeti webhook received', $request->all());

        try {
            $payload = $request->all();

            $service = new MarketplaceOrderService;

            $order = $service->fromYemeksepeti($payload);

            return response()->json([
                'status' => true,
                'message' => 'Order processed',
                'order_id' => $order->id
            ]);

        } catch (\Exception $e) {
            Log::error('Yemeksepeti error: ' . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Webhook process failed'
            ], 422);
        }
    }
}
