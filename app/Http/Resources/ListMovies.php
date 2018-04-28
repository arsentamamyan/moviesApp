<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ListMovies extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $responseData = [
            'title'    => $this->first()->title,
            'director' => $this->first()->getDirectorModel()->full_name,
        ];

        foreach ($this->first()->actors as $actor) {
            $actors[] = $actor->full_name;
        }

        if (count($actors) < $this->first()->initial_actors_count) {
            $responseData['status'] = 'missing_actors';
        }

        $responseData['actors'] = $actors;

        return $responseData;
    }
}
