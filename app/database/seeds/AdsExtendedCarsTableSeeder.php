<?php
/**
 * Created by PhpStorm.
 * User: pavelshahriar
 * Date: 4/2/14
 * Time: 2:47 AM
 */

class AdsExtendedCarsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('ads_extended_cars')->delete();

        $ads_extended_cars = array(
            array(
                'belong_to_post_id' => 1,
                'model_name'        => 'A4',
                'model_year'        => 2007,
                'body_type'         => 'Sport',
                'registration_year' => 2009,
                'transmission'      => 'Automatic',
                'fuel_types'        => 'Diesel',
                'engine_capacity'   => 1800,
                'mileage'           => 50000,
            ),
            array(
                'belong_to_post_id' => 2,
                'model_name'        => '911 CARRERA',
                'model_year'        => 2012,
                'body_type'         => 'Coupe',
                'registration_year' => 2014,
                'transmission'      => 'Automatic',
                'fuel_types'        => 'Gas',
                'engine_capacity'   => 4200,
                'mileage'           => 500,
            ),
            array(
                'belong_to_post_id' => 3,
                'model_name'        => 'S-CLASS S300',
                'model_year'        => 2013,
                'body_type'         => 'Coupe',
                'registration_year' => 2014,
                'transmission'      => 'Automatic',
                'fuel_types'        => 'Diesel',
                'engine_capacity'   => 4000,
                'mileage'           => 300,
            ),
       );

        DB::table('ads_extended_cars')->insert( $ads_extended_cars );
    }
}