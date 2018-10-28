<?php

use Illuminate\Database\Seeder;

class Default_ShiftUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('shift_user')->delete();

      $shift_users = array(
          ['id'=>1, 'shift_id'=>1, 'user_id'=>1]

      );

      DB::table('shift_user')->insert($shift_users);
    }
}
