<?php
namespace App\Repositories\Interfaces;

interface BlogRepositoryInterface
{
    public function getPosts(int $languageId);
}
