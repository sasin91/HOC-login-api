<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::name('me')->get('me', 'MeController@show');

Route::apiResource('servers', 'ServersController');

Route::namespace('Server')->prefix('server/{server}')->group(function () {
	Route::name('server.players')->get('players', 'PlayersController@index');
	Route::name('server.join')->post('join', 'JoinServerController@store');
	Route::name('server.leave')->post('leave', 'LeaveServerController@store');
});

Route::prefix('player/{player}')->group(function () {
	Route::name('player.show')->get('/', 'PlayerController@show');
	Route::name('player.delete')->delete('/', 'PlayerController@destroy');
	Route::name('player.update')->match(['PUT', 'PATCH'], '/', 'PlayerController@update');
});

Route::name('players.inactive')->get('inactive-players', 'Players\InactiveController@index');
Route::name('players.offline')->get('offline-players', 'Players\OfflineController@index');
Route::name('players.online')->get('online-players', 'Players\OnlineController@index');
Route::name('players.newbies')->get('newbie-players', 'Players\NewbiesController@index');