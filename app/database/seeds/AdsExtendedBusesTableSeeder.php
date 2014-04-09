<?php
/**
 * Created by PhpStorm.
 * User: pavelshahriar
 * Date: 4/2/14
 * Time: 4:29 AM
 */

class AdsExtendedBusesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('ads_extended_buses')->delete();

        $ads_extended_buses = array(
            array(
                'belong_to_post_id' => 6,
                'model_name'        => 'Civilian',
                'model_year'        => 2006,
                'mileage'           => 10000,
            ),
        );

        DB::table('ads_extended_buses')->insert( $ads_extended_buses );
    }
}
