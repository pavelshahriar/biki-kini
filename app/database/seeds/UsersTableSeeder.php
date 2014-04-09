<?php
/**
 * Created by PhpStorm.
 * User: pavelshahriar
 * Date: 4/2/14
 * Time: 5:38 AM
 */

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $users = array(
            array(
                'username'      => 'admin',
                'password'      => Hash::make('admin'),
                'full_name'     => 'Admin Pavel',
                'email'         => 'admin@b-k.com',
                'address'       => 'Banani Dhaka',
                'mobile'        => '+8801712019648',
                'role'          => 0,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ),
            array(
                'username'      => 'pavel',
                'password'      => Hash::make('pavel123'),
                'full_name'     => 'User Pavel',
                'email'         => 'pavel@b-k.com',
                'address'       => 'Mohakhali Dhaka',
                'mobile'        => '+8801712019648',
                'role'          => 1,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ),
        );

        DB::table('users')->insert( $users );
    }

}