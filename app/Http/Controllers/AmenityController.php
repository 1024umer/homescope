<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amenity;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $amenities = Amenity::all();
        return view('admin.pages.amenities.amenities-list',compact('amenities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.amenities.add-amenity');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $amenity = new Amenity;
        

        if($request->hasFile('icon')){
    		$file = $request->file('icon');
    		$image = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/projects/amenities',$image);
        $amenity->icon = $image;

        }
        $amenity->name = $request->name;
        $amenity->description = $request->description;
        if($amenity->save())
        {
            
        return redirect()->route('amenities.index')->with('success', 'Amenity created successfully.');

        }
        else{
        return back()->with('error', 'Something went wrong!');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $amenity = Amenity::find($id);
        return view('admin.pages.amenities.edit-amenity',compact('amenity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $amenity =  Amenity::find($id);
        

        if($request->hasFile('icon')){
    		$file = $request->file('icon');
    		$image = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/projects/amenities',$image);
        $amenity->icon = $image;

        }
        $amenity->name = $request->name;
        $amenity->description = $request->description;
        if($amenity->update())
        {
            
        return redirect()->route('amenities.index')->with('success', 'Amenity updated successfully.');

        }
        else{
        return back()->with('error', 'Something went wrong!');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $amenity = Amenity::find($id);
        if($amenity->delete())
        {
            
            return redirect()->route('amenities.index')->with('success', 'Amenity deleted successfully.');
    
            }
            else{
            return back()->with('error', 'Something went wrong!');
    
            }
    }
}
