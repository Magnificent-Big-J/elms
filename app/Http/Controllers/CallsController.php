<?php

namespace App\Http\Controllers;

use App\Http\Resources\CallResources;
use Illuminate\Http\Request;
use App\Calls;
use App\CallTypes;
use Auth;
class CallsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('management.calls');
    }
    public function update(Request $request,$id){

        $status = null;
        $message = null;

        switch ($request->value){
            case 1:
                $status = "accepted";
                $message = "The Call Is Successfully Accepted";
                break;
            case 2:
                $status = "closed";
                $message = "The Call Is Successfully Closed";
                break;
        }

        $call = Calls::find($id);
        if($status && $message){
            $call->status = $status;
            $call->accepted_by = auth()->user()->name . ' ' .auth()->user()->surname;
            $call->save();

            return ['message'=>$message,'status'=>$status];
        }

    }
    public function store(Request $request){

        $call = $this->validate($request,[
            'call_type_id'=>['required'],
            'reason'=>['required','string'],
        ]);

        $call = array_merge($call,array('user_id'=>Auth::id(),'call_date'=>\Carbon\Carbon::now()));
        $call = Calls::create($call);

        return $call;
    }
    public function get_calls(){
        return Calls::with('user')->with('callType')
                    ->where('status','new')
                    ->where('call_type_id','=',auth()->user()->call_type_id)
                    ->orWhere('status','accepted')
                    ->get();
    }
    public function log_call(){
        return view('residence.logcall');
    }
    public function get_call_types(){
        return CallTypes::all();
    }
    public function CallsProgress(){

        if(auth()->user()->type =='residence'){
            return CallResources::collection(Calls::with('callType')->with('user')->MyCalls()->paginate(10));
        }
        else if (auth()->user()->type =='employee'){

            return CallResources::collection(Calls::with('callType')->with('user')->where('call_type_id','=',auth()->user()->call_type_id)->paginate(10));
        }
        else{
            return CallResources::collection( Calls::with('callType')->with('user')->paginate(10));
        }


    }
    public function progress(){
        if(auth()->user()->type =='residence'){
            $calls = Calls::with('callType')->with('user')->MyCalls();
        }
        else{
            $calls = Calls::with('callType')->with('user')->where('call_type_id','=',auth()->user()->call_type_id);
        }
        $calls = $calls->paginate(10);

        return view('management.progress',compact('calls'));
    }
}
