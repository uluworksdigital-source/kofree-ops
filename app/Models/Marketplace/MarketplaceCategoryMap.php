<?php

namespace App\Models\Marketplace;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketplaceCategoryMap extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'local_category_id',
        'channel_id',
        'external_category_id',
    ];

    public function channel()
    {
        return $this->belongsTo(MarketplaceChannel::class, 'channel_id');
    }
}
