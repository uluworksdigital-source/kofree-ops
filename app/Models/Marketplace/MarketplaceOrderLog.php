<?php

namespace App\Models\Marketplace;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketplaceOrderLog extends Model
{
    use HasFactory;

    protected $table = 'marketplace_order_logs';

    protected $fillable = [
        'channel',
        'external_order_id',
        'payload',
        'is_processed',
    ];

    protected $casts = [
        'payload'      => 'array',
        'is_processed' => 'boolean',
    ];
}
