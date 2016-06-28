<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->get('/all/stats', 'App\Http\Controllers\AirportController@fetchAirportReviewsCount');
    $api->get('/{airport}/stats', 'App\Http\Controllers\AirportController@fetchAirportStats');
    $api->get('/{airport}/reviews', 'App\Http\Controllers\AirportController@fetchAirportReviews');
    $api->get('/{airportName}/{rating}/reviews', 'App\Http\Controllers\AirportController@fetchReviewForSpecificRatingAndAirport');
});