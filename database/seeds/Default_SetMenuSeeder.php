<?php

use Illuminate\Database\Seeder;

class Default_SetMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('set_menu')->delete();

      $set_menus = array(
          ['id'=>1, 'name'=>'Set Menu 1', 'price'=>5]
      );

      DB::table('set_menu')->insert($set_menus);
    }
}
