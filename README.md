# Dingo Serializer Switch

This is a middleware for dingo/api to switch serializer

## Installation

- `composer require liyu/dingo-serializer-switch`
- 增加 `'serializer' => \Liyu\Dingo\SerializerSwitch::class` 到 routeMiddleware

## Usage

```
$api->version('v1',
    ['middleware' => 'serializer:array'],
    function ($api) {
});

$api->version('v2',
    ['middleware' => 'serializer:data_array'],
    function ($api) {
});
```


default key is data_array.

```
'default_array' => 'League\Fractal\Serializer\ArraySerializer',
'default_data_array' => 'League\Fractal\Serializer\DataArraySerializer',
'json_api' => 'League\Fractal\Serializer\JsonApiSerializer',

// extend array null resource return null instead of []
'array' => 'Liyu\Dingo\Serializers\ArraySerializer',
// extend data_array null resource return null instead of []
'data_array' => 'Liyu\Dingo\Serializers\DataArraySerializer',
```

## License
[MIT LICENSE](https://github.com/liyu001989/dingo-serializer-switch/blob/master/LICENSE)
