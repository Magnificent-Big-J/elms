<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bills;
use Auth;
class BillsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $bills = Bills::with('user')->get();
        return view('management.bills',compact('bills'));
        return view('management.bills',compact('bills'));
    }
    public function mybills(){
        return view('residence.mybills');
    }
    public function update(Request $request){

    }
    public function store(Request $request){

    }
    public function user_bills(){
        return Bills::MyBills()->get();
    }
    public function get_all(){


    }

}
