<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Comment;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $max = 200;

        $faker = Faker\Factory::create();

        for ($i = 0; $i < $max; $i++) {
            App\User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Str::random(10),
                'biography' => $faker->text(200)
            ]);

            App\Comment::create([
                'comment' => $faker->text(200),
                'id_for' => $faker->numberBetween(1, $max),
                'id_by' => $faker->numberBetween(1, $max),
            ]);
        }
    }
}
