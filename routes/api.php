<?php

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Route;

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
$api = app('Dingo\Api\Routing\Router');
$api->version('v1',[
    'namespace' => 'App\Http\Controllers'
],function ($api) {
    $api->group([
        'prefix'=>'promoter',
        'middleware' => ['auth:promoter']
    ],function($api){
        $api->get('/grouplist','PromoterGroupController@getlist');
        $api->post('/groupadd','PromoterGroupController@add');
        $api->put('/groupedit','PromoterGroupController@edit');
        $api->delete('/groupdel','PromoterGroupController@del');
    });
    $api->post('/promoter/login', 'PromoterController@login');

    // 网页记录用户姓名，手机号
    $api->group(['prefix'=>'plat'],function($api) {
        $api->post('/recorduser','PlatUserInfoController@add');
        $api->get('/getlist','PlatUserInfoController@getlist');
    });

});




