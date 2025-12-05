<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('marketplace_category_maps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('local_category_id');      // KóFREE kategori
            $table->unsignedBigInteger('channel_id');             // marketplace_channels.id
            $table->string('external_category_id');               // platformdaki kategori
            $table->timestamps();

            $table->foreign('channel_id')->references('id')->on('marketplace_channels')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('marketplace_category_maps');
    }
};
