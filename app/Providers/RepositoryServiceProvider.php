<?php

namespace App\Providers;

use App\Interfaces\PostRepositoryInterface;
use App\Interfaces\TagRepositoryInterface;
use App\Repositories\PostRepository;
use App\Repositories\TagsRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(TagRepositoryInterface::class, TagsRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
