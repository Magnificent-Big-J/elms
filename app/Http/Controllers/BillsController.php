<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bills;
use Auth;
class BillsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(){
        return view('');
    }
    public function update(Request $request){

    }
    public function store(Request $request){

    }
    public function get_all(){

    }
}
