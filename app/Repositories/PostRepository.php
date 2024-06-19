<?php

namespace App\Repositories;

use App\Models\Post;
use App\Interfaces\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PostRepository implements PostRepositoryInterface
{
    public function index(): Collection
    {
        return Post::all();
    }

    public function getById($id)
    {
        return Post::findOrFail($id);
    }

    public function store(array $data)
    {
        return Post::create($data);
    }

    public function update(array $data, $id)
    {
        return Post::whereId($id)->update($data);
    }

    public function delete($id): void
    {
        Post::destroy($id);
    }
}
