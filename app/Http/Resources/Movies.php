<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Movies extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        foreach ($this->actors as $actor) {
            $actors[] = $actor->full_name;
        }

        return [
            'title'    => $this->title,
            'director' => $this->getDirectorModel()->full_name,
            'actors'   => $actors,
        ];
    }
}
