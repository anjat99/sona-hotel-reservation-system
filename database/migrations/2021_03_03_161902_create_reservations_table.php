<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('sum_price', $precision = 8, $scale = 2);
            $table->string('name', 50);
            $table->string('phone', 20);
            $table->integer('no_people');
            $table->foreignId('user_id');
            $table->foreignId('room_id');
            $table->dateTime('check_in', $precision = 0);
            $table->dateTime('check_out', $precision = 0);
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
        Schema::dropIfExists('reservations');
    }
}
