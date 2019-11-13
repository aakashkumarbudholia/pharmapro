<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AboutUs;
use DB;
use Session;
use Redirect;

class AboutUsController extends Controller
{
    public function index()
    {
    	$about_us = AboutUs::first();
    	
    	return view('admin.about_us_form',compact('about_us'));
    }

    public function update(Request $request)
    {
    	$about_us_id = $request->input('about_us_id');
    	$title = $request->input('title');
		$description = $request->input('description');

		$data = array(
                        'title' => $title,
                        'description'=> $description,
                    );

		AboutUs::where('id',$about_us_id)->update($data);
		return Redirect::to('admin/about')->with('success','About Us updated.');
    }
}
