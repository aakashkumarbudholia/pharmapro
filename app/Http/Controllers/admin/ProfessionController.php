<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProfessionModel;
use DB;
use Session;
use Redirect;

class ProfessionController extends Controller
{
    public function index()
    {
    	$services = ProfessionModel::all();
    	return view('admin.profession',compact('services'));
    }

    public function add()
    {
    	$action = 'Add';
    	return view('admin.profession_form',compact('action'));	
    }

    public function insert(Request $request)
    {
        $title = $request->input('title');
        $display_order=$request->input('display_order');
		$data = array(
                        'title' => $title,
                        'display_order'=>$display_order,
                    );

		ProfessionModel::UpdateOrCreate($data);
		return Redirect::to('admin/profession')->with('success','Profession added.');
    }

    public function edit($id)
    {
    	$action = 'edit';
    	$service = ProfessionModel::where('id', $id)->get();
    	return view('admin.profession_form',compact('action','service'));	
    }

    public function update(Request $request)
    {
    	$service_id = $request->input('service_id');
        $title = $request->input('title');
    	 $display_order=$request->input('display_order');

		$data = array(
                        'title' => $title,
                         'display_order'=>$display_order,
                    );

		ProfessionModel::where('id',$service_id)->update($data);
		return Redirect::to('admin/profession')->with('success','Profession updated.');
    }

    public function delete($id)
    {	
    	ProfessionModel::where('id', $id)->delete();
    	return Redirect::to('admin/profession')->with('success','Profession deleted.');
    }
}
