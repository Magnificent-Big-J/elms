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
         $this->validate($request,[
            'year'=>['required','numeric'],
            'allocated_amount'=>['required','string'],
            'description'=>['required','string'],
        ]);

         $budget = Budgets::find($request->id);
         $budget->year = $request->year;
         $budget->allocated_amount = $request->allocated_amount;
         $budget->description = $request->description;
         if($request->used_amount ){
             if($budget->allocated_amount >=$request->used_amount){
                 $budget->used_amount = $request->used_amount;
             }
             else{
                 return ['message'=>'The Community has R'.$budget->allocated_amount . ' amount allocated not '. $request->used_amount,'status'=>'error','type'=>'Not Updated'];
             }

         }
         $budget->save();

         return ['message'=>'Budget Successfully updated','status'=>'success','type'=>'Updated'];




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
