<!DOCTYPE html>
<html lang="en">
@if (Session::get('user_type') == 'C')
<script type="text/javascript">
window.location="/user_exam";
</script>
@elseif (Session::get('user_type') == 'T')
<script type="text/javascript">
window.location="/admin_main";
</script>
@elseif (Session::get('user_type') == 'S')
<script type="text/javascript">
window.location="/admin_main";
</script>
@elseif (Session::get('user_type') == 'E')
<script type="text/javascript">
window.location="/employee#examCart";
</script>
@endif

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>ePrayoga - Admin Console</title>

       <link rel="stylesheet" type="text/css" href="js/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/productcatalog.css">
        <!-- Normalize CSS -->
    <link rel="stylesheet" href="js/css/normalize.css">
      <!-- Main CSS -->
    <link rel="stylesheet" href="js/css/main.css">
        <!-- Animate CSS -->
    <link rel="stylesheet" href="js/css/animate.min.css">
     <!-- Font-awesome CSS-->
    <link rel="stylesheet" href="js/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="js/css/bootstrap.min.css">
    <!-- Owl Caousel CSS -->
    <link rel="stylesheet" href="js/vendor/OwlCarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="js/vendor/OwlCarousel/owl.theme.default.min.css">
    <!-- Main Menu CSS -->
    <link rel="stylesheet" href="js/css/meanmenu.min.css">
    <!-- nivo slider CSS -->
    <link rel="stylesheet" href="js/vendor/slider/css/nivo-slider.css" type="text/css" />
    <link rel="stylesheet" href="js/vendor/slider/css/preview.css" type="text/css" media="screen" />
    <!-- Datetime Picker Style CSS -->
    <link rel="stylesheet" href="js/css/jquery.datetimepicker.css">
    <!-- Magic popup CSS -->
    <link rel="stylesheet" href="js/css/magnific-popup.css">
    <!-- Switch Style CSS -->
    <link rel="stylesheet" href="js/css/hover-min.css">
    <!-- ReImageGrid CSS -->
    <link rel="stylesheet" href="js/css/reImageGrid.css">
        <!-- Modernizr Js -->
    <script src="js/modernizr-2.8.3.min.js"></script>
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
    <!-- Custom CSS -->
    <link rel="stylesheet" href="js/style.css">
    <!-- Core CSS-->
    <link rel="stylesheet" type="text/css" href="styles/first-layout.css">

 <!-- Modernizr Js -->
    <script src="js/modernizr-2.8.3.min.js"></script>
   
  </head>
  <body>

   <div class="alert-box success" style = "
         width: 400px;
         height: 50px;
         margin: 100px auto;
         position: absolute;
        text-align: center;
        padding: 15px;
        border-radius: 8px;
        top: 0; left: 0; bottom: 0; right: 0;
