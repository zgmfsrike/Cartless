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
    DB::table('users')->insert([
      'email'=>'staff@gmail.com',
      'password'=>Hash::make('123456'),
      'firstname'=>'staff',
      'lastname'=>'staff',
      'is_staff'=>1,
    ]);
  }
}
