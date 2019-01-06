<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResources;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Notifications\sendDetails;

class usersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('management.users');
    }
    public function profile(){
        return view('management.profile');
    }
    public function update(Request $request){

        $user = User::findOrFail(Auth::id());

        $this->validate($request,[
            'email'=>'required|email|string|max:191|unique:users,email,'.$user->id,
            'contact_number'=>'required|string'
        ]);

        $user->update($request->all());

        return ['message'=>'Your Profile Contact Information have been updated successfully'];
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

        $user->notify(new sendDetails($user));

      return $user;
    }
    public function get_users(){

        return UserResources::collection(User::paginate(10)) ;

    }
    public function get_profile(){

        return User::where('id',Auth::id())->get();
    }
    public function get_residence(){

        return UserResources::collection(User::where('type','residence')->paginate(10));
    }
    public function updateDetails(Request $request){


        $user = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => 'required|email|string|max:191|unique:users,email,'.$request->id,
            'contact_number' => ['required', 'string', 'max:10'],
            'postal_code' => ['required', 'numeric'],
            'gender' => ['required', 'string'],
            'address' => ['required', 'string'],
            'type' => ['required', 'string'],
        ]);
        User::find($request->id)->update($user);

        return ['message'=>'User data successfully updated'];
    }
}
