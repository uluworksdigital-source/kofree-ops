<?php

use App\Enums\OrderStatus;

return [
    OrderStatus::PENDING          => 'Beklemede',
    OrderStatus::ACCEPT           => 'Kabul Edildi',
    OrderStatus::PREPARING        => 'Hazırlanıyor',
    OrderStatus::PREPARED         => 'Hazırlandı',
    OrderStatus::OUT_FOR_DELIVERY => 'Yola Çıktı',
    OrderStatus::DELIVERED        => 'Teslim Edildi',
    OrderStatus::CANCELED         => 'İptal Edildi',
    OrderStatus::REJECTED         => 'Reddedildi',
    OrderStatus::RETURNED         => 'İade Edildi',
];
