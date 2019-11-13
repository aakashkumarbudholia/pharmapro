<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Redirect;
use App\AdminInterviewer;

class InterviewerController extends Controller
{
    public function index()
    {
    	$interviewer = AdminInterviewer::all();
    	return view('admin.interviewer',compact('interviewer'));
    }

    public function add()
    {
    	$action = 'Add';
    	return view('admin.interviewer_form',compact('action'));	
    }

    public function insert(Request $request)
    {
    	$first_name = $request->input('first_name');
		$last_name = $request->input('last_name');
		$email = $request->input('email');
		$username = $request->input('username');
		$password = $request->input('password');

		$data = array(
                        'first_name' => $first_name,
                        'last_name'=> $last_name,
                        'email'=> $email,
                        'username'=> $username,
                        'password'=> $password,
                    );

		AdminInterviewer::UpdateOrCreate($data);
		return Redirect::to('admin/interviewer')->with('success','Interviewer added.');
    }

    public function edit($id)
    {
    	$action = 'edit';
    	$interviewer_data = AdminInterviewer::where('id', $id)->get();
    	return view('admin.interviewer_form',compact('action','interviewer_data'));	
    }

    public function update(Request $request)
    {
    	$id = $request->input('id');
    	$first_name = $request->input('first_name');
		$last_name = $request->input('last_name');
		$email = $request->input('email');
		$username = $request->input('username');
		$password = $request->input('password');

		$data = array(
                        'first_name' => $first_name,
                        'last_name'=> $last_name,
                        'email'=> $email,
                        'username'=> $username,
                        'password'=> $password,
                    );

		AdminInterviewer::where('id',$id)->update($data);
		return Redirect::to('admin/interviewer')->with('success','Interviewer updated.');
    }
    public function delete($id)
    {   
        AdminInterviewer::where('id', $id)->delete();
        return Redirect::to('admin/interviewer')->with('success','Interviewer deleted.');
    }
}