"></div>
    <div class="alert-box failure" style = "
         width: 400px;
         height: 50px;
         margin: 100px auto;
         position: absolute;
        text-align: center;
        padding: 15px;
        border-radius: 8px;
        top: 0; left: 0; bottom: 0; right: 0;"></div>   
    <div class="alert-box warning"></div>
    
    <!-- Header start-->
       <header>
           <div id="header2" class="header4-area">
                <div class="header-top-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="header-top-left">
                                    <div class="logo-area">
                                        <a href="{{url('/')}}"><img class="img-responsive" src="js/img/logo.png" alt="logo"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="" style="padding-top:12px; float:right;">
                                <div class="header-top-right">
                                    <ul>
                                        <li><i class="fa fa-phone" aria-hidden="true"></i><a>+91 98400 40441</a></li>
                                        <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#">info@eprayoga.com</a></li>
                                        <li>
                                            <a href="#" class="login-btn-area" id="login-button"><i class="fa fa-lock" aria-hidden="true"></i> Login</a>
                                            <div class="login-form" id="login-form" style="display: none;">
                                                <div class="title-default-left-bold">Login</div>
                                                <form class="form-horizontal">

                                                    <label>User e-mail</label>
                                                    <input type="text" name="email_id" id="userName" placeholder="E-mail ID" />
                                                    <label>Password</label> 
                                                    <input type="password" name="password" id="userPwd" placeholder="Password" />
                                                    <div class="pad">
                                                    <span><input type="checkbox" id="exampleCheckboxRemember" name="remember"/>Remember Me</span>
                                                    <span class="vl"></span>
                                                    <span class="fee"><a href="/forgot_password">Forgot Password?</a></span>
                                                    </div>
                                                    <div>
                                                    <button class="default-big-btn ncn" type="submit" value="Login">Login</button>
                                                    <button class="default-big-btn ncn form-cancel" type="submit" value="">Cancel</button></div>

                                                   
                                                </form>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-menu-area bg-primary" id="sticker">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                <nav id="desktop-nav" style="margin-right: 450px;">
                                    <ul>
                                        <li class="active"><a href="{{url('/')}}">Home</a>
                                        </li>
                                        <li><a href="{{url('/')}}/shopCart" id="shop1">Offering</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                           
                    </div>
                </div>
            </div>
            <!-- Mobile Menu Area Start -->
            <div class="mobile-menu-area">

                <div class="container">

                    <div class="row">

                        <div class="col-md-12">
                          

                            <div class="mobile-menu">
                                <nav id="dropdown">
                                       <ul>
                                        <li class="active"><a href="{{url('/')}}">Home</a>
                                        </li>
                                        <li><a href="{{url('/')}}/shopCart" id="shop1">Offering</a>
                                        </li>
                                         <li>
                                            <a class="login-btn-area" id="login-button"><i class="fa fa-lock" aria-hidden="true"></i> Login</a>
                                            <div class="login-form" id="login-form" style="display: none;">
                                                <div class="title-default-left-bold ddd">Login</div>
                                                <form class="form-horizontal">
                                                    <label>Username or email address *</label>
                                                    <input type="text" name="email_id" id="userName" placeholder="Name or E-mail" />
                                                    <label>Password *</label>
                                                    <input type="password" name="password" id="userPwd" placeholder="Password" />
                                                    <span><input type="checkbox" id="exampleCheckboxRemember" name="remember"/>Remember Me</span><br>
                                                    <button class="default-big-btn sss" type="submit" value="Login">Login</button>
                                                    <button class="default-big-btn sss form-cancel" type="submit" value="">Cancel</button>
                                                    <div>
                                                    <label class="check">Forgot Password?</label>
                                                    
                                                </div>
                                                </form>
                                            </div>
                                        </li>
                                
                                    </ul> 
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu Area End -->
        </header>
    <!-- Header end-->

   
    <div class="main-container">
      <!-- Main Sidebar start-->
    
       
        <div class="left">

        <ul class="list-unstyled navigation mb-0">
          
          <li class="panel"><a id="customer_registration"><i class="ion-ios-person-outline bg-success"></i><span class="sidebar-title">Customer</span></a></li>
          <li class="panel"><a id="client_registration"><i class="ion-ios-person-outline bg-success"></i><span class="sidebar-title">Client</span></a></li>

          <!-- 
          <li class="panel"><a href="chat-dashboard.html"><i class="ion-ios-chatbubble-outline bg-primary"></i><span class="sidebar-title">About Us</span></a></li> -->
        </ul>
      </div>  
      
      

     
      <div class="page-ccc">
        
          <div class="row">
            <div class="col-lg-12">
              <div class="widget no-border">
                <div id="page-section">
                  <center>Please Choose Customer or Client Sign Up !<br><Br> Kindly fill all the Mandatory fields, Have a Nice Day .!</center></div>
              </div>
            </div>
          </div>
        </div>
      
      <!-- Footer Area Start Here -->
       <footer>
            <div class="footer-area-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                            <div class="footer-box">
                                <a href="index.html"><img class="img-responsive" src="js/img/logo-footer.png" alt="logo"></a>
                                <div class="footer-about">
                                    <p>Praesent vel rutrum purus. Nam vel dui eu sus duis dignissim dignissim. Suspenetey disse at ros tecongueconsequat.Fusce sit amet rna feugiat.</p>
                                </div>
                                <ul class="footer-social">
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                   
                                    <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                            <div class="footer-box">
                                <h3>Featured Links</h3>
                                <ul class="featured-links">
                                    <li>
                                        <ul>
                                            <li><a href="#">Graduation</a></li>
                                            <li><a href="#">Admissions</a></li>
                                            <li><a href="#">International</a></li>
                                            <li><a href="#">FAQs</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><a href="#">Courses</a></li>
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Book store</a></li>
                                            <li><a href="#">Alumni</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <div class="footer-box">
                                <h3>Information</h3>
                                <ul class="corporate-address">
                                    <li><i class="fa fa-phone" aria-hidden="true"></i><a href="Phone(01)800433633"> (01) 800 433 633 </a></li>
                                    <li><i class="fa fa-envelope-o" aria-hidden="true"></i>info@bostonea.com</li>
                                </ul>
                                
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
            <div class="footer-area-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <p>&copy; 2017 Academics All Rights Reserved. &nbsp; Designed by<a target="_blank" href="http://radiustheme.com"> Vahai Technologies</a></p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="payment-method">
                                                                <li>
                                    <a href="#"><img alt="payment-method" src="js/img/pm.png"></a>
                                </li>
                                <li>
                                    <a href="#"><img alt="payment-method" src="js/img/VISA.jpeg"></a>
                                </li>
                                <li>
                                    <a href="#"><img alt="payment-method" src="js/img/ms1.png"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Area End Here -->


        <script type="text/template" id="popupscript"> 

                <div id="myModalPopup" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close okClass" data-dismiss="modal">&times;</button>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h4><div id = "messagepop"></div></h4>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="cateid">
                  <button type="button" class="btn btn-black okClass" data-dismiss="modal">0k</button>
                  </div>
                </div>
               </div>
              </div>
        </script>

       <script type="text/template" id="customerRegistrationFormTpl">
      
           <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create Customer </h3>
            </div>
            <div class="widget-body">
                 
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
                        <label for="txtAddress2Billing" class="col-sm-3 col-md-4 control-label">Gender</label>
                        <div class="col-sm-9 col-md-8">
                           <select id="cust_sex" name="ddlCountryBilling" class="form-control"><option value="">--Please Select--</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            <option value="3">Transgender</option>
                            </select>
                             <div id="cust_sex_error" style="color:red"></div> 
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Mobile</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_mobile_phone_number" name="txtCompanyBilling" type="text" class="form-control" maxlength="10">
                          <div id="cust_mobile_phone_number_error" style="color:red"></div>
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

                  <div class="row">
                    

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Personal Email</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_per_emai_id" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="50">
                          <div id="cust_per_emai_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    
                   
                   <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label"> Office Email</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_off_email_id" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="50">
                          <div id="cust_off_email_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">                   
                    
                   <div class="col-md-6">
                     <div class="form-group">
                       <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Office Number</label>
                       <div class="col-md-3">

                         <input id="phone_code1" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="10"  placeholder="Code">
                         <div id="cust_off_code_number_error" style="color:red"></div>
                       </div>
                      <div class="col-md-3">
                         <input id="cust_off_phone_number" placeholder="Number" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="10" style="margin-top: -31px;/*! margin-right: 160px; */margin: 0px 0px;width: 170px;">
                         <div id="cust_off_phone_number_error" style="color:red; width:120px;"></div>
                       </div>
                     </div>
                   </div>
                    <div class="col-md-6">
                     <div class="form-group">
                       <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Resident Number</label>
                       <div class="col-sm-3 col-md-3">
                         <input id="phone_code2" name="txtCompanyBilling" type="text" class="form-control" maxlength="10"  placeholder="Code">
                         <div id="cust_res_code_number_error" style="color:red"></div>
                       </div>
                      <div class="col-md-3">
                         <input id="cust_res_phone_number" placeholder="Number" name="txtCompanyBilling" type="text" class="form-control" maxlength="10" style="margin-top: -31px;/*! margin-right: 160px; */margin: 0px 0px;width: 170px;">
                         <div id="cust_res_phone_number_error" style="color:red; width: 120px;"></div>
                       </div>
                     </div>
                   </div>  
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">DOB</label>
                        <div class="col-sm-9 col-md-8">
                        <div id="datetimepicker1" class="input-group date" style="position: initial !important;">
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
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Aadhar</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_aadhar_number" name="txtCompanyBilling" type="text" class="form-control" maxlength="20">
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
                           <select value="1" id="address_type" name="ddlCountryShipping" class="form-control">
                          
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
                          <div id="loading" class="col-sm-3 col-md-3" style="color:green;">
                          <div id="loading-zone" >loading...</div>
                          </div>
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
                          <div id="loading" class="col-sm-3 col-md-3" style="color:green;">
                          <div id="loading-Country" >loading...</div>
                          </div>
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
                          <div id="loading" class="col-sm-3 col-md-3" style="color:green;">
                          <div id="loading-State" >loading...</div>
                          </div>
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
                           <select value="2" id="address_type2" name="ddlCountryShipping" class="form-control">
                            
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
                          <div id="loading" class="col-sm-3 col-md-3" style="color:green;">
                          <div id="loading-zone1" >loading...</div>
                          </div>
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
                          <div id="loading" class="col-sm-3 col-md-3" style="color:green;">
                          <div id="loading-Country1" >loading...</div>
                          </div>
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
                          <div id="loading" class="col-sm-3 col-md-3" style="color:green;">
                          <div id="loading-State1" >loading...</div>
                          </div>
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
              <div class="form-group" align="center">
                        <div class="col-sm-offset-9" >
                         <button type="submit" id="save_cus_registration" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Register</button> 
                         <button type="submit" id="cancel_cus_registration" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button> 
                        </div>
               </div>
            </div>
          </div>
      </script>

      <script type="text/template" id="createClientTpl">
     <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create Client</h3>
            </div>
            <div class="widget-body">
                
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
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Client Group</label>
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
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">GST</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="gst_tax" name="txtCompanyBilling" type="text" class="form-control" maxlength="15">
                          <div id="gst_tax_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
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
                     <div class="col-sm-3 col-md-3">
                         <input id="phone_code1" name="txtEmailAddressBilling" placeholder="Code" type="text" class="form-control" maxlength="10">
                         <div id="clnt_contact_person_off_phone_code_error" style="color:red"></div>
                       </div>
                       <div class="col-md-3">
                         <input id="clnt_contact_person_off_phone" placeholder="Number" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="10" style="margin-top: -31px;/*! margin-right: 160px; */margin: 0px 0px;width: 170px;">
                         <div id="clnt_contact_person_off_phone_error" style="color:red; width: 120px"></div>
                       </div>
                     </div>
                   </div>
                 </div>
                  


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Department</label>
                        <div class="col-sm-9 col-md-8">
                          <!-- <input id="clnt_dept_name" name="txtCompanyBilling" type="text" class="form-control" maxlength="15">
                          <div id="clnt_dept_name_error" style="color:red"></div> -->
                          <select id="clnt_dept_name" name="ddlCreditCardType" class="form-control">
                            <option value="">--Please Select--</option>                        
                          </select>
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
                           <select value="1" id="address_type" name="ddlCountryShipping" class="form-control">
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
                          <div id="loading" class="col-sm-3 col-md-3" style="color:green;">
                          <div id="loading-zone" >loading...</div>
                          </div>
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
                          <div id="loading" class="col-sm-3 col-md-3" style="color:green;">
                          <div id="loading-Country" >loading...</div>
                          </div>
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
                          <div id="loading" class="col-sm-3 col-md-3" style="color:green;">
                          <div id="loading-State" >loading...</div>
                          </div>
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
                           <select value="2" id="address_type2" name="ddlCountryShipping" class="form-control">
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
                          <div id="loading" class="col-sm-3 col-md-3" style="color:green;">
                          <div id="loading-zone1" >loading...</div>
                          </div>
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
                          <div id="loading" class="col-sm-3 col-md-3" style="color:green;">
                          <div id="loading-Country1" >loading...</div>
                          </div>
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
                          <div id="loading" class="col-sm-3 col-md-3" style="color:green;">
                          <div id="loading-State1" >loading...</div>
                          </div>
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
               <div class="form-group" align="center">
                    <div class="col-sm-offset-9" >
                         <button id="register-client" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Register</button> 
                         <button id="register-cancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button> 
                    </div>
                </div>
            </div>
          </div>
      </script>


     
