<?php

namespace Liyu\Dingo;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Bootstrap.
     */
    public function boot()
    {
        $this->app['router']->aliasMiddleware('serializer', SerializerSwitch::class);
    }
}
