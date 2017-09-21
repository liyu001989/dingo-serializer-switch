<?php

namespace Liyu\Dingo;

use Closure;

class SerializerSwitch
{
    protected $drivers = [
        'default_array' => 'League\Fractal\Serializer\ArraySerializer',
        'default_data_array' => 'League\Fractal\Serializer\DataArraySerializer',
        'json_api' => 'League\Fractal\Serializer\JsonApiSerializer',

        // change null resource return null instead of []
        'array' => 'Liyu\Dingo\Serializers\ArraySerializer',
        'data_array' => 'Liyu\Dingo\Serializers\DataArraySerializer',
    ];

    protected function getDriver($name)
    {
        $name = array_key_exists($name, $this->drivers) ?: 'data_array';
        return $this->drivers[$name];
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $name = 'data_array')
    {
        $driver = $this->getDriver($name);

        app('Dingo\Api\Transformer\Factory')->setAdapter(function ($app) use ($driver) {
            $fractal = new \League\Fractal\Manager;
            $serializer = new $driver;

            $fractal->setSerializer($serializer);
            return new \Dingo\Api\Transformer\Adapter\Fractal($fractal);
        });

        return $next($request);
    }
}
