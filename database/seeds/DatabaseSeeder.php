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
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 1000; $i++) {
            App\User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Str::random(10),
                'biography' => Str::random(200),
            ]);
        }

        for ($i = 0; $i < 1000; $i++) {
            App\Comment::create([
                'comment' => Str::random(200),
                'id_for' => $faker->numberBetween(1, 1000),
                'id_by' => $faker->numberBetween(1, 1000)
            ]);
        }
    }
}
