<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'テストadmin',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);
    }
}
