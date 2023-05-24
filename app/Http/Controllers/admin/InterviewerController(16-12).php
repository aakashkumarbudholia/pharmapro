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
    //	$interviewer = AdminInterviewer::all();

	$interviewer = DB::table('users')
	    ->orderBy('id', 'desc')
            ->get();

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
		$enc_password = base64_encode($password);
		$pharmacie = $request->input('pharmacie');
		$adresse = $request->input('adresse');
		$postal = $request->input('postal');
		$villa = $request->input('villa');
		$departement = $request->input('departement');
		$code = $request->input('code');

		$data = array(
                        'first_name' => $first_name,
                        'last_name'=> $last_name,
                        'email'=> $email,
                        'username'=> $username,
                        'password'=> $enc_password,
			'status' => 'approved',
			'pharmacie'=> $pharmacie,
			'adresse'=> $adresse,
			'postal'=> $postal,
			'villa'=> $villa,
			'departement'=> $departement,
			'state'=> $departement,
			'code'=> $code,
                    );

		AdminInterviewer::UpdateOrCreate($data);
		return Redirect::to('admin/employer')->with('success','Employer added.');
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
		$enc_password = base64_encode($password);
		$pharmacie = $request->input('pharmacie');
		$adresse = $request->input('adresse');
		$postal = $request->input('postal');
		$villa = $request->input('villa');
		$departement = $request->input('departement');
		$code = $request->input('code');

		$data = array(
                        'first_name' => $first_name,
                        'last_name'=> $last_name,
                        'email'=> $email,
                        'username'=> $username,
                        'password'=> $enc_password,
			'pharmacie'=> $pharmacie,
			'adresse'=> $adresse,
			'postal'=> $postal,
			'villa'=> $villa,
			'departement'=> $departement,
			'state'=> $departement,
			'code'=> $code,
                    );

		AdminInterviewer::where('id',$id)->update($data);
		return Redirect::to('admin/employer')->with('success','Employer updated.');
    }
    public function delete($id)
    {   
        AdminInterviewer::where('id', $id)->delete();
        return Redirect::to('admin/employer')->with('success','Employer deleted.');
    }
}
