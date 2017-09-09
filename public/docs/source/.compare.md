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
curl -X GET "http://heraldsofcosmos.dev/api/servers" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/servers",
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
[
    {
        "id": 1,
        "name": "Magnus Beahan",
        "ip": "17.161.135.225",
        "game_type": "dolore",
        "map": "quasi",
        "players_limit": 32,
        "MNP": "nam",
        "created_at": "2017-09-03 09:31:41",
        "updated_at": "2017-09-03 09:31:41",
        "players_count": 1,
        "is_full": false
    },
    {
        "id": 2,
        "name": "Courtney Klein",
        "ip": "224.184.214.33",
        "game_type": "sint",
        "map": "enim",
        "players_limit": 66,
        "MNP": "quidem",
        "created_at": "2017-09-03 09:31:41",
        "updated_at": "2017-09-03 09:31:41",
        "players_count": 1,
        "is_full": false
    },
    {
        "id": 3,
        "name": "Corrine Lindgren",
        "ip": "239.172.126.1",
        "game_type": "suscipit",
        "map": "temporibus",
        "players_limit": 82,
        "MNP": "blanditiis",
        "created_at": "2017-09-03 09:31:41",
        "updated_at": "2017-09-03 09:31:41",
        "players_count": 1,
        "is_full": false
    },
    {
        "id": 4,
        "name": "Mr. Nigel Shanahan",
        "ip": "57.64.126.232",
        "game_type": "qui",
        "map": "non",
        "players_limit": 57,
        "MNP": "rem",
        "created_at": "2017-09-03 09:31:41",
        "updated_at": "2017-09-03 09:31:41",
        "players_count": 1,
        "is_full": false
    },
    {
        "id": 5,
        "name": "Ora Breitenberg",
        "ip": "123.68.55.231",
        "game_type": "similique",
        "map": "in",
        "players_limit": 59,
        "MNP": "dicta",
        "created_at": "2017-09-03 09:31:42",
        "updated_at": "2017-09-03 09:31:42",
        "players_count": 1,
        "is_full": false
    }
]
```

### HTTP Request
`GET api/servers`

`HEAD api/servers`


<!-- END_1d681b6a210eee9196ddba2c0dfbf7c3 -->

<!-- START_4d2afa049dca7b9d9441574e819513dd -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://heraldsofcosmos.dev/api/servers" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/servers",
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
curl -X GET "http://heraldsofcosmos.dev/api/servers/{server}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/servers/{server}",
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
`GET api/servers/{server}`

`HEAD api/servers/{server}`


<!-- END_4fd937879a12f5356dbbe1cb68b5dbc7 -->

<!-- START_f01d4532bda2a61d90da788714c4c6c7 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://heraldsofcosmos.dev/api/servers/{server}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/servers/{server}",
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
curl -X DELETE "http://heraldsofcosmos.dev/api/servers/{server}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/servers/{server}",
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
<!-- START_4f58d00a9c157d18c2d5ab5267e46ab4 -->
## api/process-payment

> Example request:

```bash
curl -X POST "http://heraldsofcosmos.dev/api/process-payment" \
-H "Accept: application/json" \
    -d "order_id"="rem" \
    -d "currency"="rem" \
    -d "operations"="rem" \
    -d "metadata"="rem" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/process-payment",
    "method": "POST",
    "data": {
        "order_id": "rem",
        "currency": "rem",
        "operations": "rem",
        "metadata": "rem"
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
`POST api/process-payment`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    order_id | string |  required  | Minimum: `4` Maximum: `20` Valid purchase token
    currency | string |  required  | 
    operations | array |  required  | 
    metadata | array |  required  | 

<!-- END_4f58d00a9c157d18c2d5ab5267e46ab4 -->

<!-- START_684534a84983aab00b529dcbdedd2a50 -->
## api/refund-purchase/{purchase}

> Example request:

```bash
curl -X POST "http://heraldsofcosmos.dev/api/refund-purchase/{purchase}" \
-H "Accept: application/json" \
    -d "amount"="6754" \
    -d "currency"="ut" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/refund-purchase/{purchase}",
    "method": "POST",
    "data": {
        "amount": 6754,
        "currency": "ut"
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
`POST api/refund-purchase/{purchase}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    amount | numeric |  optional  | 
    currency | string |  optional  | 

<!-- END_684534a84983aab00b529dcbdedd2a50 -->

<!-- START_afdbba33cd17dc44e892b3ba68e7bbd3 -->
## api/purchase-product/{product}

> Example request:

```bash
curl -X POST "http://heraldsofcosmos.dev/api/purchase-product/{product}" \
-H "Accept: application/json" \
    -d "gateway"="quaerat" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/purchase-product/{product}",
    "method": "POST",
    "data": {
        "gateway": "quaerat"
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
`POST api/purchase-product/{product}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    gateway | string |  optional  | 

<!-- END_afdbba33cd17dc44e892b3ba68e7bbd3 -->

<!-- START_d50127a607e403449e988ed24cc511e3 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "http://heraldsofcosmos.dev/api/product" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/product",
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
    "current_page": 1,
    "data": [],
    "from": null,
    "last_page": 0,
    "next_page_url": null,
    "path": "http:\/\/localhostapi\/product",
    "per_page": 15,
    "prev_page_url": null,
    "to": null,
    "total": 0
}
```

### HTTP Request
`GET api/product`

`HEAD api/product`


<!-- END_d50127a607e403449e988ed24cc511e3 -->

<!-- START_2d62ba7cf16a7d6db447375e13e86c34 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://heraldsofcosmos.dev/api/product" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/product",
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
curl -X GET "http://heraldsofcosmos.dev/api/product/{product}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/product/{product}",
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
curl -X PUT "http://heraldsofcosmos.dev/api/product/{product}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/product/{product}",
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
curl -X DELETE "http://heraldsofcosmos.dev/api/product/{product}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/product/{product}",
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
curl -X PUT "http://heraldsofcosmos.dev/api/publish-product" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/publish-product",
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
curl -X POST "http://heraldsofcosmos.dev/api/unlock-character" \
-H "Accept: application/json" \
    -d "gateway"="eaque" \
    -d "player_id"="eaque" \
    -d "id"="eaque" \
    -d "name"="eaque" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/unlock-character",
    "method": "POST",
    "data": {
        "gateway": "eaque",
        "player_id": "eaque",
        "id": "eaque",
        "name": "eaque"
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
curl -X POST "http://heraldsofcosmos.dev/api/login" \
-H "Accept: application/json" \
    -d "email"="rerum" \
    -d "password"="rerum" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/login",
    "method": "POST",
    "data": {
        "email": "rerum",
        "password": "rerum"
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
curl -X POST "http://heraldsofcosmos.dev/api/logout" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/logout",
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
curl -X POST "http://heraldsofcosmos.dev/api/register" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/register",
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
curl -X GET "http://heraldsofcosmos.dev/api/me" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/me",
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
curl -X POST "http://heraldsofcosmos.dev/api/photo" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/photo",
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
curl -X POST "http://heraldsofcosmos.dev/api/users/{user}/photo" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/users/{user}/photo",
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
curl -X GET "http://heraldsofcosmos.dev/api/users-search" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/users-search",
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
curl -X GET "http://heraldsofcosmos.dev/api/server/{server}/players" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/server/{server}/players",
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
curl -X POST "http://heraldsofcosmos.dev/api/server/{server}/join" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/server/{server}/join",
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
curl -X POST "http://heraldsofcosmos.dev/api/server/{server}/leave" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/server/{server}/leave",
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
curl -X GET "http://heraldsofcosmos.dev/api/player/{player}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/player/{player}",
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
curl -X DELETE "http://heraldsofcosmos.dev/api/player/{player}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/player/{player}",
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
curl -X PUT "http://heraldsofcosmos.dev/api/player/{player}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/player/{player}",
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
curl -X GET "http://heraldsofcosmos.dev/api/inactive-players" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/inactive-players",
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
curl -X GET "http://heraldsofcosmos.dev/api/offline-players" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/offline-players",
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
curl -X GET "http://heraldsofcosmos.dev/api/online-players" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/online-players",
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
curl -X GET "http://heraldsofcosmos.dev/api/newbie-players" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/newbie-players",
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
curl -X GET "http://heraldsofcosmos.dev/api/board" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/board",
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
    "current_page": 1,
    "data": [],
    "from": null,
    "last_page": 0,
    "next_page_url": null,
    "path": "http:\/\/localhostapi\/board",
    "per_page": 15,
    "prev_page_url": null,
    "to": null,
    "total": 0
}
```

