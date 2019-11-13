<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Redirect;
use App\AdminInterviewee;

class IntervieweeController extends Controller
{
    public function index()
    {
    	$interviewee = AdminInterviewee::all();
    	return view('admin.interviewee',compact('interviewee'));
    }

    public function add()
    {
    	$action = 'Add';
    	return view('admin.interviewee_form',compact('action'));	
    }

    public function insert(Request $request)
    {
    	$first_name = $request->input('first_name');
		$last_name = $request->input('last_name');
		$email = $request->input('email');
		$password = $request->input('password');

		$data = array(
                        'first_name' => $first_name,
                        'last_name'=> $last_name,
                        'email'=> $email,
                        'password'=> $password,
                    );

		AdminInterviewee::UpdateOrCreate($data);
		return Redirect::to('admin/interviewee')->with('success','Interviewee added.');
    }

    public function edit($id)
    {
    	$action = 'edit';
    	$interviewee_data = AdminInterviewee::where('id', $id)->get();
    	return view('admin.interviewee_form',compact('action','interviewee_data'));	
    }

    public function update(Request $request)
    {
    	$id = $request->input('id');
    	$first_name = $request->input('first_name');
		$last_name = $request->input('last_name');
		$email = $request->input('email');
		$password = $request->input('password');

		$data = array(
                        'first_name' => $first_name,
                        'last_name'=> $last_name,
                        'email'=> $email,
                        'password'=> $password,
                    );

		AdminInterviewee::where('id',$id)->update($data);
		return Redirect::to('admin/interviewee')->with('success','Interviewee updated.');
    }
    public function delete($id)
    {   
        AdminInterviewee::where('id', $id)->delete();
        return Redirect::to('admin/interviewee')->with('success','Interviewee deleted.');
    }
}
