<?php

use Illuminate\Database\Seeder;

class Default_ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('item')->delete();

      $items = array(
          ['id'=>1, 'name'=>'Cafe Latte', 'price'=>4],
          ['id'=>2, 'name'=>'Hazelnut Latte', 'price'=>4],
          ['id'=>3, 'name'=>'Cappuccino', 'price'=>4],
          ['id'=>4, 'name'=>'Espresso', 'price'=>0],
          ['id'=>5, 'name'=>'Blueberry Muffin', 'price'=>0]

      );

      DB::table('item')->insert($items);
    }
}