### HTTP Request
`GET api/board`

`HEAD api/board`


<!-- END_8a32cd03fcc4e8dba8e9122d1a76e5b1 -->

<!-- START_27fe92db4d5f4b8bdc3dd7f3553d23a6 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://heraldsofcosmos.dev/api/board" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/board",
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
curl -X GET "http://heraldsofcosmos.dev/api/board/{board}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/board/{board}",
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
curl -X PUT "http://heraldsofcosmos.dev/api/board/{board}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/board/{board}",
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
curl -X DELETE "http://heraldsofcosmos.dev/api/board/{board}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/board/{board}",
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
curl -X GET "http://heraldsofcosmos.dev/api/board/{board}/channels" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/board/{board}/channels",
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
curl -X POST "http://heraldsofcosmos.dev/api/channel" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/channel",
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
curl -X GET "http://heraldsofcosmos.dev/api/channel/{channel}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/channel/{channel}",
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
curl -X PATCH "http://heraldsofcosmos.dev/api/channel/{channel}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/channel/{channel}",
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
curl -X DELETE "http://heraldsofcosmos.dev/api/channel/{channel}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/channel/{channel}",
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

<!-- START_6e8c74d24b36be660875ea9f4c4bb487 -->
## api/lock-thread/{thread}

> Example request:

