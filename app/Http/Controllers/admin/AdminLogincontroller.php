<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AdminLogincontroller extends Controller
{
    public function index(){
        return view("admin/login");
    }

    public function dashboard(){
         echo"hello dashboard";
    }

    public function authenticate(Request $request){
        $fieldType=filter_var($request->input("login_id"),FILTER_SANITIZE_STRING) ? 'email':'name';
        if($fieldType== 'email'){
            $request->validate([
                'login_id'=> 'required|email|exists:users,email',
                'password'=> 'required|min:4|max:7'
            ],[
                'login_id.required'=> 'Email or username is  required',
                'login_id.email'=> 'Invalid email address',
                'login_id.exists'=> 'Email is not exits in system ',
                'password.required'=>'Email or password is incorrect'
            ]);
            $creds=array(
                $fieldType=>$request->login_id,
                'password'=>$request->password
            );
            if(Auth::guard('admin')->attempt($creds)){
                return redirect()->route('admin.dashboard');
            }else{
                session()->flash('fail','Incorrect user name or password');
                return redirect()->route('admin.login');
            }
        }
        

    }
}
