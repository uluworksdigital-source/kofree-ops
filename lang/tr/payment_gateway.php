<?php

use App\Enums\PaymentGateway;

return [
    PaymentGateway::CASH_ON_DELIVERY => 'Nakit Ödeme',
    PaymentGateway::E_WALLET         => 'E-Cüzdan',
    PaymentGateway::PAYPAL           => 'Online Ödeme',
];
