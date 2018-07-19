<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(
          [
            [
              'email'=>'customer@gmail.com',
              'password'=>Hash::make('customer'),
              'firstname'=>'customer',
              'lastname'=>'customer',
              'is_staff'=>0,
            ],
            [
              'email'=>'customer2@gmail.com',
              'password'=>Hash::make('customer2'),
              'firstname'=>'customer2',
              'lastname'=>'customer2',
              'is_staff'=>0,
            ]
          ]
        );
    }
}
