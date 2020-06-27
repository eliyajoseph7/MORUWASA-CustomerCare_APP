<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Supports\Facades\Input;

use App\User;

class UserController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function users(){
        $users = User::all();
        return view('users/viewUsers', ['users' => $users]);
    }

    public function add(Request $request){
        $validatedData = $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'mname' => [ 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/^(\+255)[0-9]{9}$/', 'max:13'],
            'role' => ['required', 'string', 'max:30'],
            'zone' => ['required', 'string', 'max:30'],
            'gender' => ['required', 'string', 'max:5'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $newUser = new User;

        $newUser->fname = $request->input('fname');
        $newUser->mname = $request->input('mname');
        $newUser->lname = $request->input('lname');
        $newUser->username = $request->input('username');
        $newUser->phone = $request->input('phone');
        $newUser->role = $request->input('role');
        $newUser->gender = $request->input('gender');
        $newUser->zone = $request->input('zone');
        $newUser->email = $request->input('email');
        $newUser->password = Hash::make($request -> input('password'));

        $newUser->save();

        return redirect('/users')->with('info', 'user added successfully');

    }


    public function view($id){
        $user = User::find($id);
        return view('users/updateUser', ['user' => $user]);
    }

    public function update($id, Request $request){
        $user = User::find($id);

        $user->fname = $request->input('fname');
        $user->mname = $request->input('mname');
        $user->lname = $request->input('lname');
        $user->username = $request->input('username');
        $user->phone = $request->input('phone');
        $user->role = $request->input('role');
        $user->zone = $request->input('zone');
        $user->gender = $request->input('gender');
        $user->email = $request->input('email');

        $user->save();

        return redirect('viewUser/'.$id)->with('info', 'user updated successful');
    }

    public function delete($id){
        User::where('id', $id)
        ->delete();
        
        return redirect('/users')->with('info', 'user deleted successfully');
    }
}
