<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Default_UsersSeeder::class);
        $this->call(Default_ItemSeeder::class);
        $this->call(Default_SetMenuSeeder::class);
        $this->call(Default_SetMenuItemSeeder::class);
        $this->call(Default_ExtraItemSeeder::class);
        $this->call(Default_ShiftSeeder::class);
        $this->call(Default_ShiftUserSeeder::class);	
    }
}