```bash
curl -X PUT "http://heraldsofcosmos.dev/api/lock-thread/{thread}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/lock-thread/{thread}",
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
`PUT api/lock-thread/{thread}`


<!-- END_6e8c74d24b36be660875ea9f4c4bb487 -->

<!-- START_d4124008a1b31cce13780f16255629cd -->
## api/unlock-thread/{thread}

> Example request:

```bash
curl -X PATCH "http://heraldsofcosmos.dev/api/unlock-thread/{thread}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/unlock-thread/{thread}",
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
`PATCH api/unlock-thread/{thread}`


<!-- END_d4124008a1b31cce13780f16255629cd -->

<!-- START_72a7bcbc6a54996096f0ed1f8616f73f -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "http://heraldsofcosmos.dev/api/threads" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/threads",
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
    "current_page": 1,
    "data": [],
    "from": null,
    "last_page": 0,
    "next_page_url": null,
    "path": "http:\/\/localhostapi\/threads",
    "per_page": 25,
    "prev_page_url": null,
    "to": null,
    "total": 0
}
```

### HTTP Request
`GET api/threads`

`HEAD api/threads`


<!-- END_72a7bcbc6a54996096f0ed1f8616f73f -->

<!-- START_6a8687fad885c1393f9f9043b9fc0593 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://heraldsofcosmos.dev/api/threads" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/threads",
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
curl -X GET "http://heraldsofcosmos.dev/api/threads/{channel}/{thread}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/threads/{channel}/{thread}",
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
curl -X DELETE "http://heraldsofcosmos.dev/api/threads/{channel}/{thread}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/threads/{channel}/{thread}",
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
curl -X GET "http://heraldsofcosmos.dev/api/threads/{channel}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/threads/{channel}",
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
curl -X GET "http://heraldsofcosmos.dev/api/threads/{channel}/{thread}/replies" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/threads/{channel}/{thread}/replies",
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
curl -X POST "http://heraldsofcosmos.dev/api/threads/{channel}/{thread}/replies" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/threads/{channel}/{thread}/replies",
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
curl -X PUT "http://heraldsofcosmos.dev/api/replies/{reply}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/replies/{reply}",
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
curl -X DELETE "http://heraldsofcosmos.dev/api/replies/{reply}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/replies/{reply}",
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
curl -X POST "http://heraldsofcosmos.dev/api/channel/{channel}/cover" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/channel/{channel}/cover",
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
curl -X DELETE "http://heraldsofcosmos.dev/api/channel/{channel}/cover" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/channel/{channel}/cover",
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
curl -X POST "http://heraldsofcosmos.dev/api/threads/{channel}/{thread}/subscriptions" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/threads/{channel}/{thread}/subscriptions",
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
curl -X DELETE "http://heraldsofcosmos.dev/api/threads/{channel}/{thread}/subscriptions" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/threads/{channel}/{thread}/subscriptions",
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
curl -X POST "http://heraldsofcosmos.dev/api/replies/{reply}/favorites" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/replies/{reply}/favorites",
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
curl -X DELETE "http://heraldsofcosmos.dev/api/replies/{reply}/favorites" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/replies/{reply}/favorites",
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
curl -X GET "http://heraldsofcosmos.dev/api/profiles/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/profiles/{user}",
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
    "user": {
        "id": 1,
        "name": "Miss Kiara Dooley",
        "email": "mokon@example.net",
        "photo_path": null,
        "created_at": "2017-09-03 09:31:09",
        "updated_at": "2017-09-03 09:31:09",
        "token": null,
        "roles": [
            {
                "id": 3,
                "name": "User",
                "created_at": "2017-09-03 09:31:09",
                "updated_at": "2017-09-03 09:31:09",
                "pivot": {
                    "user_id": 1,
                    "role_id": 3
                }
            }
        ]
    },
    "activities": []
}
```

