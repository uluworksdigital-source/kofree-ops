<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketplaceCategoryMap extends Model
{
    use HasFactory;

    protected $table = 'marketplace_category_maps';

    protected $fillable = [
        'branch_id',
        'channel_id',
        'local_category_id',
        'external_category_id',
    ];

    public function channel()
    {
        return $this->belongsTo(MarketplaceChannel::class, 'channel_id');
    }
}
