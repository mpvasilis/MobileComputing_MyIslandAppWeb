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

Route::get('loadMore', function(Request $request) {
    if (Place::where('id', '=', $request['id'])->exists()) {
        $places = Place::where('id', $request['id'])->get();
        return  response()->json(['status'=>"success",'loadMore'=>$places->first()->description_long]);;
    }
});

Route::get('loadMoreImages', 'ImagesController@getImages'); 
Route::get('images/{place_id}', 'ImagesController@loadImages'); 


Route::get('getBeachOverallRating', 'BeachRatingsController@getBeachOverallRating'); 
Route::get('/getBeachesbyRating', 'BeachRatingsController@getBeachesbyRating'); 
Route::post('rateBeach', 'BeachRatingsController@rateBeach');

