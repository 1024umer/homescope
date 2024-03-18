<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developer;
use Str;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $developers = Developer::orderByRaw("CAST(sorting_order as UNSIGNED) asc")->get();
        return view('admin.pages.developers.developers-list',compact('developers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.developers.add-developers');
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
        $developer = new Developer;
        $validatedDeveloper = $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Name is required',
        ]);

        if($request->hasFile('logo')){
    		$file = $request->file('logo');
    		$image = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/developers/',$image);
        }
        $developer->name = $request->name;
        $developer->slug = Str::slug($request->name);
        $developer->logo = $image;
        if($developer->save())
        {
            
        return redirect()->route('developers.index')->with('success', 'Developer created successfully.');

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
        $developer = Developer::find($id);
        return view('admin.pages.developers.edit-developer',compact('developer'));
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
        $developer =  Developer::find($id);
        $validatedDeveloper = $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Name is required',
        ]);

        if($request->hasFile('logo')){
    		$file = $request->file('logo');
    		$image = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/developers/',$image);
            
            $developer->logo = $image;
        }
        $developer->name = $request->name;
        $developer->slug = Str::slug($request->name);
        if($developer->update())
        {
            
        return redirect()->route('developers.index')->with('success', 'Developer updated successfully.');

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
        $developer = Developer::find($id);
        if($developer->delete())
        {
            
            return redirect()->route('developers.index')->with('success', 'Developer deleted successfully.');
    
            }
            else{
            return back()->with('error', 'Something went wrong!');
    
            }
    }
    
    public function update_order(Request $request){
       
        $query = Developer::where('id',$request->developer_id)->orderby('sorting_order','asc')->get();
        //  dd($query);
        $count = 0;
        foreach($request->item as $row){
            // $arr[] = $request->item[$count];
            $developer = Developer::where('id',$row)->first();
            $developer->sorting_order = $count;
            $developer->save();
            $count++;
        }
       
        // if($coupon){
        //     return response()->json(['data' => $coupon, 'success' => true]);
        // }else{
        //     return response()->json(['data' => null, 'success' => false]);
        // }
        if($developer)
        {
           
        return back()->with('success', 'Developer Sorted successfully.');

        }
        else{
        return back()->with('error', 'Something went wrong!');

        }
    }
}
