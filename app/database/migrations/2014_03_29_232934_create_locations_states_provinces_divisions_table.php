<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsStatesProvincesDivisionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('locations_states_provinces_divisions', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('short_code')->nullable();
            $table->integer('belongs_to_country');
            $table->boolean('active')->default(true);
            $table->index('belongs_to_country');
            $table->index('active');
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
        Schema::drop('locations_states_provinces_divisions');
    }

} 