<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->integer('product_id')->unsigned()->unique()->primary();
            $table->date('end_date');
            $table->boolean('visibility'); // 0 = Public 1 = Private
            $table->unsignedInteger('currentprice');
            $table->string('status');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Schema::dropIfExists('offers');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
