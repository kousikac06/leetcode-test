<?php

namespace App\Providers;

use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Api\TestThreeController;
use App\Http\Controllers\Api\TestTwoController;
use App\Model\Post;
use App\Model\Video;
use App\Rules\RuleInIf;
use App\Services\TestService;
use App\Services\TestServiceImpl;
use App\Services\TestServiceOtherImpl;
use App\Services\TestTrdService;
use App\Services\TestTrdServiceImpl;
use App\Services\TestTwoService;
use App\Services\TestTwoServiceImpl;
use App\Services\TestTrdServiceOtherExtendImpl;
use App\Services\TestTwoServiceOtherImpl;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
