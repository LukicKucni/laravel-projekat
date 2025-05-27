<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name"=>'Admin',
            "email"=>'admin@pwa.rs',
            "password"=>Hash::make("admin"),
            "role"=>"Admin",
        ]);
        User::create([
            "name"=>'Editor',
            "email"=>'editor@pwa.rs',
            "password"=>Hash::make("editor"),
            "role"=>"Editor",
        ]);
        User::create([
            "name"=>'User',
            "email"=>'user@pwa.rs',
            "password"=>Hash::make("user"),
            "role"=>"User",
        ]);
    }
}
