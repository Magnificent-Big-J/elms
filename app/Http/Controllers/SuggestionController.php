<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suggestion;
use Auth;
class SuggestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('residence.Suggestions');
    }
    public function update(Request $request){


    }
    public function store(Request $request){
        $suggestion = $this->validate($request,[
            'name'=>['required','string'],
            'motivation'=>['required','string'],
        ]);
        $suggestion = array_merge($suggestion,array('suggestion_date'=>\Carbon\Carbon::now(),'user_id'=>Auth::id()));
        $suggestion = Suggestion::create($suggestion);

        return $suggestion;
    }
    public function get_suggestions(){
        return Suggestion::all();
    }
}
