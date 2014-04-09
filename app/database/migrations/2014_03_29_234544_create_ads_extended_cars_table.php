<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsExtendedCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        //
        Schema::create('ads_extended_cars', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('belong_to_post_id');
            $table->string('model_name')->nullable();
            $table->integer('model_year')->nullable();
            $table->string('body_type')->nullable();
            $table->integer('registration_year')->nullable();
            $table->string('transmission')->nullable(); // manul or automatic
            $table->string('fuel_types')->nullable(); // diesel, petrol, octane, gas
            $table->integer('engine_capacity')->nullable(); // in cm3
            $table->integer('mileage')->nullable(); // in km
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
        Schema::drop('ads_extended_cars');
	}

}
