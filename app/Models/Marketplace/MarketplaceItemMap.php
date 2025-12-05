<?php

namespace App\Models\Marketplace;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketplaceItemMap extends Model
{
    use HasFactory;

    protected $fillable = [
        'local_item_id',
        'channel',
        'external_item_id',
    ];
}
