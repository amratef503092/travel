<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user__intersteds', function (Blueprint $table) {
            $table->foreignId("userID")->constrained(
                "users"
            );
            $table->foreignId("interstedsId")->constrained(
                "intersteds"
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user__intersteds');
    }
};
