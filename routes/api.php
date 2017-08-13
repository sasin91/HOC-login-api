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
Route::name('me.photo')->post('photo', 'Me\PhotoController@store');
Route::name('user.photo')->post('users/{user}/photo', 'User\PhotoController@store');

Route::name('users.search')->get('users-search', 'UserSearchController@show');

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

Route::name('threads.index')->get('threads', 'ThreadsController@index');
Route::name('threads.store')->post('threads', 'ThreadsController@store');

Route::name('threads.show')->get('threads/{channel}/{thread}', 'ThreadsController@show');
Route::name('threads.destroy')->delete('threads/{channel}/{thread}', 'ThreadsController@destroy');

Route::name('channel.show')->get('threads/{channel}', 'ThreadsController@index');
Route::get('/threads/{channel}/{thread}/replies', 'RepliesController@index');
Route::post('/threads/{channel}/{thread}/replies', 'RepliesController@store');
Route::match(['PUT','PATCH'],'/replies/{reply}', 'RepliesController@update');
Route::delete('/replies/{reply}', 'RepliesController@destroy');

Route::post('/threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsController@store')->middleware('auth');
Route::delete('/threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsController@destroy')->middleware('auth');

Route::post('/replies/{reply}/favorites', 'FavoritesController@store');
Route::delete('/replies/{reply}/favorites', 'FavoritesController@destroy');

Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');
Route::get('/profiles/{user}/notifications', 'UserNotificationsController@index');
Route::delete('/profiles/{user}/notifications/{notification}', 'UserNotificationsController@destroy');