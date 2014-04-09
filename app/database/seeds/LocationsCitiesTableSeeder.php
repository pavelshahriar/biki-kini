<?php
/**
 * Created by PhpStorm.
 * User: pavelshahriar
 * Date: 4/1/14
 * Time: 10:11 AM
 */

class LocationsCitiesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('locations_cities')->delete();

        $cities = array(
            array(
                'name'                                  => 'Dhaka',
                'belongs_to_state_province_division'    => 3,
            ),
            array(
                'name'                                  => 'Gazipur',
                'belongs_to_state_province_division'    => 3,
            ),
            array(
                'name'                                  => 'Narayanganj',
                'belongs_to_state_province_division'    => 3,
            ),
            array(
                'name'                                  => 'Tongi',
                'belongs_to_state_province_division'    => 3,
            ),
        );

        DB::table('locations_cities')->insert( $cities );
    }

}