<?php

namespace App\Interfaces;

interface MarketplaceDriverInterface
{
    /**
     * Marketplace API’den yeni siparişleri çeker.
     */
    public function pullOrders(): void;

    /**
     * Menü senkronizasyonu (kategori + ürün + opsiyonlar).
     */
    public function syncMenu(): void;

    /**
     * Marketplace’e siparişin alındığını bildirir.
     */
    public function acknowledgeOrder(string $externalOrderId): void;

    /**
     * Marketplace sipariş iptali.
     */
    public function cancelOrder(string $externalOrderId, string $reason): void;
}
