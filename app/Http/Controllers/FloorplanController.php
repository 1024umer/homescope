<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\FloorPlan;

class FloorplanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $floorplans = FloorPlan::Select('floor_plans.*','projects.name as project')
        ->leftjoin('projects','projects.id','floor_plans.project_id')->get();
        return view('admin.pages.floorplans.floorplan-list',compact('floorplans'));
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
        return view('admin.pages.floorplans.add-floorplan',compact('projects'));
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
        $floorplan = new FloorPlan;
        if($request->hasFile('icon')){
    		$file = $request->file('icon');
    		$image = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/floorplans/',$image);
        $floorplan->icon = $image;

        }
        if($request->hasFile('floorplan')){
    		$file = $request->file('floorplan');
    		$floor = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/floorplans/',$floor);
        $floorplan->floorplan = $floor;

        }
        $floorplan->category = $request->category;
        $floorplan->unit_type = $request->unit_type;
        $floorplan->floor_details = $request->floor_details;
        $floorplan->sizes = $request->sizes;
        $floorplan->type = $request->type;
        $floorplan->project_id = $request->project_id;

        if($floorplan->save())
        {
            return redirect()->route('floorplans.index')->with('success', 'Floor Plan created successfully.');

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

        $projects = Project::all();
        $floorplan = FloorPlan::Select('floor_plans.*','projects.name as project')
                               ->leftjoin('projects','projects.id','floor_plans.project_id')
                               ->where('floor_plans.id',$id)
                               ->first();
        return view('admin.pages.floorplans.edit-floorplan',compact('projects','floorplan'));
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
        $floorplan =  FloorPlan::find($id);
        if($request->hasFile('icon')){
    		$file = $request->file('icon');
    		$image = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/floorplans/',$image);
        $floorplan->icon = $image;

        }
        if($request->hasFile('floorplan')){
    		$file = $request->file('floorplan');
    		$floor = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/floorplans/',$floor);
        $floorplan->floorplan = $floor;

        }
        $floorplan->category = $request->category;
        $floorplan->unit_type = $request->unit_type;
        $floorplan->floor_details = $request->floor_details;
        $floorplan->sizes = $request->sizes;
        $floorplan->type = $request->type;
        $floorplan->project_id = $request->project_id;

        if($floorplan->update())
        {
            return redirect()->route('floorplans.index')->with('success', 'Floor Plan updated successfully.');

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
        $floorplan = FloorPlan::find($id);
        if($floorplan->delete())
        {
            
            return redirect()->route('floorplans.index')->with('success', 'Floor Plan deleted successfully.');
    
            }
            else{
            return back()->with('error', 'Something went wrong!');
    
            }
    }
}
