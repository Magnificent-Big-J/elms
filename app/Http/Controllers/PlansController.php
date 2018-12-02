<?php

namespace App\Http\Controllers;

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
            $plan = $this->validate($request,[
                'plan_type_id'=>['required'],
                'motivation'=>['required','string'],
            ]);

            $plan = array_merge($plan,array('user_id'=>Auth::id(),'plan_date'=>\Carbon\Carbon::now()));
            $plan = Plans::create($plan);

            return $plan;
    }
    public function get_application(){
        return Plans::with('planType')->where('status','new')->get();
    }
    protected function get_plan_types(){
        return PlanType::all();
    }
    public function application_management(){
        return view('management.applications');
    }
}