### HTTP Request
`GET api/profiles/{user}`

`HEAD api/profiles/{user}`


<!-- END_df95d75964c3184edad8208ffdd6778d -->

<!-- START_1f79ed61ab97f6c2c1e526b857baff0c -->
## api/profiles/{user}/notifications

> Example request:

```bash
curl -X GET "http://heraldsofcosmos.dev/api/profiles/{user}/notifications" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/profiles/{user}/notifications",
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
curl -X DELETE "http://heraldsofcosmos.dev/api/profiles/{user}/notifications/{notification}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/profiles/{user}/notifications/{notification}",
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

<!-- START_0a74816f6409e89e5fc8538015f2b907 -->
## Display the available roles

> Example request:

```bash
curl -X GET "http://heraldsofcosmos.dev/api/roles" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/roles",
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
`GET api/roles`

`HEAD api/roles`


<!-- END_0a74816f6409e89e5fc8538015f2b907 -->

<!-- START_90c780acaefab9740431579512d07101 -->
## Create a new role

> Example request:

```bash
curl -X POST "http://heraldsofcosmos.dev/api/roles" \
-H "Accept: application/json" \
    -d "name"="sint" \
    -d "permissions"="sint" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/roles",
    "method": "POST",
    "data": {
        "name": "sint",
        "permissions": "sint"
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
`POST api/roles`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    permissions | array |  optional  | 

<!-- END_90c780acaefab9740431579512d07101 -->

<!-- START_729c0798319f1e2189d3b992301e43c3 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET "http://heraldsofcosmos.dev/api/roles/{role}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/roles/{role}",
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
`GET api/roles/{role}`

`HEAD api/roles/{role}`


<!-- END_729c0798319f1e2189d3b992301e43c3 -->

<!-- START_cccebfff0074c9c5f499e215eee84e86 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://heraldsofcosmos.dev/api/roles/{role}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/roles/{role}",
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
`PUT api/roles/{role}`

`PATCH api/roles/{role}`


<!-- END_cccebfff0074c9c5f499e215eee84e86 -->

<!-- START_9aab750214722ffceebef64f24a2e175 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://heraldsofcosmos.dev/api/roles/{role}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/roles/{role}",
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
`DELETE api/roles/{role}`


<!-- END_9aab750214722ffceebef64f24a2e175 -->

<!-- START_b741d788ee091deb96b16ee28f4c0bef -->
## List the permissions of the current role.

> Example request:

```bash
curl -X GET "http://heraldsofcosmos.dev/api/roles/{role}/permissions" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/roles/{role}/permissions",
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
`GET api/roles/{role}/permissions`

`HEAD api/roles/{role}/permissions`


<!-- END_b741d788ee091deb96b16ee28f4c0bef -->

<!-- START_2d70379c2bc2d12f30eec9ea0ca8ad73 -->
## Attach some new permissions to a role.

