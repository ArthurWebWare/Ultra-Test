<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $posts = $this->postRepository->index();
        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->all();
        $post = $this->postRepository->store($data);
        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $post = $this->postRepository->getById($id);
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $data = $request->all();
        $post = $this->postRepository->update($data, $id);
        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $this->postRepository->delete($id);
        return response()->json(null, 204);
    }

    /**
     * @param User $user
     * @param Request $request
     * @return JsonResponse
     */
    public function userPosts(User $user, Request $request): JsonResponse
    {
        $posts = $user->posts()->paginate(10); // Пагинация по 10 постов на страницу
        return response()->json($posts);
    }
}
