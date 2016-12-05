<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 5) as $index) {
            \App\Model\Tag::create([
                'name' => $faker->unique()->word,
                'created_at' => $faker->dateTimeThisYear(),
                'updated_at' => $faker->dateTimeThisYear(),
            ]);
        }
    }
}
