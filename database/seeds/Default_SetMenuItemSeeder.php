<?php

use Illuminate\Database\Seeder;

class Default_SetMenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('set_menu_item')->delete();

      $set_menu_items = array(
          ['id'=>1, 'set_menu_id'=>1, 'item_id'=>4],
          ['id'=>2, 'set_menu_id'=>1, 'item_id'=>5]
      );

      DB::table('set_menu_item')->insert($set_menu_items);
    }
}
