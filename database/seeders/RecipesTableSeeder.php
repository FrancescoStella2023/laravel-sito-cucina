<?php

namespace Database\Seeders;


use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {


            $new_recipe = new Recipe();

            $new_recipe->title = $faker->word();
            $new_recipe->description = $faker->paragraph(3);
            $new_recipe->author_id = $faker->numberBetween(1, 4);
            $new_recipe->save();
        }
    }
}
