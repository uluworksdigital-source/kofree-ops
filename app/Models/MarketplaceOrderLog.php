<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketplaceOrderLog extends Model
{
    use HasFactory;

    protected $table = 'marketplace_order_logs';

    protected $fillable = [
        'channel_id',
        'branch_id',
        'type',
        'payload',
        'response',
        'status_code',
    ];

    protected $casts = [
        'payload' => 'array',
        'response' => 'array',
    ];

    public function channel()
    {
        return $this->belongsTo(MarketplaceChannel::class, 'channel_id');
    }
}
