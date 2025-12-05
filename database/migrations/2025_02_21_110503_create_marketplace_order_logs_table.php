<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('marketplace_order_logs', function (Blueprint $table) {
            $table->id();
            $table->string('channel');              // yemeksepeti, trendyol_yemek, getir_yemek
            $table->string('external_order_id');
            $table->json('payload')->nullable();
            $table->boolean('is_processed')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('marketplace_order_logs');
    }
};
