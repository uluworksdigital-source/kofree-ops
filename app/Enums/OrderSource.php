<?php

namespace App\Enums;

class OrderSource
{
    // İç kanallar
    public const WEB            = 'web';
    public const MOBILE         = 'mobile';
    public const QR             = 'qr';
    public const KIOSK          = 'kiosk';
    public const POS            = 'pos';

    // Marketplace ana kaynak
    public const MARKETPLACE    = 'marketplace';

    // Marketplace alt kanallar
    public const YEMEKSEPETI    = 'yemeksepeti';
    public const TRENDYOL_YEMEK = 'trendyol_yemek';
    public const GETIR_YEMEK    = 'getir_yemek';

    /**
     * Tüm kaynak listesi (drop-down, filtre, raporlar için)
     */
    public static function list()
    {
        return [
            self::WEB,
            self::MOBILE,
            self::QR,
            self::KIOSK,
            self::POS,
            self::MARKETPLACE,
        ];
    }

    /**
     * Tüm marketplace kanalları
     */
    public static function marketplaceChannels()
    {
        return [
            self::YEMEKSEPETI,
            self::TRENDYOL_YEMEK,
            self::GETIR_YEMEK,
        ];
    }
}
