<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meeting;
use App\Calls;
use App\Booking;
use App\Projects;
use App\Budgets;
class StatsController extends Controller
{
    public function callStats(){

        $acceptedCalls = Calls::where('status','accepted')->count();
        $closedCalls = Calls::where('status','closed')->count();
        $newCalls = Calls::where('status','new')->count();

        $acceptedMeeting = Meeting::where('status','accepted')->count();
        $declinedMeeting = Meeting::where('status','declined')->count();
        $newMeeting = Meeting::where('status','new')->count();

        $acceptedBooking = Booking::where('status','accepted')->count();
        $closedBooking = Booking::where('status','declined')->count();
        $newBooking = Booking::where('status','new')->count();

        return ['newCalls'=>$newCalls,'acceptedCalls'=>$acceptedCalls,'closedCalls'=>$closedCalls,
            'newMeeting'=>$newMeeting,'acceptedMeeting'=>$acceptedMeeting,'declinedMeeting'=>$declinedMeeting,
            'newBooking'=>$newBooking,'acceptedBooking'=>$acceptedBooking,'closedBooking'=>$closedBooking,];
    }


    public function projectsStats(){
        return Projects::limit(10)->get();
    }
    public function budgetStats(){
        $budgets = Budgets::all();
        $total = 0;
        $total_used = 0;
        $total_left = 0;
        foreach ($budgets as $budget){
            $total += $budget->allocated_amount;
            $total_used +=$budget->used_amount;
        }
        $total_left = abs($total - $total_used);

        $budget = array('total'=>$total,'total_used'=>$total_used,'total_left'=>$total_left);
        return [ 'budget'=>$budget, 'budgets'=>$budgets];
    }
}
