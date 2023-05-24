@extends('layouts.admin_master_new')
@section('content')
<?php
if($action=='Add'){
    $id = '';
    $first_name = '';
    $last_name = '';
    $email = '';
    $username = '';
    $password = '';
    $pharmacie = '';
    $adresse = '';
    $postal = '';
    $villa = '';
    $departement = '';
    $code = '';
    /***************monita(14-12)***************/
    $entreprise2="";
    $company_detail = "";
    $address_paid2="";
    $company_address = "";
    $company_city="";
    $company_pincode = "";
    $company_department = "";
    $company_state="";
    $email2="";
    $phone2="";
    $link2="";
    $new_company_detail = "";
    $new_company_address = "";
    $new_company_address_paid = "";
    $new_company_pincode = "";
    $new_company_city = "";
    $new_company_department = "";
    $new_company_state="";
    $new_complement = "";
    $checked_cval="no";
    $checked_new="no";
    /****************end(14-12)*************/
}else{
    /*
    echo"<pre>";
    print_r($interviewer_data);
    echo"</pre>";
    die();
    */
    $id = isset($interviewer_data[0]->id) ? $interviewer_data[0]->id : '';
    $first_name = isset($interviewer_data[0]->first_name) ? $interviewer_data[0]->first_name : '';
    $last_name = isset($interviewer_data[0]->last_name) ? $interviewer_data[0]->last_name : '';
    $email = isset($interviewer_data[0]->email) ? $interviewer_data[0]->email : '';
    $username = isset($interviewer_data[0]->username) ? $interviewer_data[0]->username : '';
    $password = isset($interviewer_data[0]->password) ? $interviewer_data[0]->password : '';

    $pharmacie = isset($interviewer_data[0]->pharmacie) ? $interviewer_data[0]->pharmacie : '';
    $adresse = isset($interviewer_data[0]->adresse) ? $interviewer_data[0]->adresse : '';
    $postal = isset($interviewer_data[0]->postal) ? $interviewer_data[0]->postal : '';
    $villa = isset($interviewer_data[0]->villa) ? $interviewer_data[0]->villa : '';
    $departement = isset($interviewer_data[0]->departement) ? $interviewer_data[0]->departement : '';
    $departement = isset($interviewer_data[0]->state) ? $interviewer_data[0]->state : '';
    $code = isset($interviewer_data[0]->code) ? $interviewer_data[0]->code : '';
    /*********************monita(14-12)*********************/
    $entreprise2 = isset($interviewer_data[0]->company_entreprise) ? $interviewer_data[0]->company_entreprise : '';
    $company_detail = isset($interviewer_data[0]->company_detail) ? $interviewer_data[0]->company_detail : '';
     $address_paid2 = isset($interviewer_data[0]->company_address_paid) ? $interviewer_data[0]->company_address_paid : '';
    $company_address = isset($interviewer_data[0]->company_address) ? $interviewer_data[0]->company_address : '';
    $company_pincode = isset($interviewer_data[0]->company_pincode) ? $interviewer_data[0]->company_pincode : $villa;
    $company_city= isset($interviewer_data[0]->company_city) ? $interviewer_data[0]->company_city : '';
    $company_department= isset($interviewer_data[0]->company_department) ? $interviewer_data[0]->company_department : '';
    $company_state= isset($interviewer_data[0]->company_state) ? $interviewer_data[0]->company_state : '';
    $email2= isset($interviewer_data[0]->company_email) ? $interviewer_data[0]->company_email : $email;
    $phone2=isset($interviewer_data[0]->company_phone) ? $interviewer_data[0]->company_phone : "";
    $link2=isset($interviewer_data[0]->company_link) ? $interviewer_data[0]->company_link : "";
    $new_company_detail = isset($interviewer_data[0]->new_company_detail) ? $interviewer_data[0]->new_company_detail : "";
    $new_company_address_paid  = isset($interviewer_data[0]->new_company_address_paid) ? $interviewer_data[0]->new_company_address_paid : "";
    $new_company_address = isset($interviewer_data[0]->new_company_address) ? $interviewer_data[0]->new_company_address : "";
    $new_company_pincode  = isset($interviewer_data[0]->new_company_pincode) ? $interviewer_data[0]->new_company_pincode : "";
    $new_company_city = isset($interviewer_data[0]->new_company_city) ? $interviewer_data[0]->new_company_city : "";
    $new_company_department = isset($interviewer_data[0]->new_company_department) ? $interviewer_data[0]->new_company_department : "";
    $new_company_state=isset($interviewer_data[0]->new_company_state) ? $interviewer_data[0]->new_company_state : "";
    $new_complement = isset($interviewer_data[0]->new_complement) ? $interviewer_data[0]->new_complement : "";
    $checked_cval = isset($interviewer_data[0]->checked_detail) ? $interviewer_data[0]->checked_detail : "";
    $checked_new = isset($interviewer_data[0]->new_company_checked) ? $interviewer_data[0]->new_company_checked : "";
    //$company_detail = isset($interviewer_data[0]->company_detail) ? $interviewer_data[0]->company_detail : '';
    /*****************************************/

}

