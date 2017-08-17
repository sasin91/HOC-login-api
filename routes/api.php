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

Route::prefix('server/{server}')->namespace('Server')->group(function () {
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
Route::name('thread.replies.index')->get('/threads/{channel}/{thread}/replies', 'RepliesController@index');
Route::name('thread.replies.store')->post('/threads/{channel}/{thread}/replies', 'RepliesController@store');
Route::name('replies.update')->match(['PUT','PATCH'],'/replies/{reply}', 'RepliesController@update');
Route::name('replies.destroy')->delete('/replies/{reply}', 'RepliesController@destroy');

Route::name('thread.subscriptions.store')->post('/threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsController@store')->middleware('auth');
Route::name('thread.subscriptions.destroy')->delete('/threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsController@destroy')->middleware('auth');

Route::name('reply.favorites.store')->post('/replies/{reply}/favorites', 'FavoritesController@store');
Route::name('reply.favorites.destroy')->delete('/replies/{reply}/favorites', 'FavoritesController@destroy');

Route::name('profile')->get('/profiles/{user}', 'ProfilesController@show');
Route::name('profile.notifications.index')->get('/profiles/{user}/notifications', 'UserNotificationsController@index');
Route::name('profile.notifications.destroy')->delete('/profiles/{user}/notifications/{notification}', 'UserNotificationsController@destroy');