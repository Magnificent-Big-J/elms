<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookingResources;
use App\User;
use Illuminate\Http\Request;
use App\Booking;
use App\BookingType;
use Auth;
class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('residence.bookings');
    }
    public function update(Request $request,$id){

        $booking = Booking::find($id);
        $status = null;
        $message = null;
        $ward = User::find($booking->user_id);

        $ward2 = User::where('type','=','ward')->where('ward_no','=',$ward->ward_no)->get();
       

        switch($request->value){
            case 1:
                    $status = "accepted";
                    $message = "The Booking is accepted and meeting request has been created";
                    \App\Meeting::create([
                        'user_id'=>$ward2[0]->id,
                        'meeting_type_id'=>$request->value,
                        'address'=>$booking->address,
                        'start_date'=>$booking->start_date,
                        'end_date'=>$booking->end_date
                    ]);
                break;
            case 2:
                $status = "declined";
                $message = "The Booking is declined and no meeting request has been created";

                break;

        }
        $booking->status = $status;
        $booking->save();

        return ['message'=>$message,'status'=>$status];
    }
    public function store(Request $request){


        $booking = $this->validate($request,[
                'booking_type_id'=>['required'],
                'address'=>['required'],
                'start_date'=>['required'],
                'end_date'=>['required'],
            ]);
        $booking = array_merge($booking,array('user_id'=>Auth::id()));

        $booking = Booking::create($booking);

        return $booking;
    }
    public function get_bookings(){
        return BookingResources::collection(Booking::with('bookingType')->where('status','new')->paginate(9)) ;
    }
    public function get_booking_types(){
        return BookingType::all();
    }
    public function booking_management(){
        return view('management.book');
    }
}
