<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUser;
use Illuminate\Support\Facade\Hash;
use Illuminate\Support\Facade\Validator;

class SignupController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }
    public function index(){
        return view('auth.signup');
    }

    protected function create (Request $request){

        $rules = [

            'name' => ['required','string','max:255'],
            'email' => ['required','string','max:255', 'unique:users'],
            'password' => ['required'.'string','min:8','confirmed'],
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validtor->fails()){
            
            return redirect('signup')
            ->withInput()
            ->withErrors($validator);
        }
        else{
            $data = $request->all();
            $user = new User;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->save();
            return redirect('login')->with('status',"Signup Succesful");
        }
    }
}
