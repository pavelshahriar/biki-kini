<?php
/**
 * Created by PhpStorm.
 * User: pavelshahriar
 * Date: 4/1/14
 * Time: 10:02 AM
 */

class LocationsCountiesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('locations_countries')->delete();

        $countries = array(
            array(
                'name'          => 'Bangladesh',
                'short_code'    => 'BD',
                'active'        => true
            ),
            array(
                'name'          => 'United States Of America',
                'short_code'    => 'USA',
                'active'        => false
            ),
        );

        DB::table('locations_countries')->insert( $countries );
    }

}