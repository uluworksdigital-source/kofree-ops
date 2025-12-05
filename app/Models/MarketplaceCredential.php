<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketplaceCredential extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'branch_id',
        'marketplace',
        'api_key',
        'api_secret',
        'merchant_id',
        'extra',
        'status',
    ];

    /**
     * The branch that owns the credentials.
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}