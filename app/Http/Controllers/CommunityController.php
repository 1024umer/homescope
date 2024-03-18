<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use Str;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $communities = Community::all();
        return view('admin.pages.communities.communities-list',compact('communities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.communities.add-community');
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
        $community = new Community;
        $validatedCommunity = $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Name is required',
        ]);

        if($request->hasFile('banner')){
    		$file = $request->file('banner');
    		$image = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/communities/',$image);
            $community->banner = $image;

        }
        $community->name = $request->name;
        $community->slug = Str::slug($request->name);
        if($community->save())
        {
            
        return redirect()->route('communities.index')->with('success', 'Community created successfully.');

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
        $community = Community::find($id);
        return view('admin.pages.communities.edit-community',compact('community'));
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
        $community =  Community::find($id);
        $validatedCommunity = $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Name is required',
        ]);

        if($request->hasFile('banner')){
    		$file = $request->file('banner');
    		$image = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/communities/',$image);
            $community->banner = $image;

        }
        $community->name = $request->name;
        $community->slug = Str::slug($request->name);
        if($community->update())
        {
            
        return redirect()->route('communities.index')->with('success', 'Community updated successfully.');

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
        $community = Community::find($id);
        if($community->delete())
        {
            
            return redirect()->route('communities.index')->with('success', 'Community deleted successfully.');
    
            }
            else{
            return back()->with('error', 'Something went wrong!');
    
            }
    }
}
