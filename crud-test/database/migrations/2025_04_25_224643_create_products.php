<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products_tbl', function (Blueprint $table) {
            $default_size = 32;
            $description_size = 128;

            $table->id();
            $table->string("product_name", $default_size)->nullable(false);
            // let's not make it a text 'cause it costs way to much
            $table->string("product_description", $description_size)->nullable(false);
            $table->decimal("product_price", 5, 2)->nullable(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products_tbl');
    }
};