<?php

namespace App\Interfaces;

interface TagRepositoryInterface
{
    public function getAllTags();

    public function getTagById($tagId);

    public function softDeleteTag($tagId);

    public function createTag(array $tagDetails);

    public function updateTag($tagId, array $newDetails);
}
