<?php

namespace App\Http\Controllers;

use App\MeetingType;
use Illuminate\Http\Request;
use App\Meeting;
use Auth;
class MeetingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('management.Meetings');
    }
    public function update(Request $request,$id){
        $status = null;
        $message = null;

        switch ($request->value){
            case 1:
                $status = "accepted";
                $message = "The Meeting Is Successfully Accepted";
                break;
            case 2:
                $status = "declined";
                $message = "The Meeting Is Successfully Declined";
                break;
        }

        $meeting = Meeting::find($id);
        if($status && $message){
            $meeting->status = $status;
            $meeting->save();

            return ['message'=>$message,'status'=>$status];
        }
    }
    public function store(Request $request){

        $meeting = $this->validate($request,[
                    'meeting_type_id'=>['required'],
                    'address'=>['required','string'],
                    'start_date'=>['required'],
                    'end_date'=>['required'],

                ]);
        $meeting = array_merge($meeting, array('user_id'=>Auth::id()));

        $meeting = Meeting::create($meeting);

        return $meeting;

    }
    public function get_meetings(){

        return Meeting::with('meetingType')->where('status','new')->get();
    }
    public function get_meeting_type(){
        return MeetingType::all();
    }
    public function acceptedmeeting(){
        return view('management.meeting');
    }
    public function wardCouncil(){
        return Meeting::with('meetingType')->where('status','accepted')->MyMettings()->get();
    }
}
