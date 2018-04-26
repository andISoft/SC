<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryablesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('categoryables', function (Blueprint $table) {
      $table->integer('category_id')->unsigned();
      $table->integer('categoryable_id')->unsigned();
      $table->string('categoryable_type');
      $table->timestamps();

      $table->primary(['category_id','categoryable_id']);

      $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('categoryables');
  }
}
