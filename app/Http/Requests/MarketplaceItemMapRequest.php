<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarketplaceItemMapRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Admin yetkisini zaten middleware kontrol ediyor
    }

    public function rules(): array
    {
        return [
            'local_item_id'   => 'required|exists:items,id',
            'channel'         => 'required|in:yemeksepeti,trendyol_yemek,getir_yemek',
            'external_item_id'=> 'required|string|max:255',
        ];
    }
}
