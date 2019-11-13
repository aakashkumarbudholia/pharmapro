<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use DB;

class Service_typeController extends Controller
{
    function __construct()
	{
		date_default_timezone_set('Asia/Kolkata');
	}
    public function index()
    {
    	$service_type = DB::table('service_type')->get();
    	return view('service_type.manage',compact('service_type'));
    }

    public function add()
    {
    	$action = 'Add';
    	return view('service_type.form',compact('action'));	
    }

    public function insert(Request $request)
    {
    	$type_name = $request->input('type_name');

        $exists = DB::table('service_type')
                ->where('type_name','=',$type_name)
                ->first();

        if(!empty($exists)){
            return Redirect::to('service_type/add')->with('error', 'Service Type Already Exists!');
        }

    	$data = array(
                        'type_name' => $type_name,
                        'status' => 'approved',
                        'created_at' => date('Y-m-d H:i:s')
                    );
        $insert_detail = DB::table('service_type')->insert($data);

        if($insert_detail){
            return Redirect::to('service_type')->with('success', 'Service Type has been Inserted');
        }
        else{
            return Redirect::to('service_type/add')->with('error', 'Some Error');
        }
    }

    public function edit($id){
    	$action = "Edit";
        $editdata = DB::table('service_type')->where('id','=',$id)->first(); 
        return view('service_type.form',compact('action','editdata'));
    }

    public function update(Request $request)
    {
    	$id = $request->input('id');
    	$type_name = $request->input('type_name');
    	
        $exists = DB::table('service_type')
                ->where('type_name','=',$type_name)
                ->where('id','!=',$id)
                ->first();

        if(!empty($exists)){
            return Redirect::to('service_type/add')->with('error', 'Service Type Already Exists!');
        }

    	$data = array(
                        'type_name' => $type_name,
                        'updated_at' => date('Y-m-d H:i:s')
                    );

    	$update_detail = DB::table('service_type')
                            ->where('id', $id)
                            ->update($data);

        if($update_detail){
            return Redirect::to('service_type')->with('success', 'Service Type has been Updated');
        }
        else{
            return Redirect::to('service_type/edit/'.$id)->with('error', 'Some Error');
        }
    }

    public function delete($id){
        $delete_detail = DB::table('service_type')->where('id',$id)->delete();

        if($delete_detail){
            return Redirect::to('service_type')->with('success', 'Service Type has been Deleted');
        }
        else{
            return Redirect::to('service_type')->with('error', 'Some Error');
        }
    }

    public function change_status($id,$status){
        $data = array(
                        'status' => $status,
                        'updated_at' => date('Y-m-d H:i:s')
                    );

        $update_detail = DB::table('service_type')
                            ->where('id', $id)
                            ->update($data);

        if($update_detail){
            return Redirect::to('service_type')->with('success', 'Service Type status has been Updated');
        }
        else{
            return Redirect::to('service_type')->with('error', 'Some Error');
        }
    }
}
