<?php

namespace Database\Seeders;

use App\Models\Admin\Actor;
use App\Models\Admin\Celebrity;
use App\Models\Admin\Movie;
use App\Models\Admin\Occupation;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // $celebrities = Celebrity::factory(10000)->create();
        // foreach ($celebrities as $celebrity) {
        //     $celebrity->square()->create([
        //         'extra_number_one' => random_int(1, 10),
        //         'extra_number_two' => random_int(1, 10),
        //         'extra_number_three' => random_int(1, 10),
        //         'extra_number_four' => random_int(1, 10),

        //         'number_one' => random_int(1, 10),
        //         'number_four' => random_int(1, 10),
        //         'number_seven' => random_int(1, 10),
        //         'number_two' => random_int(1, 10),
        //         'number_five' => random_int(1, 10),
        //         'number_eight' => random_int(1, 10),
        //         'number_three' => random_int(1, 10),
        //         'number_six' => random_int(1, 10),
        //         'number_nine' => random_int(1, 10),

        //         'goal' => random_int(1, 10),
        //         'family' => random_int(1, 10),
        //         'habits' => random_int(1, 10),
        //         'self_esteem' => random_int(1, 10),
        //         'everyday_life' => random_int(1, 10),
        //         'talents' => random_int(1, 10),
        //         'spirituality' => random_int(1, 10),
        //         'temperametnt' => random_int(1, 10),
        //     ]);

        //     $celebrityId = $celebrities->random(5)->pluck('id');
        //     $celebrity->connections()->attach($celebrityId);
        // }




        // $occupations = Occupation::factory(100)->create();



        // $actors = Actor::factory(1000)->create();
        // $movies = Movie::factory(100)->create();

        // foreach ($movies as $movie) {
        //     $actorsId = $actors->random(5)->pluck('id');
        //     $movie->actors()->attach($actorsId);
        // }

        // dd($movies);

        // $celebrities = Celebrity::factory(10)->make();
        // dd($celebrities);
        // $actors = Actor::factory(10)->make();
        // dd($actors);

        // $occupations = Occupation::factory(100)->make();
        // dd($occupations);
    }
}
