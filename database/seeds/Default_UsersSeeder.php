<?php

use Illuminate\Database\Seeder;

class Default_UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->delete();

      $users = array(
          ['id'=>1, 'user_name'=>'SUPPORT', 'code'=>'000001', 'password'=>'$2y$10$1NZmoUQnBxwCtu0pAbDzu.6ZcZLPx36GuuJM0OkMbLPVHglCHEebe']

      );

      DB::table('users')->insert($users);
    }
}
