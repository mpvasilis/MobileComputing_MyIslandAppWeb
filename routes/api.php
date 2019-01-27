<?php

use Illuminate\Http\Request;
use App\Place;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/places', function() {
    $places= Place::all()->toArray();
    $places_count=Place::all()->count();
    return Response::json(array('status'=>"success",'count_total'=>(int) $places_count,'count'=>(int) $places_count,'pages'=>1,'places'=>$places));
});
Route::get('/places/{place_id}', function($place_id) {
    return Response::json(array('place'=>Place::find($place_id)));
});
Route::get('loadMore/{place_id}', 'PlaceController@loadMore'); 
Route::get('loadMoreImages/{place_id}', 'PlaceController@loadMoreImages'); 
Route::get('getBeachOverallRating/{place_id}', 'BeachRatingsController@getBeachOverallRating'); 
Route::post('rateBeach/{id}', 'BeachRatingsController@rateBeach');

