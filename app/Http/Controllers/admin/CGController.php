<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CG;
use DB;
use Session;
use Redirect;

class CGController extends Controller
{
    public function index()
    {
    	$services = CG::all();
    	return view('admin.cg',compact('services'));
    }

    public function edit($id)
    {
    	$action = 'edit';
    	$service = CG::where('id', $id)->get();
    	return view('admin.cg_form',compact('action','service'));	
    }

    public function update(Request $request)
    {
    	$service_id = $request->input('service_id');
        $title = $request->input('title');
        $description = $request->input('description');
		$lang = $request->input('lang');

		$data = array(
                        'title' => $title,
			            'lang' => $lang,
                        'description'=> $description,
                    );

		CG::where('id',$service_id)->update($data);
		return Redirect::to('admin/cg')->with('success','page updated.');
    }
}
