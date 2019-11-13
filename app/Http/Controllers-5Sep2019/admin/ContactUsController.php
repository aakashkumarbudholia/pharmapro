<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactUs;
use DB;
use Session;
use Redirect;

class ContactUsController extends Controller
{
    public function index()
    {
    	$contact_us = ContactUs::first();
    	
    	return view('admin.contact_us_form',compact('contact_us'));
    }

    public function update(Request $request)
    {
    	$contact_us_id = $request->input('contact_us_id');
    	$title = $request->input('title');
		$description = $request->input('description');

		$data = array(
                        'title' => $title,
                        'description'=> $description,
                    );

		ContactUs::where('id',$contact_us_id)->update($data);
		return Redirect::to('admin/contact')->with('success','Contact Us updated.');
    }
}
