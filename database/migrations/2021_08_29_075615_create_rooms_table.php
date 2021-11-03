<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_name');
            $table->longText('room_description');
            $table->string('room_beds');
            $table->string('room_max_people');
            $table->integer('room_size');
            $table->string('room_availability');
            $table->integer('room_original_price');
            $table->integer('room_discount_price')->nullable();
            $table->text('room_image_1');
            $table->text('room_image_2');
            $table->text('room_image_3');
            $table->text('room_image_4');
            $table->text('room_image_5');

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
        Schema::dropIfExists('rooms');
    }
}
