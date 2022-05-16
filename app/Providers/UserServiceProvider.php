<?php

namespace App\Providers;

use App\Service\Impl\UserServiceImpl;
use App\Service\UserService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [
        UserService::class => UserServiceImpl::class
    ];


    public function providers(): array
    {
        return [UserService::class];
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