> Example request:

```bash
curl -X POST "http://heraldsofcosmos.dev/api/roles/{role}/permissions" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/roles/{role}/permissions",
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
`POST api/roles/{role}/permissions`


<!-- END_2d70379c2bc2d12f30eec9ea0ca8ad73 -->

<!-- START_de4c8d517ce95782061d99243f1cb8b2 -->
## Detach some permissions from given role.

> Example request:

```bash
curl -X DELETE "http://heraldsofcosmos.dev/api/roles/{role}/permissions/{permission}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/roles/{role}/permissions/{permission}",
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
`DELETE api/roles/{role}/permissions/{permission}`


<!-- END_de4c8d517ce95782061d99243f1cb8b2 -->

<!-- START_be4838d817ca0dcbda905d3e97b3ed94 -->
## Display available permissions

> Example request:

```bash
curl -X GET "http://heraldsofcosmos.dev/api/permissions" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/permissions",
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
`GET api/permissions`

`HEAD api/permissions`


<!-- END_be4838d817ca0dcbda905d3e97b3ed94 -->

<!-- START_d513e82f79d47649a14d2e59fda93073 -->
## Create a new Permission.

> Example request:

```bash
curl -X POST "http://heraldsofcosmos.dev/api/permissions" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/permissions",
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
`POST api/permissions`


<!-- END_d513e82f79d47649a14d2e59fda93073 -->

<!-- START_eb587fdee0d7d9067d7cbc4910720b9c -->
## Display a permission.

> Example request:

```bash
curl -X GET "http://heraldsofcosmos.dev/api/permissions/{permission}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/permissions/{permission}",
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
`GET api/permissions/{permission}`

`HEAD api/permissions/{permission}`


<!-- END_eb587fdee0d7d9067d7cbc4910720b9c -->

<!-- START_cbdd1fce06181b5d5d8d0f3ae85ed0ee -->
## Update a Permission with request parameters.

> Example request:

```bash
curl -X PUT "http://heraldsofcosmos.dev/api/permissions/{permission}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/permissions/{permission}",
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
`PUT api/permissions/{permission}`

`PATCH api/permissions/{permission}`


<!-- END_cbdd1fce06181b5d5d8d0f3ae85ed0ee -->

<!-- START_58309983000c47ce901812498144165a -->
## Delete a permission.

> Example request:

```bash
curl -X DELETE "http://heraldsofcosmos.dev/api/permissions/{permission}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/permissions/{permission}",
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
`DELETE api/permissions/{permission}`


<!-- END_58309983000c47ce901812498144165a -->

<!-- START_aca4c7d1097ae6ac1276214822273d5c -->
## api/user/{user}/roles

> Example request:

```bash
curl -X POST "http://heraldsofcosmos.dev/api/user/{user}/roles" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/user/{user}/roles",
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
`POST api/user/{user}/roles`


<!-- END_aca4c7d1097ae6ac1276214822273d5c -->

<!-- START_35f3b46f0f4f65205b95bfb5e5f7cfa2 -->
## api/user/{user}/roles

> Example request:

```bash
curl -X DELETE "http://heraldsofcosmos.dev/api/user/{user}/roles" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/user/{user}/roles",
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
`DELETE api/user/{user}/roles`


<!-- END_35f3b46f0f4f65205b95bfb5e5f7cfa2 -->

<!-- START_9f8023949dfe34a20ad59f484bccc733 -->
## api/user/{user}/permissions

> Example request:

```bash
curl -X POST "http://heraldsofcosmos.dev/api/user/{user}/permissions" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/user/{user}/permissions",
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
`POST api/user/{user}/permissions`


<!-- END_9f8023949dfe34a20ad59f484bccc733 -->

<!-- START_dd3c4444426a5f6b0408536b21fa7334 -->
## api/user/{user}/permissions

> Example request:

```bash
curl -X DELETE "http://heraldsofcosmos.dev/api/user/{user}/permissions" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://heraldsofcosmos.dev/api/user/{user}/permissions",
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
`DELETE api/user/{user}/permissions`


<!-- END_dd3c4444426a5f6b0408536b21fa7334 -->

