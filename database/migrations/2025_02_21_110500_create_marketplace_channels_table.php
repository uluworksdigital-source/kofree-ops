<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('marketplace_channels', function (Blueprint $table) {
            $table->id();
            $table->string('name');                // Yemeksepeti, Trendyol, Getir
            $table->string('slug')->unique();      // yemeksepeti, trendyol, getir
            $table->boolean('is_active')->default(true);
            $table->json('credentials')->nullable();  // API key, secret, merchant id
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('marketplace_channels');
    }
};
