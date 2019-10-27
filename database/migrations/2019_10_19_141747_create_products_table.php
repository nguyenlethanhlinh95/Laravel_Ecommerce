<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pro_name');
            $table->string('pro_slug')->nullable();
            $table->string('pro_code');
            $table->string('pro_price');
            $table->string('image')->nullable();
            $table->string('spl_price')->nullable()->default('0');
            $table->dateTime('pro_date_sale_start')->nullable();
            $table->dateTime('pro_date_sale_end')->nullable();

            $table->integer('id_ListImage')->nullable();
            $table->integer('id_ListWidth')->nullable();
            $table->integer('id_vender')->nullable();
            $table->integer('id_propertity')->nullable();

            $table->integer('view')->default(0);
            $table->integer('quantity')->nullable();
            $table->integer('minimum_quantity')->default(0);
            $table->string('description')->nullable();
            $table->string('content')->nullable();
            $table->boolean('new')->default('0');
            $table->boolean('feaure')->default('0');
            $table->boolean('quick')->default('0');
            //$table->integer('id_tag');
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
        Schema::dropIfExists('products');
    }
}
