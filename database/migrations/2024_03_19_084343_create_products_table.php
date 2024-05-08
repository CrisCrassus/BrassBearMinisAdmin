<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->uuid('slug')->unique();
            $table->text('description')->nullable();
            $table->string('identifier')->unique();
            $table->decimal('price', 8, 2);
            $table->json('features')->nullable();
            $table->json('keywords')->nullable();
            $table->integer('range_id')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->json('wargear')->nullable();
            $table->string('ebay_link')->nullable();
            $table->integer('unit_type_id')->nullable();
            $table->string('quality')->nullable();
            $table->string('material')->nullable();
            $table->integer('model_count')->default(0);
            $table->string('base_size');
            $table->timestamp('sold_at')->nullable();
            $table->boolean('published')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
