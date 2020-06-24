<?php

namespace Spa\Repositories;

use Spa\Models\Post;
use Spa\Services\Repository\AbstractRepository;

class Posts extends AbstractRepository
{
    public function model() : string
    {
        return Post::class;
    }

    public function getUserPosts(int $user)
    {
        $this->where('user_id', $user);

        return $this->all();
    }
}