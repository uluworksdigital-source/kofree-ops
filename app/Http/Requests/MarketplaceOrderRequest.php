<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarketplaceOrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'channel'           => 'required|string|max:100', // trendyol_yemek, yemeksepeti, getir_yemek
            'external_order_id' => 'required|string|max:255',
            'customer_phone'    => 'nullable|string|max:20',
            'customer_name'     => 'nullable|string|max:150',

            'address'           => 'nullable|string|max:500',

            'total'             => 'required|numeric|min:0',

            // Items
            'items'                      => 'required|array|min:1',
            'items.*.local_item_id'      => 'required|exists:items,id',
            'items.*.quantity'           => 'required|numeric|min:1',
            'items.*.note'               => 'nullable|string|max:255',

            // Ham payload (orijinal marketplace JSON)
            'payload'           => 'nullable|array',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
