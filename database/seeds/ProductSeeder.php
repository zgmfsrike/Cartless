<?php

use Illuminate\Database\Seeder;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('products')->insert([
        'product_name'=>'product_1',
        'product_price'=>100.00,
        'product_description'=>'product description!',
      ]);

      DB::table('product_discounts')->insert([
        'product_id'=>1,
        'product_discount'=>50.00,
      ]);
    }
}
