<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectImage;
use App\Models\Project;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $images = ProjectImage::select('project_images.*','projects.name as project')
        ->leftjoin('projects','projects.id','project_images.project_id')
          ->get();
        return view('admin.pages.images.images-list',compact('images'));           

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
        return view('admin.pages.images.add-image',compact('projects'));
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
        $gallery = new ProjectImage;
        if($request->hasFile('image')){
    		$file = $request->file('image');
    		$image = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/projects/gallery',$image);
        $gallery->image = $image;

        }
        $gallery->project_id = $request->project_id;
        $gallery->title = $request->title;
        if($gallery->save())
        {
            
        return redirect()->route('images.index')->with('success', 'Galllery created successfully.');

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
        $images = ProjectImage::select('project_images.*','projects.name as project')
        ->leftjoin('projects','projects.id','project_images.project_id')
        ->where('project_images.id',$id)
        ->first();
        $projects = Project::all();

        return view('admin.pages.images.edit-image',compact('image','projects'));           

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
        $gallery =  ProjectImage::find($id);
        if($request->hasFile('image')){
    		$file = $request->file('image');
    		$image = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/projects/gallery',$image);
        $gallery->image = $image;

        }
        $gallery->project_id = $request->project_id;
        $gallery->title = $request->title;
        if($gallery->update())
        {
            
        return redirect()->route('images.index')->with('success', 'Galllery updated successfully.');

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
        $image = ProjectImage::find($id);
        if($image->delete())
        {
            
            return redirect()->route('images.index')->with('success', 'Gallery deleted successfully.');
    
            }
            else{
            return back()->with('error', 'Something went wrong!');
    
            }
    }
}
