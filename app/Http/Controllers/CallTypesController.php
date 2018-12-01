<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CallTypes;
use Auth;
class CallTypesController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(){
        return view('');
    }
    public function get_all(){

        return CallTypes::all();
    }
}
