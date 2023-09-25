<?php

namespace App\Providers;

use App\Repositories\AuthRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\AttendanceRepository;
use App\Repositories\ThingspeakRepository;
use App\Interfaces\AuthRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\AttendanceRepositoryInterface;
use App\Interfaces\ThingspeakRepositoryInterface;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(AttendanceRepositoryInterface::class, AttendanceRepository::class);
        $this->app->bind(ThingspeakRepositoryInterface::class, ThingspeakRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
