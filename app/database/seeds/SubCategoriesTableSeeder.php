<?php
/**
 * Created by PhpStorm.
 * User: pavelshahriar
 * Date: 4/1/14
 * Time: 8:26 AM
 */

class SubCategoriesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('sub_categories')->delete();

        $sub_categories = array(
            array(
                'name'                  => 'Cars',
                'belongs_to_category'   =>  '1',
            ),
            array(
                'name'                  => 'Bikes',
                'belongs_to_category'   =>  '1',
            ),
            array(
                'name'                  => 'Buses',
                'belongs_to_category'   =>  '1',
            ),
            array(
                'name'                  => 'Trucks',
                'belongs_to_category'   =>  '1',
            ),
            array(
                'name'                  => 'Boats',
                'belongs_to_category'   =>  '1',
            ),
        );

        DB::table('sub_categories')->insert( $sub_categories );
    }

}