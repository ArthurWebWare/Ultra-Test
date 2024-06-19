<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    const POSTS_PER_PAGE = 10;

    protected PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = $request->query('per_page', self::POSTS_PER_PAGE); // Количество постов на страницу, по умолчанию 10
        $posts = $this->postRepository->index($perPage);

        // Трансформируем данные
        $posts->getCollection()->transform(function ($post) {
            return [
                'id' => $post->id,
                'user_id' => $post->user_id,
                'title' => $post->title,
                'url' => route('posts.show', ['id' => $post->id])
            ];
        });

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
        $post = $this->postRepository->getById($id);

        if (Gate::denies('update', $post)) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

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
        $post = $this->postRepository->getById($id);

        if (Gate::denies('delete', $post)) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $this->postRepository->delete($id);

        return response()->json(null, 204);
    }

    /**
     * @param User $user
     * @return JsonResponse
     */
    public function userPosts(User $user): JsonResponse
    {
        $posts = $user->posts()->paginate(self::POSTS_PER_PAGE);

        // Трансформируем данные
        $posts->getCollection()->transform(function ($post) {
            return [
                'id' => $post->id,
                'user_id' => $post->user_id,
                'title' => $post->title,
                'url' => route('posts.show', ['id' => $post->id])
            ];
        });

        return response()->json($posts);
    }
}
