<?php

namespace App\Repositories;

use App\Models\Post;
use App\Interfaces\PostRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class PostRepository implements PostRepositoryInterface
{
    /**
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function index(int $perPage = 10): LengthAwarePaginator
    {
        return Post::paginate($perPage);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return Post::find($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return Post::create($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id): mixed
    {
        return Post::findOrFail($id)->update($data);
    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id): void
    {
        Post::destroy($id);
    }
}
