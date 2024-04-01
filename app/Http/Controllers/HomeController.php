<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\Lead;
use App\Models\ProjectDetail;
use App\Models\Project;
use App\Models\Developer;
use App\Models\Community;
use App\Models\FloorPlan;
use App\Models\ProjectLocation;
use App\Models\ProjectImage;
use App\Models\Team;
use App\Models\Application;
use DB;

class HomeController extends Controller
{
    //
    public function Index()
    {
        $xmlString = "https://expert.propertyfinder.ae/feed/homescope-real-estate/privatesite/2c531a38acbe7e42132f14f5b3db447d";
        $xmlObject = simplexml_load_file($xmlString, 'SimpleXMLElement', LIBXML_NOCDATA);

        $json = json_encode($xmlObject);
        $pflisitng = json_decode($json, true);

        // dd($pflisitng['property']);
        $projects = Project::Select('projects.*', 'developers.name as developer', 'communities.name as community')
            ->leftjoin('developers', 'developers.id', 'projects.developer_id')
            ->leftjoin('communities', 'communities.id', 'projects.community_id')->orderby('sorting_order', 'asc')->get();
        $developers = Developer::orderByRaw("CAST(sorting_order as UNSIGNED) asc")->get();
        ;
        $communities = Community::all();
        return view('user.pages.index', compact('projects', 'developers', 'communities', 'pflisitng'));
    }
    public function ProjectsbyCommunity($slug)
    {
        $community = Community::where('slug', $slug)->first();
        // dd($community);
        $communities = Community::all();
        $projects = Project::Select('projects.*', 'developers.name as developer', 'communities.name as community')
            ->leftjoin('developers', 'developers.id', 'projects.developer_id')
            ->leftjoin('communities', 'communities.id', 'projects.community_id')
            ->where('projects.community_id', $community->id)
            ->paginate(10);
        return view('user.pages.projects-by-community', compact('projects', 'community', 'communities'));
    }
    public function ProjectsbyDeveloper($slug)
    {
        $developer = Developer::where('slug', $slug)->first();
        // dd($developer);
        $developers = Developer::all();
        $projects = Project::Select('projects.*', 'developers.name as developer', 'communities.name as community')
            ->leftjoin('developers', 'developers.id', 'projects.developer_id')
            ->leftjoin('communities', 'communities.id', 'projects.community_id')
            ->where('projects.developer_id', $developer->id)
            ->paginate(10);
        return view('user.pages.projects-by-developer', compact('projects', 'developer', 'developers'));
    }
    public function projectdetails($slug)
    {
        $project = Project::Select('projects.*', 'developers.name as developer', 'communities.name as community')
            ->leftjoin('developers', 'developers.id', 'projects.developer_id')
            ->leftjoin('communities', 'communities.id', 'projects.community_id')
            ->where('projects.slug', $slug)
            ->first();
        //   dd($project);
        $floorplans = FloorPlan::where('project_id', $project->id)->get();
        $details = ProjectDetail::where('project_id', $project->id)->first();
        $locations = ProjectLocation::where('project_id', $project->id)->get();
        $images = ProjectImage::where('project_id', $project->id)->get();
        return view('user.pages.project-details', compact('project', 'floorplans', 'details', 'locations', 'images'));
    }
    public function DownloadBrochure($slug)
    {
        $project = Project::Select('projects.*', 'developers.name as developer', 'communities.name as community')
            ->leftjoin('developers', 'developers.id', 'projects.developer_id')
            ->leftjoin('communities', 'communities.id', 'projects.community_id')
            ->where('projects.slug', $slug)
            ->first();
        $details = ProjectDetail::where('project_id', $project->id)->first();

        return view('user.pages.brochure', compact('project', 'details'));
    }
    public function FloorPlan($slug)
    {
        $project = Project::Select('projects.*', 'developers.name as developer', 'communities.name as community')
            ->leftjoin('developers', 'developers.id', 'projects.developer_id')
            ->leftjoin('communities', 'communities.id', 'projects.community_id')
            ->where('projects.slug', $slug)
            ->first();
        $details = ProjectDetail::where('project_id', $project->id)->first();

        return view('user.pages.floorplan', compact('project', 'details'));
    }
    public function Paymentplan($slug)
    {
        $project = Project::Select('projects.*', 'developers.name as developer', 'communities.name as community')
            ->leftjoin('developers', 'developers.id', 'projects.developer_id')
            ->leftjoin('communities', 'communities.id', 'projects.community_id')
            ->where('projects.slug', $slug)
            ->first();
        $details = ProjectDetail::where('project_id', $project->id)->first();

        return view('user.pages.paymentplan', compact('project', 'details'));
    }
    public function StoreLeads(Request $request)
    {
        $lead = new Lead;
        $lead->name = $request->name;
        $lead->email = $request->email;
        $lead->phone = $request->phone;
        $lead->message = $request->message;
        $lead->p_type = $request->p_type;
        $lead->category = $request->category;
        $lead->bedrooms = $request->bedroom;
        // dd($lead);
        if ($lead->save()) {
            \Mail::send(['html' => 'email_templates.leads'], ['lead' => $lead], function ($message) use ($lead) {
                $message->to('admin@homescope.ae')
                    ->subject('New Lead')
                    ->from('admin@homescope.ae', 'Homescope Leads');


            });
            return response()->json(['data' => $lead, 'success' => true]);
        } else {
            return response()->json(['data' => $lead, 'success' => false]);
        }
    }

