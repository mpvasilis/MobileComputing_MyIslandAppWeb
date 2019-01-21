<?php

use Illuminate\Http\Request;
use App\Place;

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

Route::get('/places', function() {
    $places= Place::all()->toArray();
    $places_count=Place::all()->count();
    return Response::json(array('status'=>"success",'count_total'=>(int) $places_count,'count'=>(int) $places_count,'pages'=>1,'places'=>$places));
});

Route::get('/places/{place_id}', function($place_id) {
    return Response::json(array('place'=>Place::find($place_id)));
});

Route::get('getPlaceImages/{place_id}', 'PlaceController@getPlaceImages'); 