---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)
<!-- END_INFO -->

#Servers
<!-- START_1d681b6a210eee9196ddba2c0dfbf7c3 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "http://localhost/api/servers" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/servers",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/servers`

`HEAD api/servers`


<!-- END_1d681b6a210eee9196ddba2c0dfbf7c3 -->

<!-- START_4d2afa049dca7b9d9441574e819513dd -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/servers" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/servers",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/servers`


<!-- END_4d2afa049dca7b9d9441574e819513dd -->

<!-- START_4fd937879a12f5356dbbe1cb68b5dbc7 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET "http://localhost/api/servers/{server}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/servers/{server}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/servers/{server}`

`HEAD api/servers/{server}`


<!-- END_4fd937879a12f5356dbbe1cb68b5dbc7 -->

<!-- START_f01d4532bda2a61d90da788714c4c6c7 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/api/servers/{server}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/servers/{server}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/servers/{server}`

`PATCH api/servers/{server}`


<!-- END_f01d4532bda2a61d90da788714c4c6c7 -->

<!-- START_16e8d37a7058dc61c4f433ace69b1001 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/api/servers/{server}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/servers/{server}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/servers/{server}`


<!-- END_16e8d37a7058dc61c4f433ace69b1001 -->

#general
<!-- START_2bf3b21d470d7918f0cba687050e782b -->
## api/product/{product}/purchase

> Example request:

```bash
curl -X POST "http://localhost/api/product/{product}/purchase" \
-H "Accept: application/json" \
    -d "player_id"="qui" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/product/{product}/purchase",
    "method": "POST",
    "data": {
        "player_id": "qui"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/product/{product}/purchase`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    player_id | string |  optional  | Valid player id

<!-- END_2bf3b21d470d7918f0cba687050e782b -->

<!-- START_d50127a607e403449e988ed24cc511e3 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "http://localhost/api/product" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/product",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/product`

`HEAD api/product`


<!-- END_d50127a607e403449e988ed24cc511e3 -->

<!-- START_2d62ba7cf16a7d6db447375e13e86c34 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/product" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/product",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/product`


<!-- END_2d62ba7cf16a7d6db447375e13e86c34 -->

<!-- START_9bfa1a3fcf0ac9c9d6938d433735756c -->
## Display the specified resource.

> Example request:

```bash
curl -X GET "http://localhost/api/product/{product}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/product/{product}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/product/{product}`

`HEAD api/product/{product}`


<!-- END_9bfa1a3fcf0ac9c9d6938d433735756c -->

<!-- START_682327ab9f9deab00b7c603486ad935a -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/api/product/{product}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/product/{product}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/product/{product}`

`PATCH api/product/{product}`


<!-- END_682327ab9f9deab00b7c603486ad935a -->

<!-- START_587b06cc0dc038b2e049f3a1baa2593b -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/api/product/{product}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/product/{product}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/product/{product}`


<!-- END_587b06cc0dc038b2e049f3a1baa2593b -->

<!-- START_c3d7bee6b50d1ca5b69b9fe51e9ad817 -->
## api/publish-product

> Example request:

```bash
curl -X PUT "http://localhost/api/publish-product" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/publish-product",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/publish-product`


<!-- END_c3d7bee6b50d1ca5b69b9fe51e9ad817 -->

<!-- START_3dae63ae5a1e1f2fdf9369d74228da77 -->
## api/unlock-character

> Example request:

```bash
curl -X POST "http://localhost/api/unlock-character" \
-H "Accept: application/json" \
    -d "gateway"="provident" \
    -d "player_id"="provident" \
    -d "id"="provident" \
    -d "name"="provident" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/unlock-character",
    "method": "POST",
    "data": {
        "gateway": "provident",
        "player_id": "provident",
        "id": "provident",
        "name": "provident"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/unlock-character`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    gateway | string |  optional  | 
    player_id | string |  required  | Valid player id
    id | string |  optional  | Required if the parameters `name` are not present. Valid character_template id
    name | string |  optional  | Required if the parameters `id` are not present. Valid character_template name

<!-- END_3dae63ae5a1e1f2fdf9369d74228da77 -->

<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## api/login

> Example request:

```bash
curl -X POST "http://localhost/api/login" \
-H "Accept: application/json" \
    -d "email"="repellat" \
    -d "password"="repellat" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/login",
    "method": "POST",
    "data": {
        "email": "repellat",
        "password": "repellat"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/login`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | string |  required  | Valid user email
    password | string |  required  | 

<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

