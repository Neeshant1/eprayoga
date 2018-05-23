
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ePrayoga - Index</title>


     <link rel="stylesheet" type="text/css" href="plugins/bootstrap/dist/css/bootstrap.min.css">
    <!-- Ionicons-->
    <link rel="stylesheet" type="text/css" href="plugins/Ionicons/css/ionicons.min.css">
    <!-- Malihu Scrollbar-->
    <link rel="stylesheet" type="text/css" href="plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css">
    <!-- Animo.js-->
    <link rel="stylesheet" type="text/css" href="plugins/animo.js/animate-animo.min.css">

    <!-- Bootstrap Progressbar-->
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">
    <!-- jQuery MiniColors-->
    <link rel="stylesheet" type="text/css" href="plugins/jquery-minicolors/jquery.minicolors.css">
    <!-- Bootstrap TouchSpin-->
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">

    <!-- Flag Icons-->
    <link rel="stylesheet" type="text/css" href="plugins/flag-icon-css/css/flag-icon.min.css">
    <!-- Jvector Map-->
    <link rel="stylesheet" type="text/css" href="plugins/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- SpinKit-->
    <link rel="stylesheet" type="text/css" href="plugins/SpinKit/css/spinners/2-double-bounce.css">
    <!-- DataTables-->
    <link rel="stylesheet" type="text/css" href="plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/datatables.net-buttons-bs/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/datatables.net-colreorder-bs/css/colReorder.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/datatables.net-responsive-bs/css/responsive.bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="plugins/bootstrap/less/button-groups.less">

         <!-- Bootstrap TouchSpin-->
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
     <!-- Bootstrap Date Range Picker-->
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Bootstrap DatePicker-->
    <link rel="stylesheet" type="text/css" href="plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">

 <link rel="stylesheet" type="text/css" href="plugins/PACE/themes/blue/pace-theme-flash.css">
    <script type="text/javascript" src="plugins/PACE/pace.min.js"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap/dist/css/bootstrap.min.css">
    <!-- Ionicons-->
    <link rel="stylesheet" type="text/css" href="plugins/Ionicons/css/ionicons.min.css">
    <!-- Malihu Scrollbar-->
    <link rel="stylesheet" type="text/css" href="plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css">
    <!-- Animo.js-->
    <link rel="stylesheet" type="text/css" href="plugins/animo.js/animate-animo.min.css">
    <!-- Bootstrap Progressbar-->
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">
    <!-- jQuery Steps-->
    <link rel="stylesheet" type="text/css" href="plugins/jquery.steps/demo/css/jquery.steps.css">
    <!-- Core CSS-->
    <link rel="stylesheet" type="text/css" href="styles/first-layout.css">
</head>
<body>
  <header>
      <div class="search-bar closed">
      </div>


        <a href="javascript:;" role="button" class="hamburger-menu pull-left"><span></span></a>
      <form class="search-form m-10 pull-right hidden-xs">

        <!-- <div class="form-group has-feedback mb-0">
          <input type="text" aria-describedby="inputSearchFor" placeholder="Search for..." style="width: 180px" class="form-control rounded"><span aria-hidden="true" class="ion-search form-control-feedback"></span><span id="inputSearchFor" class="sr-only">(default)</span>
        </div> -->
      </form>
      <a href="#"><img src="images/logo.png" width="200"></a> 
    </header>
<br><br><br><br><br><br><br><br><br>

      <div class="page-container">
        <div class="page-content container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="widget no-border">
                <div id="page-section"></div>
              </div>
            </div>
          </div>
        </div>
      </div>


 <script type="text/template" id="indexloginpage">
<div class="row"><div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="txtemail" class="col-md-6 col-sm-3control-label">Email</label>
                          <input id="email_txt" name="email" type="text" class="form-control" maxlength="150">
                          <div id="email_error" style="color:red"></div>
                      </div>
                    </div>
                    </div><br><br>
                    <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="txtpassword" class="col-md-6 col-sm-3  control-label">Password</label>
                          <input id="password_txt" name="password" type="text" class="form-control" maxlength="150">
                          <div id="password_error" style="color:red"></div>
                      </div>
                    </div>
                  </div>
                  </div>

