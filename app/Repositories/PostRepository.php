<?php

namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Language;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    private $currentLangCode = 1;
    public function __construct() {
        $this->currentLangCode = (new LanguageRepository)->getLangCode();
    }
    public function getAllPosts()
    {
        return Post::paginate(10);
    }

    public function getPostById($postId)
    {
        return Post::where('id', $postId)->with(['translations'])->whereHas('translations', function($q){
            $q->where('lang_id', $this->currentLangCode);
            $q->orWhere('lang_id', Language::$defaultLandCode);
        })->first();
    }

    public function softDeletePost($postId)
    {
        $post = Post::findOrFail($postId);
        if($post->delete()){
            return $post;
        }
        return null;
    }

    public function createPost(array $postDetails)
    {
        $post = new Post();
        $post->save();
        $postDetails['lang_id'] = $this->currentLangCode;
        $post->translations()->create($postDetails);
        if (!empty($postDetails['tags'])) {
            $post->tags()->sync($postDetails['tags']);
        }

        return $post;
    }

    public function updatePost($postId, array $newDetails)
    {
        $post = Post::findOrFail($postId);
        $newDetails['lang_id'] = $this->currentLangCode;
        $post->translations()->updateOrCreate($newDetails);
        if (!empty($newDetails['tags'])) {
            $post->tags()->sync($newDetails['tags']);
        }
        return $post;
    }
}
