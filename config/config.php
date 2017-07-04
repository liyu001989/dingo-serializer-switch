<?php

return [
    'default' => 'data_array',
    'drivers' => [
        'array' => 'League\Fractal\Serializer\ArraySerializer',
        'data_array' => 'League\Fractal\Serializer\DataArraySerializer',
        'json_api' => 'League\Fractal\Serializer\JsonApiSerializer',
    ]
];
