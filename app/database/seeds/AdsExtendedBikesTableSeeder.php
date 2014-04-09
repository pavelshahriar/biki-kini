<?php
/**
 * Created by PhpStorm.
 * User: pavelshahriar
 * Date: 4/2/14
 * Time: 3:34 AM
 */

class AdsExtendedBikesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('ads_extended_bikes')->delete();

        $ads_extended_bikes = array(
            array(
                'belong_to_post_id' => 4,
                'model_name'        => 'CBF Stunner',
                'model_year'        => 2010,
                'engine_capacity'   => 125,
                'mileage'           => 7600,
            ),
            array(
                'belong_to_post_id' => 5,
                'model_name'        => 'Diavel',
                'model_year'        => 2010,
                'engine_capacity'   => 1300,
                'mileage'           => 4000,
            ),
        );

        DB::table('ads_extended_bikes')->insert( $ads_extended_bikes );
    }
}