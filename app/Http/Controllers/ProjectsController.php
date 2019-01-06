<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResources;
use Illuminate\Http\Request;
use Auth;
use App\Projects;
class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('management.project');
    }
    public function update(Request $request,$id){

        $status = null;
        $message = null;
        $project = Projects::find($id);
        switch ($request->value){
            case 1:
                    $status = "Active";
                    $message = "Project is now active";
                break;
            case 2:
                $status = "Ended";
                $message = "Project is have been completed successfully";

                break;
            case 3:
                $status = "Cancelled";
                $message = "Project is cancelled";
                break;
        }

        $project->status = $status;
        $project->save();

        return ['message'=>$message,'status'=>$status];


    }
    public function store(Request $request){

        $project = $this->validate($request,[
                    'project_name'=>['required','string'],
                    'start_date'=>['required'],
                    'end_date'=>['required'],
                    'description'=>['required','string'],
                ]);

        $project = Projects::create($project);

        return $project;


    }
    public function get_projects(){
        return ProjectResources::collection(Projects::paginate(10));
    }
}
