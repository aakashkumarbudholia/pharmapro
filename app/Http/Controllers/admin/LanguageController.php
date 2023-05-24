<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services;
use App\LangModel;
use DB;
use Session;
use Redirect;

class LanguageController extends Controller
{
    public function index($id)
    {

	$lng = $id;
        $language_en = DB::table('language')->where('lang_id','=','en')->get();
    	$language_fr = DB::table('language')->where('lang_id','=','fr')->get();
    	return view('admin.lang',compact('language_en','language_fr','lng'));
    }

    public function update(Request $request)
    {
        $msg = '';
        $lang_id = $request->input('lang_id');
    	if( !empty($request->all()) && !empty($lang_id) ){
            foreach($request->all() as $key => $value){
                if($key=='_token'){
                    continue;
                }
                if($key=='lang_id'){
                    continue;
                }
                
                $update = [];
                $update['value'] = $value;
                
                $cond = [];
                $cond['key'] = $key;
                $cond['lang_id'] = $lang_id;

                LangModel::where($cond)->update($update);
                $msg = "Settings Updated successfully";
            }
        }
        return Redirect::to('admin/lang/'.$lang_id)->with('success',$msg);
    }

   /* public function insert(Request $request)
    {
        $title = $request->input('title');
    	$price = $request->input('price');
	$lang = $request->input('lang');
		$description = $request->input('description');

		$data = array(
                        'title' => $title,
                        'price' => $price,
			'lang' => $lang,
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

   

    public function delete($id)
    {	
    	Services::where('id', $id)->delete();
    	return Redirect::to('admin/services')->with('success','Service deleted.');
    }*/
}
