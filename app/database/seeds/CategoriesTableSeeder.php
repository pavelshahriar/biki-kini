<?php
/**
 * Created by PhpStorm.
 * User: pavelshahriar
 * Date: 4/1/14
 * Time: 7:40 AM
 */

class CategoriesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('categories')->delete();

        $categories = array(
            array(
                'name'  => 'Vehicles',
            ),
        );

        DB::table('categories')->insert( $categories );
    }

}