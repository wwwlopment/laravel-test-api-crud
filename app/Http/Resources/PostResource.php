<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'title' => $this->translations[0]->title,
            'description' => $this->translations[0]->description,
            'content' => $this->translations[0]->content,
            'lang' => $this->translations[0]->language[0]->locale,
            'tags' => $this->tags,
        ];
    }
}
