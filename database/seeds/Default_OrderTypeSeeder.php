<?php

use Illuminate\Database\Seeder;

class Default_OrderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('order_type')->delete();

      $order_types = array(
          ['id'=>1, 'type'=>'DINE-IN']
      );

      DB::table('order_type')->insert($order_types);
    }
}
