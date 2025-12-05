<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketplaceChannel extends Model
{
    use HasFactory;

    protected $table = 'marketplace_channels';

    protected $fillable = [
        'name',
        'slug',
        'status',
        'icon',
    ];

    public function categoryMaps()
    {
        return $this->hasMany(MarketplaceCategoryMap::class, 'channel_id');
    }

    public function itemMaps()
    {
        return $this->hasMany(MarketplaceItemMap::class, 'channel_id');
    }

    public function logs()
    {
        return $this->hasMany(MarketplaceOrderLog::class, 'channel_id');
    }
}
