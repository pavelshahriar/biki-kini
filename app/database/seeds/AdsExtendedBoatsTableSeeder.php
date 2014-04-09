<?php
/**
 * Created by PhpStorm.
 * User: pavelshahriar
 * Date: 4/2/14
 * Time: 4:43 AM
 */

class AdsExtendedBoatsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('ads_extended_boats')->delete();

        $ads_extended_boats = array(
            array(
                'belong_to_post_id'     => 8,
                'model_name'            => 'Rocket',
                'boat_type'             => 'Speed Boat',
                'body_length'           => 19,
                'body_width'            => 5,
                'body_height'           => 2.5,
                'no_of_engines'         => 1,
                'engine_made_by'        => 'Yamaha',
                'engine_power'          => 40,
                'passenger_capacity'    => 4,
            ),
        );

        DB::table('ads_extended_boats')->insert( $ads_extended_boats );
    }
}