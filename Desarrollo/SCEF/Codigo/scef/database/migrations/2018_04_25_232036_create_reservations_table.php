<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
      $table->string('code',50);
      $table->integer('product_id')->unsigned();
      $table->integer('user_id')->unsigned()->nullable();
      $table->decimal('total',5,2);
      $table->datetime('date')->nullable();
      $table->timestamps();

      $table->foreign('product_id')->references('id')->on('products');
      $table->foreign('user_id')->references('id')->on('users');
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
