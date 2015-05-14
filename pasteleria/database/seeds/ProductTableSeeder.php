<?php 

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder{

    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i < 100; $i ++)
        {
            $id = \DB::table('products')->insertGetId(array (
                'name' => $faker->word,
                'description'  => $faker->text($maxNbChars = 100),
                'Kilos'      => $faker->numberBetween($min = 2, $max = 40),
                'image'   => $faker->imageUrl(600, 600, 'food'),
            ));

            
        }
    }

}