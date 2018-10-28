<?php

use Illuminate\Database\Seeder;

class Default_ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('shift')->delete();

      $shifts = array(
          ['id'=>1, 'name'=>'Shift 1']

      );

      DB::table('shift')->insert($shifts);
    }
}
