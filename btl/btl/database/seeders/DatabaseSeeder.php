<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

    //    DB::table('users')->insert([
    //     'name' => 'Newbie Laravel',
    //     'email' => 'chandanv1010@gamil.com',
    //     'password'=> Hash::make('password'),
    //    ]);
    //    DB::table('users')->insert([
    //     'name' => 'Newbie1 Laravel',
    //     'email' => 'voquanggiap@gamil.com',
    //     'password'=> Hash::make('123456'),
    //    ]);
    DB::table('users')->insert([
        'name' => 'giap1',
        'email' => 'voquanggiap1023@gamil.com',
        'password'=> Hash::make('123456789'),
       ]);
    }
    
}
