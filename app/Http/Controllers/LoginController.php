<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
Use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function viewIndex(){
        return view('login');
    }

    public function login(Request $request){
        $fields = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Check User
        $user = User::where('username',$fields['username'])->first();
        // Check Password
        if(!$user || !Hash::check($fields['password'],  $user->password)){
            return back()->withErrors('Username atau Password salah!');
        }
        $request->session()->put('user',['id' => $user->id ,'username' => $user->username, 'name' => $user->name]);
        return redirect('home');
    }

    public function viewEdit(Request $request){
        $id = $request->session()->get('user')['id'];
        $user = User::find($id);

        $params = [
            'id' => $user->id,
            'username' =>  $user->username,
            'name' => $user->name
        ];

        return view('editUser', [
            'user' => $params
        ]);
    }

    public function viewAdd(){
        return view('addUser');
    }

    public function editUser(Request $request){
        $validate = Validator::make($request->all(),[
            'password' => 'required'
        ]);

        if($validate->fails()){
            $request->session()->flash('status','failed');
            return back();
        }

        $id = $request->id;

        $user = User::find($id);

        $user->fill([
            'password' => bcrypt($request->password),
        ]);

        $user->save();
        $request->session()->flash('status','success');

        return back();
    }

    public function addUser(Request $request){

        $validate = Validator::make($request->all(),[
            'username' => 'required|unique:users',
            'name' => 'required',
            'password' => 'required'
        ]);

        if($validate->fails()){
            $request->session()->flash('status','failed');
            return back();
        }

        user::create([
            'username' => $request->username,
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        $request->session()->flash('status','success');

        return back();
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }
}
