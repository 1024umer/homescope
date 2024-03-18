<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectLocation;
use App\Models\Project;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $locations = ProjectLocation::select('project_locations.*','projects.name as project')
                            ->leftjoin('projects','projects.id','project_locations.project_id')
                              ->get();
         return view('admin.pages.locations.location-list',compact('locations'));                     
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $projects = Project::all();
        return view('admin.pages.locations.add-location',compact('projects'));
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
        $location = new ProjectLocation;
        if($request->hasFile('icon')){
    		$file = $request->file('icon');
    		$image = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/projects/location',$image);
        $location->icon = $image;

        }
        $location->project_id = $request->project_id;
        $location->name = $request->name;
        $location->description = $request->description;
        if($location->save())
        {
            
        return redirect()->route('locations.index')->with('success', 'Location created successfully.');

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
        $location = ProjectLocation::select('project_locations.*','projects.name as project')
        ->leftjoin('projects','projects.id','project_locations.project_id')
        ->where('project_locations.id',$id)
        ->first();
        $projects = Project::all();
        return view('admin.pages.locations.edit-location',compact('location','projects'));   
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
        $location =  ProjectLocation::find($id);
        if($request->hasFile('icon')){
    		$file = $request->file('icon');
    		$image = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/projects/location',$image);
        $location->icon = $image;

        }
        $location->project_id = $request->project_id;
        $location->name = $request->name;
        $location->description = $request->description;
        if($location->update())
        {
            
        return redirect()->route('locations.index')->with('success', 'Location updated successfully.');

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
        $location = ProjectLocation::find($id);
        if($location->delete())
        {
            
            return redirect()->route('locations.index')->with('success', 'Location deleted successfully.');
    
            }
            else{
            return back()->with('error', 'Something went wrong!');
    
            }
    }
}
