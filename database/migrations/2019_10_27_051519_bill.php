<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bill', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idUser');
            $table->integer('idPayment');
            $table->integer('idStatusPayment');
            $table->string('phone');
            $table->string('address');
            $table->float('tax');
            $table->ipAddress('ipAddress');
            $table->double('total');
            $table->string('description');


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
        //
        Schema::dropIfExists('bill');
    }
}
