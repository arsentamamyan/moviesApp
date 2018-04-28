<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table  = 'movies';
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Many to many relation with persons/director.
     *
     * @return mixed
     */
    public function director()
    {
        return $this->belongsToMany('App\Models\Person')->getDirector();
    }

    /**
     * Many to many relation with persons/actors.
     *
     * @return mixed
     */
    public function actors()
    {
        return $this->belongsToMany('App\Models\Person')->getActor();
    }


    public function moviePerson()
    {
        return $this->hasMany('App\Models\MoviePerson', 'movie_id', 'id');
    }


    /**
     * Many to many relation with all persons.
     * Using only for seeding purposes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function persons()
    {
        return $this->belongsToMany('App\Models\Person');
    }

    /**
     * Getting one director for movie.
     *
     * @return mixed
     */
    public function getDirectorModel()
    {
        return $this->director()->first();
    }
}
