<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Redirect;
use App\Country;
use App\AdminInterviewer;

class InterviewerController extends Controller
{
    public function index()
    {
    //	$interviewer = AdminInterviewer::all();

	$interviewer = DB::table('users')
	    ->orderBy('id', 'desc')
            ->get();

    	return view('admin.interviewer',compact('interviewer'));
    }

    public function add()
    {
    	$action = 'Add';
    	$con=Country::select('*')->orderBy('display')->get();
    	return view('admin.interviewer_form',compact('action','con'));	
    }

    public function insert(Request $request)
    {
    	$first_name = $request->input('first_name');
		$last_name = $request->input('last_name');
		$email = $request->input('email');
		$username = $request->input('username');
		$password = $request->input('password');
		$enc_password = base64_encode($password);
		$pharmacie = $request->input('pharmacie');
		$adresse = $request->input('adresse');
		$postal = $request->input('postal');
		$villa = $request->input('villa');
		$departement = $request->input('departement');
		$code = $request->input('code');
        $sameConfirm="no";
		$sameConfirmNew="no";
		 /******************************************* */
		  // echo $sameConfirm=$request->input('sameConfirm');
		  // die();
		  if($request->input('sameConfirm')=="")
          {
			$sameConfirm="no";
			$entreprise2=$request->input('entreprise2');
			$sameCompany=$request->input('sameCompany');
			$sameCountry=$request->input('sameCountry');
			$samePincode=$request->input('samePincode');
			$sameAddress=$request->input('sameAddress');
			$sameCity=$request->input('sameCity');
			$sameDepartment=$request->input('sameDepartment');
			$companyState=$request->input('companyState');
			$sameEmail=$request->input('sameEmail');
			$samePhone=$request->input('samePhone');
			$sameLinkd = $request->input('sameLink');
			
		  }
		  else
		  {
			     $sameConfirm="yes";
			     $entreprise2=$request->input('entreprise');
			     $sameCompany=$request->input('pharmacie');
				 $sameCountry=$request->input('sameCountry');
				 $sameAddress=$request->input('adresse');
				 $samePincode=$request->input('postal');
				 $sameCity=$request->input('villa');
				 $sameDepartment=$request->input('departement');
				 $companyState=$request->input('companyState');
				 $sameEmail=$request->input('email');
				 $samePhone=$request->input('samePhone');
			     $sameLinkd = $request->input('linkd2');
		  }
		  if($request->input('sameConfirmNew')=="")
          {
			$new_checked_detail="no";
			$newSameCompany = $request->input('newSameCompany');
			$newCountry = $request->input('newCountry');
			$newSameAddress = $request->input('newSameAddress');
			$newSamePincode = $request->input('newSamePincode');
			$newSameCity = $request->input('newSameCity');
			$newSameDepartment = $request->input('newSameDepartment');
			$newComplement = $request->input('newComplement');
			$newState = $request->input('newState');
		  }
		  else
		  {
			$new_checked_detail="yes";
			$newSameCompany = $request->input('pharmacie');
			$newCountry = $request->input('newCountry');
			$newSameAddress = $request->input('adresse');
			$newSamePincode = $request->input('postal');
			$newSameCity = $request->input('villa');
			$newSameDepartment = $request->input('departement');
			$newComplement = $request->input('newComplement');
			$newState = $request->input('newState');
		  }
		 // echo $sameCountry;
		  
		 /***************************************** */
		$data = array(
                        'first_name' => $first_name,
                        'last_name'=> $last_name,
                        'email'=> $email,
                        'username'=> $username,
                        'password'=> $enc_password,
						'status' => 'approved',
						'pharmacie'=> $pharmacie,
						'adresse'=> $adresse,
						'postal'=> $postal,
						'villa'=> $villa,
						'departement'=> $departement,
						'state'=> $departement,
						'code'=> $code,
						'checked_detail'=> $sameConfirm,
						'company_detail'=> $sameCompany,
						'company_entreprise'=> $entreprise2,
						'company_address_paid'=> $sameCountry,
						'company_address'=> $sameAddress,
						'company_pincode'=> $samePincode,
						'company_city'=> $sameCity,
						'company_state'=> $companyState,
						'company_department'=> $sameDepartment,
						'company_email'=> $sameEmail,
						'company_phone'=> $samePhone,
						'company_link'=> $sameLinkd,
						'new_company_checked'=> $new_checked_detail,
						'new_company_detail'=> $newSameCompany,
						'new_company_address_paid'=> $newCountry,
						'new_company_address'=> $newSameAddress,
						'new_company_pincode'=> $newSamePincode,
						'new_company_city'=> $newSameCity,
						'new_company_state'=> $newState,
						'new_company_department'=> $newSameDepartment,
						'new_complement'=> $newComplement,
                    );
             // print_r($data);
			 // die();
		AdminInterviewer::UpdateOrCreate($data);
		return Redirect::to('admin/employer')->with('success','Employer added.');
    }

