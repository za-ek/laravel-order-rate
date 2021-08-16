<?php

namespace App\Providers;

use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\OrderCommentRepositoryInterface;
use App\Repository\Eloquent\OrderRateRepository;
use App\Repository\Eloquent\OrderRateRepositoryInterface;
use App\Repository\EloquentRepositoryInterface;
use App\Repository\OrderRateSendMsgInterface;
use App\Repository\OrderRateSendMsgRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(OrderRateRepositoryInterface::class, OrderRateRepository::class);
        $this->app->bind(OrderCommentRepositoryInterface::class, OrderRateRepository::class);
        $this->app->bind(OrderRateSendMsgInterface::class, OrderRateSendMsgRepository::class);
    }
}
