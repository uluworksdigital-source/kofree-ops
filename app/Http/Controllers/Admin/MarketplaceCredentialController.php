<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Marketplace\CredentialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MarketplaceCredentialController extends Controller
{
    protected $credentialService;

    public function __construct(CredentialService $credentialService)
    {
        $this->credentialService = $credentialService;
    }

    /**
     * Display the credentials for the authenticated branch.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $branchId = auth()->user()->branch_id;
        $credentials = $this->credentialService->getForBranch($branchId);

        return response()->json($credentials);
    }

    /**
     * Update the credentials for the authenticated branch.
     *
     * @param Request $request
     * @param string $marketplace
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $marketplace)
    {
        $branchId = auth()->user()->branch_id;

        $validated = $this->credentialService->validateRequestPayload($request, $marketplace);
        $validated['marketplace'] = $marketplace;

        $updated = $this->credentialService->updateForBranch($branchId, $validated);

        if ($updated) {
            Log::info("Marketplace credentials updated", ['branch_id' => $branchId, 'marketplace' => $marketplace]);
            return response()->json(['message' => 'Credentials updated successfully.']);
        }

        return response()->json(['message' => 'Failed to update credentials.'], 400);
    }
}