    public function edit($id)
    {
    	$action = 'edit';
    	$interviewer_data = AdminInterviewer::where('id', $id)->get();
		$con=Country::select('*')->orderBy('display')->get();
    	return view('admin.interviewer_form',compact('action','con','interviewer_data'));	
    }

    public function update(Request $request)
    {
    	$id = $request->input('id');
    	$first_name = $request->input('first_name');
		$last_name = $request->input('last_name');
		$email = $request->input('email');
		$username = $request->input('username');
		$password = $request->input('password');
		$enc_password = base64_encode($password);
		$pharmacie = $request->input('pharmacie');
		$adresse = $request->input('adresse');
		$postal = $request->input('postal');
		$villa = $request->input('villa');
		$departement = $request->input('departement');
		$code = $request->input('code');
		$sameConfirm="no";
		$sameConfirmNew="no";
         /******************************************* */
		  // echo $sameConfirm=$request->input('sameConfirm');
		  // die();
		  if($request->input('sameConfirm')=="")
          {
			$sameConfirm="no";
			$entreprise2=$request->input('entreprise2');
			$sameCompany=$request->input('sameCompany');
			$sameCountry=$request->input('sameCountry');
			$samePincode=$request->input('samePincode');
			$sameAddress=$request->input('sameAddress');
			$sameCity=$request->input('sameCity');
			$sameDepartment=$request->input('sameDepartment');
			$companyState=$request->input('companyState');
			$sameEmail=$request->input('sameEmail');
			$samePhone=$request->input('samePhone');
			$sameLinkd = $request->input('sameLink');
			
		  }
		  else
		  {
			     $sameConfirm="yes";
			     $entreprise2=$request->input('entreprise');
			     $sameCompany=$request->input('pharmacie');
				 $sameCountry=$request->input('sameCountry');
				 $sameAddress=$request->input('adresse');
				 $samePincode=$request->input('postal');
				 $sameCity=$request->input('villa');
				 $sameDepartment=$request->input('departement');
				 $companyState=$request->input('companyState');
				 $sameEmail=$request->input('email');
				 $samePhone=$request->input('samePhone');
			     $sameLinkd = $request->input('linkd2');
		  }
		  if($request->input('sameConfirmNew')=="")
          {
			$new_checked_detail="no";
			$newSameCompany = $request->input('newSameCompany');
			$newCountry = $request->input('newCountry');
			$newSameAddress = $request->input('newSameAddress');
			$newSamePincode = $request->input('newSamePincode');
			$newSameCity = $request->input('newSameCity');
			$newSameDepartment = $request->input('newSameDepartment');
			$newComplement = $request->input('newComplement');
			$newState = $request->input('newState');
		  }
		  else
		  {
			$new_checked_detail="yes";
			$newSameCompany = $request->input('pharmacie');
			$newCountry = $request->input('newCountry');
			$newSameAddress = $request->input('adresse');
			$newSamePincode = $request->input('postal');
			$newSameCity = $request->input('villa');
			$newSameDepartment = $request->input('departement');
			$newComplement = $request->input('newComplement');
			$newState = $request->input('newState');
		  }
		 // echo $sameCountry;
		  
		 /***************************************** */
		$data = array(
                        'first_name' => $first_name,
                        'last_name'=> $last_name,
                        'email'=> $email,
                        'username'=> $username,
						'password'=> $enc_password,
						'pharmacie'=> $pharmacie,
						'adresse'=> $adresse,
						'postal'=> $postal,
						'villa'=> $villa,
						'departement'=> $departement,
						'state'=> $departement,
						'code'=> $code,
						'checked_detail'=> $sameConfirm,
						'company_detail'=> $sameCompany,
						'company_entreprise'=> $entreprise2,
						'company_address_paid'=> $sameCountry,
						'company_address'=> $sameAddress,
						'company_pincode'=> $samePincode,
						'company_city'=> $sameCity,
						'company_state'=> $companyState,
						'company_department'=> $sameDepartment,
						'company_email'=> $sameEmail,
						'company_phone'=> $samePhone,
						'company_link'=> $sameLinkd,
						'new_company_checked'=> $new_checked_detail,
						'new_company_detail'=> $newSameCompany,
						'new_company_address_paid'=> $newCountry,
						'new_company_address'=> $newSameAddress,
						'new_company_pincode'=> $newSamePincode,
						'new_company_city'=> $newSameCity,
						'new_company_state'=> $newState,
						'new_company_department'=> $newSameDepartment,
						'new_complement'=> $newComplement,
                    );
					/*
					echo "<pre>";
					print_r($data);
					echo"</pre>";
					die();  
					*/   
		AdminInterviewer::where('id',$id)->update($data);
		return Redirect::to('admin/employer')->with('success','Employer updated.');
    }
    public function delete($id)
    {   
        AdminInterviewer::where('id', $id)->delete();
        return Redirect::to('admin/employer')->with('success','Employer deleted.');
    }
}
