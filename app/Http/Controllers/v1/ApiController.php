<?php

namespace App\Http\Controllers\v1;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Movies as MoviesResource;
use App\Http\Resources\ListMovies as ListMoviesResource;

class ApiController extends Controller
{
    CONST PERSON_TYPE_ACTOR    = 0;
    CONST PERSON_TYPE_DIRECTOR = 1;

    /**
     * Fetching movies depends on given parameter.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        if ($request->has('withPersonsFirstNameLetters')) {
            $search = $request->withPersonsFirstNameLetters;

            $moviesByActorName = Movie::with([
                'actors',
                'director',
            ])
                ->whereHas('actors', function ($query) use ($search) {
                    $query->where('first_name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('director', function ($query) use ($search) {
                    $query->where('first_name', 'like', '%' . $search . '%');
                })->get();

            return MoviesResource::collection($moviesByActorName);
        }

        if ($request->has('withPersonsLastNameLetters')) {
            $search = $request->withPersonsLastNameLetters;

            $moviesByActorName = Movie::with([
                'actors',
                'director',
            ])
                ->whereHas('actors', function ($query) use ($search) {
                    $query->where('last_name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('director', function ($query) use ($search) {
                    $query->where('last_name', 'like', '%' . $search . '%');
                })->get();

            return MoviesResource::collection($moviesByActorName);
        }

        /*
         * To get unrelated rows used joins for not creating pivot table model purposes.
         * Will work with creating pivot table model and using relations from that as well.
         *
         * */
        $movies = Movie::leftJoin('movie_person', 'movies.id', '=', 'movie_person.movie_id')
            ->leftJoin('persons', 'movie_person.person_id', '=', 'persons.id')
            ->get();

        $movies = $movies->reject(function ($movie, $index) {
            return $movie->type == self::PERSON_TYPE_DIRECTOR;
        });

        $movies = $movies->groupBy('movie_id')
            ->toArray();
        $movieCast = Movie::with(['actors', 'director'])
            ->get()
            ->groupBy('id');

        foreach($movies as $movieId => $movie) {
            $movieCast->get($movieId)->first()->initial_actors_count = count($movie);
        }

        return ListMoviesResource::collection($movieCast);
    }
}
