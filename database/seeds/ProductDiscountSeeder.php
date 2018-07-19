<?php

use Illuminate\Database\Seeder;

class ProductDiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('product_discounts')->insert([
          'product_id'=>1,
          'product_discount'=>50.00,
        ]);

    }
}
