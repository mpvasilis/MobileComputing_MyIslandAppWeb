<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        
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



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        Place::where('place_id', $request['id'])->update(['name' => $request['name'], 'info' => $request['info'], 'is_active' => $request['is_active'], 'type_id' => $request['type_id']]);
        $places = Place::get();
        return view('places', compact('places'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        Place::where('place_id', $request['id'])->delete();
        $places = Place::get();
        return view('places', compact('places'));
    }
}