<?php

namespace App\Http\Controllers\Marketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Marketplace\MarketplaceOrderService;
use Illuminate\Support\Facades\Log;

class GetirYemekController extends Controller
{
    public function webhook(Request $request)
    {
        Log::info('Getir Yemek webhook received', $request->all());

        try {
            $payload = $request->all();

            $service = new MarketplaceOrderService;

            $order = $service->fromGetir($payload);

            return response()->json([
                'status' => true,
                'message' => 'Order processed',
                'order_id' => $order->id
            ]);

        } catch (\Exception $e) {
            Log::error('Getir Yemek error: ' . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Webhook process failed'
            ], 422);
        }
    }
}
