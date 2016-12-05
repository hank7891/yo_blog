<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 3) as $index) {
            \App\Model\Category::create([
                'name' => $faker->unique()->word,
                'created_at' => $faker->dateTimeThisYear(),
                'updated_at' => $faker->dateTimeThisYear(),
            ]);
        }
    }
}
