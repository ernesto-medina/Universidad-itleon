<?php 

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder{

    public function run()
    {
        \DB::table('users')->insert(array (
            'first_name' => 'Ernesto',
            'last_name' => 'Medina',
            'email' => 'ernesto.r.2.em@gmail.com',
            'password'=> \Hash::make('admin'),
            'type' => 'admin'
        ));
    }

}