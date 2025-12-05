<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('marketplace_item_maps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('local_item_id');      // KóFREE item
            $table->unsignedBigInteger('channel_id');
            $table->string('external_item_id');               // platformdaki ürün ID
            $table->json('sync_data')->nullable();            // fiyat – stok – opsiyonlar
            $table->timestamps();

            $table->foreign('channel_id')->references('id')->on('marketplace_channels')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('marketplace_item_maps');
    }
};
