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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('wechatLogin','UserController@wechatLogin');
Route::post('updateUserInfo','UserController@updateUserInfo');

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Http\Controllers\SellFriendsApi\V1\Controllers'], function ($api) {
        $api->get('showGirls','SellFriendsController@showGirls');
        $api->get('showBoys','SellFriendsController@showBoys');
        $api->get('showRecommends','SellFriendsController@showRecommends');
    });
});