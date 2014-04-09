<?php
/**
 * Created by PhpStorm.
 * User: pavelshahriar
 * Date: 4/1/14
 * Time: 7:00 PM
 */


class AdsGenericTableSeeder extends Seeder {

    public function run()
    {
        DB::table('ads_generic')->delete();

        $ads = array(
            array(
                'poster_id'         => 1,
                'sub_category'      => '1',
                'title'             => 'Audi A4',
                'description'       => '4wd, airbag, tinted glass, velor interior, xenon',
                'manufacturer_id'   => 1,
                'price'             => 9000000,
                'compiled_location' => '1.3.1.1',
                'photos'            => 'audi1.png, audi2.png',
                'created_at'        => new DateTime(),
                'updated_at'        => new DateTime(),
            ),
            array(
                'poster_id'         => 1,
                'sub_category'      => '1',
                'title'             => 'Porsche 911 CARRERA',
                'description'       => 'abs, air conditioning, airbag, board computer, central locking, differential lock, eds, electric windows, esp, fog lights, radio / cd',
                'manufacturer_id'   => 9,
                'price'             => 86900000,
                'compiled_location' => '1.3.1.1',
                'photos'            => 'porsche1.jpg, porsche2.jpg',
                'created_at'        => new DateTime(),
                'updated_at'        => new DateTime(),
            ),
            array(
                'poster_id'         => 1,
                'sub_category'      => '1',
                'title'             => 'Mercedes-Benz S-CLASS S300',
                'description'       => 'abs, air conditioning, airbag, alarm, autopilot, auxiliary heating, board computer, central locking, eds, electric mirrors, electric windows, esp, fog lights, heated seats, immobilizer, leather upholstery, navigation system, parking sensors, power steering, rain sensors, steering wheel contro, traction control, velor interior',
                'manufacturer_id'   => 6,
                'price'             => 6500000,
                'compiled_location' => '1.3.1.1',
                'photos'            => 'MB1.jpg',
                'created_at'        => new DateTime(),
                'updated_at'        => new DateTime(),
            ),

            array(
                'poster_id'         => 1,
                'sub_category'      => '2',
                'title'             => 'Honda CBF Stunner 2010',
                'description'       => 'HONDA STUNNER 125CC Sports Bike .Assembled in INDIA. Engine made in JAPAN. COLOR- BLACK RED. Manufacturing Year-2010. I will be leaving the country soon for my further studies thats y I am selling my bike..no other reason ... **** SO if anyone wants to buy then at first be prepared to take the bike at my price coz I won"t sell it if i dont get the price i have given.',
                'manufacturer_id'   => 15,
                'price'             => 123000,
                'compiled_location' => '1.3.1.4',
                'photos'            => 'honda1.jpg',
                'created_at'        => new DateTime(),
                'updated_at'        => new DateTime(),
            ),
            array(
                'poster_id'         => 1,
                'sub_category'      => '2',
                'title'             => 'Ducati Diavel',
                'description'       => '',
                'manufacturer_id'   => 12,
                'price'             => 160000,
                'compiled_location' => '1.3.1.1',
                'photos'            => 'ducati1.jpg',
                'created_at'        => new DateTime(),
                'updated_at'        => new DateTime(),
            ),

            array(
                'poster_id'         => 1,
                'sub_category'      => '3',
                'title'             => 'Nissan Civilian 2006',
                'description'       => 'Options-Built In Air-Condition-Power Steering-Auto Transmission-Power Window-Power Mirror Power Retract-Basie Color-Wooden Panel-Wooden Steering-Fog Light-HID Light-Crystal Light Projection Head Light- Original Alloy/New Alloy & Tire',
                'manufacturer_id'   => 22,
                'price'             => 0,
                'compiled_location' => '1.3.1.1',
                'photos'            => 'nissan1.jpg',
                'created_at'        => new DateTime(),
                'updated_at'        => new DateTime(),
            ),

            array(
                'poster_id'         => 1,
                'sub_category'      => '4',
                'title'             => 'Tata Ace Pick Up 2010',
                'description'       => '-Vehicle is on running condition. No installment is left.Just buy and run. -All aggregates (engine ,G.box, clutch) are fresh in condition. - All papers are updated with digital no plate. -Battery is still under warranty period.',
                'manufacturer_id'   => 30,
                'price'             => 340000,
                'compiled_location' => '1.3.1.2',
                'photos'            => 'tata1.jpg,tata2.jpd',
                'created_at'        => new DateTime(),
                'updated_at'        => new DateTime(),
            ),

            array(
                'poster_id'         => 1,
                'sub_category'      => '5',
                'title'             => 'Rocket Speed Boat',
                'description'       => 'Model: Rocket 19, Size : Length -19’, W- 5’,Hight-2.5, Engine : Yamaha  40HP, Passenger  Capacity:  16 Person, Max. Speed: 30-35 knot  PH',
                'manufacturer_id'   => 30,
                'price'             => 490000,
                'compiled_location' => '1.3.1.1',
                'photos'            => 'sb.jpg',
                'created_at'        => new DateTime(),
                'updated_at'        => new DateTime(),
            ),
        );

        DB::table('ads_generic')->insert( $ads );
    }
}