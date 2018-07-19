<?php

use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::table('users')->insert(
      [
        [
          'email'=>'staff@gmail.com',
          'password'=>Hash::make('7744536'),
          'firstname'=>'staff',
          'lastname'=>'staff',
          'is_staff'=>1,
        ],
        [
          'email'=>'staff2@gmail.com',
          'password'=>Hash::make('111111'),
          'firstname'=>'staff2',
          'lastname'=>'staff2',
          'is_staff'=>1,
        ]
      ]
    );
  }
}
