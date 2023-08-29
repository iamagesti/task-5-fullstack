<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index',[
            'title'=> 'Register',
            'active'=>'register'
        ]);
    }

    public function store(Request $request){

        $validateData=$request->validate([
            'name'=> ['required','max:225'],
            'email'=> ['required','email','unique:users'],
            'password'=> ['required','min:5','max:225']
        ]);

        $validateData['password']= Hash::make($validateData['password']);

        User::create($validateData);

       
        // $request->flash('Success', 'Registration Successful');
        return redirect('/login')->with('success','Registration Successfull! Please login');
    }
}
