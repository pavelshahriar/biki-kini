<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsGenericTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        //
        Schema::create('ads_generic', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('poster_id');
            $table->integer('sub_category');
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('manufacturer_id');
            $table->integer('price');
            $table->boolean('price_negotiable')->default(false);
            $table->string('compiled_location'); // in the format country.division.city.neighborhood
            $table->string('photos')->nullable(); // if multiple images then it would be comma separated
            $table->boolean('is_new')->default(false);
            $table->boolean('deleted')->default(false);
            $table->timestamps();

            $table->index('poster_id');
            $table->index('title');
            $table->index('manufacturer_id');
            $table->index('price');
            $table->index('compiled_location');
            $table->index('created_at');
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
        Schema::drop('ads_generic');
	}

}
