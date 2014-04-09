<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsExtendedBoatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('ads_extended_boats', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('belong_to_post_id');
            $table->string('model_name')->nullable();
            $table->string('boat_type')->nullable(); // speed boat, sail boat, fishing boat, passenger boat, sea vessel
            $table->float('body_length')->nullable(); // in ft
            $table->float('body_width')->nullable(); // in ft
            $table->float('body_height')->nullable(); // in ft
            $table->integer('no_of_engines')->nullable();
            $table->string('engine_made_by')->nullable();
            $table->integer('engine_power')->nullable(); // in HP
            $table->integer('passenger_capacity')->nullable();
            $table->timestamps();

            $table->index('boat_type');
            $table->index('body_length');
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
        Schema::drop('ads_extended_boats');
	}

}
