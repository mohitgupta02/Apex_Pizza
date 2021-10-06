<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'id'=>1,
            'name' => 'admin',
            'email' => 'admin@apexpizza.com',
            'password' => Hash::make('1234'),
            'email_verified_at' =>now(),
            'remember_token' => Str::random(10),
            'address'=>'',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('users')->insert([
            'id'=>2,
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('1234'),
            'email_verified_at' =>now(),
            'remember_token' => Str::random(10),
            'address'=>'',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
