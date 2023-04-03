<?php

namespace App\Http\Resources\Blog;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class BlogContentResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array
     */
    public function toArray($data): array
    {
        return [
            'id'                => (int) $data['id'],
            'status'            => (boolean) $data['blog']['status'],
            'blog_id'           => (int) $data['blog_id'],
            'language_id'       => (int) $data['language_id'],
            'name'              => (string) $data['name'],
            'content'           => (string) $data['content'],
            'image'             => (string) $data['image'],
            'meta_keys'         => (string) $data['meta_keys'],
            'meta_description'  => (string) $data['meta_description'],
            'created_at'        => Carbon::create($data['created_at'])->format('d/m/Y H:i:s'),
        ];
    }
}
