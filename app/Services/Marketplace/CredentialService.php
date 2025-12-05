<?php

namespace App\Services\Marketplace;

use App\Models\MarketplaceCredential;
use Illuminate\Http\Request;

class CredentialService
{
    /**
     * Get credentials for a specific branch.
     *
     * @param int $branchId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getForBranch($branchId)
    {
        return MarketplaceCredential::where('branch_id', $branchId)->get();
    }

    /**
     * Update credentials for a specific branch.
     *
     * @param int $branchId
     * @param array $data
     * @return bool
     */
    public function updateForBranch($branchId, array $data)
    {
        $credential = MarketplaceCredential::where('branch_id', $branchId)
            ->where('marketplace', $data['marketplace'])
            ->first();

        if ($credential) {
            return $credential->update($data);
        }

        return false;
    }

    /**
     * Validate the request payload for a marketplace.
     *
     * @param Request $request
     * @param string $marketplace
     * @return array
     */
    public function validateRequestPayload(Request $request, $marketplace)
    {
        return $request->validate([
            'api_key' => 'nullable|string',
            'api_secret' => 'nullable|string',
            'merchant_id' => 'nullable|string',
            'extra' => 'nullable|array',
            'status' => 'required|in:active,inactive',
        ]);
    }

    /**
     * Mask sensitive data for UI display.
     *
     * @param array $data
     * @return array
     */
    public function maskSensitiveData(array $data)
    {
        $data['api_key'] = $data['api_key'] ? str_repeat('•', strlen($data['api_key'])) : null;
        $data['api_secret'] = $data['api_secret'] ? str_repeat('•', strlen($data['api_secret'])) : null;
        return $data;
    }
}