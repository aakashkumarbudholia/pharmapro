<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Seos;
use DB;
use Session;
use Redirect;

class SeoController extends Controller
{
    public function index()
    {
    	$services = Seos::all();
    	return view('admin.seo',compact('services'));
    }

    public function add()
    {
    	$action = 'Add';
    	return view('admin.seo_form',compact('action'));	
    }

    public function insert(Request $request)
    {
        $title = $request->input('title');
    	$tag = $request->input('tag');
	$page_name = $request->input('page_name');
	$description = $request->input('description');

		$data = array(
                        'title' => $title,
                        'tag' => $tag,
			'page_name' => $page_name,
                        'desc'=> $description,
                    );

		Seos::UpdateOrCreate($data);
		return Redirect::to('admin/stag')->with('success','Service added.');
    }

    public function edit($id)
    {
    	$action = 'edit';
    	$service = Seos::where('id', $id)->get();
    	return view('admin.seo_form',compact('action','service'));	
    }

    public function update(Request $request)
    {
    	$service_id = $request->input('service_id');
        $title = $request->input('title');
    	$page_name = $request->input('page_name');
	    $tag = $request->input('tag');
		$description = $request->input('description');

		$data = array(
                        'title' => $title,
                        'page_name' => $page_name,
			'tag' => $tag,
                        'desc'=> $description,
                    );

		Seos::where('id',$service_id)->update($data);
		return Redirect::to('admin/stag')->with('success','Service updated.');
    }

    public function delete($id)
    {	
    	Seos::where('id', $id)->delete();
    	return Redirect::to('admin/stag')->with('success','Data deleted.');
    }
}
