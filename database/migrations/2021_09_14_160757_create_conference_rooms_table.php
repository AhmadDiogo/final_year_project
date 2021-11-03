<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConferenceRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conference_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_title');
            $table->longText('room_body');
            $table->string('room_price');
            $table->string('room_image_1')->nullable();
            $table->string('room_image_2')->nullable();
            $table->string('room_image_3')->nullable();
            $table->string('room_image_4')->nullable();
            $table->string('room_availability')->nullable();
            $table->string('booked_from')->nullable();
            $table->string('booked_to')->nullable();

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
        Schema::dropIfExists('conference_rooms');
    }
}
