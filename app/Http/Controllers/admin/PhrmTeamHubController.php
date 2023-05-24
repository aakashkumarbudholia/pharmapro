<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Redirect;
use App\PharmaproTeamHub;

class PhrmTeamHubController extends Controller
{
   	public function index()
   	{
   		$teamHubUser=PharmaproTeamHub::all();
   		return view('admin.teamhub_form',compact('teamHubUser'));
   	}
   	public function add()
   	{
   		$action='Add';
   		return view('admin.teamhub_form',compact('action'));
   	}
   	public function insert(Redirect $request)
   	{
   		$id=$request->Input('id');
		$first_name=$request->Input('first_name');
		$last_name=$request->Input('last_name');
		$email=$request->Input('email');
		$password=$request->Input('password');
		$role=$request->Input('role');
   		$data=array(
				'first_name'=>$first_name,
				'last_name'=>$last_name,
				'email'=>$email,
				'password'=>$password,
				'role'=>$role
			);
			PharmaproTeamHub::UpdateOrCreate($data);
			return Redirect::to('admin/teamMemberUser')->with('success','Team Hub user added.');
   	}
   	public function edit($id)
	{	

		$action='edit';
		$Phrm_TeamHub=DB::table('pharmapro_teammember')->where('id',$id)->get();
		return view('admin.teamhub_form',compact('action','Phrm_TeamHub'));	
	}
	public function update(Request $request)
	{
		$id=$request->input('id');
		$first_name=$request->input('first_name');
		$last_name=$request->input('last_name');
		$email=$request->input('email');
		$password=$request->input('password');
		$role=$request->input('role');
		$data=array(

			'first_name'=>$first_name,
			'last_name'=>$last_name,
			'email'=>$email,
			'password'=>$password,
			'role'=>$role
		);
		PharmaproTeamHub::where('id',$id)->update($data);
		$teamData=DB::table('pharmapro_teammember')->where('id',$id)->first();
		return Redirect::to('admin/employer/edit/'.$teamData->interviewer_id);
	}
	public function delete($id)
	{
		$teamData=DB::table('pharmapro_teammember')->where('id',$id)->first();
		$data=PharmaproTeamHub::find($id);
        $data->delete();
		
		return Redirect::to('admin/employer/edit/'.$teamData->interviewer_id);
	}
}
