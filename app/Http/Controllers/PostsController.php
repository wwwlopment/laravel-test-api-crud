<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PostResource::collection($this->postRepository->getAllPosts());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'content' => 'required|min:3',
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);

        }

        return (new PostResource($this->postRepository->createPost($request->all())))
            ->additional(['message' => trans('api.store_success')])
            ->response()
            ->setStatusCode(\Illuminate\Http\Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = $this->postRepository->getPostById($id);
        if (!$post) {
            return response()->json(['error' => 'Not Found!'], 404);
        }
        return (new PostResource($post))
            ->additional(['message' => trans('api.show_success')])
            ->response()
            ->setStatusCode(\Illuminate\Http\Response::HTTP_ACCEPTED);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'content' => 'required|min:3',
        ]);


        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);

        }
        return (new PostResource($this->postRepository->updatePost($id, $request->all())))
            ->additional(['message' => trans('api.update_success')])
            ->response()
            ->setStatusCode(\Illuminate\Http\Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        $this->postRepository->softDeletePost($id);
        return response()
            ->json(['message' => trans('api.destroy_success'),])
            ->setStatusCode(\Illuminate\Http\Response::HTTP_OK);
    }
}
