<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Str;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teams = Team::orderby('sorting_order','asc')->get();
        return view('admin.pages.teams.team-list',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.teams.add-team');
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
        $team = new Team;
        

        if($request->hasFile('image')){
    		$file = $request->file('image');
    		$image = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/teams/',$image);
            $team->image = $image;

        }
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->languages = $request->languages;
        $team->description = $request->description;
        if($team->save())
        {
            
        return redirect()->route('teams.index')->with('success', 'Team created successfully.');

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
        $team = Team::find($id);
        return view('admin.pages.teams.edit-team',compact('team'));
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
        $team =  Team::find($id);
        // $validatedCommunity = $request->validate([
        //     'name' => 'required',
        // ], [
        //     'name.required' => 'Name is required',
        // ]);

        if($request->hasFile('image')){
    		$file = $request->file('image');
    		$image = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/teams/',$image);
            $team->image = $image;

        }
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->languages = $request->languages;
        $team->description = $request->description;
        if($team->update())
        {
            
        return redirect()->route('teams.index')->with('success', 'Team updated successfully.');

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
        $team = Team::find($id);
        if($team->delete())
        {
            
            return redirect()->route('teams.index')->with('success', 'Team deleted successfully.');
    
            }
            else{
            return back()->with('error', 'Something went wrong!');
    
            }
    }
     public function update_order(Request $request){
       
        $query = Team::where('id',$request->team_id)->orderby('sorting_order','asc')->get();
        //  dd($query);
        $count = 0;
        foreach($request->item as $row){
            // $arr[] = $request->item[$count];
            $team = Team::where('id',$row)->first();
            $team->sorting_order = $count;
            $team->save();
            $count++;
        }
       
        // if($coupon){
        //     return response()->json(['data' => $coupon, 'success' => true]);
        // }else{
        //     return response()->json(['data' => null, 'success' => false]);
        // }
        if($team)
        {
           
        return back()->with('success', 'Team Sorted successfully.');

        }
        else{
        return back()->with('error', 'Something went wrong!');

        }
    }
}
