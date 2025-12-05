<?php

namespace App\Models\Marketplace;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketplaceChannel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'is_active',
        'credentials',
    ];

    protected $casts = [
        'credentials' => 'array',
        'is_active'   => 'boolean',
    ];

    public function categoryMaps()
    {
        return $this->hasMany(MarketplaceCategoryMap::class, 'channel_id');
    }

    public function itemMaps()
    {
        return $this->hasMany(MarketplaceItemMap::class, 'channel_id');
    }

    public function orderLogs()
    {
        return $this->hasMany(MarketplaceOrderLog::class, 'channel_id');
    }
}
