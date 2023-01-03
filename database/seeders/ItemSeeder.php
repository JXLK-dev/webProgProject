<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
require_once 'vendor\faker\src\autoload.php';
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        $clothes = ['Dress', 'Top', 'Shorts', 'Skirt'];
        $price = ['99999', '199999', '299999'];
        for($i = 0; $i<20; $i++){
            $type = rand(0, sizeof($clothes)-1);
            $name = $faker->unique()->firstName(null).' '.$clothes[$type];
            $url = $faker->imageUrl(640, 640, 'ootd', false, $clothes[$type], false, 'jpg');
            $imagename = 'storage/images/'.str_replace(' ', '', $name).'_image_'.'jpg';
            DB::table('item_details')->insert([
                'name' => $name,
                'description' => $faker->sentence(),
                'price' => $faker->randomElement($price),
                'stock' => $faker->numberBetween(1, 999),
                'image' => $imagename
            ]);
            file_put_contents('public/'.$imagename, file_get_contents($url));
        }
    }
}
