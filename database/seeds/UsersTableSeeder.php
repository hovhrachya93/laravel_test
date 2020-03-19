<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Hrach',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
    }
}
