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
[]
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
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "creator_id": 2,
            "topic": "Nisi eos incidunt amet saepe in.",
            "description": "disintermediate synergistic infrastructures",
            "created_at": "2017-08-19 11:50:40",
            "updated_at": "2017-08-19 11:50:40",
            "channels": [
                {
                    "id": 1,
                    "creator_id": 3,
                    "board_id": 1,
                    "name": "exercitationem",
                    "slug": "exercitationem",
                    "photo_path": null,
                    "created_at": "2017-08-19 11:50:40",
                    "updated_at": "2017-08-19 11:50:40",
                    "photo_url": "http:\/\/via.placeholder.com\/800x600"
                }
            ]
        },
        {
            "id": 2,
            "creator_id": 5,
            "topic": "Animi cum voluptatem eligendi.",
            "description": "embrace wireless networks",
            "created_at": "2017-08-19 11:50:40",
            "updated_at": "2017-08-19 11:50:40",
            "channels": [
                {
                    "id": 2,
                    "creator_id": 6,
                    "board_id": 2,
                    "name": "rem",
                    "slug": "rem",
                    "photo_path": null,
                    "created_at": "2017-08-19 11:50:40",
                    "updated_at": "2017-08-19 11:50:40",
                    "photo_url": "http:\/\/via.placeholder.com\/800x600"
                }
            ]
        },
        {
            "id": 3,
            "creator_id": 8,
            "topic": "Occaecati aut quasi autem alias sapiente consectetur inventore.",
            "description": "transform 24\/365 portals",
            "created_at": "2017-08-19 11:50:40",
            "updated_at": "2017-08-19 11:50:40",
            "channels": [
                {
                    "id": 3,
                    "creator_id": 9,
                    "board_id": 3,
                    "name": "culpa",
                    "slug": "culpa",
                    "photo_path": null,
                    "created_at": "2017-08-19 11:50:40",
                    "updated_at": "2017-08-19 11:50:40",
                    "photo_url": "http:\/\/via.placeholder.com\/800x600"
                }
            ]
        },
        {
            "id": 4,
            "creator_id": 11,
            "topic": "Earum velit omnis et ea.",
            "description": "morph compelling infrastructures",
            "created_at": "2017-08-19 11:50:40",
            "updated_at": "2017-08-19 11:50:40",
            "channels": [
                {
                    "id": 4,
                    "creator_id": 12,
                    "board_id": 4,
                    "name": "ut",
                    "slug": "ut",
                    "photo_path": null,
                    "created_at": "2017-08-19 11:50:40",
                    "updated_at": "2017-08-19 11:50:40",
                    "photo_url": "http:\/\/via.placeholder.com\/800x600"
                }
            ]
        },
        {
            "id": 5,
            "creator_id": 14,
            "topic": "Consequatur accusantium ullam qui et.",
            "description": "facilitate extensible functionalities",
            "created_at": "2017-08-19 11:50:40",
            "updated_at": "2017-08-19 11:50:40",
            "channels": [
                {
                    "id": 5,
                    "creator_id": 15,
                    "board_id": 5,
                    "name": "tempora",
                    "slug": "tempora",
                    "photo_path": null,
                    "created_at": "2017-08-19 11:50:40",
                    "updated_at": "2017-08-19 11:50:40",
                    "photo_url": "http:\/\/via.placeholder.com\/800x600"
                }
            ]
        },
        {
            "id": 6,
            "creator_id": 17,
            "topic": "Veniam enim sit voluptatum et.",
            "description": "cultivate open-source action-items",
            "created_at": "2017-08-19 11:50:40",
            "updated_at": "2017-08-19 11:50:40",
            "channels": [
                {
                    "id": 6,
                    "creator_id": 18,
                    "board_id": 6,
                    "name": "quibusdam",
                    "slug": "quibusdam",
                    "photo_path": null,
                    "created_at": "2017-08-19 11:50:40",
                    "updated_at": "2017-08-19 11:50:40",
                    "photo_url": "http:\/\/via.placeholder.com\/800x600"
                }
            ]
        },
        {
            "id": 7,
            "creator_id": 20,
            "topic": "Et ea voluptatem sapiente ad.",
            "description": "syndicate value-added convergence",
            "created_at": "2017-08-19 11:50:40",
            "updated_at": "2017-08-19 11:50:40",
            "channels": [
                {
                    "id": 7,
                    "creator_id": 21,
                    "board_id": 7,
                    "name": "praesentium",
                    "slug": "praesentium",
                    "photo_path": null,
                    "created_at": "2017-08-19 11:50:40",
                    "updated_at": "2017-08-19 11:50:40",
                    "photo_url": "http:\/\/via.placeholder.com\/800x600"
                }
            ]
        },
        {
            "id": 8,
            "creator_id": 23,
            "topic": "Explicabo quia autem quae earum.",
            "description": "architect dynamic webservices",
            "created_at": "2017-08-19 11:50:40",
            "updated_at": "2017-08-19 11:50:40",
            "channels": [
                {
                    "id": 8,
                    "creator_id": 24,
                    "board_id": 8,
                    "name": "consequatur",
                    "slug": "consequatur",
                    "photo_path": null,
                    "created_at": "2017-08-19 11:50:40",
                    "updated_at": "2017-08-19 11:50:40",
                    "photo_url": "http:\/\/via.placeholder.com\/800x600"
                }
            ]
        },
        {
            "id": 9,
            "creator_id": 26,
            "topic": "Accusamus consequatur eos ut qui et rem ipsum.",
            "description": "utilize value-added niches",
            "created_at": "2017-08-19 11:50:40",
            "updated_at": "2017-08-19 11:50:40",
            "channels": [
                {
                    "id": 9,
                    "creator_id": 27,
                    "board_id": 9,
                    "name": "optio",
                    "slug": "optio",
                    "photo_path": null,
                    "created_at": "2017-08-19 11:50:40",
                    "updated_at": "2017-08-19 11:50:40",
                    "photo_url": "http:\/\/via.placeholder.com\/800x600"
                }
            ]
        },
        {
            "id": 10,
            "creator_id": 29,
            "topic": "Iste sit hic reprehenderit.",
            "description": "grow efficient markets",
            "created_at": "2017-08-19 11:50:40",
            "updated_at": "2017-08-19 11:50:40",
            "channels": [
                {
                    "id": 10,
                    "creator_id": 30,
                    "board_id": 10,
                    "name": "aut",
                    "slug": "aut",
                    "photo_path": null,
                    "created_at": "2017-08-19 11:50:40",
                    "updated_at": "2017-08-19 11:50:40",
                    "photo_url": "http:\/\/via.placeholder.com\/800x600"
                }
            ]
        },
        {
            "id": 11,
            "creator_id": 32,
            "topic": "Non aut cum non quia.",
            "description": "redefine out-of-the-box functionalities",
            "created_at": "2017-08-19 11:50:40",
            "updated_at": "2017-08-19 11:50:40",
            "channels": [
                {
                    "id": 11,
                    "creator_id": 33,
                    "board_id": 11,
                    "name": "ut",
                    "slug": "ut",
                    "photo_path": null,
                    "created_at": "2017-08-19 11:50:40",
                    "updated_at": "2017-08-19 11:50:40",
                    "photo_url": "http:\/\/via.placeholder.com\/800x600"
                }
            ]
        },
        {
            "id": 12,
            "creator_id": 36,
            "topic": "Nihil eum optio ut est id aut.",
            "description": "syndicate one-to-one initiatives",
            "created_at": "2017-08-19 11:50:40",
            "updated_at": "2017-08-19 11:50:40",
            "channels": [
                {
                    "id": 12,
                    "creator_id": 37,
                    "board_id": 12,
                    "name": "architecto",
                    "slug": "architecto",
                    "photo_path": null,
                    "created_at": "2017-08-19 11:50:40",
                    "updated_at": "2017-08-19 11:50:40",
                    "photo_url": "http:\/\/via.placeholder.com\/800x600"
                }
            ]
        },
        {
            "id": 13,
            "creator_id": 40,
            "topic": "Repellat accusantium et illo est.",
            "description": "generate front-end eyeballs",
            "created_at": "2017-08-19 11:50:40",
            "updated_at": "2017-08-19 11:50:40",
            "channels": [
                {
                    "id": 13,
                    "creator_id": 41,
                    "board_id": 13,
                    "name": "iusto",
                    "slug": "iusto",
                    "photo_path": null,
                    "created_at": "2017-08-19 11:50:40",
                    "updated_at": "2017-08-19 11:50:40",
                    "photo_url": "http:\/\/via.placeholder.com\/800x600"
                }
            ]
        },
        {
            "id": 14,
            "creator_id": 44,
            "topic": "Quam nobis fugit et.",
            "description": "strategize global functionalities",
            "created_at": "2017-08-19 11:50:40",
            "updated_at": "2017-08-19 11:50:40",
            "channels": [
                {
                    "id": 14,
                    "creator_id": 45,
                    "board_id": 14,
                    "name": "est",
                    "slug": "est",
                    "photo_path": null,
                    "created_at": "2017-08-19 11:50:40",
                    "updated_at": "2017-08-19 11:50:40",
                    "photo_url": "http:\/\/via.placeholder.com\/800x600"
                }
            ]
        },
        {
            "id": 15,
            "creator_id": 48,
            "topic": "Est sint eos aut eos et aspernatur.",
            "description": "unleash virtual content",
            "created_at": "2017-08-19 11:50:40",
            "updated_at": "2017-08-19 11:50:40",
            "channels": [
                {
                    "id": 15,
                    "creator_id": 49,
                    "board_id": 15,
                    "name": "sint",
                    "slug": "sint",
                    "photo_path": null,
                    "created_at": "2017-08-19 11:50:40",
                    "updated_at": "2017-08-19 11:50:40",
                    "photo_url": "http:\/\/via.placeholder.com\/800x600"
                }
            ]
        }
    ],
    "from": 1,
    "last_page": 5,
    "next_page_url": "http:\/\/localhostapi\/board?=2",
    "path": "http:\/\/localhostapi\/board",
    "per_page": 15,
    "prev_page_url": null,
    "to": 15,
    "total": 70
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
{
    "id": 1,
    "creator_id": 2,
    "topic": "Nisi eos incidunt amet saepe in.",
    "description": "disintermediate synergistic infrastructures",
    "created_at": "2017-08-19 11:50:40",
    "updated_at": "2017-08-19 11:50:40",
    "creator": {
        "id": 2,
        "name": "Ralph Hand",
        "email": "amanda05@example.com",
        "photo_path": null,
        "created_at": "2017-08-19 11:50:40",
        "updated_at": "2017-08-19 11:50:40",
        "token": null
    },
    "channels": [
        {
            "id": 1,
            "creator_id": 3,
            "board_id": 1,
            "name": "exercitationem",
            "slug": "exercitationem",
            "photo_path": null,
            "created_at": "2017-08-19 11:50:40",
            "updated_at": "2017-08-19 11:50:40",
            "photo_url": "http:\/\/via.placeholder.com\/800x600"
        }
    ]
}
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
[
    {
        "id": 1,
        "creator_id": 3,
        "board_id": 1,
        "name": "exercitationem",
        "slug": "exercitationem",
        "photo_path": null,
        "created_at": "2017-08-19 11:50:40",
        "updated_at": "2017-08-19 11:50:40",
        "photo_url": "http:\/\/via.placeholder.com\/800x600"
    }
]
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
{
    "current_page": 1,
    "data": [
        {
            "id": 48,
            "user_id": 179,
            "channel_id": 48,
            "replies_count": 1,
            "title": "Inventore ut mollitia voluptatem vel harum.",
            "body": "Ut dolor quas nobis distinctio. Assumenda officia sequi sed explicabo officiis incidunt a. Itaque quos est doloremque minus.",
            "created_at": "2017-08-19 11:50:41",
            "updated_at": "2017-08-19 11:50:41",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/incidunt\/48",
                "creator": "http:\/\/localhost\/api\/profiles\/179",
                "channel": "http:\/\/localhost\/api\/channel\/incidunt",
                "replies": "http:\/\/localhost\/api\/threads\/incidunt\/48\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/incidunt\/48\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/incidunt\/48\/subscriptions"
            },
            "creator": {
                "id": 179,
                "name": "Joanny Koch",
                "email": "arch.okeefe@example.com",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:40",
                "updated_at": "2017-08-19 11:50:40",
                "token": null
            },
            "channel": {
                "id": 48,
                "creator_id": 181,
                "board_id": 48,
                "name": "incidunt",
                "slug": "incidunt",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 49,
            "user_id": 183,
            "channel_id": 49,
            "replies_count": 1,
            "title": "Quas harum deserunt molestiae.",
            "body": "Ullam quia accusamus aliquam similique fugit et laudantium. Corporis itaque dignissimos aut beatae voluptas sed. Itaque dolorum incidunt eveniet fugiat atque totam odit. Quaerat non corrupti sapiente enim et debitis nostrum.",
            "created_at": "2017-08-19 11:50:41",
            "updated_at": "2017-08-19 11:50:41",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/laborum\/49",
                "creator": "http:\/\/localhost\/api\/profiles\/183",
                "channel": "http:\/\/localhost\/api\/channel\/laborum",
                "replies": "http:\/\/localhost\/api\/threads\/laborum\/49\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/laborum\/49\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/laborum\/49\/subscriptions"
            },
            "creator": {
                "id": 183,
                "name": "Maybelle Rogahn",
                "email": "dibbert.mason@example.org",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "token": null
            },
            "channel": {
                "id": 49,
                "creator_id": 185,
                "board_id": 49,
                "name": "laborum",
                "slug": "laborum",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 50,
            "user_id": 187,
            "channel_id": 50,
            "replies_count": 1,
            "title": "Possimus natus non earum vero.",
            "body": "Dicta aliquid est sit voluptas consectetur. Dicta voluptatum veniam eligendi libero. Dicta praesentium dolorum eos.",
            "created_at": "2017-08-19 11:50:41",
            "updated_at": "2017-08-19 11:50:41",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/quia\/50",
                "creator": "http:\/\/localhost\/api\/profiles\/187",
                "channel": "http:\/\/localhost\/api\/channel\/quia",
                "replies": "http:\/\/localhost\/api\/threads\/quia\/50\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/quia\/50\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/quia\/50\/subscriptions"
            },
            "creator": {
                "id": 187,
                "name": "Dorthy Schinner",
                "email": "antonina.waters@example.org",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "token": null
            },
            "channel": {
                "id": 50,
                "creator_id": 189,
                "board_id": 50,
                "name": "quia",
                "slug": "quia",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 51,
            "user_id": 191,
            "channel_id": 51,
            "replies_count": 1,
            "title": "Ab molestiae omnis dolor.",
            "body": "Quisquam quae est aut sed exercitationem labore quos. Dignissimos optio et officiis praesentium. Officiis dolorum eum consequatur enim est cum et. Repellat sunt vitae maxime voluptatem et dolore est reiciendis.",
            "created_at": "2017-08-19 11:50:41",
            "updated_at": "2017-08-19 11:50:41",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/et\/51",
                "creator": "http:\/\/localhost\/api\/profiles\/191",
                "channel": "http:\/\/localhost\/api\/channel\/et",
                "replies": "http:\/\/localhost\/api\/threads\/et\/51\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/et\/51\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/et\/51\/subscriptions"
            },
            "creator": {
                "id": 191,
                "name": "Houston McLaughlin",
                "email": "jaylen26@example.net",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "token": null
            },
            "channel": {
                "id": 51,
                "creator_id": 193,
                "board_id": 51,
                "name": "et",
                "slug": "et",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 52,
            "user_id": 195,
            "channel_id": 52,
            "replies_count": 1,
            "title": "Amet quis est sit voluptatem similique cupiditate.",
            "body": "Unde vel reprehenderit commodi recusandae sint quod. Corporis sit dolorem perferendis possimus. Deleniti quae non voluptas expedita eos delectus voluptas. Veritatis maxime qui eum ut in ratione dolorem architecto.",
            "created_at": "2017-08-19 11:50:41",
            "updated_at": "2017-08-19 11:50:41",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/possimus\/52",
                "creator": "http:\/\/localhost\/api\/profiles\/195",
                "channel": "http:\/\/localhost\/api\/channel\/possimus",
                "replies": "http:\/\/localhost\/api\/threads\/possimus\/52\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/possimus\/52\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/possimus\/52\/subscriptions"
            },
            "creator": {
                "id": 195,
                "name": "Loyce Krajcik",
                "email": "zoie02@example.net",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "token": null
            },
            "channel": {
                "id": 52,
                "creator_id": 197,
                "board_id": 52,
                "name": "possimus",
                "slug": "possimus",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 53,
            "user_id": 199,
            "channel_id": 53,
            "replies_count": 1,
            "title": "Enim esse maxime ut corporis occaecati et.",
            "body": "Saepe deserunt explicabo nihil cumque. Iste alias omnis amet quibusdam doloribus consequatur praesentium. Facere illum vero distinctio voluptate in. Modi et aut dolore magnam aut ullam nemo voluptatum.",
            "created_at": "2017-08-19 11:50:41",
            "updated_at": "2017-08-19 11:50:41",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/rerum\/53",
                "creator": "http:\/\/localhost\/api\/profiles\/199",
                "channel": "http:\/\/localhost\/api\/channel\/rerum",
                "replies": "http:\/\/localhost\/api\/threads\/rerum\/53\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/rerum\/53\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/rerum\/53\/subscriptions"
            },
            "creator": {
                "id": 199,
                "name": "Malika McGlynn",
                "email": "mariana19@example.net",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "token": null
            },
            "channel": {
                "id": 53,
                "creator_id": 201,
                "board_id": 53,
                "name": "rerum",
                "slug": "rerum",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 54,
            "user_id": 203,
            "channel_id": 54,
            "replies_count": 1,
            "title": "Dolor ex repellendus quia magni voluptatem voluptas.",
            "body": "Ut eaque eum corrupti itaque voluptate debitis hic et. Et et nisi sit ex ut optio vel. Rerum dignissimos rerum quisquam culpa dolorum amet similique odio. Autem blanditiis aspernatur autem quia praesentium.",
            "created_at": "2017-08-19 11:50:41",
            "updated_at": "2017-08-19 11:50:41",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/aut\/54",
                "creator": "http:\/\/localhost\/api\/profiles\/203",
                "channel": "http:\/\/localhost\/api\/channel\/aut",
                "replies": "http:\/\/localhost\/api\/threads\/aut\/54\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/aut\/54\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/aut\/54\/subscriptions"
            },
            "creator": {
                "id": 203,
                "name": "Dr. Otto Bechtelar III",
                "email": "jackson.toy@example.org",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "token": null
            },
            "channel": {
                "id": 54,
                "creator_id": 205,
                "board_id": 54,
                "name": "aut",
                "slug": "aut",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 55,
            "user_id": 207,
            "channel_id": 55,
            "replies_count": 1,
            "title": "Eum modi autem tenetur consectetur quasi pariatur dolores.",
            "body": "Est aut sunt in. Debitis qui et quo rerum. Repellat a voluptas saepe dicta ratione. Consequuntur ut commodi cum harum rerum explicabo.",
            "created_at": "2017-08-19 11:50:41",
            "updated_at": "2017-08-19 11:50:41",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/ut\/55",
                "creator": "http:\/\/localhost\/api\/profiles\/207",
                "channel": "http:\/\/localhost\/api\/channel\/ut",
                "replies": "http:\/\/localhost\/api\/threads\/ut\/55\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/ut\/55\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/ut\/55\/subscriptions"
            },
            "creator": {
                "id": 207,
                "name": "Prof. Jalen Yundt II",
                "email": "kebert@example.net",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "token": null
            },
            "channel": {
                "id": 55,
                "creator_id": 209,
                "board_id": 55,
                "name": "ut",
                "slug": "ut",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 56,
            "user_id": 211,
            "channel_id": 56,
            "replies_count": 1,
            "title": "Occaecati voluptas temporibus perspiciatis nam doloremque.",
            "body": "Laboriosam quaerat dolor fugiat repellat. Rerum qui sint deserunt animi omnis iste cumque tempora. In corrupti vel nisi quidem omnis.",
            "created_at": "2017-08-19 11:50:41",
            "updated_at": "2017-08-19 11:50:41",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/autem\/56",
                "creator": "http:\/\/localhost\/api\/profiles\/211",
                "channel": "http:\/\/localhost\/api\/channel\/autem",
                "replies": "http:\/\/localhost\/api\/threads\/autem\/56\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/autem\/56\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/autem\/56\/subscriptions"
            },
            "creator": {
                "id": 211,
                "name": "Kolby Braun",
                "email": "willms.laurine@example.com",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "token": null
            },
            "channel": {
                "id": 56,
                "creator_id": 213,
                "board_id": 56,
                "name": "autem",
                "slug": "autem",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 57,
            "user_id": 215,
            "channel_id": 57,
            "replies_count": 1,
            "title": "Dignissimos rerum debitis a ut dolore eos.",
            "body": "Quis mollitia voluptatem quo maiores voluptatibus aspernatur non ut. Voluptatem exercitationem consequatur distinctio velit asperiores et eaque. Sed sit sint quod iure beatae dolorem sed. Eaque illum tempora molestias.",
            "created_at": "2017-08-19 11:50:41",
            "updated_at": "2017-08-19 11:50:41",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/voluptas\/57",
                "creator": "http:\/\/localhost\/api\/profiles\/215",
                "channel": "http:\/\/localhost\/api\/channel\/voluptas",
                "replies": "http:\/\/localhost\/api\/threads\/voluptas\/57\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/voluptas\/57\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/voluptas\/57\/subscriptions"
            },
            "creator": {
                "id": 215,
                "name": "Chad McCullough",
                "email": "leannon.maya@example.org",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "token": null
            },
            "channel": {
                "id": 57,
                "creator_id": 217,
                "board_id": 57,
                "name": "voluptas",
                "slug": "voluptas",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 58,
            "user_id": 219,
            "channel_id": 58,
            "replies_count": 1,
            "title": "Consequatur esse rem expedita ratione sit sit aut est.",
            "body": "Modi totam voluptatum in temporibus molestiae cum provident. Eveniet quasi nisi omnis distinctio aut nobis velit. Occaecati pariatur enim officia in rerum eligendi.",
            "created_at": "2017-08-19 11:50:41",
            "updated_at": "2017-08-19 11:50:41",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/harum\/58",
                "creator": "http:\/\/localhost\/api\/profiles\/219",
                "channel": "http:\/\/localhost\/api\/channel\/harum",
                "replies": "http:\/\/localhost\/api\/threads\/harum\/58\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/harum\/58\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/harum\/58\/subscriptions"
            },
            "creator": {
                "id": 219,
                "name": "Marvin O'Kon",
                "email": "ostiedemann@example.org",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "token": null
            },
            "channel": {
                "id": 58,
                "creator_id": 221,
                "board_id": 58,
                "name": "harum",
                "slug": "harum",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 59,
            "user_id": 223,
            "channel_id": 59,
            "replies_count": 1,
            "title": "Aut ducimus et maxime incidunt.",
            "body": "Et reprehenderit quod ab necessitatibus doloribus suscipit sunt non. Quia officia et qui aut omnis. Animi neque id consequatur. Animi aperiam esse aut tenetur unde consequuntur.",
            "created_at": "2017-08-19 11:50:41",
            "updated_at": "2017-08-19 11:50:41",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/qui\/59",
                "creator": "http:\/\/localhost\/api\/profiles\/223",
                "channel": "http:\/\/localhost\/api\/channel\/qui",
                "replies": "http:\/\/localhost\/api\/threads\/qui\/59\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/qui\/59\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/qui\/59\/subscriptions"
            },
            "creator": {
                "id": 223,
                "name": "Ayana Glover I",
                "email": "rbuckridge@example.net",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "token": null
            },
            "channel": {
                "id": 59,
                "creator_id": 225,
                "board_id": 59,
                "name": "qui",
                "slug": "qui",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 60,
            "user_id": 227,
            "channel_id": 60,
            "replies_count": 1,
            "title": "Expedita et deserunt quos aut ut quis et unde.",
            "body": "Autem occaecati voluptates dignissimos. Similique alias et consequuntur. Dolores iste ipsum ex cumque commodi ut.",
            "created_at": "2017-08-19 11:50:41",
            "updated_at": "2017-08-19 11:50:41",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/rem\/60",
                "creator": "http:\/\/localhost\/api\/profiles\/227",
                "channel": "http:\/\/localhost\/api\/channel\/rem",
                "replies": "http:\/\/localhost\/api\/threads\/rem\/60\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/rem\/60\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/rem\/60\/subscriptions"
            },
            "creator": {
                "id": 227,
                "name": "Adell Yundt",
                "email": "mohr.anibal@example.net",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "token": null
            },
            "channel": {
                "id": 60,
                "creator_id": 229,
                "board_id": 60,
                "name": "rem",
                "slug": "rem",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 61,
            "user_id": 231,
            "channel_id": 61,
            "replies_count": 1,
            "title": "Et quia quam alias qui sequi voluptatem ex fuga.",
            "body": "Quaerat atque qui eum nisi aperiam. Quia qui maiores quasi sequi. Dicta rerum eum ea eius iste.",
            "created_at": "2017-08-19 11:50:41",
            "updated_at": "2017-08-19 11:50:41",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/itaque\/61",
                "creator": "http:\/\/localhost\/api\/profiles\/231",
                "channel": "http:\/\/localhost\/api\/channel\/itaque",
                "replies": "http:\/\/localhost\/api\/threads\/itaque\/61\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/itaque\/61\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/itaque\/61\/subscriptions"
            },
            "creator": {
                "id": 231,
                "name": "Dianna Mitchell Sr.",
                "email": "ezekiel53@example.com",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "token": null
            },
            "channel": {
                "id": 61,
                "creator_id": 233,
                "board_id": 61,
                "name": "itaque",
                "slug": "itaque",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 62,
            "user_id": 235,
            "channel_id": 62,
            "replies_count": 1,
            "title": "Nemo vel veritatis rerum tempora possimus quae porro voluptatum.",
            "body": "Suscipit sapiente veritatis quaerat et eveniet soluta. Dolorem corporis iure nihil ratione inventore ab. Autem molestias non saepe molestiae. Libero numquam placeat est voluptas itaque molestiae similique. Reprehenderit hic quidem asperiores quaerat placeat omnis.",
            "created_at": "2017-08-19 11:50:41",
            "updated_at": "2017-08-19 11:50:41",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/cupiditate\/62",
                "creator": "http:\/\/localhost\/api\/profiles\/235",
                "channel": "http:\/\/localhost\/api\/channel\/cupiditate",
                "replies": "http:\/\/localhost\/api\/threads\/cupiditate\/62\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/cupiditate\/62\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/cupiditate\/62\/subscriptions"
            },
            "creator": {
                "id": 235,
                "name": "Dr. Demarcus Walsh",
                "email": "jschneider@example.org",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "token": null
            },
            "channel": {
                "id": 62,
                "creator_id": 237,
                "board_id": 62,
                "name": "cupiditate",
                "slug": "cupiditate",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 63,
            "user_id": 239,
            "channel_id": 63,
            "replies_count": 1,
            "title": "Deserunt dignissimos unde est est.",
            "body": "Illum quis sed sed dolor consectetur. Itaque tempore blanditiis aut aut architecto.",
            "created_at": "2017-08-19 11:50:41",
            "updated_at": "2017-08-19 11:50:41",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/accusamus\/63",
                "creator": "http:\/\/localhost\/api\/profiles\/239",
                "channel": "http:\/\/localhost\/api\/channel\/accusamus",
                "replies": "http:\/\/localhost\/api\/threads\/accusamus\/63\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/accusamus\/63\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/accusamus\/63\/subscriptions"
            },
            "creator": {
                "id": 239,
                "name": "Urban Durgan V",
                "email": "aufderhar.winfield@example.net",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "token": null
            },
            "channel": {
                "id": 63,
                "creator_id": 241,
                "board_id": 63,
                "name": "accusamus",
                "slug": "accusamus",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 64,
            "user_id": 243,
            "channel_id": 64,
            "replies_count": 1,
            "title": "Atque eveniet consequuntur nihil dolore aut rerum.",
            "body": "Eos nihil placeat officia dolorem. Deserunt ut quidem voluptatem eveniet. Incidunt repellat est expedita quas. Facilis doloribus explicabo omnis.",
            "created_at": "2017-08-19 11:50:41",
            "updated_at": "2017-08-19 11:50:41",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/vel\/64",
                "creator": "http:\/\/localhost\/api\/profiles\/243",
                "channel": "http:\/\/localhost\/api\/channel\/vel",
                "replies": "http:\/\/localhost\/api\/threads\/vel\/64\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/vel\/64\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/vel\/64\/subscriptions"
            },
            "creator": {
                "id": 243,
                "name": "Mylene Quigley",
                "email": "bradley.smith@example.org",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "token": null
            },
            "channel": {
                "id": 64,
                "creator_id": 245,
                "board_id": 64,
                "name": "vel",
                "slug": "vel",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 65,
            "user_id": 247,
            "channel_id": 65,
            "replies_count": 1,
            "title": "Necessitatibus ducimus et aliquid ex possimus error consequuntur.",
            "body": "Voluptas ea et voluptatum. Corporis veritatis architecto nemo. Nulla nemo laborum recusandae debitis velit corporis minima et.",
            "created_at": "2017-08-19 11:50:41",
            "updated_at": "2017-08-19 11:50:41",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/sit\/65",
                "creator": "http:\/\/localhost\/api\/profiles\/247",
                "channel": "http:\/\/localhost\/api\/channel\/sit",
                "replies": "http:\/\/localhost\/api\/threads\/sit\/65\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/sit\/65\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/sit\/65\/subscriptions"
            },
            "creator": {
                "id": 247,
                "name": "Shirley Reichert",
                "email": "miller57@example.net",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "token": null
            },
            "channel": {
                "id": 65,
                "creator_id": 249,
                "board_id": 65,
                "name": "sit",
                "slug": "sit",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 66,
            "user_id": 251,
            "channel_id": 66,
            "replies_count": 1,
            "title": "Quidem vitae illo accusamus placeat similique dignissimos.",
            "body": "Error molestiae omnis rerum est qui et. Sequi possimus accusamus veniam exercitationem ullam sed. Mollitia natus expedita quaerat perspiciatis est molestiae.",
            "created_at": "2017-08-19 11:50:41",
            "updated_at": "2017-08-19 11:50:41",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/fuga\/66",
                "creator": "http:\/\/localhost\/api\/profiles\/251",
                "channel": "http:\/\/localhost\/api\/channel\/fuga",
                "replies": "http:\/\/localhost\/api\/threads\/fuga\/66\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/fuga\/66\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/fuga\/66\/subscriptions"
            },
            "creator": {
                "id": 251,
                "name": "Jake Carroll",
                "email": "nlangworth@example.org",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "token": null
            },
            "channel": {
                "id": 66,
                "creator_id": 253,
                "board_id": 66,
                "name": "fuga",
                "slug": "fuga",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 67,
            "user_id": 255,
            "channel_id": 67,
            "replies_count": 1,
            "title": "Exercitationem eum consequuntur eum quod fugiat omnis omnis.",
            "body": "Ut porro est dolor saepe consequatur aut. Officia autem suscipit dolore est optio. Perspiciatis earum sequi architecto adipisci et sint eveniet.",
            "created_at": "2017-08-19 11:50:41",
            "updated_at": "2017-08-19 11:50:41",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/labore\/67",
                "creator": "http:\/\/localhost\/api\/profiles\/255",
                "channel": "http:\/\/localhost\/api\/channel\/labore",
                "replies": "http:\/\/localhost\/api\/threads\/labore\/67\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/labore\/67\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/labore\/67\/subscriptions"
            },
            "creator": {
                "id": 255,
                "name": "Prof. Sterling Fadel",
                "email": "kerluke.camron@example.net",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "token": null
            },
            "channel": {
                "id": 67,
                "creator_id": 257,
                "board_id": 67,
                "name": "labore",
                "slug": "labore",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 68,
            "user_id": 259,
            "channel_id": 68,
            "replies_count": 1,
            "title": "Dolor nulla aliquam repellat sed vel.",
            "body": "Qui voluptates recusandae sapiente eligendi sunt. Ducimus culpa quae qui. Odio sed consectetur earum iste quam officia.",
            "created_at": "2017-08-19 11:50:41",
            "updated_at": "2017-08-19 11:50:41",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/numquam\/68",
                "creator": "http:\/\/localhost\/api\/profiles\/259",
                "channel": "http:\/\/localhost\/api\/channel\/numquam",
                "replies": "http:\/\/localhost\/api\/threads\/numquam\/68\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/numquam\/68\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/numquam\/68\/subscriptions"
            },
            "creator": {
                "id": 259,
                "name": "Velda Ratke",
                "email": "bashirian.mckenna@example.org",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "token": null
            },
            "channel": {
                "id": 68,
                "creator_id": 261,
                "board_id": 68,
                "name": "numquam",
                "slug": "numquam",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 69,
            "user_id": 263,
            "channel_id": 69,
            "replies_count": 1,
            "title": "Nesciunt tempore aspernatur aspernatur sed et laudantium.",
            "body": "Sed sit qui ea eligendi laborum vel. Fugiat officia eum aperiam soluta corrupti expedita repellat. Et et in voluptatum impedit totam perspiciatis.",
            "created_at": "2017-08-19 11:50:41",
            "updated_at": "2017-08-19 11:50:41",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/veniam\/69",
                "creator": "http:\/\/localhost\/api\/profiles\/263",
                "channel": "http:\/\/localhost\/api\/channel\/veniam",
                "replies": "http:\/\/localhost\/api\/threads\/veniam\/69\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/veniam\/69\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/veniam\/69\/subscriptions"
            },
            "creator": {
                "id": 263,
                "name": "Frederic Fritsch PhD",
                "email": "joshua13@example.org",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "token": null
            },
            "channel": {
                "id": 69,
                "creator_id": 265,
                "board_id": 69,
                "name": "veniam",
                "slug": "veniam",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 70,
            "user_id": 267,
            "channel_id": 70,
            "replies_count": 1,
            "title": "Nam est sit distinctio animi ut quia doloribus.",
            "body": "Aut facilis optio omnis non similique ea eius quaerat. Corporis quia magni facere labore earum. Corporis optio laboriosam eaque inventore dolor dolores. Incidunt ipsam saepe voluptatem suscipit unde earum enim.",
            "created_at": "2017-08-19 11:50:41",
            "updated_at": "2017-08-19 11:50:41",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/reiciendis\/70",
                "creator": "http:\/\/localhost\/api\/profiles\/267",
                "channel": "http:\/\/localhost\/api\/channel\/reiciendis",
                "replies": "http:\/\/localhost\/api\/threads\/reiciendis\/70\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/reiciendis\/70\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/reiciendis\/70\/subscriptions"
            },
            "creator": {
                "id": 267,
                "name": "Thalia Hilpert IV",
                "email": "clakin@example.com",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "token": null
            },
            "channel": {
                "id": 70,
                "creator_id": 269,
                "board_id": 70,
                "name": "reiciendis",
                "slug": "reiciendis",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:41",
                "updated_at": "2017-08-19 11:50:41",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 1,
            "user_id": 1,
            "channel_id": 1,
            "replies_count": 1,
            "title": "Nemo ex voluptatem repellat quos et reiciendis.",
            "body": "Perspiciatis expedita molestiae debitis repudiandae eos. Natus est nostrum officia. Dolores unde consequuntur impedit suscipit accusantium maxime.",
            "created_at": "2017-08-19 11:50:40",
            "updated_at": "2017-08-19 11:50:40",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/exercitationem\/1",
                "creator": "http:\/\/localhost\/api\/profiles\/1",
                "channel": "http:\/\/localhost\/api\/channel\/exercitationem",
                "replies": "http:\/\/localhost\/api\/threads\/exercitationem\/1\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/exercitationem\/1\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/exercitationem\/1\/subscriptions"
            },
            "creator": {
                "id": 1,
                "name": "Columbus Brakus",
                "email": "eudora.bednar@example.org",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:40",
                "updated_at": "2017-08-19 11:50:40",
                "token": null
            },
            "channel": {
                "id": 1,
                "creator_id": 3,
                "board_id": 1,
                "name": "exercitationem",
                "slug": "exercitationem",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:40",
                "updated_at": "2017-08-19 11:50:40",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        },
        {
            "id": 2,
            "user_id": 4,
            "channel_id": 2,
            "replies_count": 1,
            "title": "Maiores expedita quia accusantium eligendi dolores.",
            "body": "Doloremque asperiores autem minus voluptates enim voluptatem qui. Explicabo sapiente consequatur aliquam illum vitae et. Quo recusandae perspiciatis et nam. Sint saepe assumenda fuga. Molestiae facere voluptates quis aut illo culpa impedit.",
            "created_at": "2017-08-19 11:50:40",
            "updated_at": "2017-08-19 11:50:40",
            "isSubscribedTo": false,
            "links": {
                "self": "http:\/\/localhost\/api\/threads\/rem\/2",
                "creator": "http:\/\/localhost\/api\/profiles\/4",
                "channel": "http:\/\/localhost\/api\/channel\/rem",
                "replies": "http:\/\/localhost\/api\/threads\/rem\/2\/replies",
                "subscribe": "http:\/\/localhost\/api\/threads\/rem\/2\/subscriptions",
                "unsubscribe": "http:\/\/localhost\/api\/threads\/rem\/2\/subscriptions"
            },
            "creator": {
                "id": 4,
                "name": "Manley Hauck",
                "email": "ywisoky@example.org",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:40",
                "updated_at": "2017-08-19 11:50:40",
                "token": null
            },
            "channel": {
                "id": 2,
                "creator_id": 6,
                "board_id": 2,
                "name": "rem",
                "slug": "rem",
                "photo_path": null,
                "created_at": "2017-08-19 11:50:40",
                "updated_at": "2017-08-19 11:50:40",
                "photo_url": "http:\/\/via.placeholder.com\/800x600"
            }
        }
    ],
    "from": 1,
    "last_page": 3,
    "next_page_url": "http:\/\/localhostapi\/threads?page=2",
    "path": "http:\/\/localhostapi\/threads",
    "per_page": 25,
    "prev_page_url": null,
    "to": 25,
    "total": 70
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
{
    "user": {
        "id": 1,
        "name": "Columbus Brakus",
        "email": "eudora.bednar@example.org",
        "photo_path": null,
        "created_at": "2017-08-19 11:50:40",
        "updated_at": "2017-08-19 11:50:40",
        "token": null
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

