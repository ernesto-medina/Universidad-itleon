<?php 

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder{
    
    public function run()
    {
        \DB::table('users')->insert(array (
            'name' => 'Luis Ernesto',
            'email' => 'ernesto.r.2.em@gmail.com',
            'password'=> \Hash::make('admin')
        ));
    }

}