<!-- START_61739f3220a224b34228600649230ad1 -->
## api/logout

> Example request:

```bash
curl -X POST "http://localhost/api/logout" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/logout",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/logout`


<!-- END_61739f3220a224b34228600649230ad1 -->

<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
## api/register

> Example request:

```bash
curl -X POST "http://localhost/api/register" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/register",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/register`


<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->

<!-- START_7f3110273f5e3eb6e63b4003183200df -->
## api/me

> Example request:

```bash
curl -X GET "http://localhost/api/me" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/me",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/me`

`HEAD api/me`


<!-- END_7f3110273f5e3eb6e63b4003183200df -->

<!-- START_7c12a8a3e592f166fb4c06abdb4362f7 -->
## api/photo

> Example request:

```bash
curl -X POST "http://localhost/api/photo" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/photo",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/photo`


<!-- END_7c12a8a3e592f166fb4c06abdb4362f7 -->

<!-- START_2ad7673f11eef840c6164c226f9112a9 -->
## api/users/{user}/photo

> Example request:

```bash
curl -X POST "http://localhost/api/users/{user}/photo" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/{user}/photo",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/{user}/photo`


<!-- END_2ad7673f11eef840c6164c226f9112a9 -->

<!-- START_27d74479c28f6ad9b2e75632cceabfbc -->
## api/users-search

> Example request:

```bash
curl -X GET "http://localhost/api/users-search" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users-search",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "query": [
        "The query field is required."
    ]
}
```

### HTTP Request
`GET api/users-search`

`HEAD api/users-search`


<!-- END_27d74479c28f6ad9b2e75632cceabfbc -->

<!-- START_b65c76c6e2e50e41129eb9508dd6e3cd -->
## api/server/{server}/players

> Example request:

```bash
curl -X GET "http://localhost/api/server/{server}/players" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/server/{server}/players",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/server/{server}/players`

`HEAD api/server/{server}/players`


<!-- END_b65c76c6e2e50e41129eb9508dd6e3cd -->

<!-- START_d472f5dc83015569e9206b7e42e1efd4 -->
## api/server/{server}/join

> Example request:

```bash
curl -X POST "http://localhost/api/server/{server}/join" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/server/{server}/join",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/server/{server}/join`


<!-- END_d472f5dc83015569e9206b7e42e1efd4 -->

<!-- START_19295153f3e9227a6beebb2d29f96825 -->
## api/server/{server}/leave

> Example request:

```bash
curl -X POST "http://localhost/api/server/{server}/leave" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/server/{server}/leave",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/server/{server}/leave`


<!-- END_19295153f3e9227a6beebb2d29f96825 -->

<!-- START_195237ef82ec0cdf43c4f9395f97a14e -->
## api/player/{player}

> Example request:

```bash
curl -X GET "http://localhost/api/player/{player}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/player/{player}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/player/{player}`

`HEAD api/player/{player}`


<!-- END_195237ef82ec0cdf43c4f9395f97a14e -->

<!-- START_8aea17de8b628e69dcd572e59dc64092 -->
## api/player/{player}

> Example request:

```bash
curl -X DELETE "http://localhost/api/player/{player}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/player/{player}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/player/{player}`


<!-- END_8aea17de8b628e69dcd572e59dc64092 -->

<!-- START_c269e0a1680652d42dc98c5e08adba6f -->
## api/player/{player}

> Example request:

```bash
curl -X PUT "http://localhost/api/player/{player}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/player/{player}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/player/{player}`

`PATCH api/player/{player}`


<!-- END_c269e0a1680652d42dc98c5e08adba6f -->

<!-- START_629eeee65a114cc92c342fb1b7d5fea1 -->
## api/inactive-players

> Example request:

```bash
curl -X GET "http://localhost/api/inactive-players" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/inactive-players",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/inactive-players`

`HEAD api/inactive-players`


<!-- END_629eeee65a114cc92c342fb1b7d5fea1 -->

<!-- START_7de47f721d9424d493d75b9558a7e6f4 -->
## api/offline-players

> Example request:

```bash
curl -X GET "http://localhost/api/offline-players" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/offline-players",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/offline-players`

`HEAD api/offline-players`


<!-- END_7de47f721d9424d493d75b9558a7e6f4 -->

<!-- START_54f6e1332190d5ccb1c24c74269264f9 -->
## api/online-players

> Example request:

```bash
curl -X GET "http://localhost/api/online-players" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/online-players",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/online-players`

`HEAD api/online-players`


<!-- END_54f6e1332190d5ccb1c24c74269264f9 -->

