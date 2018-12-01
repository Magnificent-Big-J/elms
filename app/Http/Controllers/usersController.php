<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class usersController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(){
        return view('management.users');
    }
    public function update(Request $request){

    }
    public function store(Request $request){



        $user = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contact_number' => ['required', 'string', 'max:10'],
            'postal_code' => ['required', 'numeric'],
            'gender' => ['required', 'string'],
            'address' => ['required', 'string'],
            'type' => ['required', 'string'],
        ]);
        $user = array_merge($user,array('password'=>bcrypt('secret')));
      $user = User::create($user);


      return $user;
    }
    public function get_users(){

        return User::all();

    }
}
