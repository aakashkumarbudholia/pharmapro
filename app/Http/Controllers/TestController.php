<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class TestController extends Controller
{
  public function test()
  { 
    
    /* $service = DB::table('pharmapro_teammember')->select('*')->get();

        foreach ($service as $key => $value) 
        {


          $s2_data191 = array(
              'password' => base64_encode($value->password)       
            );

            DB::table('pharmapro_teammember')
              ->where('id', $value->id)
              ->update($s2_data191);
        }


        $service = DB::table('user_interviewee')->select('*')->get();

        foreach ($service as $key => $value) 
        {


          $s2_data191 = array(
              'password' => base64_encode($value->password)       
            );

            DB::table('user_interviewee')
              ->where('id', $value->id)
              ->update($s2_data191);
        }

        */

         $service = DB::table('users11')->select('*')->get();

        foreach ($service as $key => $value) 
        {


          $s2_data191 = array(
              'password' => base64_encode($value->password)       
            );

            DB::table('users11')
              ->where('id', $value->id)
              ->update($s2_data191);
        }

        exit;


  }
}
