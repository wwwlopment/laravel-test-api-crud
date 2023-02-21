<?php

namespace App\Interfaces;

interface PostRepositoryInterface
{
    public function getAllPosts();

    public function getPostById($postId);

    public function softDeletePost($postId);

    public function createPost(array $postDetails);

    public function updatePost($postId, array $newDetails);
}
