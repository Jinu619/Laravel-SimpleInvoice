<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function index(){
        if(isset(auth()->user()->id)){
            return redirect('invoices');
        }else{
            return view('welcome');
        }
        
    }
    public function register(Request $request){
//        dd($request->all());
        $request->validate([
            'uname' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $password= Hash::make($request->password);
        $regi = new User;
        $regi->name=$request->uname;
        $regi->email=$request->email;
        $regi->password=$password;
        $regi->save();
        return redirect('login');
    }
    public function login(){
        return view('login');
    }
    public function dologin(Request $request){
        $request->validate([
            'uname' => 'required',
            'password' => 'required'
        ]);
        $input=['name'=>$request->uname,'password'=>$request->password];
        if(auth()->attempt($input)){
            return redirect('invoices');
        }
        else{
            return redirect('login');
        }

    }
    public function logout(){
        auth()->logout();
        return redirect('login');
    }
}
