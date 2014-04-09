<?php
/**
 * Created by PhpStorm.
 * User: pavelshahriar
 * Date: 4/1/14
 * Time: 10:29 AM
 */

class LocationsNeighborhoodTableSeeder extends Seeder {

    public function run()
    {
        DB::table('locations_neighborhood')->delete();

        $neighborhoods = array(
            array(
                'name'               => 'Mohakhali DOHS',
                'belongs_to_city'    => 1,
            ),
            array(
                'name'               => 'Uttara',
                'belongs_to_city'    => 1,
            ),
            array(
                'name'               => 'Banani',
                'belongs_to_city'    => 1,
            ),
            array(
                'name'               => 'Gulshan',
                'belongs_to_city'    => 1,
            ),
            array(
                'name'               => 'Farmgate',
                'belongs_to_city'    => 1,
            ),
            array(
                'name'               => 'Dhanmondi',
                'belongs_to_city'    => 1,
            ),

            array(
                'name'               => 'Mohammadpur',
                'belongs_to_city'    => 1,
            ),
            array(
                'name'               => 'Motijheel',
                'belongs_to_city'    => 1,
            ),

        );

        DB::table('locations_neighborhood')->insert( $neighborhoods );
    }

}