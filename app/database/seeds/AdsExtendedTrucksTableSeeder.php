<?php
/**
 * Created by PhpStorm.
 * User: pavelshahriar
 * Date: 4/2/14
 * Time: 4:35 AM
 */

class AdsExtendedTrucksTableSeeder extends Seeder {

    public function run()
    {
        DB::table('ads_extended_trucks')->delete();

        $ads_extended_trucks = array(
            array(
                'belong_to_post_id' => 7,
                'model_name'        => 'Ace Pick Up',
                'model_year'        => 2010,
                'mileage'           => 80000,
            ),
        );

        DB::table('ads_extended_trucks')->insert( $ads_extended_trucks );
    }
}