<!-- START_da55e8c580ea42b3aa16af9863422401 -->
## api/newbie-players

> Example request:

```bash
curl -X GET "http://localhost/api/newbie-players" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/newbie-players",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/newbie-players`

`HEAD api/newbie-players`


<!-- END_da55e8c580ea42b3aa16af9863422401 -->

<!-- START_8a32cd03fcc4e8dba8e9122d1a76e5b1 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "http://localhost/api/board" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/board",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/board`

`HEAD api/board`


<!-- END_8a32cd03fcc4e8dba8e9122d1a76e5b1 -->

<!-- START_27fe92db4d5f4b8bdc3dd7f3553d23a6 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/board" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/board",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/board`


<!-- END_27fe92db4d5f4b8bdc3dd7f3553d23a6 -->

<!-- START_52a07f7b1c5b39256197a5d87a58a09d -->
## Display the specified resource.

> Example request:

```bash
curl -X GET "http://localhost/api/board/{board}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/board/{board}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/board/{board}`

`HEAD api/board/{board}`


<!-- END_52a07f7b1c5b39256197a5d87a58a09d -->

<!-- START_c39c7d57801c65783efc2ac8a6b4384e -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/api/board/{board}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/board/{board}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/board/{board}`

`PATCH api/board/{board}`


<!-- END_c39c7d57801c65783efc2ac8a6b4384e -->

<!-- START_8a47d949e9cd3fabf69fe6195ae30fe9 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/api/board/{board}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/board/{board}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/board/{board}`


<!-- END_8a47d949e9cd3fabf69fe6195ae30fe9 -->

<!-- START_da0515196f3bd70cb48c4d264be95868 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "http://localhost/api/board/{board}/channels" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/board/{board}/channels",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/board/{board}/channels`

`HEAD api/board/{board}/channels`


<!-- END_da0515196f3bd70cb48c4d264be95868 -->

<!-- START_b0fcdb1dd7e74c56b5ec0a8d712dce2c -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/channel" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/channel",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/channel`


<!-- END_b0fcdb1dd7e74c56b5ec0a8d712dce2c -->

<!-- START_307b0feb0d8955c2e551d4aff3472ee0 -->
## api/channel/{channel}

> Example request:

```bash
curl -X GET "http://localhost/api/channel/{channel}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/channel/{channel}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/channel/{channel}`

`HEAD api/channel/{channel}`


<!-- END_307b0feb0d8955c2e551d4aff3472ee0 -->

<!-- START_714755169f4ea121ab9ad3900fae6dc7 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PATCH "http://localhost/api/channel/{channel}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/channel/{channel}",
    "method": "PATCH",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PATCH api/channel/{channel}`


<!-- END_714755169f4ea121ab9ad3900fae6dc7 -->

<!-- START_d5e4eed35e9e93fdfcbb618c4300eaea -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/api/channel/{channel}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/channel/{channel}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/channel/{channel}`


<!-- END_d5e4eed35e9e93fdfcbb618c4300eaea -->

<!-- START_72a7bcbc6a54996096f0ed1f8616f73f -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "http://localhost/api/threads" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/threads",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/threads`

`HEAD api/threads`


<!-- END_72a7bcbc6a54996096f0ed1f8616f73f -->

<!-- START_6a8687fad885c1393f9f9043b9fc0593 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/threads" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/threads",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/threads`


<!-- END_6a8687fad885c1393f9f9043b9fc0593 -->

<!-- START_f25f202556117633592de2b864934c86 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET "http://localhost/api/threads/{channel}/{thread}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/threads/{channel}/{thread}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/threads/{channel}/{thread}`

`HEAD api/threads/{channel}/{thread}`


<!-- END_f25f202556117633592de2b864934c86 -->

<!-- START_49acbcf1df0e27e929149ac6790b326f -->
## Delete the given thread.

> Example request:

```bash
curl -X DELETE "http://localhost/api/threads/{channel}/{thread}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/threads/{channel}/{thread}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/threads/{channel}/{thread}`


<!-- END_49acbcf1df0e27e929149ac6790b326f -->

<!-- START_de3ef644f4b361062397a47406f8ccd1 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "http://localhost/api/threads/{channel}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/threads/{channel}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/threads/{channel}`

`HEAD api/threads/{channel}`


<!-- END_de3ef644f4b361062397a47406f8ccd1 -->

<!-- START_3c6478fa648968e5f0c7b82284d1d0f4 -->
## api/threads/{channel}/{thread}/replies

> Example request:

