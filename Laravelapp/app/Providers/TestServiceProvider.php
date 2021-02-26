<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer(
            'test.test', 'App\Http\Composers\TestComposer'
        );
    }
}