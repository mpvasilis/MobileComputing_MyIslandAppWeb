<?php

namespace App\Http\Controllers;

use App\Images;
use Illuminate\Http\Request;

class ImagesController extends Controller
{

    public function addImage($place_id,$name)
    {
            $status="success";
            $image = new Images();
            $image->place_id = $place_id;
            $image->name = $name;
            $image->save();
            return  response()->json(['status'=>$status]);
    }

    public function getImages(Request $request)
    {
        if (Images::where('place_id', '=', $request['id'])->exists()) {
            $status="success";
            $images = Images::where('place_id', $request["id"])->get();
            return  response()->json(['status'=>$status,'images'=>$images]);
        }
        else{
            $status="NoExtraImagesFound";
            return  response()->json(['status'=>$status]);
        }
    }

    public function loadImages($place_id)
    {
        if (Images::where('place_id', '=', $place_id)->exists()) {
            $status="success";
            $images = Images::where('place_id', $place_id)->get();
            return  response()->json(['status'=>$status,'images'=>$images]);
        }
        else{
            $status="NoExtraImagesFound";
            return  response()->json(['status'=>$status]);
        }
    }


    public function form(Request $request)
    {
        $place_id=$request['place_id'];

        if ($request->hasFile('image1')) {
            $image = $request->file('image1');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name);
            addImage($place_id,$name);
        }

        if ($request->hasFile('image2')) {
            $image = $request->file('image1');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name);
            addImage($place_id,$name);
        }

        if ($request->hasFile('image3')) {
            $image = $request->file('image3');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name);
            addImage($place_id,$name);
        }

        
        if ($request->hasFile('image4')) {
            $image = $request->file('image4');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name);
            addImage($place_id,$name);
        }

        if ($request->hasFile('image5')) {
            $image = $request->file('image4');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name);
            addImage($place_id,$name);
        }
        
    
        return back()->with('success', 'Οι εικόνες ενημερώθηκαν!');
    
    }
    
}
