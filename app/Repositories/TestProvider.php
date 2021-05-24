<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

use App\Repositories\PostRepositoryInterface;

use App\Repositories\PostRepository;

class TestProvider extends ServiceProvider
{
    

    public function register()
    {
        $this->app->bind(
            'App\Repositories\TestRepositoryInterface',
            'App\Repositories\TestRepository'
        );
    }

}
