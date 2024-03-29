<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManufacturersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        //
        Schema::create('manufacturers', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('under_sub_category');
            $table->index('name');
            $table->index('under_sub_category');
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
        Schema::drop('manufacturers');
	}

}
