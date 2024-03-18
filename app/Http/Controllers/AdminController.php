<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\Lead;
use DB;

class AdminController extends Controller
{
    //
    public function Dashboard()
    {
        if(session()->get('id'))
        {
             $leads = Lead::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as lead_count'))
                        ->groupBy('date')
                        ->get();
            $total_leads = Lead::get()->count();
            $current_month_leads = Lead::whereMonth('created_at', '=', \Carbon\Carbon::now()->month)->count();
            $current_day_leads = Lead::where('created_at', '=', \Carbon\Carbon::now())->count();
            $last_day_leads = Lead::whereDate('created_at', '=', \Carbon\Carbon::yesterday())->count();
            $leaddateFrom = \Carbon\Carbon::now()->subDays(30);
            $leaddateTo = \Carbon\Carbon::now();
            $leadmonthly = Lead::whereBetween('created_at', [$leaddateFrom, $leaddateTo])->count();
            $leadpreviousDateFrom = \Carbon\Carbon::now()->subDays(60);
            $leadpreviousDateTo = \Carbon\Carbon::now()->subDays(31);
            $leadpreviousMonthly = Lead::whereBetween('created_at', [$leadpreviousDateFrom, $leadpreviousDateTo])->count();
            // dd($leads);
        return view('admin.pages.index',compact('leads','total_leads','current_month_leads','current_day_leads','leadpreviousMonthly','last_day_leads'));
        }
        else
        {
            return redirect()->route('login');
        }
    }
    
    public function Settings()
    {
        if(session()->get('id'))
        {
            $generalsettings = GeneralSetting::find(1);
        
        return view('admin.pages.settings',compact('generalsettings'));
        }
        else
        {
            return redirect()->route('login');
        }
        
    }

    public function GeneralSettings(Request $request)
    {
        $generalsettings = new GeneralSetting;
        
        if($request->hasFile('logo')){
    		$file = $request->file('logo');
    		$logo = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/logo/',$logo);
        $generalsettings->logo = $logo;

        }
        if($request->hasFile('favicon')){
    		$file = $request->file('favicon');
    		$favicon = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/logo/',$favicon);
        $generalsettings->favicon = $favicon;

        }
        $generalsettings->site_title = $request->site_title;
        $generalsettings->meta_title = $request->meta_title;
        $generalsettings->meta_tags = $request->meta_tags;
        $generalsettings->meta_keywords = $request->meta_keywords;
        $generalsettings->meta_description = $request->meta_description;
       
        if($generalsettings->save())
        {
            toastr()->success('Settings Saved');
            return back();
        }
        else{
            toastr()->error('Something went wrong!');
            return back();
        }
    }

    public function UpdateGeneralSettings(Request $request)
    {
        $generalsettings = GeneralSetting::find($request->id);
        
        if($request->hasFile('logo')){
    		$file = $request->file('logo');
    		$logo = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/logo/',$logo);
        $generalsettings->logo = $logo;

        }
        if($request->hasFile('favicon')){
    		$file = $request->file('favicon');
    		$favicon = uniqid().'.'.$file->guessExtension();
    		$image_path = $file->move(public_path().'/assets/images/logo/',$favicon);
        $generalsettings->favicon = $favicon;

        }
        $generalsettings->site_title = $request->site_title;
        $generalsettings->meta_title = $request->meta_title;
        $generalsettings->meta_tags = $request->meta_tags;
        $generalsettings->meta_keywords = $request->meta_keywords;
        $generalsettings->meta_description = $request->meta_description;

        if($generalsettings->save())
        {
            toastr()->success('Settings Saved');
            return back();
        }
        else{
            toastr()->error('Something went wrong!');
            return back();
        }
    }

    public function LeadsRecord()
    {
        if(session()->get('id'))
        {
        $leads = Lead::orderby('created_at','desc')->get();
        return view('admin.pages.leads',compact('leads'));
        }
        else
        {
            return redirect()->route('login');
        }
    }
    
    public function DelLead($id)
    {
        $lead = Lead::find($id);
         if($lead->delete())
        {
            toastr()->success('Deleted Successfully!');
            return back();
        }
        else{
            toastr()->error('Something went wrong!');
            return back();
        }
    }

}
