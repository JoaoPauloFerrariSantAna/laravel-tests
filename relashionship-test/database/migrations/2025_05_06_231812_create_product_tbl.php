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
        Schema::create('product_tbl', function (Blueprint $table) {
            $table->id();
            $table->string("name", 16);
            $table->double("price");
            $table->integer("quantity");
            $table->foreignId("enterprise_id")->constrained("enterprise_tbl", "id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_tbl');
    }
};
