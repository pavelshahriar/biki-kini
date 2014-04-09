<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsExtendedTrucksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        //
        Schema::create('ads_extended_trucks', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('belong_to_post_id');
            $table->string('model_name')->nullable();
            $table->integer('model_year')->nullable();
            $table->integer('mileage')->nullable();
            $table->timestamps();

            $table->index('model_name');
            $table->index('model_year');
            $table->index('mileage');
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
        Schema::drop('ads_extended_trucks');
	}

}
