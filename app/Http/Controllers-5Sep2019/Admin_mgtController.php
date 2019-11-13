<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use DB;

class Admin_mgtController extends Controller
{
    function __construct()
	{
		date_default_timezone_set('Asia/Kolkata');
	}
    public function index()
    {
    	$adm_mgt = DB::table('admin_login')
			 ->where('user_name','!=','admin')
			->get();
    	return view('adm_mgt.manage',compact('adm_mgt'));
    }

    public function add()
    {
    	$action = 'Add';
    	return view('adm_mgt.form',compact('action'));	
    }

	

	public function accessper($id,$user_name)
	    { 
	    	$action = "Add";   
		$ids = $id;
		$name = $user_name;  
		$adm_modules= array();

		$adm_modules = DB::table('admin_module_permission')
			 ->select('mid')
			 ->where('uid',$ids)
			->get();


           	return view('adm_mgt.formper',compact('action','ids','name','adm_modules'));	
	    }


	public function insertpermission(Request $request)
	{

		$module = array();
		$module = $request->input('chk');
		$adminid = $request->input('id');
		$username = $request->input('username');
		
		$check = DB::table('admin_module_permission')
                                 ->select('uid')
                                 ->where('uid',$adminid)
                                 ->first();

        if(!empty($check->uid)){
           DB::table('admin_module_permission')->where('uid',$adminid)->delete();
        }


		for($i=0;$i<count($module);$i++)
		{		
			$data = array(
		                'uid' => $adminid,
		                'mid' => $module[$i],
		                'status' => 'approved'
		            );

	    	 $insert_detail = DB::table('admin_module_permission')->insert($data);

		}


		if($insert_detail){
		    return Redirect::to('admin_mgt')->with('success', 'Sub admin has been Updated');
		}
		else{
		    return Redirect::to('admin_mgt/accessper/'.$adminid.'/'.$username )->with('error', 'Some Error');
		}


	}


    public function insert(Request $request)
    {
    	$first_name = $request->input('username');
    	$email = $request->input('email');
    	$password = md5($request->input('password'));

        $check = DB::table('admin_login')
                                 ->select('email')
                                 ->where('email',$email)
                                 ->first();

        if(!empty($check->email)){
            return Redirect::to('admin_mgt/add')->with('error', 'Email Already Exist.');
        }

    	$data = array(
                        'user_name' => $first_name,
                        'email' => $email,
                        'password' => $password,
                        'status' => 'approved',
                        'created_at' => date('Y-m-d H:i:s')
                    );
        $insert_detail = DB::table('admin_login')->insert($data);

        if($insert_detail){
            return Redirect::to('admin_mgt')->with('success', 'Sub admin has been Inserted');
        }
        else{
            return Redirect::to('admin_mgt/add')->with('error', 'Some Error');
        }
    }

    public function edit($id){
    	$action = "Edit";
        $editdata = DB::table('admin_login')->where('id','=',$id)->first(); 
        return view('adm_mgt.form',compact('action','editdata'));
    }

    public function update(Request $request)
    {
    	$id = $request->input('id');
    	$first_name = $request->input('username');
    	$email = $request->input('email');
        $password = $request->input('password');
        $old_pass = $request->input('old_pass');

        if($password == $old_pass){
            $password = $password;
        }else{
            $password = md5($password);
        }
    	
        $check = DB::table('admin_login')
                                 ->select('email')
                                 ->where('email',$email)
                                 ->where('id','!=',$id)
                                 ->first();

        if(!empty($check->user_name)){
            return Redirect::to('admin_mgt/edit/'.$id)->with('error', 'email Already Exist.');
        }

    	$data = array(
                        'user_name' => $first_name,
                        'email' => $email,
                        'password' => $password,
                        'updated_at' => date('Y-m-d H:i:s')
                    );

    	$update_detail = DB::table('admin_login')
                            ->where('id', $id)
                            ->update($data);

        if($update_detail){
            return Redirect::to('admin_mgt')->with('success', 'Sub admin has been Updated');
        }
        else{
            return Redirect::to('admin_mgt/edit/'.$id)->with('error', 'Some Error');
        }
    }

    public function delete($id){
        $delete_detail = DB::table('admin_login')->where('id',$id)->delete();

        if($delete_detail){
            return Redirect::to('admin_mgt')->with('success', 'Sub admin has been Deleted');
        }
        else{
            return Redirect::to('admin_mgt')->with('error', 'Some Error');
        }
    }

    public function change_status($id,$status){
        $data = array(
                        'status' => $status,
                        'updated_at' => date('Y-m-d H:i:s')
                    );

        $update_detail = DB::table('admin_login')
                            ->where('id', $id)
                            ->update($data);

        if($update_detail){
            return Redirect::to('admin_mgt')->with('success', 'Sub admin status has been Updated');
        }
        else{
            return Redirect::to('admin_mgt')->with('error', 'Some Error');
        }
    }
}
