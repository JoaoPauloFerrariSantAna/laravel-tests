<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserTbl extends Migration
{
    /**
     * creates table.
     * @return void
     */
    public function up()
    {
        Schema::create("user_tbl", function(Blueprint $table) {
            $table->id();
            $table->string("username", 32)->nullable(false);
            $table->string("password", 16)->nullable(false);
            $table->string("email", 32)->nullable(false);
            $table->char("ra", 7)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * drops table.
     * @return void
     */
    public function down()
    {
        echo "dropping table...";
        Schema::dropIfExists("user_tbl");
    }
}
