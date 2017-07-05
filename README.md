# Dingo Serializer Switch

This is a middleware for dingo/api to switch serializer

## Installation

- `composer require liyu/dingo-serializer-switch`
- 增加 `serializer => \Liyu\Dingo\SerializerSwitch` 到 routeMiddleware

## Usage

```
$api->version('v1',
    ['middleware' => 'serializer:array'],
    function ($api) {
});

$api->version('v2',
    ['middleware' => 'serializer:data_array'],
    function ($api) {
```


可以使用下面的参数，如果使用 data_array 可以不使用这个中间件，默认就是 data_array

```
'array' => 'League\Fractal\Serializer\ArraySerializer',
'data_array' => 'League\Fractal\Serializer\DataArraySerializer',
'json_api' => 'League\Fractal\Serializer\JsonApiSerializer',

// extend array null resource return null instead of []
'array_null' => 'Liyu\Dingo\Serializers\ArraySerializer',
// extend data_array null resource return null instead of []
'data_array_null' => 'Liyu\Dingo\Serializers\DataArraySerializer',
```

## License
[MIT LICENSE](https://github.com/liyu001989/dingo-serializer-switch/blob/master/LICENSE)
