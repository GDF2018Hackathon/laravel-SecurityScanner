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
	return 'sd';
    return $request->user();
});

Route::get('/', function()
{
	return response()->json([
	    'name' => 'Abigail',
	    'state' => 'CA'
	]);
});

Route::group(['prefix' => 'report'], function() {
	Route::get('/', 'ReportController@index');
	Route::get('/{code}', 'ReportController@getReport')->where('code', '[a-zA-Z0-9]{8,12}');
	Route::get('/mail/{code}', 'ReportController@sendMail')->where(['code' => '[a-zA-Z0-9]{8,12}']);

});

Route::middleware('auth:api')->group(function ()
{
	Route::group(['prefix' => 'scan'], function() {
		Route::get('/', 'ReportController@index');
		Route::get('/getListRepos/{username?}', 'ReposController@getListRepos');
		Route::get('/getDetailRepo/{name}', 'ReposController@getDetailRepo');
	});
});
