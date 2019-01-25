<?php

namespace App\Http\Controllers;

use App\Http\Resources\MeetingResources;
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

        return  MeetingResources::collection( Meeting::with('meetingType')->where('user_id',auth()->user()->id)->where('status','new')->paginate(9));
    }
    public function get_meeting_type(){
        return MeetingType::all();
    }
    public function acceptedmeeting(){
        $meetings =  Meeting::with('meetingType')->where('status','accepted')->MyMettings()->get();
        return view('management.meeting',compact('meetings'));
    }
    public function wardCouncil(){
       return Meeting::with('meetingType')->where('status','accepted')->MyMettings()->get();
    }
    public function ward_meetings(){

        return view('residence.councilor_meetings');
    }
    public function get_ward_meeting(){
        return MeetingResources::collection( Meeting::with('meetingType')->with('user')->where('status','accepted')->paginate(9));
    }
}
