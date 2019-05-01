<?php

use Illuminate\Database\Seeder;

class UserRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user_role')->insert([
            'name' => "Super Admin",
            'slug' => "super_admin ",    
            
        ]);
        DB::table('user_role')->insert([
            'name' => "Admin",
            'slug' => "admin ",
        ]);

        DB::table('user_role')->insert([
            'name' => "Customer",
            'slug' => "customer",
        ]);
    }
}
