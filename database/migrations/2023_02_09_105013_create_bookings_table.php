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
        Schema::create('bookings_rooms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('hotel_id')->constrained('hotel_infos');
            $table->foreignId('room_id')->constrained('rooms');
            $table->foreignId('user_id')->constrained('users');
            $table->integer('num_of_nights');
            $table->integer('num_of_guests');
            $table->integer('num_of_rooms');
            $table->double('total_price');
            $table->date('check_in');
            $table->date('check_out');
            $table->string('status')->default('pending');
            $table->string('payment_status')->default('pending');
            $table->string('payment_method')->default('cash');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
