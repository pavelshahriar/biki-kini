<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        // Create the users table
        Schema::create('users', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->string('full_name')->nullable();
            $table->string('email');
            $table->text('address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('photo')->nullable();
            $table->integer('role')->default(1); //0 - Admin, 1 - User
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->unique('username');
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
        Schema::drop('users');
	}

}
