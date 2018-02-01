<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/stripe', function()
{
	\Stripe\Stripe::setApiKey("sk_test_g9VGk3bAEMjWvqBkSVONvQb7");

	// $plan = \Stripe\Plan::create([
	//     'currency' => 'eur',
	//     'interval' => 'month',
	//     'name' => 'Basic Plan',
	//     'amount' => 2000,
	// ]);

	// $customer = \Stripe\Customer::create([
	// 	'email' => 'crea2luxe@gmail.com',
	// 	'source' => [
	// 		'object' => 'card',
	// 		'exp_month' => 12,
	// 		'exp_year' => 2018,
	// 		'number' => 4242424242424242,
	// 		'currency' => 'eur',
	// 		'cvc' => 213,
	// 	],
	// ]);

	// $subscription = \Stripe\Subscription::create([
	//     'customer' => $customer->id,
	//     'items' => [['plan' => $plan->id]],
	// ]);

	// dd($plan, $customer, $subscription);
	dd(\Stripe\Subscription::all(array('limit'=>3)));
});

Auth::routes();

Route::group(['prefix' => 'report'], function() {
	Route::get('/', 'ReportController@index');
	Route::get('/{code}', 'ReportController@getReport')->where('code', '[a-zA-Z0-9]{8,12}');
});