    public function Contact()
    {
        return view('user.pages.contact');
    }
    public function About()
    {
        return view('user.pages.about');
    }

    public function Team()
    {
        $teams = Team::orderby('sorting_order', 'asc')->get();
        ;
        return view('user.pages.our-team', compact('teams'));
    }

    public function PrivacyPolicy()
    {
        return view('user.pages.privacy-policy');
    }
    public function Secondaryproperty()
    {
        $projects = Project::Select('projects.*', 'developers.name as developer', 'communities.name as community')
            ->leftjoin('developers', 'developers.id', 'projects.developer_id')
            ->leftjoin('communities', 'communities.id', 'projects.community_id')->orderby('sorting_order', 'asc')
            ->where('projects.category', 'secondary')->get();
        return view('user.pages.secondary-projects', compact('projects'));
    }
    public function offplanProperty()
    {
        $projects = Project::Select('projects.*', 'developers.name as developer', 'communities.name as community')
            ->leftjoin('developers', 'developers.id', 'projects.developer_id')
            ->leftjoin('communities', 'communities.id', 'projects.community_id')->orderby('sorting_order', 'asc')
            ->where('projects.category', 'off-plan')->get();
        return view('user.pages.offplan-projects', compact('projects'));
    }

    public function PortalPropertyDetails($reference_id)
    {
        $xmlString = "https://expert.propertyfinder.ae/feed/homescope-real-estate/privatesite/2c531a38acbe7e42132f14f5b3db447d";
        $xmlObject = simplexml_load_file($xmlString, 'SimpleXMLElement', LIBXML_NOCDATA);

        $json = json_encode($xmlObject);
        $pflisitng = json_decode($json, true);

        foreach ($pflisitng['property'] as $row) {
            if ($row['reference_number'] == $reference_id)
                $property = array(
                    'status' => $row['completion_status'],
                    'banner' => $row['photo']['url'][0],
                    'title' => $row['title_en'],
                    'price' => $row['price'],
                    'bedrooms' => $row['bedroom'],
                    'bathrooms' => $row['bathroom'],
                    'size' => $row['size'],
                    'community' => $row['community'],
                    'property_type' => $row['property_type'],
                    'description' => $row['description_en'],
                    'photos' => $row['photo']
                );
        }
        // dd($property);
        return view('user.pages.portal-property-details', compact('property'));
    }
    public function Careers()
    {
        return view('user.pages.careers');
    }

    public function Application(Request $request)
    {

        $application = new Application;
        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $resume = uniqid() . '.' . $file->guessExtension();
            $resume_path = $file->move(public_path() . '/assets/resumes/', $resume);
            $application->resume = $resume;
            // dd($resume_path);
            $application->full_name = $request->full_name??null;
            $application->email = $request->email??null;
            $application->driving_license = $request->driving_license??null;
            $application->car = $request->car??null;
            $application->experience_in_dubai = $request->experience_in_dubai??null;
            $application->visa_status = $request->visa_status??null;
            $application->visa_validity = $request->visa_validity??null;
            $application->nationality = $request->nationality??null;
            if ($application->save()) {
                \Mail::send(['html' => 'email_templates.job-applications'], ['application' => $application, 'resume' => $resume_path], function ($message) use ($application, $resume_path) {
                    $message->to('careers@homescope.ae')
                        ->subject('Application for Job')
                        ->from('admin@homescope.ae', 'Homescope Careers');
                    $message->attach($resume_path);

                });

                return back()->with('success', 'Application sent!');
            } else {
                return back()->with('error', 'Something went wrong!');
            }

        }
        // else {
        //     $application->full_name = $request->full_name;
        //     $application->email = $request->email;
        //     $application->driving_license = $request->driving_license;
        //     $application->car = $request->car;
        //     $application->experience_in_dubai = $request->experience_in_dubai;
        //     $application->visa_status = $request->visa_status;
        //     $application->visa_validity = $request->visa_validity;
        //     $application->nationality = $request->nationality;
        //     if ($application->save()) {
        //         \Mail::send(['html' => 'email_templates.job-applications'], ['application' => $application], function ($message) use ($application) {
        //             $message->to('careers@homescope.ae')
        //                 ->subject('Application for Job')
        //                 ->from('admin@homescope.ae', 'Homescope Careers');


        //         });

        //         return back()->with('success', 'Application sent!');
        //     } else {
        //         return back()->with('error', 'Something went wrong!');
        //     }

        // }


    }
}
