<?php

namespace App\Http\Controllers;

use App\Beach_ratings;
use App\Place;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BeachRatingsController extends Controller
{

    public function rateBeach(Request $request)
    {
            $status="success";
            $br = new Beach_ratings();
            $br->place_id = $request["id"];
            $br->device = $request["deviceID"];
            $br->rating = $request["rating"];
            $br->save();
            $avg = Beach_ratings::where('place_id', $request["id"])->avg('rating');
            return  response()->json(['status'=>$status,'overallRating'=>substr($avg, 0, 4)]);
    }


    public function getBeachOverallRating(Request $request)
    {
        if (Beach_ratings::where('place_id', '=', $request['id'])->exists()) {
            $status="success";
            $avg = Beach_ratings::where('place_id', $request["id"])->avg('rating');
            return  response()->json(['status'=>$status,'overallRating'=>substr($avg, 0, 4)]);
        }
        else{
            $status="NoRatings";
            return  response()->json(['status'=>$status]);
        }
    }

    public function getAvarageRatings()
    {
        
        $sums = array();
        $counts = array();
        $ratings = Beach_ratings::get();
        foreach ($ratings as $rating) {
            if (array_key_exists($rating->place_id,$sums))
            {
            $sums[$rating->place_id] = $sums[$rating->place_id]+ $rating->rating;
            $counts[$rating->place_id] = $counts[$rating->place_id]+ 1;
            }
            else{
                $sums[$rating->place_id]=$rating->rating;
                $counts[$rating->place_id]=1;
            }
        }
        $avarages = array();
        foreach($sums as $key => $item){
            $avarages[$key]=substr($sums[$key]/$counts[$key], 0, 4);;
        }
        return $avarages;
    }

    public function getBeachesbyRating()
    {
        $sums = array();
        $counts = array();
        $ratings = Beach_ratings::get();
        foreach ($ratings as $rating) {
            if (array_key_exists($rating->place_id,$sums))
            {
            $sums[$rating->place_id] = $sums[$rating->place_id]+ $rating->rating;
            $counts[$rating->place_id] = $counts[$rating->place_id]+ 1;
            }
            else{
                $sums[$rating->place_id]=$rating->rating;
                $counts[$rating->place_id]=1;
            }
        }
        $avarages = array();
        foreach($sums as $key => $item){
            $avarages[$key]=substr($sums[$key]/$counts[$key], 0, 4);;
        }

        $beaches = Place::where("category","4")->get();
        foreach ($beaches as &$beach) {
            if(array_key_exists($beach->id,$avarages)){
                $beach->OverallRating = (float) $avarages[$beach->id];
            }
            else{
                $beach->OverallRating = -1;
            }

        }
        return response()->json(['beaches'=>$beaches]);
    }
    
}
