<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developer;
use App\Models\Community;
use App\Models\ProjectDetail;
use App\Models\Project;
use App\Models\Amenity;
use Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Project::orderby('sorting_order','asc')->get();
        return view('admin.pages.projects.project-list',compact('projects'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $developers = Developer::all();
        $communities = Community::all();
        $amenities = Amenity::all();
        return view('admin.pages.projects.add-project',compact('developers','communities','amenities'));
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
        $project = new Project;
        $validatedProject = $request->validate([
            'name' => 'required',
            'developer_id' => 'required',
            'community_id' => 'required',
            'property_type' => 'required',
            'unit_type' => 'required',
            'plot_size' => 'required',
            'handover' => 'required',
            'payment_plan' => 'required',
            'down_payment' => 'required',
            'banner' => 'required',
            'logo' => 'required',
            'description' => 'required',
        ], [
            'name.required' => 'Name is required',
            'developer_id.required' => 'Developer is required',
            'community_id.required' => 'Community is required',
            'property_type.required' => 'Property Type is required',
            'unit_type.required' => 'Unit Type is required',
            'plot_size.required' => 'Plot Size is required',
            'handover.required' => 'Handover is required',
            'payment_plan.required' => 'Payment Plan is required',
            'down_payment.required' => 'Down Payment is required',
            'banner.required' => 'Banner is required',
            'logo.required' => 'Logo is required',
            'description.required' => 'Description is required',
        ]);

        if($request->hasFile('banner')){
    		$file = $request->file('banner');
    		$image = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/projects/',$image);
            $project->banner = $image;

        }
        if($request->hasFile('logo')){
    		$file = $request->file('logo');
    		$logo = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/projects/logo/',$logo);
            $project->logo = $logo;

        }
        $project->name = $request->name;
        $project->slug = Str::slug($request->name);
        $project->price = $request->price;
        $project->developer_id = $request->developer_id;
        $project->community_id = $request->community_id;
        $project->category = $request->category;
        $project->property_type = $request->property_type;
        $project->property_sub_type = $request->property_sub_type;
        $project->unit_type = $request->unit_type;
        $project->plot_size = $request->plot_size;
        $project->built_up_area = $request->built_up_area;
        $project->handover = $request->handover;
        $project->payment_plan = $request->payment_plan;
        $project->down_payment = $request->down_payment;
        $project->description = $request->description;
        $project->status = $request->status;
        $project->meta_title = $request->meta_title;
        $project->meta_tags = $request->meta_tags;
        $project->meta_keywords = $request->meta_keywords;
        $project->meta_description = $request->meta_description;
        if($project->save())
        {
            
            $details = new ProjectDetail;

            if($request->hasFile('brochure')){
                $file = $request->file('brochure');
                $brochure = uniqid().'.'.$file->guessExtension();
                $image_path = $file->move(public_path().'/assets/images/projects/documents/',$brochure);
                $project->brochure = $brochure;
    
            }
            if($request->hasFile('floor_plan')){
                $file = $request->file('floor_plan');
                $floor_plan = uniqid().'.'.$file->guessExtension();
                $image_path = $file->move(public_path().'/assets/images/projects/documents/',$floor_plan);
                $project->floor_plan = $floor_plan;
    
            }
            if($request->hasFile('paymentplan')){
                $file = $request->file('paymentplan');
                $paymentplan = uniqid().'.'.$file->guessExtension();
                $image_path = $file->move(public_path().'/assets/images/projects/documents/',$paymentplan);
                $project->paymentplan = $paymentplan;
    
            }
            if($request->hasFile('masterplan')){
                $file = $request->file('masterplan');
                $masterplan = uniqid().'.'.$file->guessExtension();
                $image_path = $file->move(public_path().'/assets/images/projects/documents/',$masterplan);
                $details->master_plan = $masterplan;
    
            }
            if($request->hasFile('location')){
                $file = $request->file('location');
                $location = uniqid().'.'.$file->guessExtension();
                $image_path = $file->move(public_path().'/assets/images/projects/documents/',$location);
                $details->location = $location;
    
            }
            $details->project_id = $project->id;
            $details->during_construction = $request->during_construction;
            $details->handover_payment = $request->handover_payment;
            $details->features_details = $request->features_description;
            $details->location_details = $request->location_description;
            $details->master_details = $request->master_description;
            
            if($request->amenities)
            {
               $details->amenities = implode(',',$request->amenities);

            }
            if($details->save())
            {
                return redirect()->route('projects.index')->with('success', 'Project created successfully.');

            }
            else{
            return back()->with('error', 'Something went wrong!');
    
            }
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
        $project = Project::Select('projects.*','developers.name as developer','communities.name as community')
                          ->leftjoin('developers','developers.id','projects.developer_id')
                          ->leftjoin('communities','communities.id','projects.community_id')
                          ->where('projects.id',$id)
                          ->first();
        $developers = Developer::all();
        $communities = Community::all();
        $amenities = Amenity::all();
        $details = ProjectDetail::where('project_id',$project->id)->first();

        return view('admin.pages.projects.edit-project',compact('project','developers','communities','amenities','details'));
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
        $project =  Project::find($id);
        
        if($request->hasFile('banner')){
    		$file = $request->file('banner');
    		$image = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/projects/',$image);
            $project->banner = $image;

        }
        if($request->hasFile('logo')){
    		$file = $request->file('logo');
    		$logo = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/projects/logo/',$logo);
            $project->logo = $logo;

        }
        $project->name = $request->name;
        $project->slug = Str::slug($request->name);
        $project->price = $request->price;
        $project->developer_id = $request->developer_id;
        $project->community_id = $request->community_id;
        $project->category = $request->category;
        $project->property_type = $request->property_type;
        $project->property_sub_type = $request->property_sub_type;
        $project->unit_type = $request->unit_type;
        $project->plot_size = $request->plot_size;
        $project->built_up_area = $request->built_up_area;
        $project->handover = $request->handover;
        $project->payment_plan = $request->payment_plan;
        $project->down_payment = $request->down_payment;
        
        $project->description = $request->description;
        $project->status = $request->status;
        $project->meta_title = $request->meta_title;
        $project->meta_tags = $request->meta_tags;
        $project->meta_keywords = $request->meta_keywords;
        $project->meta_description = $request->meta_description;
        if($project->update())
        {
            $details = ProjectDetail::where('project_id',$id)->first();
            if($details)
            {

                if($request->hasFile('brochure')){
                    $file = $request->file('brochure');
                    $brochure = uniqid().'.'.$file->guessExtension();
                    $image_path = $file->move(public_path().'/assets/images/projects/documents/',$brochure);
                    $details->brochure = $brochure;
        
                }
                if($request->hasFile('floor_plan')){
                    $file = $request->file('floor_plan');
                    $floor_plan = uniqid().'.'.$file->guessExtension();
                    $image_path = $file->move(public_path().'/assets/images/projects/documents/',$floor_plan);
                    $details->floor_plan = $floor_plan;
        
                }
                if($request->hasFile('paymentplan')){
                    $file = $request->file('paymentplan');
                    $paymentplan = uniqid().'.'.$file->guessExtension();
                    $image_path = $file->move(public_path().'/assets/images/projects/documents/',$paymentplan);
                    $details->paymentplan = $paymentplan;
        
                }
                if($request->hasFile('masterplan')){
                    $file = $request->file('masterplan');
                    $masterplan = uniqid().'.'.$file->guessExtension();
                    $image_path = $file->move(public_path().'/assets/images/projects/documents/',$masterplan);
                    $details->master_plan = $masterplan;
        
                }
                if($request->hasFile('location')){
                    $file = $request->file('location');
                    $location = uniqid().'.'.$file->guessExtension();
                    $image_path = $file->move(public_path().'/assets/images/projects/documents/',$location);
                    $details->location = $location;
        
                }
                
                $details->during_construction = $request->during_construction;
                $details->handover_payment = $request->handover_payment;
                $details->features_details = $request->features_description;
                $details->master_details = $request->master_description;
                $details->location_details = $request->location_description;
                
                if($request->amenities)
                {
                $details->amenities = implode(',',$request->amenities);

                }
                if($details->update())
                {
                    return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    
                }
                else{
                return back()->with('error', 'Something went wrong!');
        
                }
            }
            else{
                
                $details = new ProjectDetail;

                if($request->hasFile('brochure')){
                    $file = $request->file('brochure');
                    $brochure = uniqid().'.'.$file->guessExtension();
                    $image_path = $file->move(public_path().'/assets/images/projects/documents/',$brochure);
                    $details->brochure = $brochure;
        
                }
                if($request->hasFile('floor_plan')){
                    $file = $request->file('floor_plan');
                    $floor_plan = uniqid().'.'.$file->guessExtension();
                    $image_path = $file->move(public_path().'/assets/images/projects/documents/',$floor_plan);
                    $details->floor_plan = $floor_plan;
        
                }
                if($request->hasFile('paymentplan')){
                    $file = $request->file('paymentplan');
                    $paymentplan = uniqid().'.'.$file->guessExtension();
                    $image_path = $file->move(public_path().'/assets/images/projects/documents/',$paymentplan);
                    $details->paymentplan = $paymentplan;
        
                }
                if($request->hasFile('masterplan')){
                    $file = $request->file('masterplan');
                    $masterplan = uniqid().'.'.$file->guessExtension();
                    $image_path = $file->move(public_path().'/assets/images/projects/documents/',$masterplan);
                    $details->master_plan = $masterplan;
        
                }
                
                $details->project_id = $id;
                $details->during_construction = $request->during_construction;
                $details->handover_payment = $request->handover_payment;
                $details->features_details = $request->features_description;
                $details->master_details = $request->master_description;
                $details->location_details = $request->location_description;
                // dd($request->amenities);
                if($request->amenities)
                {
                    $details->amenities = implode(',',$request->amenities);
                    // dd($details->amenities);
    
                }
                if($details->save())
                {
                    return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
                }
                else{
                    return back()->with('error', 'Something went wrong!');
                }
            }
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
        $project = Project::find($id);
        if($project->delete())
        {
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');

        }
        else{
        return back()->with('error', 'Something went wrong!');

        }
        
    }
    
    public function update_order(Request $request){
       
        $query = Project::where('id',$request->project_id)->orderby('sorting_order','asc')->get();
        //  dd($query);
        $count = 0;
        foreach($request->item as $row){
            // $arr[] = $request->item[$count];
            $project = Project::where('id',$row)->first();
            $project->sorting_order = $count;
            $project->save();
            $count++;
        }
       
        // if($coupon){
        //     return response()->json(['data' => $coupon, 'success' => true]);
        // }else{
        //     return response()->json(['data' => null, 'success' => false]);
        // }
        if($project)
        {
           
        return back()->with('success', 'Project Sorted successfully.');

        }
        else{
        return back()->with('error', 'Something went wrong!');

        }
    }
}
