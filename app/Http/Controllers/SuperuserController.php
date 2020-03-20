<?php

namespace App\Http\Controllers;

use App\Mail\Superuser;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SuperuserController extends Controller
{
    public function add(Request $data){
        $request = request()->validate([
            'firstname'=>'required',
            'lastname'=>'',
            'email'=>['required',Rule::unique('users','email')],
            'phone'=>'required',
            'photo'=> '',
            'permissions'=>'required',
            'remember_token'=> '',



        ]);



        if($data->photo!=NULL)
             $request['photo']=$data->file("photo")->store('public/superuser');
        $request['name']= $request['firstname'] . ' '  .$request['lastname'];
        $request['password_sent']=Str_random(5);
        $request['password']=Hash::make($request['password_sent']);
        $request['change_pass'] = 1;
        $temp_pass=$request['password_sent'];
        $data= User::create($request);

         Mail::to($request['email'])->send(
           new Superuser($data,$temp_pass)
         );


        return back()->with("MSG","User added successfully, Check the email for username and password")->with("TYPE", "Success");

//
//        app('auth.password.broker')->createToken($data);

//
//        $data = DB::table('password_resets')->where('email','=','ambalavanbasith@gmail.com')->get();
//
////        print_r ($data[0]->token);
//
//        return $data[0]->token;




    }
    public function reset(){
        Auth::logout();
        return redirect(\Illuminate\Support\Facades\Session::get('page_msg')['url']);
    }


    public function delete(Request $request){
        if(Storage::delete(User::find($request->id)->photo) || $request->photo ==NULL)
            User::destroy($request->id);
            return back();

    }
    public function update(request $data,$id){

        $request = request()->validate([
            'firstname'=>'required',
            'lastname'=>'',
            'phone'=>'required',
            'photo'=> '',
            'permissions'=>'',
            'remember_token'=> '',



        ]);
        if($data->photo!=NULL){
            Storage::delete(User::find($id)->photo);
            $request['photo']=$data->file("photo")->store('public/income_files'); }
            $request['name']= $request['firstname'] . ' '  .$request['lastname'];

            User::whereId($id)->update($request);

        return back()->with("MSG","User Updated Successfully.")->with("TYPE", "Success");






    }
}
