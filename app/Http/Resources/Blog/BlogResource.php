<?php

namespace App\Http\Resources\Blog;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  $data
     * @return array
     */
    public function toArray($data): array
    {
        return [
            'id'           => (int) $this['id'],
            'status'       => (string) $this->status,
            'created_ad'   => (string) $this->created_at,
            'content'      => BlogContentResource::collection($this->content),
            'comments'     => BlogCommentsResource::collection($this->comments),
        ];
    }
}
