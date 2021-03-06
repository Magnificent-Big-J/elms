<?php

namespace App\Http\Controllers;

use App\documents;
use App\Http\Resources\PlansResources;
use Illuminate\Http\Request;
use App\Plans;
use Auth;
use App\PlanType;

class PlansController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('residence.apply');
    }
    public function update(Request $request,$id){
        $status = null;
        $message = null;

        switch ($request->value){
            case 1:
                $status = "accepted";
                $message = "The Application Is Successfully Accepted";
                break;
            case 2:
                $status = "declined";
                $message = "The Application Is Successfully Declined";
                break;
        }

        $plan = Plans::find($id);
        if($status && $message){
            $plan->status = $status;
            $plan->save();

            return ['message'=>$message,'status'=>$status];
        }
    }
    public function store(Request $request){

        $plan = $this->createPlan($request->plan_type_id,$request->motivation);

        if($request->plan_type_id == 1){
            if($request->hasFile('certified_id')) {
                $doc_file = $request->file('certified_id');
                $certificate_id = $this->UploadDocuments($doc_file);
                $this->createDocument(1,$request->plan_type_id,$plan->id,$certificate_id);
            }
            if($request->hasFile('letter')) {
                $doc_file = $request->file('letter');
                $letter = $this->UploadDocuments($doc_file);
                $this->createDocument(2,$request->plan_type_id,$plan->id,$letter);
            }


        }
        else if($request->plan_type_id == 2){

            if($request->hasFile('house_plan')) {
                $doc_file = $request->file('house_plan');
                $house_plan = $this->UploadDocuments($doc_file);
                $this->createDocument(3,$request->plan_type_id,$plan->id,$house_plan);
            }
        }




        return;

    }
    public function get_application(){
        return PlansResources::collection(Plans::with('planType')->where('status','new')->paginate(9));
    }
    protected function get_plan_types(){
        return PlanType::all();
    }
    public function application_management(){
        return view('management.applications');
    }
    public function saveFile(Request $request){

        //return $request->all();
        if($request->hasFile('certified_id')){
            $doc_file = $request->file('certified_id');
            $file =  $this->additional_filename().'_'. $doc_file->getClientOriginalName() ;
            $doc_file->move("certificates/",$file);

            return 'File uploaded';
        }


        return 'Something went wrong';
    }
    protected function UploadDocuments($document){

        $file = $this->additional_filename() . $document->getClientOriginalName();
        $document->move("certificates/",$file);

        return $file;
    }
    protected function additional_filename(){
        return auth()->user()->name.'_'.time();
    }
    protected function createPlan($plan_type_id,$motivation){
        $plan = Plans::create([
            'plan_type_id'=>$plan_type_id,
            'motivation'=>$motivation,
            'user_id'=>Auth::id(),
            'plan_date'=>\Carbon\Carbon::now()

        ]);

        return $plan;
    }
    protected function createDocument($document_type_id,$plan_type_id,$plan_id,$file_path){

        documents::create([
            'document_type_id'=>$document_type_id,
            'plan_type_id'=>$plan_type_id,
            'document_type_id'=>$document_type_id,
            'user_id'=>Auth::id(),
            'plan_id'=>$plan_id,
            'date_uploaded'=>\Carbon\Carbon::now(),
            'file_path'=>$file_path

        ]);
    }
    public function application_progress(){

        if(auth()->user()->type == 'residence'){
            $plans = Plans::with('planType')->with('user')->Mine();
        }
        else{
            $plans = Plans::with('planType')->with('user');
        }
        $plans = $plans->paginate(5);
        return view('management.application_progress',compact('plans'));
    }
    public function view_application($id){


        return view('management.ViewApplication',compact('id'));
    }
    public function test(){
        return view('management.test');
    }
    public function get_plan_and_doc($id){
        $plan = Plans::with('planType')->where('id',$id)->get();
        $doc = documents::with('document_type')->where('plan_id',$id)->get();

        return ['plan'=>$plan,'documents'=>$doc];
    }
    public function prepare_file($file){

        return '../certificates/'. $file;
    }
}
