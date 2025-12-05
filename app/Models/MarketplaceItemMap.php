<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketplaceItemMap extends Model
{
    use HasFactory;

    protected $table = 'marketplace_item_maps';

    protected $fillable = [
        'branch_id',
        'channel_id',
        'local_item_id',
        'external_item_id',
        'external_variant_id',
    ];

    public function channel()
    {
        return $this->belongsTo(MarketplaceChannel::class, 'channel_id');
    }
}
