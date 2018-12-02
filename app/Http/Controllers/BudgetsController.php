<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Budgets;
use Auth;
class BudgetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('management.budgets');
    }
    public function update(Request $request){

    }
    public function store(Request $request){
            $budget = $this->validate($request,[
                    'year'=>['required','numeric'],
                    'allocated_amount'=>['required','string'],
                    'description'=>['required','string'],
                ]);

            $budget = Budgets::create($budget);

            return $budget;

    }
    public function get_budgets(){
        return Budgets::all();
    }
}
