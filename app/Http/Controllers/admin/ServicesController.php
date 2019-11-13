<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services;
use DB;
use Session;
use Redirect;

class ServicesController extends Controller
{
    public function index()
    {
    	$services = Services::all();
    	return view('admin.services',compact('services'));
    }

    public function add()
    {
    	$action = 'Add';
    	return view('admin.services_form',compact('action'));	
    }

    public function insert(Request $request)
    {
    	$title = $request->input('title');
		$description = $request->input('description');

		$data = array(
                        'title' => $title,
                        'description'=> $description,
                    );

		Services::UpdateOrCreate($data);
		return Redirect::to('admin/services')->with('success','Service added.');
    }

    public function edit($id)
    {
    	$action = 'edit';
    	$service = Services::where('id', $id)->get();
    	return view('admin.services_form',compact('action','service'));	
    }

    public function update(Request $request)
    {
    	$service_id = $request->input('service_id');
    	$title = $request->input('title');
		$description = $request->input('description');

		$data = array(
                        'title' => $title,
                        'description'=> $description,
                    );

		Services::where('id',$service_id)->update($data);
		return Redirect::to('admin/services')->with('success','Service updated.');
    }

    public function delete($id)
    {	
    	Services::where('id', $id)->delete();
    	return Redirect::to('admin/services')->with('success','Service deleted.');
    }
}
