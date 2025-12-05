<?php

use App\Enums\PosPaymentMethod;

return [
    PosPaymentMethod::CARD           => 'Kart',
    PosPaymentMethod::CASH           => 'Nakit',
    PosPaymentMethod::OTHER          => 'Diğer',
    PosPaymentMethod::MOBILE_BANKING => 'Mobil Bankacılık',
];
