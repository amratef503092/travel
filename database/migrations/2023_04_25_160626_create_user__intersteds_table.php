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
        Schema::create('user__intersteds', function (Blueprint $table)
        {
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('interstedsId');
            $table->primary(['userID', 'interstedsId']);
            $table->foreign("userID")->references(
                "id"
            )->on("users");
            $table->foreign("interstedsId")->references(
                "id"
            )->on("intersteds");
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
