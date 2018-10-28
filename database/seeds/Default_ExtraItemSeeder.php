<?php

use Illuminate\Database\Seeder;

class Default_ExtraItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('extra_item')->delete();

      $extra_items = array(
          ['id'=>1, 'item_id'=>2, 'name'=>'Upsize', 'price'=>0.5],
          ['id'=>2, 'item_id'=>3, 'name'=>'Extra Hot', 'price'=>0]

      );

      DB::table('extra_item')->insert($extra_items);
    }
}
