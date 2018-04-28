<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table  = 'persons';
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Many to many relation with movies.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function movies()
    {
        return $this->belongsToMany('App\Models\Movie');
    }

    /**
     * Local Scope for getting person with type actor.
     *
     * @param $query
     * @return mixed
     */
    public function scopeGetActor($query)
    {
        return $query->where('type', 0);
    }

    /**
     * Local Scope for getting person with type director.
     *
     * @param $query
     * @return mixed
     */
    public function scopeGetDirector($query)
    {
        return $query->where('type', 1);
    }

    /**
     * Mutator for getting person full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ($this->middle_name ? ' ' . $this->middle_name . ' ' : ' ' ) . $this->last_name;
    }
}
