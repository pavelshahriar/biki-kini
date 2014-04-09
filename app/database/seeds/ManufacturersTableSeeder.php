<?php
/**
 * Created by PhpStorm.
 * User: pavelshahriar
 * Date: 4/1/14
 * Time: 12:19 PM
 */

class ManufacturersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('manufacturers')->delete();

        $manufacturers = array(
            array('name' => 'Audi', 'under_sub_category' => 1,),
            array('name' => 'BMW', 'under_sub_category' => 1,),
            array('name' => 'Honda', 'under_sub_category' => 1,),
            array('name' => 'Lexus', 'under_sub_category' => 1,),
            array('name' => 'Mazda', 'under_sub_category' => 1,),
            array('name' => 'Mercedes-Benz', 'under_sub_category' => 1,),
            array('name' => 'Mitsubishi', 'under_sub_category' => 1,),
            array('name' => 'Nissan', 'under_sub_category' => 1,),
            array('name' => 'Porsche', 'under_sub_category' => 1,),
            array('name' => 'Toyota', 'under_sub_category' => 1,),

            array('name' => 'Bajaj', 'under_sub_category' => 2,),
            array('name' => 'Ducati', 'under_sub_category' => 2,),
            array('name' => 'Harley Davidson', 'under_sub_category' => 2,),
            array('name' => 'Hero', 'under_sub_category' => 2,),
            array('name' => 'Honda', 'under_sub_category' => 2,),
            array('name' => 'Suzuki', 'under_sub_category' => 2,),
            array('name' => 'TVS', 'under_sub_category' => 2,),
            array('name' => 'Walton', 'under_sub_category' => 2,),

            array('name' => 'Daewoo', 'under_sub_category' => 3,),
            array('name' => 'Ford', 'under_sub_category' => 3,),
            array('name' => 'Mercedes-Benz', 'under_sub_category' => 3,),
            array('name' => 'Nissan', 'under_sub_category' => 3,),
            array('name' => 'Scania', 'under_sub_category' => 3,),
            array('name' => 'Toyota', 'under_sub_category' => 3,),
            array('name' => 'Volvo', 'under_sub_category' => 3,),

            array('name' => 'Ashok Leyland', 'under_sub_category' => 4,),
            array('name' => 'Daewoo', 'under_sub_category' => 4,),
            array('name' => 'Ford', 'under_sub_category' => 4,),
            array('name' => 'Hyundai', 'under_sub_category' => 4,),
            array('name' => 'Mercedes-Benz', 'under_sub_category' => 4,),
            array('name' => 'Tata Motors', 'under_sub_category' => 4,),
            array('name' => 'Volvo', 'under_sub_category' => 4,),

        );

        DB::table('manufacturers')->insert( $manufacturers );
    }

}