<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Console\Scheduling\Schedule; 
use App\Http\Middleware\RoleMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    ) 
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => RoleMiddleware::class,
           
        ]);
         $middleware->trustProxies(at:'*');
    })
    ->withSchedule(function (Schedule $schedule) {
        $schedule->command('import:university-quotas')->everySixHours();
        $schedule->command('import:postgraduate-quotas')->everySixHours();
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();