<div class="col-md-2">
                      <div class="form-group">
 <button type="submit" id="sign_in" data-toggle="tooltip" data-placement="bottom" title="Sign In" "  name="btnSubmit" class="btn btn-raised btn-black">Sign In</button>
 </div>
 </div>
 <div class="col-md-2">
                      <div class="form-group">
  <button type="submit" id="sign_up" data-toggle="tooltip" data-placement="bottom" title="Sign Up"  name="btnSubmit" class="btn btn-raised btn-black">Sign Up</button></div></div>
  </div>
</script>


 <script type="text/template" id="signuppage">
 <div class="main-container">
  <div class="form-group">
 <button type="submit" id="selectcustomer" data-toggle="tooltip" data-placement="bottom" title="Select Customer" "  name="btnSubmit" class="btn btn-raised btn-black">Customer</button>
  <button type="submit" id="selectclient" data-toggle="tooltip" data-placement="bottom" title="Select Client"  name="btnSubmit" class="btn btn-raised btn-black">Client</button>
  </div>
</script>


      <script type="text/template" id="customerRegistrationFormTpl">

              <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create Customer </h3>
            </div>
            <div class="widget-body">
                 <div class="form-group">
                        <div class="col-sm-offset-11" >
                         <button type="submit" id="cancel_cus_registration" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button> 
                       </div>
                  </div>
                 <div class="form-group">
                        <div class="col-sm-offset-11" >
                         <button type="submit" id="save_cus_registration" name="btnSubmit" class="btn btn-raised btn-black">Register</button> 
                    </div>
              </div>
              <form id="form-tabs" class="form-horizontal">
                <h3>Basic Infomation</h3>
                <fieldset>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">First Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_first_name" name="txtFirstNameBilling" type="text" class="form-control" maxlength="150">
                          <div id="cust_first_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Last Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_last_name" name="txtLastNameBilling" type="text" class="form-control" maxlength="150">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">

                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">DOB</label>
                        <div class="col-sm-9 col-md-8">
                        <div id="datetimepicker1" class="input-group date">
                            <input id="cust_dob" data-date-format='YYYY-MM-DD' name="txtFirstNameBilling" type="text" class="form-control" style="width:300px">
                             <div id="news_date_error" class="" style="font-size: 12px; color: #FF0000; "></div>
                             </div>
                         </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">PAN</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_pan" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="15" minlength="10" min="10">
                          <div id="cust_pan_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Billing" class="col-sm-3 col-md-4 control-label">Passport No.</label>
                        <div class="col-sm-9 col-md-8">
                           <input id="cust_passport" name="txtEmailAddressBilling" type="text" class="form-control" minlength="10" maxlength="10" min="10">
                           <div id="cust_passport_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress2Billing" class="col-sm-3 col-md-4 control-label">Gender</label>
                        <div class="col-sm-9 col-md-8">
                           <select id="cust_sex" name="ddlCountryBilling" class="form-control">               <option value="">--Please Select--</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            <option value="3">Transgender</option>
                            </select>
                             <div id="cust_sex_error" style="color:red"></div> 
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label"> Office Email</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_off_email_id" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="50">
                          <div id="cust_off_email_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Office Number</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_off_phone_number" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="10" >
                          <div id="cust_off_phone_number_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">                   
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Mobile</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_mobile_phone_number" name="txtCompanyBilling" type="text" class="form-control" maxlength="10">
                          <div id="cust_mobile_phone_number_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Personal Email</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_per_emai_id" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="50">
                          <div id="cust_per_emai_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                   <div class="row">                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Resident Number</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_res_phone_number" name="txtCompanyBilling" type="text" class="form-control" maxlength="10">
                          <div id="cust_res_phone_number_error" style="color:red"></div>
                        </div>
                      </div>
                    </div> 
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Aadhar</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_aadhar_number" name="txtCompanyBilling" type="text" class="form-control" maxlength="15">
                          <div id="cust_aadhar_number_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>                 
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Facebook Id</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_facebook_id" name="txtCompanyBilling" type="text" class="form-control" maxlength="50">
                          <div id="cust_facebook_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Twitter Id</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_twitter_id" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="50">
                          <div id="cust_twitter_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Mother Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_mother_name" name="txtCompanyBilling" type="text" class="form-control" maxlength="150">
                          <div id="cust_mother_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Father Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_father_name" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="150">
                          <div id="cust_father_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Photo</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_photo_file_name" name="txtCompanyBilling" type="text" class="form-control" maxlength="50">
                           <div id="cust_photo_file_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    
                   </div> -->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Origin</label>
                        <div class="col-sm-9 col-md-8">
                         <select id="orig_type_id" name="ddlCreditCardType" class="form-control">
                          <option value="">--Please Select--</option>
                          </select>
                          <div id="orig_type_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                   </div>
                   
                </fieldset>
                 <h3>Address type 1</h3>
                <fieldset>

                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Address Type</label>
                        <div class="col-sm-9 col-md-8">
                           <select id="address_type" name="ddlCountryShipping" class="form-control">
                          
                            <option value="">--Please Select--</option>
                            <!-- <option value="1">Residential</option>
                            <option value="2">Billing</option> -->
                          </select>
                           <div id="address_type_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Address 1</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_line_1" name="txtAddress1Shipping" class="form-control" maxlength="150"></textarea>
                          <div id="cust_add_line_1_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress2Shipping" class="col-sm-3 col-md-4 control-label">Address 2</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_line_2" name="txtAddress2Shipping" class="form-control" maxlength="150"></textarea>
                          <div id="cust_add_line_2_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Address 3</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_line_3" name="txtAddress1Shipping" class="form-control" maxlength="150"></textarea>
                          <div id="cust_add_line_3_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Land Mark</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_landmark" name="txtAddress1Shipping" class="form-control" maxlength="150"></textarea>
                          <div id="cust_add_landmark_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFaxShipping" class="col-sm-3 col-md-4 control-label">Zone</label>
                        <div class="col-sm-9 col-md-8">
                           <select id="select_zone" name="ddlCountryShipping" class="form-control">
                            <option value="">--Please Select--</option>
                          
                          </select>
                          <div id="select_zone_error" style="color:red"></div>

                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        
                         <label for="ddlCountryShipping" class="col-sm-3 col-md-4 control-label">Country</label>
                        <div class="col-sm-9 col-md-8">
                          <select id="select_country" name="ddlCountryShipping" class="form-control">
                            <option value="">--Please Select--</option>
                           
                          </select>
                         <div id="select_country_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                       <label for="ddlCountryShipping" class="col-sm-3 col-md-4 control-label">State</label>
                        <div class="col-sm-9 col-md-8">
                          <select id="select_state" name="ddlCountryShipping" class="form-control">
                          
                            <option value="">--Please Select--</option>                            
                          </select>
                          <div id="select_state_error" style="color:red"></div>
                        </div>
                       
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="ddlCountryShipping" class="col-sm-3 col-md-4 control-label">City</label>
                        <div class="col-sm-9 col-md-8">
                          <select id="select_city" name="ddlCountryShipping" class="form-control">
                      
                            <option value="">--Please Select--</option>
                            
                          </select>
                              <div id="select_city_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  
                  </div>
                </fieldset>

                 <h3>Address type 2</h3>
                <fieldset>

                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Address Type</label>
                        <div class="col-sm-9 col-md-8">
                           <select id="address_type2" name="ddlCountryShipping" class="form-control">
                            
                            <option value="">--Please Select--</option>
                            <!-- <option value="1">Residential</option>
                            <option value="2">Billing</option> -->
                          </select>
                          <div id="address_type2_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Address 1</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_1" name="txtAddress1Shipping" class="form-control" maxlength="150"></textarea>
                          <div id="cust_add_1_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress2Shipping" class="col-sm-3 col-md-4 control-label">Address 2</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_2" name="txtAddress2Shipping" class="form-control" maxlength="150"></textarea>
                          <div id="cust_add_2_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Address 3</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_3" name="txtAddress1Shipping" class="form-control" maxlength="150"></textarea>
                          <div id="cust_add_3_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Land Mark</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_landmark2" name="txtAddress1Shipping" class="form-control" maxlength="150"></textarea>
                          <div id="cust_landmark2_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFaxShipping" class="col-sm-3 col-md-4 control-label">Zone</label>
                        <div class="col-sm-9 col-md-8">
                          <select id="select_zone2" name="ddlCountryShipping" class="form-control">
                          
                            <option value="">--Please Select--</option>
                          </select>
                          <div id="select_zone2_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        
                         <label for="ddlCountryShipping" class="col-sm-3 col-md-4 control-label">Country</label>
                        <div class="col-sm-9 col-md-8">
                          <select id="select_country2" name="ddlCountryShipping" class="form-control">
                         
                            <option value="">--Please Select--</option>
                          </select>
                           <div id="select_country2_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    
                    </div>
                  
                  <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                       <label for="ddlCountryShipping" class="col-sm-3 col-md-4 control-label">State</label>
                        <div class="col-sm-9 col-md-8">
                          <select id="select_state2" name="ddlCountryShipping" class="form-control">
                         
                            <option value="">--Please Select--</option>
                          </select>
                           <div id="select_state2_error" style="color:red"></div>
                        </div>
                       </div>
                      </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="ddlCountryShipping" class="col-sm-3 col-md-4 control-label">City</label>
                        <div class="col-sm-9 col-md-8">
                          <select id="select_city2" name="ddlCountryShipping" class="form-control">
                          
                            <option value="">--Please Select--</option>
                          </select>
                          <div id="select_city2_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </fieldset>

               <h3>Educational Details</h3>
                <fieldset>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="txtNameCard" class="col-sm-3 col-md-4 control-label">Category</label>
                        <div class="col-sm-9 col-md-8">
                          <select id="edu_category_name" name="ddlCreditCardType" class="form-control">
                          
                            <option value="">--Please Select--</option>
                          </select>
                          <div id="edu_category_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    </div>
                     <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="ddlCreditCardType" class="col-sm-3 col-md-4 control-label">Subject </label>
                        <div class="col-sm-9 col-md-8">
                          <select id="edu_sub_category" name="ddlCreditCardType" class="form-control">                       
                            <option value="">--Please Select--</option>
                          </select>
                           <div id="edu_sub_category_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="txtNameCard" class="col-sm-3 col-md-4 control-label">Student</label>
                        <div class="col-sm-9 col-md-8">
                              <label>
                        <input type="radio" id="edu_active" name="edu_student" value="1" data-rule-required="true"> Yes
                      </label>&nbsp;<label>
                        <input type="radio" id="edu_active" name="edu_student" value="0" data-rule-required="true"> No
                      </label>
                      <div id="edu_active_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    </div>
                     <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="ddlCreditCardType" class="col-sm-3 col-md-4 control-label"> University Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="edu_university_name" name="ddlCreditCardType" class="form-control" maxlength="150"/>
                          <div id="edu_university_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="ddlCreditCardType" class="col-sm-3 col-md-4 control-label"> University Code</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="edu_university_code" name="ddlCreditCardType" class="form-control" maxlength="150"/>
                          <div id="edu_university_code_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="txtNameCard" class="col-sm-3 col-md-4 control-label">Country</label>
                        <div class="col-sm-9 col-md-8">
                           <select id="edu_country" name="ddlCreditCardType" class="form-control">
                           
                            <option value="">--Please Select--</option>
                          </select>
                          <div id="edu_country_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    </div>
                    

                </fieldset>
                <h3>Security</h3>
                <fieldset>           

                 <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="txtNameCard" class="col-sm-3 col-md-4 control-label">Security Question</label>
                         <div class="col-sm-9 col-md-8">
                          <select id="question_id" name="ddlCreditCardType" class="form-control">
                          
                            <option value="">--Please Select--</option>
                           <!--  <option value="1">A</option>
                            <option value="1">B</option> -->
                          </select>
                          <div id="question_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    </div>
                     <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="ddlCreditCardType" class="col-sm-3 col-md-4 control-label"> Answer</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_answer" name="txtNameCard" type="text" class="form-control" maxlength="150">
                          <div id="cust_answer_error" style="color:red"></div>
                        </div>
                       
                      </div>
                    </div>
                  </div>
                 
                </fieldset>


              </form>
            </div>
          </div>
      </script>

      <script type="text/template" id="createClientTpl">
     <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create Client</h3>
            </div>
            <div class="widget-body">
                 <div class="form-group">
                    <div class="col-sm-offset-9" >
                         <button id="register-client" name="btnSubmit" class="btn btn-raised btn-black">Register</button> 
                         <button id="register-cancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button> 
                    </div>
              </div>
              <form id="form-tabs" class="form-horizontal">
                <h3>Basic Infomation</h3>
                <fieldset>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Client Type</label>
                        <div class="col-sm-9 col-md-8">
                          <select id="clnt_type_id" name="ddlCreditCardType" class="form-control">
                            <option value="">--Please Select--</option>
                           <!--  <option value="1">IT</option>
                            <option value="2">Hospital</option> -->
                          </select>
                          <div id="clnt_type_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Client Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_name" name="txtLastNameBilling" type="text" class="form-control" maxlength="150">
                          <div id="clnt_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">PAN</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_pan" name="txtCompanyBilling" type="text" class="form-control" maxlength="10">
                          <div id="clnt_pan_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Email</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_off_email_id" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="30">
                          <div id="clnt_off_email_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Facebook Id</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_facbook_id" name="txtCompanyBilling" type="text" class="form-control" maxlength="30">
                          <div id="clnt_facbook_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Twitter Id</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_twitter_id" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="30">
                          <div id="clnt_twitter_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                 

                  <div class="row">
                   <!--  <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Logo</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_logo_file_name" name="txtCompanyBilling" type="text" class="form-control" maxlength="50">
                    
                         <div id="clnt_logo_file_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div> -->

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Origin</label>
                        <div class="col-sm-9 col-md-8">
                         <select id="orig_type_id" name="ddlCreditCardType" class="form-control">
                            <option value="">--Please Select--</option>
                            <!-- <option value="1">A</option>
                            <option value="2">B</option> -->
                          </select>
                          <div id="orig_type_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Corporate Group</label>
                        <div class="col-sm-9 col-md-8">
                          <select id="clnt_group_id" name="ddlCreditCardType" class="form-control">
                            <option value="">--Please Select--</option>
                     
                          </select>
                          <div id="clnt_group_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>

                   </div>

                  <div class="row">
                   <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">TAX ID</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="tax_id" name="txtCompanyBilling" type="text" class="form-control" maxlength="150">
                          <div id="tax_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Website 
                        URL</label>
                        <div class="col-sm-9 col-md-8">
                           <input id="website_url" name="txtCompanyBilling" type="text" class="form-control" maxlength="150">
                            <div id="website_url_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>

                   </div>

                </fieldset>
                 <h3>Contact Person</h3>
                <fieldset>
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">First Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_contact_person_first_name" name="txtCompanyBilling" type="text" class="form-control" maxlength="150">
                          <div id="clnt_contact_person_first_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Last Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_contact_person_last_name" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="150">
                          <div id="clnt_contact_person_last_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label"> Mobile</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_contact_person_mobile" name="txtCompanyBilling" type="text" class="form-control" maxlength="10">
                          <div id="clnt_contact_person_mobile_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Office Phone</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_contact_person_off_phone" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="10">
                          <div id="clnt_contact_person_off_phone_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Department</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_dept_name" name="txtCompanyBilling" type="text" class="form-control" maxlength="15">
                          <div id="clnt_dept_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Designation</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_contact_person_desgination" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="30">
                          <div id="clnt_contact_person_desgination_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

  

                </fieldset>
                  <h3>Address 1</h3>
                <fieldset>
                  
                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Address Type</label>
                        <div class="col-sm-9 col-md-8">
                           <select id="address_type" name="ddlCountryShipping" class="form-control">
                            <option value="">--Please Select--</option>
                            <!-- <option value="1">Residential</option>
                            <option value="2">Billing</option> -->
                          </select>
                          <div id="address_type_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Address 1</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_line_1" name="txtAddress1Shipping" class="form-control" maxlength="150"></textarea>
                          <div id="cust_add_line_1_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress2Shipping" class="col-sm-3 col-md-4 control-label">Address 2</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_line_2" name="txtAddress2Shipping" class="form-control" maxlength="150"></textarea>
                          <div id="cust_add_line_2_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Address 3</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_line_3" name="txtAddress1Shipping" class="form-control" maxlength="150"></textarea>
                          <div id="cust_add_line_3_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Land Mark</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_landmark" name="txtAddress1Shipping" class="form-control" maxlength="150"></textarea>
                          <div id="cust_add_landmark_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFaxShipping" class="col-sm-3 col-md-4 control-label">Zone</label>
                        <div class="col-sm-9 col-md-8">
                           <select id="select_zone" name="ddlCountryShipping" class="form-control">
                            <option value="">--Please Select--</option>
                            <!-- <option value="1">A</option>
                            <option value="2">B</option> -->
                          </select>
                          <div id="select_zone_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>


                  <div class="col-md-6">
                      <div class="form-group">
                        
                         <label for="ddlCountryShipping" class="col-sm-3 col-md-4 control-label">Country</label>
                        <div class="col-sm-9 col-md-8">
                          <select id="select_country" name="ddlCountryShipping" class="form-control">
                            <option value="">--Please Select--</option>
                           <!--  <option value="1">A</option>
                            <option value="2">B</option> -->
                          </select>
                          <div id="select_country_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                
                    <div class="col-md-6">
                      <div class="form-group">
                       <label for="ddlCountryShipping" class="col-sm-3 col-md-4 control-label">State</label>
                        <div class="col-sm-9 col-md-8">
                          <select id="select_state" name="ddlCountryShipping" class="form-control">
                            <option value="">--Please Select--</option>
                            <!-- <option value="1">A</option>
                            <option value="2">B</option> -->
                           
                          </select>
                          <div id="select_state_error" style="color:red"></div>
                        </div>
                       
                      </div>
                    </div>


                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="ddlCountryShipping" class="col-sm-3 col-md-4 control-label">City</label>
                        <div class="col-sm-9 col-md-8">
                          <select id="select_city" name="ddlCountryShipping" class="form-control">
                            <option value="">--Please Select--</option>
                           <!--  <option value="1">A</option>
                            <option value="2">B</option> -->
                          </select>
                           <div id="select_city_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </fieldset>

                 <h3>Address 2</h3>
                <fieldset>
                  
                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Address Type</label>
                        <div class="col-sm-9 col-md-8">
                           <select id="address_type2" name="ddlCountryShipping" class="form-control">
                            <option value="">--Please Select--</option>
                           <!--  <option value="1">Residential</option>
                            <option value="2">Billing</option> -->
                          </select>
                          <div id="address_type2_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Address 1</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_1" name="txtAddress1Shipping" class="form-control" maxlength="150"></textarea>
                           <div id="cust_add_1_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress2Shipping" class="col-sm-3 col-md-4 control-label">Address 2</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_2" name="txtAddress2Shipping" class="form-control" maxlength="150"></textarea>
                           <div id="cust_add_2_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Address 3</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_3" name="txtAddress1Shipping" class="form-control" maxlength="150"></textarea>
                           <div id="cust_add_3_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Land Mark</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_landmark" name="txtAddress1Shipping" class="form-control" maxlength="150"></textarea>
                           <div id="cust_landmark_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                 <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFaxShipping" class="col-sm-3 col-md-4 control-label">Zone</label>
                        <div class="col-sm-9 col-md-8">
                           <select id="select_zone2" name="ddlCountryShipping" class="form-control">
                            <option value="">--Please Select--</option>

                          </select>
                          <div id="select_zone2_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>


                  <div class="col-md-6">
                      <div class="form-group">
                        
                         <label for="ddlCountryShipping" class="col-sm-3 col-md-4 control-label">Country</label>
                        <div class="col-sm-9 col-md-8">
                          <select id="select_country2" name="ddlCountryShipping" class="form-control">
                            <option value="">--Please Select--</option>
                          </select>
                            <div id="select_country2_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                
                    <div class="col-md-6">
                      <div class="form-group">
                       <label for="ddlCountryShipping" class="col-sm-3 col-md-4 control-label">State</label>
                        <div class="col-sm-9 col-md-8">
                          <select id="select_state2" name="ddlCountryShipping" class="form-control">
                            <option value="">--Please Select--</option>
                            
                          </select>
                          <div id="select_state2_error" style="color:red"></div>
                        </div>
                       
                      </div>
                    </div>


                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="ddlCountryShipping" class="col-sm-3 col-md-4 control-label">City</label>
                        <div class="col-sm-9 col-md-8">
                          <select id="select_city2" name="ddlCountryShipping" class="form-control">
                            <option value="">--Please Select--</option>
                          
                          </select>
                          <div id="select_city2_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </fieldset>
                 <h3>Security</h3>
                <fieldset>

          
                 <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="txtNameCard" class="col-sm-3 col-md-4 control-label">Security Question</label>
                         <div class="col-sm-9 col-md-8">
                          <select id="question_id" name="ddlCreditCardType" class="form-control">
                            <option value="">--Please Select--</option>
                         
                          </select>
                           <div id="question_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    </div>
                     <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="ddlCreditCardType" class="col-sm-3 col-md-4 control-label"> Answer</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_answer" name="txtNameCard" type="text" class="form-control" maxlength="150">
                          <div id="cust_answer_error" style="color:red"></div>
                        </div>
                       
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
      </script>

       <script  type="text/template" id="ProductCatalogTpl">
          <div class="advanced_selection">
            <table cellpadding="0" cellspacing="0" class="advanced_selection_checks">
              <tr>
                <td><span>Product</span></td>
                <td><span>Subject</span></td>
                <td><span>Topic<span></td>
              </tr>
              <tr class="checks">
                <td id="selectProductoption">
                  <ul class="selectProduct">
                    
                  </ul>
                </td>
                <td id="selectedCatalogoption">
                  <ul class="selectCatalog">
                    
                  </ul>
                </td>
                <td id="selectedTopicoption">
                  <ul class="selectTopic">
                   
                  </ul>
                </td>
              </tr>
            </table>
            <div style="clear: both;">
              <button type="submit" id="search" class="btn btn-success btn-rounded btn-block ">Search</button>
              <button type="submit" id="clear" class="btn btn-success btn-rounded btn-block">Clear</button>
            </div>
            <div style="clear: both;"></div>
          </div>
        </div>
      </div>
        <div id="productcatalogContainer" class="search-results-container">
      </div>
      </div>
      </script>

      <input type="button" id="product_catalog_list">
      <script type="text/javascript" src="plugins/jquery/dist/jquery.min.js"></script>
     <!-- jQuery Steps-->
    <script type="text/javascript" src="plugins/jquery.steps/build/jquery.steps.min.js"></script>
    <!-- Backbone & underscore-->
    <script type="text/javascript" src="js/lib/underscore-min.js"></script>
    <script type="text/javascript" src="js/lib/backbone.js"></script><script type="text/javascript" src="js/router/adminRouter.js"></script>
    <script type="text/javascript" src="js/eapp.js"></script>
    <script type="text/javascript" src="js/views/SignUpPageView.js"></script>
    <script type="text/javascript" src="js/views/IndexPageView.js"></script>

    <script type="text/javascript" src="js/collections/CustomerCollection.js"></script>
    <script type="text/javascript" src="js/views/CustomerRegistrationFormPageView.js"></script>
    <script type="text/javascript" src="js/views/CustomerPageView.js"></script>
    <script type="text/javascript" src="js/views/CustomerRowView.js"></script>
    <script type="text/javascript" src="js/views/CustomerTableView.js"></script>

     <!-- Client -->
    <script type="text/javascript" src="js/views/ClientPageView.js"></script>
    <script type="text/javascript" src="js/views/ClientFormPageView.js"></script>
    <script type="text/javascript" src="js/views/ClientRowView.js"></script>
    <script type="text/javascript" src="js/views/ClientTableView.js"></script>

    <!-- jQuery DatePicker start-->
    <script type="text/javascript" src="plugins/moment/min/moment.min.js"></script>
        <!-- Bootstrap MaxLength-->
    <script type="text/javascript" src="plugins/bootstrap-maxlength/src/bootstrap-maxlength.js"></script>
    <!-- jQuery MiniColors-->
    <script type="text/javascript" src="plugins/jquery-minicolors/jquery.minicolors.min.js"></script>
    <!-- Bootstrap TouchSpin-->
    <script type="text/javascript" src="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <script type="text/javascript" src="plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Bootstrap DatePicker-->
    <script type="text/javascript" src="plugins/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
</body>
</html>