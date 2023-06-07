<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Illuminate\Support\Facades\Log;

class QueueHandle
{
    public function __construct(){}

    public function handle($job, $next)
    {
        Log::info('job middle');
        $next($job);
    }
}