```bash
curl -X GET "http://localhost/api/threads/{channel}/{thread}/replies" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/threads/{channel}/{thread}/replies",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/threads/{channel}/{thread}/replies`

`HEAD api/threads/{channel}/{thread}/replies`


<!-- END_3c6478fa648968e5f0c7b82284d1d0f4 -->

<!-- START_9edae6959f45590825f7a0df656d1880 -->
## api/threads/{channel}/{thread}/replies

> Example request:

```bash
curl -X POST "http://localhost/api/threads/{channel}/{thread}/replies" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/threads/{channel}/{thread}/replies",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/threads/{channel}/{thread}/replies`


<!-- END_9edae6959f45590825f7a0df656d1880 -->

<!-- START_38974adb5b1312d401927803d734dbca -->
## api/replies/{reply}

> Example request:

```bash
curl -X PUT "http://localhost/api/replies/{reply}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/replies/{reply}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/replies/{reply}`

`PATCH api/replies/{reply}`


<!-- END_38974adb5b1312d401927803d734dbca -->

<!-- START_2d415eef354b9f83750ca7357980572e -->
## api/replies/{reply}

> Example request:

```bash
curl -X DELETE "http://localhost/api/replies/{reply}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/replies/{reply}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/replies/{reply}`


<!-- END_2d415eef354b9f83750ca7357980572e -->

<!-- START_27ebbc3ff56c07caaa242ae6e72a87fe -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/channel/{channel}/cover" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/channel/{channel}/cover",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/channel/{channel}/cover`


<!-- END_27ebbc3ff56c07caaa242ae6e72a87fe -->

<!-- START_3762054c1ab40c4e179f456c3d199299 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/api/channel/{channel}/cover" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/channel/{channel}/cover",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/channel/{channel}/cover`


<!-- END_3762054c1ab40c4e179f456c3d199299 -->

<!-- START_07ae83f5f46613f804b00d78ff941b4b -->
## api/threads/{channel}/{thread}/subscriptions

> Example request:

```bash
curl -X POST "http://localhost/api/threads/{channel}/{thread}/subscriptions" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/threads/{channel}/{thread}/subscriptions",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/threads/{channel}/{thread}/subscriptions`


<!-- END_07ae83f5f46613f804b00d78ff941b4b -->

<!-- START_2b0027366a1e191cf47e4b11f00d094c -->
## api/threads/{channel}/{thread}/subscriptions

> Example request:

```bash
curl -X DELETE "http://localhost/api/threads/{channel}/{thread}/subscriptions" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/threads/{channel}/{thread}/subscriptions",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/threads/{channel}/{thread}/subscriptions`


<!-- END_2b0027366a1e191cf47e4b11f00d094c -->

<!-- START_6c66e869f802a9d427481909e198d673 -->
## api/replies/{reply}/favorites

> Example request:

```bash
curl -X POST "http://localhost/api/replies/{reply}/favorites" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/replies/{reply}/favorites",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/replies/{reply}/favorites`


<!-- END_6c66e869f802a9d427481909e198d673 -->

<!-- START_e0e89a036685447891630b1b838ac173 -->
## api/replies/{reply}/favorites

> Example request:

```bash
curl -X DELETE "http://localhost/api/replies/{reply}/favorites" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/replies/{reply}/favorites",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/replies/{reply}/favorites`


<!-- END_e0e89a036685447891630b1b838ac173 -->

<!-- START_df95d75964c3184edad8208ffdd6778d -->
## api/profiles/{user}

> Example request:

```bash
curl -X GET "http://localhost/api/profiles/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/profiles/{user}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/profiles/{user}`

`HEAD api/profiles/{user}`


<!-- END_df95d75964c3184edad8208ffdd6778d -->

<!-- START_1f79ed61ab97f6c2c1e526b857baff0c -->
## api/profiles/{user}/notifications

> Example request:

```bash
curl -X GET "http://localhost/api/profiles/{user}/notifications" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/profiles/{user}/notifications",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/profiles/{user}/notifications`

`HEAD api/profiles/{user}/notifications`


<!-- END_1f79ed61ab97f6c2c1e526b857baff0c -->

<!-- START_51523827e6591e394ab74ff19d6f224b -->
## Mark a specific notification as read.

> Example request:

```bash
curl -X DELETE "http://localhost/api/profiles/{user}/notifications/{notification}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/profiles/{user}/notifications/{notification}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/profiles/{user}/notifications/{notification}`


<!-- END_51523827e6591e394ab74ff19d6f224b -->

