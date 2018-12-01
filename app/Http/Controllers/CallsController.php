<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calls;

class CallsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
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
            $call->save();

            return ['message'=>$message,'status'=>$status];
        }

    }
    public function store(Request $request){

    }
    public function get_calls(){
        return Calls::with('user')->with('callType')->where('status','new')->get();
    }
}
