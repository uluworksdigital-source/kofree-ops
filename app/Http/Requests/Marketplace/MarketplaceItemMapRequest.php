<?php

namespace App\Http\Requests\Marketplace;

use Illuminate\Foundation\Http\FormRequest;

class MarketplaceItemMapRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'local_item_id'    => 'required|integer|exists:items,id',
            'channel'          => 'required|string',
            'external_item_id' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'local_item_id.required'    => 'Lütfen yerel ürünü seçin.',
            'channel.required'          => 'Lütfen marketplace kanalını seçin.',
            'external_item_id.required' => 'Dış ürün ID’si zorunludur.',
        ];
    }
}
