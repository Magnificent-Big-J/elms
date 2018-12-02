<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlanType;
use Auth;
class PlanTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('management.project');
    }

    public function get_all(){
        return PlanType::all();
    }
}
