<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use Redirect;
use DB;

class ProfileController extends Controller
{
    public function index(){
    	$profile_data = Profile::first();

        return view('admin.profile',compact('action','profile_data'));
    }

    public function update(Request $request)
    {

    	$id = $request->input('id');
    	$email = $request->input('email');
    	$username = $request->input('username');
		$password = $request->input('password');

		$data = array(
                        'email' => $email,
                        'username'=> $username,
                        'password'=> $password,
                    );

		$check = Profile::where('id',$id)->update($data);
		if($check){
			session(['login_type'=>'admin']);
            session(['user_id'=>$id]);
            session(['user_name'=>$username]);
        }
		return Redirect::to('admin/profile')->with('success','Profile updated.');
    }
}
