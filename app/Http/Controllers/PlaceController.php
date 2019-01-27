<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class PlaceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $place = new Place();
        $place->name = $request['name'];
        $place->category = $request['category'];
        $place->address = $request['address'];
        $place->phone = $request['phone'];
        $place->website = $request['website'];

        $place->description = $request['description'];
        $place->description_long = $request['description_long'];


        $place->lat = $request['lat'];
        $place->lng = $request['lng'];

        $place->last_update = time();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name);
            $place->image =$name;
    
        }
    
        $place->save();
        $places = Place::get();
        return back()->with('success', 'Προσθέθηκε!');
    }

    public function show(Place $place)
    {
        $category_title="Όλα τα μέρη";
        $places = Place::get();
        return view('places', compact('places','category_title'));
    }

    public function hotels(Place $place)
    {
        $category="3";
        $category_title="Διαμονή";
        $places = Place::where('category', $category)->get();
        return view('places', compact('places','category_title'));
    }

    public function beaches(Place $place)
    {
        $category="4";
        $category_title="Παραλίες";
        $places = Place::where('category', $category)->get();
        return view('places', compact('places','category_title'));
    }

    public function food(Place $place)
    {
        $category="2";
        $category_title="Εστίαση";
        $places = Place::where('category', $category)->get();
        return view('places', compact('places','category_title'));
    }

    public function sights(Place $place)
    {
        $category="1";
        $category_title="Αξιοθέατα";
        $places = Place::where('category', $category)->get();
        return view('places', compact('places','category_title'));
    }

    public function update(Request $request, Place $place)
    {
        if (Place::where('id', '=', $request['id'])->exists()) {
            Place::where('id', $request['id'])->update(['name' => $request['name'], 'category' => $request['category'], 'address' => $request['address'], 'phone' => $request['phone'], 'website' => $request['website'], 'description' => $request['description'], 'description_long' => $request['description_long'],'lat' => $request['lat'],'lng' => $request['lng']]);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads');
                $image->move($destinationPath, $name);
                Place::where('id', $request['id'])->update(['image' => $request['image']]);
            }
        
            $places = Place::get();
            return back()->with('success', 'Το μέρος ενημερώθηκε!');
        }
    }

    public function destroy(Request $request, Place $place)
    {
        if (Place::where('id', '=', $request['id'])->exists()) {
            Place::where('id', $request['id'])->delete();
            return back()->with('success', 'Το μέρος διαγράφτηκε!');
        }
    }
}
