<?php

namespace App\Services\Marketplace;

use App\Models\MarketplaceChannel;
use App\Models\MarketplaceOrderLog;
use App\Enums\ChannelType;

use App\Services\Marketplace\Drivers\YemeksepetiDriver;
use App\Services\Marketplace\Drivers\TrendyolDriver;
use App\Services\Marketplace\Drivers\GetirDriver;
use App\Services\Marketplace\Drivers\MigrosDriver;
use App\Interfaces\MarketplaceDriverInterface;

class MarketplaceManager
{
    protected array $drivers = [];

public function __construct()
{
    $this->drivers = [
        ChannelType::YEMEKSEPETI->value => new YemeksepetiDriver(),
        ChannelType::TRENDYOL->value    => new TrendyolDriver(),
        ChannelType::GETIR->value       => new GetirDriver(),
        ChannelType::MIGROS->value      => new MigrosDriver(),
        ];
}

    public function getDriver(string $channel): MarketplaceDriverInterface
    {
        if (!isset($this->drivers[$channel])) {
            throw new \Exception("Marketplace driver bulunamadı: {$channel}");
        }

        return $this->drivers[$channel];
    }

    public function pullOrdersForAllBranches(): void
    {
        $channels = MarketplaceChannel::where('is_active', 1)->get();

        foreach ($channels as $channel) {
            try {
                $driver = $this->getDriver($channel->type);
                $driver->pullOrders();
            } catch (\Throwable $e) {
                $this->logError($channel->branch_id, $channel->type, $e->getMessage());
            }
        }
    }

    public function syncMenuForBranch(int $branchId): void
    {
        $channels = MarketplaceChannel::where('branch_id', $branchId)
            ->where('is_active', 1)
            ->get();

        foreach ($channels as $channel) {
            try {
                $driver = $this->getDriver($channel->type);
                $driver->syncMenu();
            } catch (\Throwable $e) {
                $this->logError($branchId, $channel->type, $e->getMessage());
            }
        }
    }

    private function logError(int $branchId, string $channel, string $message): void
    {
        MarketplaceOrderLog::create([
            'branch_id' => $branchId,
            'channel'   => $channel,
            'message'   => $message,
        ]);
    }
}
