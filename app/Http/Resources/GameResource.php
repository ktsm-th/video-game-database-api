<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image,
            'release_date' => $this->release_date,
            'publisher_id' => $this->publisher_id,
            'consoles' => ConsoleResource::collection($this->consoles),
            'genres'=> GenreResource::collection($this->genres),
        ];
    }
}
