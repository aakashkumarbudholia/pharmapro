<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Config;

class GeneralModel extends Model
{
    public static function get_activity_id() {        
        return session('activity_id');       
    }
    public static function get_activity_type() {        
        return session('activity_type');       
    }

    public static function set_active_log( $action,$folder_id,$extra_details = array() ){

        $insert_data = array();

        $insert_data['user_id'] = GeneralModel::get_activity_id();
        $insert_data['user_type'] = GeneralModel::get_activity_type();
        $insert_data['action'] = $action;
        $insert_data['folder_id'] = $folder_id;

if(isset($extra_details['old_parent_id']))
{
$insert_data['fromtype'] = $extra_details['old_parent_id'];
}

if(isset($extra_details['new_parent_id']))
{
$insert_data['totype'] = $extra_details['new_parent_id'];
}
                     

if(isset($extra_details['move_file_reasion']))
{
	$insert_data['reason'] = $extra_details['move_file_reasion'];
}

DB::table('send_email')->insert( $insert_data );

        // $action_to_send_mail = Config::get('constant_var.ACTION_TO_SEND_MAIL');

      //  if( array_key_exists($action,$action_to_send_mail) ){
          //  DB::table('send_email')->insert( $insert_data );
     //   }


        if(!empty($extra_details)){
            $insert_data['extra_details'] = serialize( $extra_details );
        }

    	$insert = DB::table('active_log')->insert( $insert_data );

        if($insert){
            return true;
        }else{
            return false;
        }

    	
    }


 public static function set_send_email_log( $email,$folder_id,$action,$client_id,$uid,$utype ){

        $insert_data = array();
	$insert = '';

        $insert_data['email_id'] = $email;
        $insert_data['folder_id'] = $folder_id;
        $insert_data['action'] = $action;
	$insert_data['client_id'] = $client_id;
	$insert_data['date'] = date('Y-m-d');
	$insert_data['uid'] = $uid;
	$insert_data['utype'] = $utype;
        

	$cf1 = DB::table('send_act_email')
				            ->where('email_id','=',$email)
					    ->where('folder_id','=',$folder_id)
					    ->where('action','=',$action)
					    ->where('client_id','=',$client_id)
					    ->where('uid','=',$uid)
					    ->where('utype','=',$utype)
					    ->where('date','=',date('Y-m-d'))					    
					    ->get();
			

	if(count($cf1)==0){     
    	$insert = DB::table('send_act_email')->insert( $insert_data );
	}

        if($insert){
            return true;
        }else{
            return false;
        }

    	
    }



    public static function get_employee_permissions() {

        $permissions = DB::table('permission_config')->get()->toArray();

        $return = array();
        if(!empty($permissions)){
            foreach($permissions as $value){
                $return[$value->action] = $value->value;

            }
        }

        return $return;
    }


	public static function get_subclientlist($pfid)
	{

	 $return = DB::table('assign_folders_to_client')
                    ->get()
                    ->where('folder_id','=',$pfid)
                    ->toArray();

       	return $return;
	

	}


	public static function get_employeelist($pfid)
	{

	 $return = DB::table('assign_folder_to_employee')
                    ->get()
                    ->where('folder_id','=',$pfid)
                    ->toArray();

       	return $return;
	

	}


public static function get_employeeslist($cid)
	{

	 $return = DB::table('emp_assign_role_permision')
                    ->get()
                    ->where('client_id','=',$cid)
		    ->where('get_email','=',1)
                    ->toArray();

       	return $return;
	

	}

public static function get_subclientslist($cid)
	{

	 $return = DB::table('client_assign_role_permision')
                    ->get()
                    ->where('client_id','=',$cid)
		    ->where('get_email','=',1)
                    ->toArray();

       	return $return;
	

	}



public static function get_otheremplist($eid)
	{

	 $return = DB::table('emp_assign_role_permision')
                    ->get()
                    ->where('emp_id','=',$eid)
                    ->toArray();

       	return $return;
	

	}



public static function get_otherclientlist($eid)
	{

	 $return = DB::table('client_assign_role_permision')
                    ->get()
                    ->where('sub_client_id','=',$eid)
                    ->toArray();

       	return $return;
	

	}



    public static function get_client_permissions() {
      
        $permissions = DB::table('permission_config')
                    ->get()
                    ->where('is_for_client','=',1)
                    ->toArray();

        $return = array();
        if(!empty($permissions)){
            foreach($permissions as $value){
                $return[$value->action] = $value->value;

            }
        }

        return $return;
    }

}
