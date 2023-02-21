<?php

namespace App\Http\Controllers;

use App\Http\Resources\TagResource;
use App\Interfaces\TagRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagsController extends Controller
{
    private TagRepositoryInterface $tagsRepository;

    public function __construct(TagRepositoryInterface $tagsRepository)
    {
        $this->tagsRepository = $tagsRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return TagResource::collection($this->tagsRepository->getAllTags());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|min:3',
        ]);


        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);

        }

        return (new TagResource($this->tagsRepository->createTag($request->all())))
            ->additional(['message' => trans('api.store_success')])
            ->response()
            ->setStatusCode(\Illuminate\Http\Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $tag = $this->tagsRepository->getTagById($id);
        if (!$tag) {
            return response()->json(['error' => 'Not Found!'], 404);
        }
        return (new TagResource($tag))
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
            'name' => 'required|min:3',
        ]);


        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);

        }
        return (new TagResource($this->tagsRepository->updateTag($id, $request->all())))
            ->additional(['message' => trans('api.update_success')])
            ->response()
            ->setStatusCode(\Illuminate\Http\Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        $this->tagsRepository->softDeleteTag($id);
        return response()
            ->json(['message' => trans('api.destroy_success'),])
            ->setStatusCode(\Illuminate\Http\Response::HTTP_OK);
    }
}
