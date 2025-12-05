<?php

namespace App\Services\Marketplace;

use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\MarketplaceItemMap;
use App\Models\MarketplaceOrderLog;
use App\Models\Branch;
use Illuminate\Support\Facades\Log;

class MarketplaceOrderService
{
    /**
     * Marketplace siparişlerini normalize edilmiş formatta DB'ye kaydeder
     */
    public function importOrder(array $orderData, string $channel, int $branchId): Order
    {
        Log::info("[IMPORT] Marketplace Order Import Started", [
            'channel'   => $channel,
            'branch_id' => $branchId,
            'orderData' => $orderData
        ]);

        // 🚨 1) Duplicate Order Protection
        if ($this->isDuplicate($orderData['external_order_id'])) {
            Log::warning("[IMPORT] Duplicate marketplace order: {$orderData['external_order_id']}");

            return Order::where('external_order_id', $orderData['external_order_id'])->first();
        }

        // 🚨 2) Branch doğrulama
        $branch = Branch::find($branchId);
        if (!$branch) {
            throw new \Exception("Branch bulunamadı: {$branchId}");
        }

        // 👤 3) Müşteri oluştur / bul
        $customer = $this->findOrCreateCustomer($orderData);

        // 🧾 4) Order oluşturma
        $order = Order::create([
            'branch_id'          => $branchId,
            'user_id'            => $customer->id,
            'external_order_id'  => $orderData['external_order_id'],
            'source'             => 'marketplace',
            'channel'            => $channel,
            'status'             => 'pending',
            'subtotal'           => $orderData['subtotal'] ?? $orderData['total'],
            'discount'           => $orderData['discount'] ?? 0,
            'delivery_fee'       => $orderData['delivery_fee'] ?? 0,
            'total'              => $orderData['total'],
            'address'            => $orderData['address'] ?? null,
            'note'               => $orderData['note'] ?? null,
        ]);

        // 🍔 5) Sipariş ürünlerini ekle
        foreach ($orderData['items'] as $item) {
            $this->addOrderItem($order, $item, $branchId, $channel);
        }

        Log::info("[IMPORT] Marketplace Order Imported Successfully", [
            'order_id' => $order->id
        ]);

        return $order;
    }


    /**
     * 🔐 Duplicate sipariş kontrolü
     */
    private function isDuplicate(string $externalId): bool
    {
        return Order::where('external_order_id', $externalId)->exists();
    }


    /**
     * 👤 Marketplace müşteri → Sistemde oluştur / eşle
     */
    private function findOrCreateCustomer(array $orderData): User
    {
        $phone = preg_replace('/\D/', '', $orderData['customer_phone'] ?? '');

        return User::firstOrCreate(
            ['phone' => $phone],
            [
                'name'     => $orderData['customer_name'] ?? "Müşteri",
                'email'    => $orderData['customer_email'] ?? null,
                'password' => bcrypt('marketplace_' . rand(1000, 9999)),
            ]
        );
    }


    /**
     * 🧩 Sipariş kalemi ekleme + Marketplace ürün eşleme
     */
    private function addOrderItem(Order $order, array $item, int $branchId, string $channel): void
    {
        // Marketplace Item → Local Item eşleme
        $map = MarketplaceItemMap::where('branch_id', $branchId)
            ->where('channel', $channel)
            ->where('marketplace_item_id', $item['id'])
            ->first();

        if (!$map) {
            // Eşleşmeyen ürün → Log’a yaz
            MarketplaceOrderLog::create([
                'branch_id' => $branchId,
                'channel'   => $channel,
                'message'   => "Eşleşmeyen ürün: {$item['name']} ({$item['id']})",
            ]);

            Log::warning("[IMPORT] Unmatched marketplace item", [
                'marketplace_id' => $item['id'],
                'name'           => $item['name'],
                'channel'        => $channel,
                'branch_id'      => $branchId
            ]);

            return;
        }

        // OrderItem kaydı
        OrderItem::create([
            'order_id' => $order->id,
            'item_id'  => $map->local_item_id,
            'quantity' => $item['quantity'],
            'price'    => $item['price'],
            'total'    => $item['quantity'] * $item['price'],
        ]);
    }
}
