<?php

namespace Liyu\Dingo;

use Closure;

class SerializerSwitch
{
    protected $drivers = [
        'array' => 'League\Fractal\Serializer\ArraySerializer',
        'data_array' => 'League\Fractal\Serializer\DataArraySerializer',
        'json_api' => 'League\Fractal\Serializer\JsonApiSerializer',
        // change null resource return null instead of []
        'array_null' => 'Liyu\Dingo\Serializers\ArraySerializer',
        'data_array_null' => 'Liyu\Dingo\Serializers\DataArraySerializer',
    ];

    protected function getDriver($name)
    {
        if (array_key_exists($name, $this->drivers)) {
            return $this->drivers[$name];
        }

        return $this->drivers['data_array'];
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

        app('Dingo\Api\Transformer\Factory')->setAdapter(function ($app) use($driver) {
            $fractal = new \League\Fractal\Manager;
            $serializer = new \App\Transformers\Serializers\ArraySerializer();
            $serializer = new $driver;

            $fractal->setSerializer($serializer);
            return new \Dingo\Api\Transformer\Adapter\Fractal($fractal);
        });

        return $next($request);
    }
}
