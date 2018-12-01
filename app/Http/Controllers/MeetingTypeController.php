<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MeetingType;
use Auth;
class MeetingTypeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(){
        return view('');
    }

    public function get_all(){
        return MeetingType::all();
    }
}
