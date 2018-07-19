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
      [
        'product_name'=>'อ่องปู',
        'product_price'=>50.00,
        'product_description'=>'อ่องปูแสนอร่อย',
        'product_image'=>'product1.jpg'
      ],
      [
        'product_name'=>'แมงมัน',
        'product_price'=>450.00,
        'product_description'=>'แมงมันของดี',
        'product_image'=>'product2.jpg'
      ],
      [
        'product_name'=>'ตำมะเขือ',
        'product_price'=>55.00,
        'product_description'=>'ตำมะเขือ พร้อมไข้ต้ม',
        'product_image'=>'product3.jpg'
      ],
      [
        'product_name'=>'ข้าวซอย',
        'product_price'=>60.00,
        'product_description'=>'ข้าวซอยแสนอร่อยสุดๆ',
        'product_image'=>'product4.jpg'
      ],
      [
        'product_name'=>'ไส้อั่ว',
        'product_price'=>150.00,
        'product_description'=>'ไส้อั่ว ลำแต้ๆ',
        'product_image'=>'product5.jpg'
      ],

      [
        'product_name'=>'อ่องปู',
        'product_price'=>50.00,
        'product_description'=>'อ่องปูแสนอร่อย',
        'product_image'=>'product1.jpg'
      ],
      [
        'product_name'=>'แมงมัน',
        'product_price'=>450.00,
        'product_description'=>'แมงมันของดี',
        'product_image'=>'product2.jpg'
      ],
      [
        'product_name'=>'ตำมะเขือ',
        'product_price'=>55.00,
        'product_description'=>'ตำมะเขือ พร้อมไข้ต้ม',
        'product_image'=>'product3.jpg'
      ],
      [
        'product_name'=>'ข้าวซอย',
        'product_price'=>60.00,
        'product_description'=>'ข้าวซอยแสนอร่อยสุดๆ',
        'product_image'=>'product4.jpg'
      ],
      [
        'product_name'=>'ไส้อั่ว',
        'product_price'=>150.00,
        'product_description'=>'ไส้อั่ว ลำแต้ๆ',
        'product_image'=>'product5.jpg'
      ]
    ]
  );

}
}