</div>
    
     



  




    <script type="text/javascript" src="plugins/jquery/dist/jquery.min.js"></script>
     <!-- jQuery Steps-->
    <script type="text/javascript" src="plugins/jquery.steps/build/jquery.steps.min.js"></script>
    <!-- Backbone & underscore-->
    <script type="text/javascript" src="js/lib/underscore-min.js"></script>
    <script type="text/javascript" src="js/lib/backbone.js"></script>  
    <script type="text/javascript" src="js/lib/binary.js"></script>
    <script type="text/javascript" src="js/lib/websocket_support.js"></script>
    <script type="text/javascript" src="js/lib/socketworker.js"></script>

     <!-- Plugins js -->
    <script src="js/plugins.js" type="text/javascript"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <!-- WOW JS -->
    <script src="js/wow.min.js"></script>
    <!-- Nivo slider js -->
    <script src="js/vendor/slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="js/vendor/slider/home.js" type="text/javascript"></script>
    <!-- Owl Cauosel JS -->
    <script src="js/vendor/OwlCarousel/owl.carousel.min.js" type="text/javascript"></script>
    <!-- Meanmenu Js -->
    <script src="js/jquery.meanmenu.min.js" type="text/javascript"></script>
    <!-- Srollup js -->
    <script src="js/jquery.scrollUp.min.js" type="text/javascript"></script>
    <!-- jquery.counterup js -->
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <!-- Countdown js -->
    <script src="js/jquery.countdown.min.js" type="text/javascript"></script>
    <!-- Isotope js -->
    <script src="js/isotope.pkgd.min.js" type="text/javascript"></script>
    <!-- Select2 Js -->
    <script src="js/select2.min.js" type="text/javascript"></script>
    <!-- Nouislider Js -->
    <script src="js/vendor/noUiSlider/nouislider.min.js" type="text/javascript"></script>
    <!-- Magic Popup js -->
    <script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
    <!-- wNumb Js -->
    <script src="js/wNumb.js" type="text/javascript"></script>
    <!-- Custom Js -->
    <script src="js/main.js" type="text/javascript"></script>

      <!-- Bootstrap JavaScript-->
    <script type="text/javascript" src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Malihu Scrollbar-->
    <script type="text/javascript" src="plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Animo.js-->
    <script type="text/javascript" src="plugins/animo.js/animo.min.js"></script>
    <!-- Bootstrap Progressbar-->
    <script type="text/javascript" src="plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- jQuery Easy Pie Chart-->
    <script type="text/javascript" src="plugins/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

     

     <!-- Bootstrap FileStyle-->
    <script type="text/javascript" src="plugins/bootstrap-filestyle/src/bootstrap-filestyle.js"></script>
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


    <!-- jQuery DatePicker End-->

    <!-- DataTables-->
    <script type="text/javascript" src="plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="plugins/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" src="plugins/jszip/dist/jszip.min.js"></script>    
    <!-- <script type="text/javascript" src="plugins/pdfmake/build/vfs_fonts.js"></script> -->
    <script type="text/javascript" src="plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="plugins/datatables.net-colreorder/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="plugins/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>

    <!-- Models-->
   
   <script type="text/javascript" src="js/models/OriginModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/AddressTypeModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/CategoryModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/TopicModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/SubjectModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/SecurityQuestionModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/ZoneModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/CityModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/StateModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/CountryModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/DepartmentModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/ClientTypeModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/ClientGroupModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/LanguageModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/SendingMailModel.js?version=1.0.1"></script>
  

    <!-- Collections-->

    <script type="text/javascript" src="js/collections/OriginCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/AddressTypeCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/CategoryCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/TopicCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/SubjectCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/SecurityQuestionCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/ZoneCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/CityCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/StateCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/CountryCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/DepartmentCollection.js?version=1.0.1"></script>   
    <script type="text/javascript" src="js/collections/ClientGroupCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/ClientTypeCollection.js?version=1.0.1"></script>
      

   <!--Views-->

    <script type="text/javascript" src="js/views/CustomerRegistrationFormPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/CustomerRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/CustomerTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgntClientItemView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgntClientCollectionView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgntStateItemView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgntStateCollectionView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgntCountryItemView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgntCountryCollectionView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgntZoneItemView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgntZoneCollectionView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/OriginRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/OriginTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/OriginFormPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/OriginPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgntSubjectItemView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgntSubjectCollectionView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgntTopicItemView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgntTopicCollectionView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/AddressTypeRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/AddressTypeTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/AddressTypeFormPageView.js?version=1.0.1"></script> 
    <script type="text/javascript" src="js/views/AddressTypePageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgntCategoryItemView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgntCategoryCollectionView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/CategoryRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/CategoryTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/CategoryFormPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/CategoryPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/TopicRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/TopicTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/TopicFormPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/TopicPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/SubjectRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/SubjectTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/SubjectFormPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/SubjectPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/UserTypeRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/UserTypeTableView.js?version=1.0.1"></script>  
    <script type="text/javascript" src="js/views/SecurityQuestionRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/SecurityQuestionTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/SecurityQuestionFormPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/SecurityQuestionPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ZoneRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ZoneTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ZoneFormPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ZonePageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/CurrencyFormPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/CurrencyRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/CurrencyTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/CurrencyPageView.js?version=1.0.1"></script>

     <!-- Client -->

    <script type="text/javascript" src="js/views/ClientFormPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ClientRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ClientTableView.js?version=1.0.1"></script>  
    <script type="text/javascript" src="js/views/MgmtOriginCollectionView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgmtOriginItemView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgmtSecQusCollectionView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgmtSecQusItemView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgmtAddressTypeCollectionView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgmtAddressTypeItemView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgntCityCollectionView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgntCityItemView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgmtClientTypeCollectionView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgmtClientTypeItemView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgmtClientGroupCollectionView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgmtClientGroupItemView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgmtDeptCollectionView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgmtDeptItemView.js?version=1.0.1"></script>

    <!-- Router -->    

    <script type="text/javascript" src="js/router/adminRouter.js?version=1.0.1"></script>

    <!-- Core JS-->      
    
    <script type="text/javascript" src="js/eapp.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/Validation.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/page-content/forms/forms-wizard.js?version=1.0.1"></script>

    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
<script>
$(document).ready(function(){
                $("#login-form").css("display", "none");
                $('#login-button').on('click', function(){
                    $("#userName").val('');
                    $("#userPwd").val('');
                    $('#clr_msg').empty();
                     $('#clr_msg').removeClass('alert-success');
                        
                $('#esuccess').on('click', function(e){
                   
                    e.preventDefault();
                    console.log("hello");
                    var userName = $('#userName').val();
                    var userPwd = $('#userPwd').val();

                    if(userName == '' || userName == undefined || userName == null){

                        return false;
                    }else if (userPwd == '' || userPwd == undefined || userPwd == null){
                        return false;
                    }
                                        console.log(userName);
                    $.ajax({
                        type: "POST",
                        url: '/eprayoga/login',
                        data: {userName:userName,userPwd:userPwd },
                        success: function(){
                            window.location='/';
                        },
                        error:function(){ 
                            $('#login-form').css('display','inline-block');
                            $('#login-form').css('height','407px');
                            $('#clr_msg').addClass('alert');
                            $('#clr_msg').addClass('alert-success');
                            $('#clr_msg').html("Invalid Username or Password");
                        }
                    });
                  });
                });
            });

</script>
  </body>
</html>
