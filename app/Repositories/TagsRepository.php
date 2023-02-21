<?php

namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Interfaces\TagRepositoryInterface;
use App\Models\Post;
use App\Models\Tag;

class TagsRepository implements TagRepositoryInterface
{
    public function getAllTags()
    {
        return Tag::paginate(10);
    }

    public function getTagById($tagId)
    {
        return Tag::findOrFail($tagId);
    }

    public function softDeleteTag($tagId)
    {
        $tag = Tag::findOrFail($tagId);
        if($tag->delete()){
            return $tag;
        }
        return null;
    }

    public function createTag(array $tagDetails)
    {
        return Tag::create($tagDetails);
    }

    public function updateTag($tagId, array $newDetails)
    {
        $tag = Tag::findOrFail($tagId);
        $tag->update($newDetails);
        return $tag;
    }
}
