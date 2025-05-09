<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories_tbl', function (Blueprint $table) {
            $default_size = 32;
            $description_size = 128;

            $table->id();
            $table->string("category_name", $default_size)->nullable(false);
            $table->string("category_desc", $description_size)->nullable(false);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories_tbl');
    }
};
