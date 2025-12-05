<?php

namespace App\Enums;

enum ChannelType: string
{
    // Internal channels
    case POS = 'pos';
    case QR = 'qr';
    case KIOSK = 'kiosk';

    // Marketplace channels
    case YEMEKSEPETI = 'yemeksepeti';
    case TRENDYOL = 'trendyol';
    case GETIR = 'getir';
    case MIGROS_YEMEK = 'migros_yemek';
    case UBER_EATS = 'uber_eats';

    // Future channels (opsiyonel)
    case META_WHATSAPP = 'meta_whatsapp';
    case GOOGLE_ORDER = 'google_order';
}
