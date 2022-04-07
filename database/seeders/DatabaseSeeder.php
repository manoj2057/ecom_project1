<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Admin::insert([
            'name'=>"Manoj Pokharel",
            'email'=>"manoj@gmail.com",
            'password'=>bcrypt("password"),
            'phone'=>"9875433322",
            'role_id'=>1,
            'status'=>1


        ]);
    }
}
