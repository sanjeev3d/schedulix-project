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
        $this->call(business_category::class);
        $this->call(UserRole::class);
      	factory(App\User::class,20)->create();
    }
}