?>
<div class="page-content">   

    <!-- Begin Page Content -->
                <div class="container-fluid">
                    <p class="mb-4">
                        @include('layouts.flash-message')
                    </p>
                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Hello, {{ session('user_name') }}</h1> -->
                    <p class="mb-4">
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="{{ url('admin/employer') }}">Employer /</a>
                            </li>
                            <li>
                                <span style="padding-left: 5px;" class="active">{{ $action }}</span>
                            </li>
                        </ul>
                    </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-gift" style="margin-right: 5px;"></i>{{ $action }} Employer</h6>
                        </div>
                        <div class="card-body">
                            <!-- BEGIN FORM-->
                            <?php
                            if($action == "Add"){
                                $url = 'admin/employer/insert';
                            }else{
                                $url = 'admin/employer/update/';
                            }
                            ?>
                            <form action="{{ url($url) }}" class="form-horizontal form-bordered" name="frmInterviewer" id="frmInterviewer" method="POST">
                            @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <input type="hidden" name="username" id="username"  class="form-control" value="{{ $username }}">
                                
                               
                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">First Name *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="first_name" id="first_name" placeholder="Enter First Name" class="form-control" value="{{ $first_name }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Last Name *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="last_name" id="last_name" placeholder="Enter Last Name" class="form-control" value="{{ $last_name }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Email *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control" value="{{ $email }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">User Name *</label>
                                        <div class="col-md-9">
                                            <input type="text" name="username" id="username" placeholder="Enter User Name" class="form-control" value="{{ $username }}">
                                        </div>
                                    </div>
                                </div> -->

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Password *</label>
                                        <div class="col-md-9">
                                            @php $dcd_password = base64_decode($password); @endphp
                                            <input type="text" name="password" id="password" placeholder="Enter Password" class="form-control" value="{{ $dcd_password }}">
                                        </div>
                                    </div>
                                </div>

 <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Name of pharmacy (or company) *</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="Nom pharmacie (ou entreprise)" id="pharmacie" name="pharmacie"  value="{{ $pharmacie }}" required>
                                        </div>
                                    </div>
                                </div>


 <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Address *</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="Adresse" id="adresse" name="adresse"  value="{{ $adresse }}" required>
                                        </div>
                                    </div>
                                </div>


 <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Postal No *</label>
                                        <div class="col-md-9">
                                           <input type="text" class="form-control" placeholder="No postal" id="postal" name="postal"  value="{{ $postal }}" required>
                                        </div>
                                    </div>
                                </div>


 <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">City *</label>
                                        <div class="col-md-9">
                                           <input type="text" class="form-control" placeholder="Ville" id="villa" name="villa" value="{{ $villa }}" required>
                                        </div>
                                    </div>
                                </div>


 <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Department No *</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="No département" id="departement" name="departement"  value="{{ $departement }}">
</div>
                                        </div>


                                     <div class="form-group row">
                                        <label class="control-label col-md-3">ID (PE ID) *</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="PE ID" id="code" name="code"  value="{{ $code }}" required>
                                        </div>
                                     </div>
                                    <!-----------------Monita(14-12)----------------->
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <!-- <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-gift"></i>Information sur l’entreprise / organisation qui publie l’offre d’emploi
                                                </div>
                                            </div> -->
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-gift" style="margin-right: 5px;"></i>Information sur l’entreprise / organisation qui publie l’offre d’emploi</h6>
                                            </div>
                                        </div> 
                                    </div> 

                                    <div class="form-group row">
                                            <label class="control-label col-md-3"></label>
                                            <div class="col-md-9">
                                                <input type="checkbox" id="sameConfirm" name="sameConfirm" <?php if($checked_cval == ''||$checked_cval=='no'){ ?>  <?php } else{?> checked="checked" <?php } ?>>
                                                <strong style="color:#000;">Adresse identifque à l'offre d'emploi</strong>  &nbsp;&nbsp;
                                                <input type="checkbox" id="diffVal" name="diffVal"<?php if($checked_cval == ''||$checked_cval=='no'){ ?> checked="checked" <?php } else{?>  <?php } ?>> 
                                                <b style="color:#000;">Adresse différente de l'offre d'emploi</b>
                                            </div>
                                    </div> 
                                    <div class="disable_div" id="disableDiv">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Secteur entreprise/organisation de l'offre d'emploi * </label>
                                                <div class="col-md-9">
                                                    <select class="form-control" required name="entreprise2" id="entreprise2">
                                                        
                                                        <option value="Pharmacie d’officine" <?php if($entreprise2 == 'Pharmacie d’officine'){ ?> selected <?php } ?> >Pharmacie d’officine</option>
                                                
                                                        <option value="Agence (intérim, recrutement, chasseur de tête)" <?php if($entreprise2 == 'Agence (intérim, recrutement, chasseur de tête)'){ ?> selected <?php } ?> >Agence (intérim, recrutement, chasseur de tête)</option>
                                                        <option value="Hôpital Clinique" <?php if($entreprise2 == 'Hôpital Clinique'){ ?> selected <?php } ?> >Hôpital / Clinique</option>
                                                        <option value="Répartiteur" <?php if($entreprise2 == 'Répartiteur'){ ?> selected <?php } ?> >Répartiteur</option>
                                                        <option value="Industrie pharmaceutique" <?php if($entreprise2 == 'Industrie pharmaceutique'){ ?> selected <?php } ?> >Industrie pharmaceutique</option>
                                                        <option value="Paraparfumerie Parfumerie" <?php if($entreprise2 == 'Paraparfumerie Parfumerie'){ ?> selected <?php } ?> >Paraparfumerie / Parfumerie</option>
                                                        <option value="Université Recherche" <?php if($entreprise2 == 'Université Recherche'){ ?> selected <?php } ?> >Université / Recherche</option>
                                                        <option value="Organisation Association Institution ONG" <?php if($entreprise2 == 'Organisation Association Institution ONG'){ ?> selected <?php } ?> >Organisation / Association / Institution / ONG</option>
                                                        <option value="Autre" <?php if($entreprise2 == 'Autre'){ ?> selected <?php } ?> >Autre</option>
                                                
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Nom de l'entreprise ou organisation *</label>
                                                <div class="col-md-9">
                                                <input type="text" class="form-control" id="sameCompany" name="sameCompany" placeholder="Ex. Grande Pharmacie" value="{{ $company_detail }}" required=""> 
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Pays *</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="sameCountry"  name="sameCountry"  required="required">
                                                        @foreach ($con as $conList)
                                                        <option value="{{$conList->name}}" @if($conList->name==$address_paid2) selected="selected" @endif> {{$conList->dname}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Adresse *</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="sameAddress" name="sameAddress" placeholder="Ex. 1 Rue de la Gare" value="{{ $company_address }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Code postal *</label>
                                                <div class="col-md-9">
                                                <input type="text" class="form-control" id="samePincode" name="samePincode" value="{{$company_pincode}}"  placeholder="Ex. 75001">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Ville *</label>
                                                <div class="col-md-9">
                                                   <input type="text" class="form-control" id="sameCity" name="sameCity" value="{{ $company_city }}"  placeholder="Ex. villa">
                                                </div>
                                            </div>
                                            <div class="form-group row" id="con_department" @if($address_paid2=="France"||$address_paid2=="") style="display: flex;" @else style="display:none;" @endif>
                                                <label class="control-label col-md-3">Département (ex. 01) *</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="sameDepartment" name="sameDepartment" onkeyup="hello(this.value);">
                                                        <?php

                                                        if($company_department == "01")
                                                        {
                                                        echo "<option value='01' selected='selected' >01</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='01' >01</option>";
                                                        }

                                                        if($company_department == "02")
                                                        {
                                                        echo "<option value='02' selected='selected' >02</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='02' >02</option>";
                                                        }

                                                        if($company_department == "03")
                                                        {
                                                        echo "<option value='03' selected='selected' >03</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='03' >03</option>";
                                                        }

                                                        if($company_department == "04")
                                                        {
                                                        echo "<option value='04' selected='selected' >04</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='04' >04</option>";
                                                        }

                                                        if($company_department == "05")
                                                        {
                                                        echo "<option value='05' selected='selected' >05</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='05' >05</option>";
                                                        }

                                                        if($company_department == "06")
                                                        {
                                                        echo "<option value='06' selected='selected' >06</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='06' >06</option>";
                                                        }

                                                        if($company_department == "07")
                                                        {
                                                        echo "<option value='07' selected='selected' >07</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='07' >07</option>";
                                                        }

                                                        if($company_department == "08")
                                                        {
                                                        echo "<option value='08' selected='selected' >08</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='08' >08</option>";
                                                        }

                                                        if($company_department == "09")
                                                        {
                                                        echo "<option value='09' selected='selected' >09</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='09' >09</option>";
                                                        }

                                                        if($company_department == "10")
                                                        {
                                                        echo "<option value='10' selected='selected' >10</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='10' >10</option>";
                                                        }

                                                                                        if($company_department == "11")
                                                        {
                                                        echo "<option value='11' selected='selected' >11</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='11' >11</option>";
                                                        }

                                                        if($company_department == "12")
                                                        {
                                                        echo "<option value='12' selected='selected' >12</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='12' >12</option>";
                                                        }

                                                        if($company_department == "13")
                                                        {
                                                        echo "<option value='13' selected='selected' >13</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='13' >13</option>";
                                                        }

                                                        if($company_department == "14")
                                                        {
                                                        echo "<option value='14' selected='selected' >14</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='14' >14</option>";
                                                        }

                                                        if($company_department == "15")
                                                        {
                                                        echo "<option value='15' selected='selected' >15</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='15' >15</option>";
                                                        }

                                                        if($company_department == "16")
                                                        {
                                                        echo "<option value='16' selected='selected' >16</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='16' >16</option>";
                                                        }

                                                        if($company_department == "17")
                                                        {
                                                        echo "<option value='17' selected='selected' >17</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='17' >17</option>";
                                                        }

                                                        if($company_department == "18")
                                                        {
                                                        echo "<option value='18' selected='selected' >18</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='18' >18</option>";
                                                        }

                                                        if($company_department == "19")
                                                        {
                                                        echo "<option value='19' selected='selected' >19</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='19' >19</option>";
                                                        }

                                                        /*if($company_department == "20")
                                                        {
                                                        echo "<option value='20' selected='selected' >20</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='20' >20</option>";
                                                        }*/

                                                        if($company_department == "2A")
                                                        {
                                                        echo "<option value='2A' selected='selected' >2A</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='2A' >2A</option>";
                                                        }

                                                        if($company_department == "2B")
                                                        {
                                                        echo "<option value='2B' selected='selected' >2B</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='2B' >2B</option>";
                                                        }

                                                        if($company_department == "21")
                                                        {
                                                        echo "<option value='21' selected='selected' >21</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='21' >21</option>";
                                                        }

                                                        if($company_department == "22")
                                                        {
                                                        echo "<option value='22' selected='selected' >22</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='22' >22</option>";
                                                        }

                                                        if($company_department == "23")
                                                        {
                                                        echo "<option value='23' selected='selected' >23</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='23' >23</option>";
                                                        }

                                                        if($company_department == "24")
                                                        {
                                                        echo "<option value='24' selected='selected' >24</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='24' >24</option>";
                                                        }

                                                        if($company_department == "25")
                                                        {
                                                        echo "<option value='25' selected='selected' >25</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='25' >25</option>";
                                                        }

                                                        if($company_department == "26")
                                                        {
                                                        echo "<option value='26' selected='selected' >26</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='26' >26</option>";
                                                        }

                                                        if($company_department == "27")
                                                        {
                                                        echo "<option value='27' selected='selected' >27</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='27' >27</option>";
                                                        }

                                                        if($company_department == "28")
                                                        {
                                                        echo "<option value='28' selected='selected' >28</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='28' >28</option>";
                                                        }

                                                        if($company_department == "29")
                                                        {
                                                        echo "<option value='29' selected='selected' >29</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='29' >29</option>";
                                                        }

                                                        if($company_department == "30")
                                                        {
                                                        echo "<option value='30' selected='selected' >30</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='30' >30</option>";
                                                        }

                                                        if($company_department == "31")
                                                        {
                                                        echo "<option value='31' selected='selected' >31</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='31' >31</option>";
                                                        }

                                                        if($company_department == "32")
                                                        {
                                                        echo "<option value='32' selected='selected' >32</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='32' >32</option>";
                                                        }

                                                        if($company_department == "33")
                                                        {
                                                        echo "<option value='33' selected='selected' >33</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='33' >33</option>";
                                                        }

                                                        if($company_department == "34")
                                                        {
                                                        echo "<option value='34' selected='selected' >34</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='34' >34</option>";
                                                        }

                                                        if($company_department == "35")
                                                        {
                                                        echo "<option value='35' selected='selected' >35</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='35' >35</option>";
                                                        }

                                                        if($company_department == "36")
                                                        {
                                                        echo "<option value='36' selected='selected' >36</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='36' >36</option>";
                                                        }

                                                        if($company_department == "37")
                                                        {
                                                        echo "<option value='37' selected='selected' >37</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='37' >37</option>";
                                                        }

                                                        if($company_department == "38")
                                                        {
                                                        echo "<option value='38' selected='selected' >38</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='38' >38</option>";
                                                        }

                                                        if($company_department == "39")
                                                        {
                                                        echo "<option value='39' selected='selected' >39</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='39' >39</option>";
                                                        }

                                                        if($company_department == "40")
                                                        {
                                                        echo "<option value='40' selected='selected' >40</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='40' >40</option>";
                                                        }

                                                                                        if($company_department == "41")
                                                        {
                                                        echo "<option value='41' selected='selected' >41</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='41' >41</option>";
                                                        }

                                                        if($company_department == "42")
                                                        {
                                                        echo "<option value='42' selected='selected' >42</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='42' >42</option>";
                                                        }

                                                        if($company_department == "43")
                                                        {
                                                        echo "<option value='43' selected='selected' >43</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='43' >43</option>";
                                                        }

                                                        if($company_department == "44")
                                                        {
                                                        echo "<option value='44' selected='selected' >44</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='44' >44</option>";
                                                        }

                                                        if($company_department == "45")
                                                        {
                                                        echo "<option value='45' selected='selected' >45</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='45' >45</option>";
                                                        }

                                                        if($company_department == "46")
                                                        {
                                                        echo "<option value='46' selected='selected' >46</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='46' >46</option>";
                                                        }

                                                        if($company_department == "47")
                                                        {
                                                        echo "<option value='47' selected='selected' >47</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='47' >47</option>";
                                                        }

                                                        if($company_department == "48")
                                                        {
                                                        echo "<option value='48' selected='selected' >48</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='48' >48</option>";
                                                        }

                                                        if($company_department == "49")
                                                        {
                                                        echo "<option value='49' selected='selected' >49</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='49' >49</option>";
                                                        }

                                                        if($company_department == "50")
                                                        {
                                                        echo "<option value='50' selected='selected' >50</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='50' >50</option>";
                                                        }

                                                                                        if($company_department == "51")
                                                        {
                                                        echo "<option value='51' selected='selected' >51</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='51' >51</option>";
                                                        }

                                                        if($company_department == "52")
                                                        {
                                                        echo "<option value='52' selected='selected' >52</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='52' >52</option>";
                                                        }

                                                        if($company_department == "53")
                                                        {
                                                        echo "<option value='53' selected='selected' >53</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='53' >53</option>";
                                                        }

                                                        if($company_department == "54")
                                                        {
                                                        echo "<option value='54' selected='selected' >54</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='54' >54</option>";
                                                        }

                                                        if($company_department == "55")
                                                        {
                                                        echo "<option value='55' selected='selected' >55</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='55' >55</option>";
                                                        }

                                                        if($company_department == "56")
                                                        {
                                                        echo "<option value='56' selected='selected' >56</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='56' >56</option>";
                                                        }

                                                        if($company_department == "57")
                                                        {
                                                        echo "<option value='57' selected='selected' >57</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='57' >57</option>";
                                                        }

                                                        if($company_department == "58")
                                                        {
                                                        echo "<option value='58' selected='selected' >58</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='58' >58</option>";
                                                        }

                                                        if($company_department == "59")
                                                        {
                                                        echo "<option value='59' selected='selected' >59</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='59' >59</option>";
                                                        }

                                                        if($company_department == "60")
                                                        {
                                                        echo "<option value='60' selected='selected' >60</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='60' >60</option>";
                                                        }

                                                                                        if($company_department == "61")
                                                        {
                                                        echo "<option value='61' selected='selected' >61</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='61' >61</option>";
                                                        }

                                                        if($company_department == "62")
                                                        {
                                                        echo "<option value='62' selected='selected' >62</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='62' >62</option>";
                                                        }

                                                        if($company_department == "63")
                                                        {
                                                        echo "<option value='63' selected='selected' >63</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='63' >63</option>";
                                                        }

                                                        if($company_department == "64")
                                                        {
                                                        echo "<option value='64' selected='selected' >64</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='64' >64</option>";
                                                        }

                                                        if($company_department == "65")
                                                        {
                                                        echo "<option value='65' selected='selected' >65</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='65' >65</option>";
                                                        }

                                                        if($company_department == "66")
                                                        {
                                                        echo "<option value='66' selected='selected' >66</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='66' >66</option>";
                                                        }

                                                        if($company_department == "67")
                                                        {
                                                        echo "<option value='67' selected='selected' >67</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='67' >67</option>";
                                                        }

                                                        if($company_department == "68")
                                                        {
                                                        echo "<option value='68' selected='selected' >68</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='68' >68</option>";
                                                        }

                                                        if($company_department == "69")
                                                        {
                                                        echo "<option value='69' selected='selected' >69</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='69' >69</option>";
                                                        }

                                                        if($company_department == "70")
                                                        {
                                                        echo "<option value='70' selected='selected' >70</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='70' >70</option>";
                                                        }

                                                                                        if($company_department == "71")
                                                        {
                                                        echo "<option value='71' selected='selected' >71</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='71' >71</option>";
                                                        }

                                                        if($company_department == "72")
                                                        {
                                                        echo "<option value='72' selected='selected' >72</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='72' >72</option>";
                                                        }

                                                        if($company_department == "73")
                                                        {
                                                        echo "<option value='73' selected='selected' >73</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='73' >73</option>";
                                                        }

                                                        if($company_department == "74")
                                                        {
                                                        echo "<option value='74' selected='selected' >74</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='74' >74</option>";
                                                        }

                                                        if($company_department == "75")
                                                        {
                                                        echo "<option value='75' selected='selected' >75</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='75' >75</option>";
                                                        }

                                                        if($company_department == "76")
                                                        {
                                                        echo "<option value='76' selected='selected' >76</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='76' >76</option>";
                                                        }

                                                        if($company_department == "77")
                                                        {
                                                        echo "<option value='77' selected='selected' >77</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='77' >77</option>";
                                                        }

                                                        if($company_department == "78")
                                                        {
                                                        echo "<option value='78' selected='selected' >78</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='78' >78</option>";
                                                        }

                                                        if($company_department == "79")
                                                        {
                                                        echo "<option value='79' selected='selected' >79</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='79' >79</option>";
                                                        }

                                                        if($company_department == "80")
                                                        {
                                                        echo "<option value='80' selected='selected' >80</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='80' >80</option>";
                                                        }

                                                                                        if($company_department == "81")
                                                        {
                                                        echo "<option value='81' selected='selected' >81</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='81' >81</option>";
                                                        }

                                                        if($company_department == "82")
                                                        {
                                                        echo "<option value='82' selected='selected' >82</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='82' >82</option>";
                                                        }

                                                        if($company_department == "83")
                                                        {
                                                        echo "<option value='83' selected='selected' >83</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='83' >83</option>";
                                                        }

                                                        if($company_department == "84")
                                                        {
                                                        echo "<option value='84' selected='selected' >84</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='84' >84</option>";
                                                        }

                                                        if($company_department == "85")
                                                        {
                                                        echo "<option value='85' selected='selected' >85</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='85' >85</option>";
                                                        }

                                                        if($company_department == "86")
                                                        {
                                                        echo "<option value='86' selected='selected' >86</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='86' >86</option>";
                                                        }

                                                        if($company_department == "87")
                                                        {
                                                        echo "<option value='87' selected='selected' >87</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='87' >87</option>";
                                                        }

                                                        if($company_department == "88")
                                                        {
                                                        echo "<option value='88' selected='selected' >88</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='88' >88</option>";
                                                        }

                                                        if($company_department == "89")
                                                        {
                                                        echo "<option value='89' selected='selected' >89</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='89' >89</option>";
                                                        }

                                                        if($company_department == "90")
                                                        {
                                                        echo "<option value='90' selected='selected' >90</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='90' >90</option>";
                                                        }

                                                        if($company_department == "91")
                                                        {
                                                        echo "<option value='91' selected='selected' >91</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='91' >91</option>";
                                                        }

                                                        if($company_department == "92")
                                                        {
                                                        echo "<option value='92' selected='selected' >92</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='92' >92</option>";
                                                        }

                                                        if($company_department == "93")
                                                        {
                                                        echo "<option value='93' selected='selected' >93</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='93' >93</option>";
                                                        }

                                                        if($company_department == "94")
                                                        {
                                                        echo "<option value='94' selected='selected' >94</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='94' >94</option>";
                                                        }

                                                        if($company_department == "95")
                                                        {
                                                        echo "<option value='95' selected='selected' >95</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='95' >95</option>";
                                                        }

                                                        if($company_department == "98")
                                                        {
                                                        echo "<option value='98' selected='selected' >98</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='98' >98</option>";
                                                        }

                                                                                        if($company_department == "971")
                                                        {
                                                        echo "<option value='971' selected='selected' >971</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='971' >971</option>";
                                                        }

                                                        if($company_department == "972")
                                                        {
                                                        echo "<option value='972' selected='selected' >972</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='972' >972</option>";
                                                        }

                                                        if($company_department == "973")
                                                        {
                                                        echo "<option value='973' selected='selected' >973</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='973' >973</option>";
                                                        }

                                                        if($company_department == "974")
                                                        {
                                                        echo "<option value='974' selected='selected' >974</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='974' >974</option>";
                                                        }

                                                        if($company_department == "975")
                                                        {
                                                        echo "<option value='975' selected='selected' >975</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='975' >975</option>";
                                                        }

                                                        if($company_department == "976")
                                                        {
                                                        echo "<option value='976' selected='selected' >976</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='976' >976</option>";
                                                        }

                                                        if($company_department == "977")
                                                        {
                                                        echo "<option value='977' selected='selected' >977</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='977' >977</option>";
                                                        }

                                                        if($company_department == "978")
                                                        {
                                                        echo "<option value='978' selected='selected' >978</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='978' >978</option>";
                                                        }

                                                        if($company_department == "984")
                                                        {
                                                        echo "<option value='984' selected='selected' >984</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='984' >984</option>";
                                                        }

                                                        if($company_department == "986")
                                                        {
                                                        echo "<option value='986' selected='selected' >986</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='986' >986</option>";
                                                        }

                                                        if($company_department == "987")
                                                        {
                                                        echo "<option value='987' selected='selected' >987</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='987' >987</option>";
                                                        }

                                                        if($company_department == "989")
                                                        {
                                                        echo "<option value='989' selected='selected' >989</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='989' >989</option>";
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row" id="con_cantons" @if($address_paid2=="Switzerland") style="display: flex;" @else style="display:none;" @endif>
                                                <label class="control-label col-md-3">Cantons *</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="companyState"  name="companyState" > 
                                                            <option></option>
                                                            <?php
                                                            if($company_state  == "AG")
                                                            {
                                                            echo "<option value='AG' selected='selected' >AG</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='AG' >AG</option>";
                                                            }

                                                            if($company_state == "AI")
                                                            {
                                                            echo "<option value='AI' selected='selected' >AI</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='AI' >AI</option>";
                                                            }
                                                            if($company_state == "AR")
                                                            {
                                                            echo "<option value='AR' selected='selected' >AR</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='AR' >AR</option>";
                                                            }
                                                            if($company_state == "BE")
                                                            {
                                                            echo "<option value='BE' selected='selected' >BE</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='BE' >BE</option>";
                                                            }
                                                            if($company_state == "BL")
                                                            {
                                                            echo "<option value='BL' selected='selected' >BL</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='BL' >BL</option>";
                                                            }
                                                            if($company_state == "BS")
                                                            {
                                                            echo "<option value='BS' selected='selected' >BS</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='BS' >BS</option>";
                                                            }
                                                            if($company_state == "CH")
                                                            {
                                                            echo "<option value='CH' selected='selected' >CH</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='CH' >CH</option>";
                                                            }
                                                            if($company_state == "FR")
                                                            {
                                                            echo "<option value='FR' selected='selected' >FR</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='FR' >FR</option>";
                                                            }
                                                            if($company_state == "GE")
                                                            {
                                                            echo "<option value='GE' selected='selected' >GE</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='GE' >GE</option>";
                                                            }
                                                            if($company_state == "GL")
                                                            {
                                                            echo "<option value='GL' selected='selected' >GL</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='GL' >GL</option>";
                                                            }
                                                            if($company_state == "GR")
                                                            {
                                                            echo "<option value='GR' selected='selected' >GR</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='GR' >GR</option>";
                                                            }
                                                            if($company_state == "JU")
                                                            {
                                                            echo "<option value='JU' selected='selected' >JU</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='JU' >JU</option>";
                                                            }
                                                            if($company_state == "LU")
                                                            {
                                                            echo "<option value='LU' selected='selected' >LU</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='LU' >LU</option>";
                                                            }
                                                            if($company_state == "NE")
                                                            {
                                                            echo "<option value='NE' selected='selected' >NE</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='NE' >NE</option>";
                                                            }
                                                            if($company_state == "NW")
                                                            {
                                                            echo "<option value='NW' selected='selected' >NW</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='NW' >NW</option>";
                                                            }
                                                            if($company_state == "OW")
                                                            {
                                                            echo "<option value='OW' selected='selected' >OW</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='OW' >OW</option>";
                                                            }
                                                            if($company_state == "SG")
                                                            {
                                                            echo "<option value='SG' selected='selected' >SG</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='SG' >SG</option>";
                                                            }
                                                            if($company_state == "SH")
                                                            {
                                                            echo "<option value='SH' selected='selected' >SH</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='SH' >SH</option>";
                                                            }
                                                            if($company_state == "SO")
                                                            {
                                                            echo "<option value='SO' selected='selected' >SO</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='SO' >SO</option>";
                                                            }
                                                            if($company_state == "SZ")
                                                            {
                                                            echo "<option value='SZ' selected='selected' >SZ</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='SZ' >SZ</option>";
                                                            }
                                                            if($company_state == "TG")
                                                            {
                                                            echo "<option value='TG' selected='selected' >TG</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='TG' >TG</option>";
                                                            }

                                                            if($company_state == "TI")
                                                            {
                                                            echo "<option value='TI' selected='selected' >TI</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='TI' >TI</option>";
                                                            }
                                                            if($company_state == "UR")
                                                            {
                                                            echo "<option value='UR' selected='selected' >UR</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='UR' >UR</option>";
                                                            }
                                                            if($company_state == "VD")
                                                            {
                                                            echo "<option value='VD' selected='selected' >VD</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='VD' >VD</option>";
                                                            }

                                                            if($company_state == "VS")
                                                            {
                                                            echo "<option value='VS' selected='selected' >VS</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='VS' >VS</option>";
                                                            }
                                                            if($company_state == "ZG")
                                                            {
                                                            echo "<option value='ZG' selected='selected' >ZG</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='ZG' >ZG</option>";
                                                            }
                                                            if($company_state == "ZH")
                                                            {
                                                            echo "<option value='ZH' selected='selected' >ZH</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='ZH' >ZH</option>";
                                                            }


                                                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">E-mail entreprise/organisation *</label>
                                                <div class="col-md-9">
                                                <input type="email" class="form-control" id="sameEmail" name="sameEmail" value="{{ $email2 }}" placeholder="Entrez votre e-mail">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Téléphone entreprise/organisation *</label>
                                                <div class="col-md-9">
                                                    <input type="tel" class="form-control" id="samePhone" name="samePhone" value="{{ $phone2 }}" placeholder="Entrez votre téléphone">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Site internet ou page (ex. Facebook, LinkedIn) de l'entreprise/organisation *</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="sameLink" name="sameLink" value="{{ $link2 }}" placeholder="Ex. www.google.fr ou google.fr">
                                                </div>
                                            </div>
                                   </div>     
                                     <!----------------------Third part---------------------->
                                    <div class="form-group row">
                                         <div class="col-md-12">
                                            <!-- <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-gift"></i>Adresse de facturation
                                                </div>
                                            </div> -->
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-gift" style="margin-right: 5px;"></i>Adresse de facturation</h6>
                                            </div>
                                         </div>
                                    </div>
                                     <div class="form-group row">
                                            <label class="control-label col-md-3"></label>
                                            <div class="col-md-9">
                                                <input type="checkbox" id="sameConfirmNew" name="sameConfirmNew" <?php if($checked_new == ''||$checked_new=='no'){ ?>  <?php } else{?> checked="checked" <?php } ?>>
                                                <strong style="color:#000;">Adresse identifque à l'offre d'emploi</strong>
                                                &nbsp;&nbsp;
                                                <input type="checkbox" id="diffValNew" name="diffValNew"<?php if($checked_new == ''||$checked_new=='no'){ ?> checked="checked" <?php } else{?>  <?php } ?>> 
                                                <b style="color:#000;">Adresse différente de l'offre d'emploi</b>
                                            </div>
                                     </div>
                                     <div class="disable_div_new" id="disableDivNew">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Nom de l'entreprise ou organisation *</label>
                                                <div class="col-md-9">
                                                <input type="text" class="form-control" id="newSameCompany" name="newSameCompany" placeholder="Ex. Grande Pharmacie" value="{{ $new_company_detail }}" >                      
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Pays *</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="newCountry"  name="newCountry"  >
                                                            @foreach ($con as $conList)
                                                                <option value="{{$conList->name}}"@if($conList->name==$new_company_address_paid) selected="selected" @endif> {{$conList->dname}}</option>
                                                            @endforeach
                                                    </select>
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Adresse *</label>
                                                <div class="col-md-9">
                                                <input type="text" class="form-control" id="newSameAddress" name="newSameAddress" placeholder="Ex. Grande Pharmacie" value="{{$new_company_address}}" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Code postal *</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="newSamePincode" name="newSamePincode" placeholder="Ex. 75001" value="{{$new_company_pincode}}" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Ville *</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="newSameCity" name="newSameCity" placeholder="Ex. Lausanne" value="{{$new_company_city}}">
                                                </div>
                                            </div>
                                            <div class="form-group row" id="new_department_div" @if($new_company_address_paid=="France"||$new_company_address_paid=="") style="display: flex;" @else style="display:none;"  @endif>
                                                <label class="control-label col-md-3">Département (ex. 01) *</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="newSameDepartment" name="newSameDepartment" onkeyup="hello(this.value);" tabindex="-1">
                                                            <option data-select2-id="4"></option>
                                                            <?php

                                                                if($new_company_department == "01")
                                                                {
                                                                echo "<option value='01' selected='selected' >01</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='01' >01</option>";
                                                                }

                                                                if($new_company_department == "02")
                                                                {
                                                                echo "<option value='02' selected='selected' >02</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='02' >02</option>";
                                                                }

                                                                if($new_company_department == "03")
                                                                {
                                                                echo "<option value='03' selected='selected' >03</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='03' >03</option>";
                                                                }

                                                                if($new_company_department == "04")
                                                                {
                                                                echo "<option value='04' selected='selected' >04</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='04' >04</option>";
                                                                }

                                                                if($new_company_department == "05")
                                                                {
                                                                echo "<option value='05' selected='selected' >05</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='05' >05</option>";
                                                                }

                                                                if($new_company_department == "06")
                                                                {
                                                                echo "<option value='06' selected='selected' >06</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='06' >06</option>";
                                                                }

                                                                if($new_company_department == "07")
                                                                {
                                                                echo "<option value='07' selected='selected' >07</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='07' >07</option>";
                                                                }

                                                                if($new_company_department == "08")
                                                                {
                                                                echo "<option value='08' selected='selected' >08</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='08' >08</option>";
                                                                }

                                                                if($new_company_department == "09")
                                                                {
                                                                echo "<option value='09' selected='selected' >09</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='09' >09</option>";
                                                                }

                                                                if($new_company_department == "10")
                                                                {
                                                                echo "<option value='10' selected='selected' >10</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='10' >10</option>";
                                                                }

                                                                if($new_company_department == "11")
                                                                {
                                                                echo "<option value='11' selected='selected' >11</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='11' >11</option>";
                                                                }

                                                                if($new_company_department == "12")
                                                                {
                                                                echo "<option value='12' selected='selected' >12</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='12' >12</option>";
                                                                }

                                                                if($new_company_department == "13")
                                                                {
                                                                echo "<option value='13' selected='selected' >13</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='13' >13</option>";
                                                                }

                                                                if($new_company_department == "14")
                                                                {
                                                                echo "<option value='14' selected='selected' >14</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='14' >14</option>";
                                                                }

                                                                if($new_company_department == "15")
                                                                {
                                                                echo "<option value='15' selected='selected' >15</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='15' >15</option>";
                                                                }

                                                                if($new_company_department == "16")
                                                                {
                                                                echo "<option value='16' selected='selected' >16</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='16' >16</option>";
                                                                }

                                                                if($new_company_department == "17")
                                                                {
                                                                echo "<option value='17' selected='selected' >17</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='17' >17</option>";
                                                                }

                                                                if($new_company_department == "18")
                                                                {
                                                                echo "<option value='18' selected='selected' >18</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='18' >18</option>";
                                                                }

                                                                if($new_company_department == "19")
                                                                {
                                                                echo "<option value='19' selected='selected' >19</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='19' >19</option>";
                                                                }

                                                                /*if($new_company_department == "20")
                                                                {
                                                                echo "<option value='20' selected='selected' >20</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='20' >20</option>";
                                                                }*/

                                                                if($new_company_department == "2A")
                                                                {
                                                                echo "<option value='2A' selected='selected' >2A</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='2A' >2A</option>";
                                                                }

                                                                if($new_company_department == "2B")
                                                                {
                                                                echo "<option value='2B' selected='selected' >2B</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='2B' >2B</option>";
                                                                }

                                                                if($new_company_department == "21")
                                                                {
                                                                echo "<option value='21' selected='selected' >21</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='21' >21</option>";
                                                                }

                                                                if($new_company_department == "22")
                                                                {
                                                                echo "<option value='22' selected='selected' >22</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='22' >22</option>";
                                                                }

                                                                if($new_company_department == "23")
                                                                {
                                                                echo "<option value='23' selected='selected' >23</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='23' >23</option>";
                                                                }

                                                                if($new_company_department == "24")
                                                                {
                                                                echo "<option value='24' selected='selected' >24</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='24' >24</option>";
                                                                }

                                                                if($new_company_department == "25")
                                                                {
                                                                echo "<option value='25' selected='selected' >25</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='25' >25</option>";
                                                                }

                                                                if($new_company_department == "26")
                                                                {
                                                                echo "<option value='26' selected='selected' >26</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='26' >26</option>";
                                                                }

                                                                if($new_company_department == "27")
                                                                {
                                                                echo "<option value='27' selected='selected' >27</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='27' >27</option>";
                                                                }

                                                                if($new_company_department == "28")
                                                                {
                                                                echo "<option value='28' selected='selected' >28</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='28' >28</option>";
                                                                }

                                                                if($new_company_department == "29")
                                                                {
                                                                echo "<option value='29' selected='selected' >29</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='29' >29</option>";
                                                                }

                                                                if($new_company_department == "30")
                                                                {
                                                                echo "<option value='30' selected='selected' >30</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='30' >30</option>";
                                                                }

                                                                if($new_company_department == "31")
                                                                {
                                                                echo "<option value='31' selected='selected' >31</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='31' >31</option>";
                                                                }

                                                                if($new_company_department == "32")
                                                                {
                                                                echo "<option value='32' selected='selected' >32</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='32' >32</option>";
                                                                }

                                                                if($new_company_department == "33")
                                                                {
                                                                echo "<option value='33' selected='selected' >33</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='33' >33</option>";
                                                                }

                                                                if($new_company_department == "34")
                                                                {
                                                                echo "<option value='34' selected='selected' >34</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='34' >34</option>";
                                                                }

                                                                if($new_company_department == "35")
                                                                {
                                                                echo "<option value='35' selected='selected' >35</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='35' >35</option>";
                                                                }

                                                                if($new_company_department == "36")
                                                                {
                                                                echo "<option value='36' selected='selected' >36</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='36' >36</option>";
                                                                }

                                                                if($new_company_department == "37")
                                                                {
                                                                echo "<option value='37' selected='selected' >37</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='37' >37</option>";
                                                                }

                                                                if($new_company_department == "38")
                                                                {
                                                                echo "<option value='38' selected='selected' >38</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='38' >38</option>";
                                                                }

                                                                if($new_company_department == "39")
                                                                {
                                                                echo "<option value='39' selected='selected' >39</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='39' >39</option>";
                                                                }

                                                                if($new_company_department == "40")
                                                                {
                                                                echo "<option value='40' selected='selected' >40</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='40' >40</option>";
                                                                }

                                                                if($new_company_department == "41")
                                                                {
                                                                echo "<option value='41' selected='selected' >41</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='41' >41</option>";
                                                                }

                                                                if($new_company_department == "42")
                                                                {
                                                                echo "<option value='42' selected='selected' >42</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='42' >42</option>";
                                                                }

                                                                if($new_company_department == "43")
                                                                {
                                                                echo "<option value='43' selected='selected' >43</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='43' >43</option>";
                                                                }

                                                                if($new_company_department == "44")
                                                                {
                                                                echo "<option value='44' selected='selected' >44</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='44' >44</option>";
                                                                }

                                                                if($new_company_department == "45")
                                                                {
                                                                echo "<option value='45' selected='selected' >45</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='45' >45</option>";
                                                                }

                                                                if($new_company_department == "46")
                                                                {
                                                                echo "<option value='46' selected='selected' >46</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='46' >46</option>";
                                                                }

                                                                if($new_company_department == "47")
                                                                {
                                                                echo "<option value='47' selected='selected' >47</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='47' >47</option>";
                                                                }

                                                                if($new_company_department == "48")
                                                                {
                                                                echo "<option value='48' selected='selected' >48</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='48' >48</option>";
                                                                }

                                                                if($new_company_department == "49")
                                                                {
                                                                echo "<option value='49' selected='selected' >49</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='49' >49</option>";
                                                                }

                                                                if($new_company_department == "50")
                                                                {
                                                                echo "<option value='50' selected='selected' >50</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='50' >50</option>";
                                                                }

                                                                if($new_company_department == "51")
                                                                {
                                                                echo "<option value='51' selected='selected' >51</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='51' >51</option>";
                                                                }

                                                                if($new_company_department == "52")
                                                                {
                                                                echo "<option value='52' selected='selected' >52</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='52' >52</option>";
                                                                }

                                                                if($new_company_department == "53")
                                                                {
                                                                echo "<option value='53' selected='selected' >53</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='53' >53</option>";
                                                                }

                                                                if($new_company_department == "54")
                                                                {
                                                                echo "<option value='54' selected='selected' >54</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='54' >54</option>";
                                                                }

                                                                if($new_company_department == "55")
                                                                {
                                                                echo "<option value='55' selected='selected' >55</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='55' >55</option>";
                                                                }

                                                                if($new_company_department == "56")
                                                                {
                                                                echo "<option value='56' selected='selected' >56</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='56' >56</option>";
                                                                }

                                                                if($new_company_department == "57")
                                                                {
                                                                echo "<option value='57' selected='selected' >57</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='57' >57</option>";
                                                                }

                                                                if($new_company_department == "58")
                                                                {
                                                                echo "<option value='58' selected='selected' >58</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='58' >58</option>";
                                                                }

                                                                if($new_company_department == "59")
                                                                {
                                                                echo "<option value='59' selected='selected' >59</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='59' >59</option>";
                                                                }

                                                                if($new_company_department == "60")
                                                                {
                                                                echo "<option value='60' selected='selected' >60</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='60' >60</option>";
                                                                }

                                                                if($new_company_department == "61")
                                                                {
                                                                echo "<option value='61' selected='selected' >61</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='61' >61</option>";
                                                                }

                                                                if($new_company_department == "62")
                                                                {
                                                                echo "<option value='62' selected='selected' >62</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='62' >62</option>";
                                                                }

                                                                if($new_company_department == "63")
                                                                {
                                                                echo "<option value='63' selected='selected' >63</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='63' >63</option>";
                                                                }

                                                                if($new_company_department == "64")
                                                                {
                                                                echo "<option value='64' selected='selected' >64</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='64' >64</option>";
                                                                }

                                                                if($new_company_department == "65")
                                                                {
                                                                echo "<option value='65' selected='selected' >65</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='65' >65</option>";
                                                                }

                                                                if($new_company_department == "66")
                                                                {
                                                                echo "<option value='66' selected='selected' >66</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='66' >66</option>";
                                                                }

                                                                if($new_company_department == "67")
                                                                {
                                                                echo "<option value='67' selected='selected' >67</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='67' >67</option>";
                                                                }

                                                                if($new_company_department == "68")
                                                                {
                                                                echo "<option value='68' selected='selected' >68</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='68' >68</option>";
                                                                }

                                                                if($new_company_department == "69")
                                                                {
                                                                echo "<option value='69' selected='selected' >69</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='69' >69</option>";
                                                                }

                                                                if($new_company_department == "70")
                                                                {
                                                                echo "<option value='70' selected='selected' >70</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='70' >70</option>";
                                                                }

                                                                if($new_company_department == "71")
                                                                {
                                                                echo "<option value='71' selected='selected' >71</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='71' >71</option>";
                                                                }

                                                                if($new_company_department == "72")
                                                                {
                                                                echo "<option value='72' selected='selected' >72</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='72' >72</option>";
                                                                }

                                                                if($new_company_department == "73")
                                                                {
                                                                echo "<option value='73' selected='selected' >73</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='73' >73</option>";
                                                                }

                                                                if($new_company_department == "74")
                                                                {
                                                                echo "<option value='74' selected='selected' >74</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='74' >74</option>";
                                                                }

                                                                if($new_company_department == "75")
                                                                {
                                                                echo "<option value='75' selected='selected' >75</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='75' >75</option>";
                                                                }

                                                                if($new_company_department == "76")
                                                                {
                                                                echo "<option value='76' selected='selected' >76</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='76' >76</option>";
                                                                }

                                                                if($new_company_department == "77")
                                                                {
                                                                echo "<option value='77' selected='selected' >77</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='77' >77</option>";
                                                                }

                                                                if($new_company_department == "78")
                                                                {
                                                                echo "<option value='78' selected='selected' >78</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='78' >78</option>";
                                                                }

                                                                if($new_company_department == "79")
                                                                {
                                                                echo "<option value='79' selected='selected' >79</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='79' >79</option>";
                                                                }

                                                                if($new_company_department == "80")
                                                                {
                                                                echo "<option value='80' selected='selected' >80</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='80' >80</option>";
                                                                }

                                                                if($new_company_department == "81")
                                                                {
                                                                echo "<option value='81' selected='selected' >81</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='81' >81</option>";
                                                                }

                                                                if($new_company_department == "82")
                                                                {
                                                                echo "<option value='82' selected='selected' >82</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='82' >82</option>";
                                                                }

                                                                if($new_company_department == "83")
                                                                {
                                                                echo "<option value='83' selected='selected' >83</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='83' >83</option>";
                                                                }

                                                                if($new_company_department == "84")
                                                                {
                                                                echo "<option value='84' selected='selected' >84</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='84' >84</option>";
                                                                }

                                                                if($new_company_department == "85")
                                                                {
                                                                echo "<option value='85' selected='selected' >85</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='85' >85</option>";
                                                                }

                                                                if($new_company_department == "86")
                                                                {
                                                                echo "<option value='86' selected='selected' >86</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='86' >86</option>";
                                                                }

                                                                if($new_company_department == "87")
                                                                {
                                                                echo "<option value='87' selected='selected' >87</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='87' >87</option>";
                                                                }

                                                                if($new_company_department == "88")
                                                                {
                                                                echo "<option value='88' selected='selected' >88</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='88' >88</option>";
                                                                }

                                                                if($new_company_department == "89")
                                                                {
                                                                echo "<option value='89' selected='selected' >89</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='89' >89</option>";
                                                                }

                                                                if($new_company_department == "90")
                                                                {
                                                                echo "<option value='90' selected='selected' >90</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='90' >90</option>";
                                                                }

                                                                if($new_company_department == "91")
                                                                {
                                                                echo "<option value='91' selected='selected' >91</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='91' >91</option>";
                                                                }

                                                                if($new_company_department == "92")
                                                                {
                                                                echo "<option value='92' selected='selected' >92</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='92' >92</option>";
                                                                }

                                                                if($new_company_department == "93")
                                                                {
                                                                echo "<option value='93' selected='selected' >93</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='93' >93</option>";
                                                                }

                                                                if($new_company_department == "94")
                                                                {
                                                                echo "<option value='94' selected='selected' >94</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='94' >94</option>";
                                                                }

                                                                if($new_company_department == "95")
                                                                {
                                                                echo "<option value='95' selected='selected' >95</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='95' >95</option>";
                                                                }

                                                                if($new_company_department == "98")
                                                                {
                                                                echo "<option value='98' selected='selected' >98</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='98' >98</option>";
                                                                }

                                                                if($new_company_department == "971")
                                                                {
                                                                echo "<option value='971' selected='selected' >971</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='971' >971</option>";
                                                                }

                                                                if($new_company_department == "972")
                                                                {
                                                                echo "<option value='972' selected='selected' >972</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='972' >972</option>";
                                                                }

                                                                if($new_company_department == "973")
                                                                {
                                                                echo "<option value='973' selected='selected' >973</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='973' >973</option>";
                                                                }

                                                                if($new_company_department == "974")
                                                                {
                                                                echo "<option value='974' selected='selected' >974</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='974' >974</option>";
                                                                }

                                                                if($new_company_department == "975")
                                                                {
                                                                echo "<option value='975' selected='selected' >975</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='975' >975</option>";
                                                                }

                                                                if($new_company_department == "976")
                                                                {
                                                                echo "<option value='976' selected='selected' >976</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='976' >976</option>";
                                                                }

                                                                if($new_company_department == "977")
                                                                {
                                                                echo "<option value='977' selected='selected' >977</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='977' >977</option>";
                                                                }

                                                                if($new_company_department == "978")
                                                                {
                                                                echo "<option value='978' selected='selected' >978</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='978' >978</option>";
                                                                }

                                                                if($new_company_department == "984")
                                                                {
                                                                echo "<option value='984' selected='selected' >984</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='984' >984</option>";
                                                                }

                                                                if($new_company_department == "986")
                                                                {
                                                                echo "<option value='986' selected='selected' >986</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='986' >986</option>";
                                                                }

                                                                if($new_company_department == "987")
                                                                {
                                                                echo "<option value='987' selected='selected' >987</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='987' >987</option>";
                                                                }

                                                                if($new_company_department == "988")
                                                                {
                                                                echo "<option value='988' selected='selected' >988</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='988' >988</option>";
                                                                }

                                                                if($new_company_department == "989")
                                                                {
                                                                echo "<option value='989' selected='selected' >989</option>";
                                                                }
                                                                else
                                                                {
                                                                echo "<option value='989' >989</option>";
                                                                }

                                                            ?>
                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="form-group row" id="new_cantons" @if($new_company_address_paid=="Switzerland") style="display: flex;" @else style="display:none;"  @endif>
                                                <label class="control-label col-md-3">Cantons *</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="newState" name="newState" onkeyup="hello(this.value);">
                                                            <option data-select2-id="2"></option>
                                                            <?php
                                                            if($new_company_state  == "AG")
                                                            {
                                                            echo "<option value='AG' selected='selected' >AG</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='AG' >AG</option>";
                                                            }
                                                            
                                                            if($new_company_state == "AI")
                                                            {
                                                            echo "<option value='AI' selected='selected' >AI</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='AI' >AI</option>";
                                                            }
                                                            if($new_company_state == "AR")
                                                            {
                                                            echo "<option value='AR' selected='selected' >AR</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='AR' >AR</option>";
                                                            }
                                                            if($new_company_state == "BE")
                                                            {
                                                            echo "<option value='BE' selected='selected' >BE</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='BE' >BE</option>";
                                                            }
                                                            if($new_company_state == "BL")
                                                            {
                                                            echo "<option value='BL' selected='selected' >BL</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='BL' >BL</option>";
                                                            }
                                                            if($new_company_state == "BS")
                                                            {
                                                            echo "<option value='BS' selected='selected' >BS</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='BS' >BS</option>";
                                                            }
                                                            if($new_company_state == "CH")
                                                            {
                                                            echo "<option value='CH' selected='selected' >CH</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='CH' >CH</option>";
                                                            }
                                                            if($new_company_state == "FR")
                                                            {
                                                            echo "<option value='FR' selected='selected' >FR</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='FR' >FR</option>";
                                                            }
                                                            if($new_company_state == "GE")
                                                            {
                                                            echo "<option value='GE' selected='selected' >GE</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='GE' >GE</option>";
                                                            }
                                                            if($new_company_state == "GL")
                                                            {
                                                            echo "<option value='GL' selected='selected' >GL</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='GL' >GL</option>";
                                                            }
                                                            if($new_company_state == "GR")
                                                            {
                                                            echo "<option value='GR' selected='selected' >GR</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='GR' >GR</option>";
                                                            }
                                                            if($new_company_state == "JU")
                                                            {
                                                            echo "<option value='JU' selected='selected' >JU</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='JU' >JU</option>";
                                                            }
                                                            if($new_company_state == "LU")
                                                            {
                                                            echo "<option value='LU' selected='selected' >LU</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='LU' >LU</option>";
                                                            }
                                                            if($new_company_state == "NE")
                                                            {
                                                            echo "<option value='NE' selected='selected' >NE</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='NE' >NE</option>";
                                                            }
                                                            if($new_company_state == "NW")
                                                            {
                                                            echo "<option value='NW' selected='selected' >NW</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='NW' >NW</option>";
                                                            }
                                                            if($new_company_state == "OW")
                                                            {
                                                            echo "<option value='OW' selected='selected' >OW</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='OW' >OW</option>";
                                                            }
                                                            if($new_company_state == "SG")
                                                            {
                                                            echo "<option value='SG' selected='selected' >SG</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='SG' >SG</option>";
                                                            }
                                                            if($new_company_state == "SH")
                                                            {
                                                            echo "<option value='SH' selected='selected' >SH</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='SH' >SH</option>";
                                                            }
                                                            if($new_company_state == "SO")
                                                            {
                                                            echo "<option value='SO' selected='selected' >SO</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='SO' >SO</option>";
                                                            }
                                                            if($new_company_state == "SZ")
                                                            {
                                                            echo "<option value='SZ' selected='selected' >SZ</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='SZ' >SZ</option>";
                                                            }
                                                            if($new_company_state == "TG")
                                                            {
                                                            echo "<option value='TG' selected='selected' >TG</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='TG' >TG</option>";
                                                            }
                                                            
                                                            if($new_company_state == "TI")
                                                            {
                                                            echo "<option value='TI' selected='selected' >TI</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='TI' >TI</option>";
                                                            }
                                                            if($new_company_state == "UR")
                                                            {
                                                            echo "<option value='UR' selected='selected' >UR</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='UR' >UR</option>";
                                                            }
                                                            if($new_company_state == "VD")
                                                            {
                                                            echo "<option value='VD' selected='selected' >VD</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='VD' >VD</option>";
                                                            }
                                                            
                                                            if($new_company_state == "VS")
                                                            {
                                                            echo "<option value='VS' selected='selected' >VS</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='VS' >VS</option>";
                                                            }
                                                            if($new_company_state == "ZG")
                                                            {
                                                            echo "<option value='ZG' selected='selected' >ZG</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='ZG' >ZG</option>";
                                                            }
                                                            if($new_company_state == "ZH")
                                                            {
                                                            echo "<option value='ZH' selected='selected' >ZH</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='ZH' >ZH</option>";
                                                            }
                                                            
                                                            
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Cantons *</label>
                                                <div class="col-md-9">
                                                <input type="text" class="form-control" id="newComplement" name="newComplement" value="{{$new_complement}}"  placeholder="Ex. comptabilité">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3"></label>
                                                <div class="col-md-2">
                                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                                        <i class="fa fa-check"></i> Submit</button>
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="reset" class="btn btn-google btn-user btn-block">Clear</button>
                                                </div>
                                            </div>
                                     </div>    
                                    <!--------------------end------------------->
                                     <!--------------------end------------------->
                                    </div>





                                </div>

                


                                
                            </form>
                            <!-- END FORM-->

                        </div>


                    </div>
                    <div class="container-fluid">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-gift" style="margin-right: 5px;"></i>Team Member User List</h6>
                            </div>
                            <div class="card-body">
                                <div class="tab-pane active" id="tab_5">
                             @include('layouts.flash-message')
                                <div class="portlet box blue ">
                                    <!-- <div class="portlet-title">
                                        <div class="caption">
                                             <i class="fa fa-gift"></i>Team Member User List
                                        </div>
                                    </div> -->
                                    <div class="portlet-body form">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>  
                                                    <td>First Name</td>
                                                    <td>Last Name</td>
                                                    <td>Email</td>
                                                    <td>Password</td>
                                                    <td>Role</td>
                                                    <td>Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $Phrm_TeamHub=DB::table('pharmapro_teammember')
                                                    ->select('*')
                                                    ->where('interviewer_id',$id)
                                                    ->get();
                                                    if($Phrm_TeamHub->count())
                                                    {
                                                        if(!empty($Phrm_TeamHub))
                                                        {
                                                            foreach($Phrm_TeamHub as $key => $value)
                                                            {

                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $value->first_name;?></td>
                                                    <td><?php echo $value->last_name;?></td>
                                                    <td><?php echo $value->email; ?></td>
                                                    <td><?php echo $value->password; ?></td>
                                                    <td><?php  if($value->role == 'FULL'){ echo "Admin";}else{echo "Team Member/Producer/Assistant";}?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $url='admin/TeamHubUser/edit/'.$value->id;
                                                        ?>
                                                        <a href="{{ url($url) }}"><i class="icon-pencil"></i></a>
                                                        <?php
                                                            $url='admin/TeamHubUser/delete/'.$value->id;
                                                        ?>
                                                        <a href="{{ url($url) }}" data-toggle="confirmation" data-original-title="Are you sure you want to delete ?" aria-describedby="confirmation783017">
                                                            <i class="icon-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                            }
                                       }else{ ?>
                                          <tr >
                                            <td colspan="5"><p>No Team Member found</p></td>
                                        </tr>
                                       <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
</div>
@endsection

@push('scripts')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    
    
    <script src="{{ asset('assets/layouts/layout4/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
    <script>
        $(document).ready(function () {
            $('#diffVal').change(function(){
            //alert("hello");
                $('#sameConfirm').prop('checked', false);
                $('#disableDiv').css("display", "block");
            });
        });
    </script>
    <script>
        $(document).ready(function(){
                $('#diffValNew').click(function() {
                $('#sameConfirmNew').prop('checked', false);
                $('#disableDivNew').css("display", "block");
            });
        }); 
   </script>
     <script type="text/javascript">
        $(document).ready(function () {
            $('#sameConfirm').change(function() {
                if($(this).is(':checked'))
                {
                     $('#disableDiv').css("display", "none"); 
                     $('#diffVal').prop('checked', false);
                }
                else
                {
                      $('#disableDiv').css("display", "block"); 
                      $('#diffVal').prop('checked', true);
                    //$('#disableDiv').find('input,textarea,select').attr('readonly',false);
                    //$('#disableDiv').find('input,textarea,select').css({"pointer-events": "auto", "touch-action": "auto"});
                }
            });
            $('#sameConfirmNew').change(function() {
                if($(this).is(':checked'))
                {
                    $('#disableDivNew').css({display: "none"});
                    $('#diffValNew').prop('checked', false);
                }
                else
                {
                $('#disableDivNew').css({display: "block"});
                $('#diffValNew').prop('checked', true);
                
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sameCountry').on('change', function() {
                if ($(this).val() == 'Switzerland') 
                {
                    //alert('hello');
                    $('#con_department').css({display: "none"});
                    $('#con_cantons').css({display: "block"});
                } 
                else if($(this).val() == 'France')
                {
                $('#con_department').css({display: "block"});
                $('#con_cantons').css({display: "none"});
                }
                else
                {
                //alert('hi');
                $('#con_department').css({display: "none"});
                $('#cantons1').css({display: "none"});
                }
            });
            $("#newCountry").change(function(){
                if ($(this).val() == 'Switzerland') 
                {
                    //alert('hello');
                    $('#new_department_div').css({display: "none"});
                    $('#new_cantons').css({display: "block"});
                } 
                else if($(this).val() == 'France')
                {
                $('#new_department_div').css({display: "block"});
                $('#new_cantons').css({display: "none"});
                }
                else
                {
                //alert('hi');
                $('#new_department_div').css({display: "none"});
                $('#new_cantons').css({display: "none"});
                // $("input[name='state']").val() = ''
                
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            var checked_val=$("#sameConfirm").prop("checked");
            var checked_new=$("#sameConfirmNew").prop("checked");
            if(checked_val==true)
            {
                $('#disableDiv').css({display: "none"});
            //$('#disableDiv').find('input,textarea,select').attr('readonly',true);
            // $('#disableDiv').find('input,textarea,select').css({"pointer-events": "none", "touch-action": "none"});
            }
            else
            {
                $('#disableDiv').css({display: "block"});
            // $('#disableDiv').find('input,textarea,select').attr('readonly',false);
            // $('#disableDiv').find('input,textarea,select').css({"pointer-events": "auto", "touch-action": "auto"});
            }
            if(checked_new==true)
            {
                $('#disableDivNew').css({display: "none"});
            // $('#disableDivNew').find('input,textarea,select').attr('readonly',true);
            // $('#disableDivNew').find('input,textarea,select').css({"pointer-events": "none", "touch-action": "none"});
            }
            else
            {
                $('#disableDivNew').css({display: "block"});
            // $('#disableDivNew').find('input,textarea,select').attr('readonly',false);
            // $('#disableDivNew').find('input,textarea,select').css({"pointer-events": "auto", "touch-action": "auto"});
            }
            $('#frmInterviewer').validate({
                rules: {
                    first_name: {required: true},
                    last_name: {required: true},
                    email: {required: true},
                   // username: {required: true},
                    password: {required: true},
                },  
            });
            
        });


    </script>
    
@endpush
