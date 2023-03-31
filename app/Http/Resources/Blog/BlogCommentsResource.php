<?php

namespace App\Http\Resources\Blog;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogCommentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'            => (int) $this->getId(),
            'blog_id'       => (int) $this->getBlogId(),
            'user_id'       => (int) $this->getUserId(),
            'text'          => (string) $this->getText(),
            'status'        => (boolean) $this->getStatus(),
            'created_at'    => $this->hasCreatedAt(),
        ];
    }
}
