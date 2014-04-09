<?php
/**
 * Created by PhpStorm.
 * User: pavelshahriar
 * Date: 4/1/14
 * Time: 10:07 AM
 */

class LocationsStatesProvincesDivisionsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('locations_states_provinces_divisions')->delete();

        $states_provinces_divisions = array(
            array(
                'name'                  => 'Barisal',
                'belongs_to_country'    => 1,
            ),
            array(
                'name'                  => 'Chittagong',
                'belongs_to_country'    => 1,
            ),
            array(
                'name'                  => 'Dhaka',
                'belongs_to_country'    => 1,
            ),
            array(
                'name'                  => 'Khulna',
                'belongs_to_country'    => 1,
            ),
            array(
                'name'                  => 'Rajshahi',
                'belongs_to_country'    => 1,
            ),
            array(
                'name'                  => 'Sylhet',
                'belongs_to_country'    => 1,
            ),
        );

        DB::table('locations_states_provinces_divisions')->insert( $states_provinces_divisions );
    }

}