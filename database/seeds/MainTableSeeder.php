<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Movie;

class MainTableSeeder extends Seeder {

    CONST MOVIE_TABLE_NAME  = 'movies';
    CONST PERSON_TABLE_NAME = 'persons';
    CONST PIVOT_TABLE_NAME  = 'movie_person';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        # Uncomment line below if pivot table is using foreign keys.
        # DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::statement('TRUNCATE TABLE `movie_person`;');
        DB::statement('TRUNCATE TABLE `movies`;');
        DB::statement('TRUNCATE TABLE `persons`;');

        # Uncomment line below if pivot table is using foreign keys.
        # DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table(self::PERSON_TABLE_NAME)->insert([
            [
                'id'          => 1,
                'first_name'  => 'George',
                'middle_name' => null,
                'last_name'   => 'Clooney',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 2,
                'first_name'  => 'Harvey',
                'middle_name' => null,
                'last_name'   => 'Keitel',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 3,
                'first_name'  => 'Quentin',
                'middle_name' => null,
                'last_name'   => 'Tarantino',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 4,
                'first_name'  => 'Juliette',
                'middle_name' => null,
                'last_name'   => 'Lewis',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 5,
                'first_name'  => 'Cheech',
                'middle_name' => null,
                'last_name'   => 'Marin',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 6,
                'first_name'  => 'Fred',
                'middle_name' => null,
                'last_name'   => 'Williamson',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 7,
                'first_name'  => 'Salma',
                'middle_name' => null,
                'last_name'   => 'Hayek',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 8,
                'first_name'  => 'Robert',
                'middle_name' => null,
                'last_name'   => 'Rodriguez',
                'type'        => 1,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 9,
                'first_name'  => 'John',
                'middle_name' => null,
                'last_name'   => 'Travolta',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 10,
                'first_name'  => 'Samuel',
                'middle_name' => 'L.',
                'last_name'   => 'Jackson',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 11,
                'first_name'  => 'Uma',
                'middle_name' => null,
                'last_name'   => 'Thurman',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 12,
                'first_name'  => 'Tim',
                'middle_name' => null,
                'last_name'   => 'Roth',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 13,
                'first_name'  => 'Amanda',
                'middle_name' => null,
                'last_name'   => 'Plummer',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 14,
                'first_name'  => 'Maria',
                'middle_name' => 'de',
                'last_name'   => 'Medeiros',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 15,
                'first_name'  => 'Eric',
                'middle_name' => null,
                'last_name'   => 'Stoltz',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 16,
                'first_name'  => 'Rosanna',
                'middle_name' => null,
                'last_name'   => 'Arquette',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 17,
                'first_name'  => 'Christopher',
                'middle_name' => null,
                'last_name'   => 'Walken',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 18,
                'first_name'  => 'Bruce',
                'middle_name' => null,
                'last_name'   => 'Willis',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 19,
                'first_name'  => 'Quentin',
                'middle_name' => null,
                'last_name'   => 'Tarantino',
                'type'        => 1,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 20,
                'first_name'  => 'Jamie',
                'middle_name' => null,
                'last_name'   => 'Foxx',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 21,
                'first_name'  => 'Christoph',
                'middle_name' => null,
                'last_name'   => 'Waltz',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 22,
                'first_name'  => 'Leonardo',
                'middle_name' => null,
                'last_name'   => 'DiCaprio',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 23,
                'first_name'  => 'Kerry',
                'middle_name' => null,
                'last_name'   => 'Washington',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 24,
                'first_name'  => 'Walton',
                'middle_name' => null,
                'last_name'   => 'Goggins',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 25,
                'first_name'  => 'Dennis',
                'middle_name' => null,
                'last_name'   => 'Christopher',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 26,
                'first_name'  => 'James',
                'middle_name' => null,
                'last_name'   => 'Remar',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 27,
                'first_name'  => 'Don',
                'middle_name' => null,
                'last_name'   => 'Johnson',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'id'          => 28,
                'first_name'  => 'Ving',
                'middle_name' => null,
                'last_name'   => 'Rhames',
                'type'        => 0,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ]);

        $movie = Movie::create(['title' => 'From Dusk till Dawn']);
        # array of related actors and directors ids
        # required for filling pivot table data.
        $movie->persons()->sync([1, 2, 3, 4, 5, 6, 7, 8]);

        $movie = Movie::create(['title' => 'Pulp Fiction']);
        # array of related actors and directors ids
        # required for filling pivot table data.
        $movie->persons()->sync([9, 10, 11, 2, 12, 13, 14, 15, 16, 17, 18, 19, 28]);

        $movie = Movie::create(['title' => 'Django Unchained']);
        # array of related actors and directors ids
        # required for filling pivot table data.
        $movie->persons()->sync([19, 20, 21, 22, 23, 10, 24, 25, 26, 27]);

    }
}