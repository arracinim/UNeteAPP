<?php

use Illuminate\Database\Seeder;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'arracinim@unal.edu.co',
            'cedula' => (Integer)12345678,
            'password' => bcrypt('12345678'),
            'type' => 'admin'
        ]);
    }
}
