<!DOCTYPE html>
<html lang="en">
@if (is_null(Session::get('user_type')))
<script type="text/javascript">
window.location="/";
</script>
@elseif (Session::get('user_type') == 'E')
<script type="text/javascript">
window.location="/employee#examCart";
</script>
@elseif (Session::get('user_type') == 'C')
<script type="text/javascript">
window.location="/user_exam";
</script>
@endif
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    <!-- Mathquill css -->
    <link rel="stylesheet" type="text/css" href="js/mathquill/mathquill.css">    

    <!-- Kekule for Chemistry -->
    <link rel="stylesheet" type="text/css" href="plugins/kekule/themes/default/kekule.css">    

 <!-- Modernizr Js -->
    <script src="js/modernizr-2.8.3.min.js"></script>
 

   
  </head>
  <style>

#formmine{

    margin-bottom: 0px;
}

    tbody#questionList tr td:last-child {
      padding: 5px;
  }
  #div1, #div2 {
     float: left;
     width: 100px;
     height: 170px;
     margin: 10px;
     padding: 10px;
     border: 1px solid black;
  }
  </style>
  <style type="text/css">
    a {text-decoration:none;}
    a:hover {text-decoration:underline;}
    body {font-family:tahoma,verdana,arial;font-size:13px;margin:4px;padding:0;border:0}
    table {margin:0;padding:0;border:0;}
    tr {padding:0;border:0;}
    td {padding:0;border:0;vertical-align:top;}
    .divinfo {width:800px;margin-top:0;margin-bottom:1em;padding:0.5em;border:1px solid #ccc;}
    div.tabHeaderOff,div.tabHeaderOn {display:inline;padding:6px;margin:0;border-left:1px solid #888;border-top:1px solid #aaa;border-right:1px solid #aaa;cursor:pointer;}
    div.tabHeaderOff {border-bottom:1px solid #888;background-color:#ccc;color:#666;}
    div.tabHeaderOn {border-bottom:1px solid #fff;background-color:#fff;color:#000;}
    td.preset {padding:2px 4px 2px 4px;}
    img:hover {border:1px solid #ccc;border-right-color:#888;border-bottom-color:#888;}
  </style>
<body style="overflow:auto;">

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
                                        <img class="img-responsive" src="js/img/logo.png" alt="logo">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" style="padding-top: 16px;">
                                <div class="header-top-right ra">
                                    <ul>
                                        <li><i class="fa fa-phone" aria-hidden="true"></i><a>+91 98400 40441</a></li>
                                        <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#">Hi, {{Session::get('user_category') }}:  {{Session::get('first_name') }} {{Session::get('last_name')}} !</a></li>
                                        
                                        <li><a href="/eprayoga/logout">Logout</a></li>                                                                                                                             
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
                                        <li class=""><a href="/admin_main">Home</a></li>
     
                                        @if (Session::has('user_type') && Session::get('user_type') == 'T')
                                        <li class=""><a class="buy_exams">Offering</a></li>


                                       
                                        <li><a href="#" id="cartDetails"><span style="background: red;border-radius: 5px; width:100px; padding: 4px; " id="cartCount"></span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Your Cart</a></li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                            
                    </div>
                </div>
            </div>
            <!-- Mobile Menu Area Start -->
            <!-- <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul>
                                        <li><a href="#">Home</a>
                                            <ul>
                                                <li><a href="index.html">Home 1</a></li>
                                                <li><a href="index2.html">Home 2</a></li>
                                                <li><a href="index3.html">Home 3</a></li>
                                                <li><a href="index4.html">Home 4</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Pages</a>
                                            <ul>
                                                <li><a href="about1.html">About 1</a></li>
                                        </li>
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           -->
           
            <!-- Mobile Menu Area End -->
        </header>
    <!-- Header end-->
 
    
      <!-- Main Sidebar start-->
<div class="main-container" style="padding-top:0px; margin-top:140px;">

      

      <div data-mcs-theme="minimal-dark" class="main-sidebar mCustomScrollbar">
  
       
        <ul class="list-unstyled navigation mb-0">

          <li class="panel"><a id="admin_question_bank"><i class="ion-ios-calendar-outline bg-info"></i><span class="sidebar-title">Question Bank</span></a></li>
  
          <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse1" aria-expanded="false" aria-controls="collapse1" class="collapsed"><i class="ion-ios-printer-outline bg-danger"></i><span class="sidebar-title">Management</span></a>
             <ul id="collapse1" class="list-unstyled collapse">

              @if (Session::has('user_type') && Session::get('user_type') == 'S')               
                <li><a id="admin_customer">Customers</a></li>
                
              @endif

                <li><a id="admin_client_group">Client Groups</a></li>
                <li><a id="admin_client">Clients</a></li>               
                <li><a id="admin_employee">Employees</a></li>
                <li><a id="admin_exam_design">Exam Design Management</a></li>
                @if (Session::has('user_type') && Session::get('user_type') == 'T') 
                <li><a id="promo_apply"> Assign Promo Code to Employee</a></li>
                 @endif
                         
             </ul>
          </li>

          <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse3" aria-expanded="false" aria-controls="collapse3" class="collapsed"><i class="ion-ios-printer-outline bg-danger"></i><span class="sidebar-title">Master Info</span></a>
            <ul id="collapse3" class="list-unstyled collapse">

              @if (Session::has('user_type') && Session::get('user_type') == 'S')
              
                <li><a id="admin_zonearea">Zone Area</a></li>
                <li><a id="admin_country">Country</a></li>
                <li><a id="admin_state">State</a></li>     
                <li><a id="admin_address_type">  Address Type </a></li>
                <li><a id="admin_city">City</a></li>
                <li><a id="admin_origin">Origin</a></li>
                <li><a id="admin_pricing">Pricing</a></li>
                <li><a id="admin_security_question">Security Question</a></li>
                <li><a id="admin_Filetype">FileType</a></li> 
                <li><a id="admin_instruction">Instrucion</a></li>
                <li><a id="admin_user_type">User Type</a></li>
                <li><a id="admin_aws_s3">AWS S3</a></li>
                <li><a id="admin_clienttype">ClientType</a></li>
               
              @endif
                <!-- <li><a id="admin_currency">Currency</a></li> -->
                <li><a id="admin_category">  Category </a></li> 
                <li><a id="admin_subject"> Subject </a></li>
                 <li><a id="admin_currency">Currency</a></li>
                <li><a id="admin_department">Department</a></li> 
                <li><a id="admin_topic">  Topic </a></li>
                <li><a id="admin_quetion_type">Question Type</a></li>
                <li><a id="admin_question_complexity">Complexity Question</a></li>
                <li><a id="admin_genp">Generic Param</a></li>
                <li><a id="admin_faq">FAQ</a></li>
                <li><a id="admin_faq_category">FAQ Category</a></li>
                <li><a id="admin_language">Language</a></li>
                @if (Session::has('user_type') && Session::get('user_type') == 'T')
                <li><a class="buy_exams">Buy Exams</a></li>
                 @endif
                <li><a id="admin_product_catalog">Product Catalog</a></li>

              
            </ul>
          </li>

           <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse4" aria-expanded="false" aria-controls="collapse4" class="collapsed"><i class="ion-ios-printer-outline bg-danger"></i><span class="sidebar-title">Configuration</span></a>
            <ul id="collapse4" class="list-unstyled collapse">
              <li><a id="admin_sms">SMS</a></li>
              <li><a id="admin_email">Email</a></li>
            </ul>
          </li>

           @if (Session::has('user_type') && Session::get('user_type') == 'S')
            <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse5" aria-expanded="false" aria-controls="collapse5" class="collapsed"><i class="ion-ios-printer-outline bg-danger"></i>
            <span class="sidebar-title">Report</span></a>
            <ul id="collapse5" class="list-unstyled collapse">
              <li><a id="categoryReport">Category Listing</a></li>
              <li><a id="subjectReport">Subject Listing</a></li>
              <li><a id="topicReport">Topic Listing</a></li>
              <li><a id="examListReport">Exam Listing</a></li>
              <li><a id="salesSummaryReport">Sales Summary</a></li>
              <li><a id="examSummaryReport">Exam Summary</a></li>
              <li><a id="examSummaryCustReport">Exam Customer Summary</a></li>
              <li><a id="examPerformanceSummaryReport">Exam Performance Summary</a></li>
            </ul>
           
          </li>
           @endif

          <!-- <li class="panel"><a id="Exam1"><i class="ion-ios-calendar-outline bg-info"></i><span class="sidebar-title">Start Sample Exam</span></a></li> -->
        </ul>
    
      <!-- Main Sidebar end-->
      </div>



     <div class="page-container" style="padding-left: 248px; padding-top: 0px; min-height: 715px; overflow: hidden; -webkit-transition: padding-left 0.3s;  -moz-transition: padding-left 0.3s; -o-transition: padding-left 0.3s; transition: padding-left 0.3s;">
      
        <div class="page-content container-fluid" style="padding:0px 12px 0 0;">
          <div class="row" style="margin-top: 0px;">
            
              
                <div id="page-section"></div>
             
            
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
                                <img class="img-responsive" src="js/img/logo-footer.png" alt="logo">
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
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">Offering</a></li>
                                            
                                            <li><a href="#">FAQs</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><a href="#">Courses</a></li>
                                            <li><a href="#">About Us</a></li>
                                            
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


    <script type="text/template" id="deleteallscript"> 
               
                <div id="myModaldeleteall" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Delete All Record?<div></div></h5>
                 
                        </div>
                    <div class="modal-footer">
                       <input type="hidden" id="cateid">
                      <button type="button" class="btn btn-black" id="del_all_record">Yes</button>
                      <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                      </div>
                    </div>
                   </div>
                  </div>

    </script>


      <script type="text/template" id="customerPageTpl">
        
             <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Customers List</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form class="form-horizontal">
                   <fieldset>                  

                      <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <div class="col-sm-8 col-md-2">
                             <input id="customerSearch" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                            </div>
                             <button type="submit" id="customer_register" data-toggle="tooltip" data-placement="bottom" title="Add "  name="btnSubmit" class="btn btn-raised btn-black">Add</button>
                              <button type="submit" id="customer_delall" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="tooltip" data-placement="bottom" title="Del All">Del All</button>
                            </div>
                      </div>


                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr class="trrc"> 
                        <th >Name</th>
                        <th>DOB</th>
                        <th>PAN</th>
                        <th>ADHAAR</th>
                        <th>Mobile</th>
                        <th>STATUS</th>
                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="customer_list">

                    </tbody>
                  </table>   

                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button id="customerLoadMore" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div> 

                <div id="myModalCust" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Customer</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="customerid">
                  <button type="button" class="btn btn-black" id="del_customer_id">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>                
                </fieldset>
                </form>
            </div>
          </div>
      </script>

      <script type="text/template" id="customerTemplate">
          <td><%=cust_first_name%></td>
          <td><%=cust_dob%></td>
          <td><%=cust_pan%></td>
           <td><%=cust_aadhar_number%></td>
            <td><%=cust_mobile_phone_number%></td>
            <td><%=is_active%></td>
        <td>
        <span style="display:inline-block; width: 20px;">
        <a id="edit_customer" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
        </span>
        <span style="display:inline-block; width: 20px;">
        <a id="activate-customer" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
        </span>
        <span style="display:inline-block; width: 20px;">
        <a id="del_customer" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModalCust"><i class="glyphicon glyphicon-minus-sign"></i></a>
        </span>
        </td>
        
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


      <script type="text/template" id="customerRegistrationEditFormTpl">

              <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Edit Customer </h3>
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
                          <input id="cust_first_name" name="txtFirstNameBilling" type="text" class="form-control" value="<%=cust_first_name%>" maxlength="150"/>
                          <div id="cust_first_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Last Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_last_name" name="txtLastNameBilling" type="text" class="form-control" value="<%=cust_last_name%>" maxlength="150"/>
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
                            <input id="cust_dob" data-date-format='YYYY-MM-DD' name="txtFirstNameBilling" type="text" class="form-control" style="width:300px" value="<%=cust_dob%>">
                             <div id="news_date_error" class="" style="font-size: 12px; color: #FF0000; "></div>
                             </div>
                         </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">PAN</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_pan" name="txtEmailAddressBilling" type="text" class="form-control" value="<%=cust_pan%>" maxlength="15">
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
                           <input id="cust_passport" name="txtEmailAddressBilling" type="text" class="form-control" value="<%=cust_passport%>" maxlength="15">
                           <div id="cust_passport_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress2Billing" class="col-sm-3 col-md-4 control-label">Gender</label>
                        <div class="col-sm-9 col-md-8">
                           <select id="cust_sex" name="ddlCountryBilling" class="form-control">                          
                            <option value="">--Please Select--</option>
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
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Office Email</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_off_email_id" name="txtEmailAddressBilling" type="text" class="form-control"  value="<%=cust_off_email_id%>" maxlength="50">
                          <div id="cust_off_email_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                     <div class="form-group">
                       <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Office Number</label>
                     <div class="col-sm-3 col-md-3">
                         <input id="phone_code1" name="txtEmailAddressBilling" type="text" placeholder="Enter Code" class="form-control" maxlength="5"  >
                         <div id="cust_off_code_number_error" style="color:red"></div>
                       </div>

                       <div class="col-md-3">
                         <input id="cust_off_phone_number" name="txtEmailAddressBilling" type="text" class="form-control"  maxlength="10" placeholder="Enter Number" style="margin-top: -31px; margin: 0px 0px;width: 170px;">
                         <div id="cust_off_phone_number_error" style="color:red; width: 120px;"></div>
                       </div>
                     </div>
                   </div>
                 </div>
                  

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Mobile</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_mobile_phone_number" name="txtCompanyBilling" type="text" class="form-control"  value="<%=cust_mobile_phone_number%>" maxlength="10">
                          <div id="cust_mobile_phone_number_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Personal Email</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_per_emai_id" name="txtEmailAddressBilling" type="text" class="form-control"  value="<%=cust_per_emai_id%>" maxlength="50">
                          <div id="cust_per_emai_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-md-6">
                     <div class="form-group">
                       <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Resident Number</label>
                       <div class="col-sm-3 col-md-3">
                         <input id="phone_code2" name="txtCompanyBilling" type="text" placeholder="Enter Code" class="form-control" maxlength="5"  >
                         <div id="cust_res_code_number_error" style="color:red"></div>
                       </div>
                       <div class="col-md-3">
                         <input id="cust_res_phone_number" name="txtCompanyBilling" type="text" class="form-control"  maxlength="10" placeholder="Enter Number" style="margin-top: -31px; margin: -0px 0px;width: 170px;">
                         <div id="cust_res_phone_number_error" style="color:red;width:120px;"></div>
                       </div>
                     </div>
                   </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Aadhar</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_aadhar_number" name="txtCompanyBilling" type="text" class="form-control" value="<%=cust_aadhar_number%>" maxlength="15">
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
                          <input id="cust_facebook_id" name="txtCompanyBilling" type="text" class="form-control"  value="<%=cust_facebook_id%>" maxlength="50">
                          <div id="cust_facebook_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Twitter Id</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_twitter_id" name="txtEmailAddressBilling" type="text" class="form-control"  value="<%=cust_twitter_id%>" maxlength="50">
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
                          <input id="cust_mother_name" name="txtCompanyBilling" type="text" class="form-control" value="<%=cust_mother_name%>" maxlength="150">
                          <div id="cust_mother_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Father Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_father_name" name="txtEmailAddressBilling" type="text" class="form-control"  value="<%=cust_father_name%>" maxlength="150">
                          <div id="cust_father_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- 
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Photo</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="cust_photo_file_name" name="txtCompanyBilling" type="text" class="form-control"  value="<%=cust_photo_file_name%>" maxlength="50">
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
                 <h3> Address 1</h3>
                 <input id="add_id1" type="hidden" value="<%=address[0].address_id%>" />
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
                          <textarea id="cust_add_line_1" name="txtAddress1Shipping" class="form-control" maxlength="150"><%=address[0].cust_add_line_1%></textarea>
                          <div id="cust_add_line_1_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress2Shipping" class="col-sm-3 col-md-4 control-label">Address 2</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_line_2" name="txtAddress2Shipping" class="form-control" maxlength="150"><%=address[0].cust_add_line_2%></textarea>
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
                          <textarea id="cust_add_line_3" name="txtAddress1Shipping" class="form-control"><%=address[0].cust_add_line_3%></textarea>
                          <div id="cust_add_line_3_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Land Mark</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_landmark" name="txtAddress1Shipping" class="form-control" maxlength="150"><%=address[0].cust_add_landmark%></textarea>
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

                 <h3> Address 2</h3>
                 <input id="add_id2" type="hidden" value="<%=address[1].address_id%>" />
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
                          <textarea id="cust_add_1" name="txtAddress1Shipping" class="form-control" maxlength="150"><%=address[1].cust_add_line_1%></textarea>
                          <div id="cust_add_1_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress2Shipping" class="col-sm-3 col-md-4 control-label">Address 2</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_2" name="txtAddress2Shipping" class="form-control" maxlength="150"><%=address[1].cust_add_line_2%></textarea>
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
                          <textarea id="cust_add_3" name="txtAddress1Shipping" class="form-control" maxlength="150" ><%=address[1].cust_add_line_3%></textarea>
                          <div id="cust_add_3_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Land Mark</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_landmark2" name="txtAddress1Shipping" class="form-control" maxlength="150"><%=address[1].cust_add_landmark%></textarea>
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
                        <input type="radio" id="edu_active" name="edu_student" value="1" data-rule-required="true" <%=(education.edu_active==1)?"checked":""%>> Yes
                      </label>&nbsp;<label>
                        <input type="radio" id="edu_active" name="edu_student" value="0" data-rule-required="true" <%=(education.edu_active==0)?"checked":""%>> No
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
                          <input id="edu_university_name"  name="ddlCreditCardType" class="form-control" maxlength="150"/>
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





<!--user access -->

<script type="text/template" id="userAccessPageTpl">

                <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">User Access List</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form  class="form-horizontal">
                   <fieldset>                  

                      <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <!-- <div class="col-sm-8 col-md-2">
                                <input id="txtFirstNameBilling" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                            </div> -->

                            </div>
                      </div>


                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                       <!--  <th>#</th> -->
                        <th>User Id</th>
                        <th>Ip Address</th>
                        <th>Sign Type</th>
                        <th>Status</th>                
                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="useraccessList">
                  
                    </tbody>
                     <div id="findStatus"></div>
                  </table>   

                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>
                </fieldset>
                </form>
            </div>
          </div>

        </script>

         <script type="text/template" id="userAccessTemplate">
                        <td><%=user_profile_id%></td>
                        <td><%=login_ip_address%></td>
                        <td><%=app_signon_type%></td>
                         <td><%=is_active%></td>
               <td>         
              <span style="display:inline-block; width: 20px;">
              <a id="edit-useraccess" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
              </span> 
              <span style="display:inline-block; width: 20px;">
              <a id="activate_useraccess" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
              </span> 
              <span style="display:inline-block; width: 20px;">
              <a id="del-useraccess" data-toggle="tooltip" data-placement="top" title="Delete"><i class="glyphicon glyphicon-minus-sign"></i></a>
              </span>
         </td>
        </script>

        <script type="text/template" id="userAccessCreateFormTpl">

            <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create UserAccess</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="User-id" class="col-sm-3 col-md-4 control-label">User Id</label>
                        <div class="col-sm-9 col-md-4">
                                    <input id="User-id" name="User-id" type="text" class="form-control">  
                            <div id="User-id-error" style="color:red"></div>
            
                            </div>
                      </div>
                    </div>
                  </div>

                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="Ip-address" class="col-sm-3 col-md-4 control-label">Ip Address</label>
                        <div class="col-sm-9 col-md-4">
                                    <input id="Ip-address" name="Ip-address" type="text" class="form-control"> 
                           <div id="Ip-address-error" style="color:red"></div>          
                            </div>
                           
                      </div>
                    </div>
                  </div>
             
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="Sign-type" class="col-sm-3 col-md-4 control-label">Sign Type</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="Sign-type" name="Sign-type" type="text" class="form-control">
                         <div id="Sign-type-error" style="color:red"></div>
                            </div>
                           
                      </div>
                    </div>
                  </div>  

                   <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="useraccess-save" name="useraccess-save" class="btn btn-raised btn-black">Save</button>  
                              <button name="useraccess-cancel" id="useraccess-cancel" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>

        </script>

         <script type="text/template" id="userAccessEditFormTpl">

            <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Edit UserAccess</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>
                 <input id="userAccess-id" type="hidden" class="form-control" value="<%=user_access_log_id%>">

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="userAccess-code" class="col-sm-3 col-md-4 control-label">User Id</label>
                        <div class="col-sm-9 col-md-4">
                                    <input id="User-id" value="<%=user_profile_id%>" name="User-id" type="text" class="form-control"> 
                                    <div id="User-id-error" style="color:red"></div>             
                            </div>
                      </div>
                    </div>
                  </div>


                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="Ip-address" class="col-sm-3 col-md-4 control-label">Ip Address</label>
                        <div class="col-sm-9 col-md-4">
                                    <input id="Ip-address" value="<%=login_ip_address%>" name="Ip-address" type="text" class="form-control">           
                            </div>
                      </div>
                    </div>
                  </div>
              
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="Sign-type" class="col-sm-3 col-md-4 control-label">Sign Type</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="Sign-type" value="<%=app_signon_type%>" name="Sign-type" type="text" class="form-control">
                            </div>
                      </div>
                    </div>
                  </div> 


                  <!-- <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="currency-type" class="col-sm-3 col-md-4 control-label">Type</label>
                        <div class="col-sm-9 col-md-4">
                             <label>
                        <input type="radio" name="currencytype" value="1" data-rule-required="true"> Direct
                      </label>&nbsp;<label>
                        <input type="radio" name="currencytype" value="0" data-rule-required="true"> Indirect
                      </label>
                            </div>
                      </div>
                    </div>
                  </div> -->
                   <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="useraccess-save" name="useraccess-save" class="btn btn-raised btn-black">Save</button>  
                              <button name="useraccess-cancel" id="useraccess-cancel" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>

       </script>




 

<!--FAQ page -->
       <script type="text/template" id="faqPageTpl">

        <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">FAQ  List</h3>
            </div>
            <div class="widget-body" style="padding:6px;">

            <form class="form-horizontal">
                   <fieldset>                  

                      <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <div class="col-sm-8 col-md-2">
                                    <input id="faqSearch" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                            </div>
                              <button type="button" id="create-faq"   name="btnSubmit" class="btn btn-raised btn-black">Add</button> 
                              <button id="faq_deleteall" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                            </div>
                      </div>


                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr  class="trrc">
                       <!--  <th>#</th> -->
                        <th>FAQ Category</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Notes</th>
                        <th>Keywords</th>
                        <th>Publish</th>
                        <th>Public</th>
                        <th>Status</th>                       
                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="faqList">
                        
                    </tbody>
                     <div id="findStatus"></div>
                  </table>   

                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button id="faq_load_more" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>

            <div id="myModalFaq" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete FAQ List</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="faqid">
                  <button type="button" class="btn btn-black" id="del_faq_list">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>
                </fieldset>
                </form>
            </div>
          </div>

        </script>

  <script type="text/template" id="faqTemplate">
          <td><a  data-container="body" data-toggle="popover" data-content="<%=faq_category_name%>" ><%=(faq_category_name.length > 8 ? faq_category_name.substring(0, 8) + "..." : faq_category_name)%></a>
          </td>

          <td><a  data-container="body" data-toggle="popover" data-content="<%=question%>" ><%=(question.length > 8 ? question.substring(0, 8) + "..." : question)%></a>
          </td>

          <td><a  data-container="body" data-toggle="popover" data-content="<%=question%>" ><%=(answer.length > 8 ? answer.substring(0, 8) + "..." : answer)%></a>
          </td>

          <td><a  data-container="body" data-toggle="popover" data-content="<%=notes%>" ><%=(notes.length > 8 ? notes.substring(0, 8) + "..." : notes)%></a>
          </td>

          <td><a  data-container="body" data-toggle="popover" data-content="<%=keywords%>" ><%=(keywords.length > 8 ? keywords.substring(0, 8) + "..." : keywords)%></a>
          </td>
          <td><%=(is_published==1 ?  "YES" : "NO")%></td>
          <td><%=(is_public==1 ?  "YES" : "NO")%></td>
          <td><%=is_active%></td>
          <td>
              <span style="display:inline-block; width: 20px;">
              <a id="edit-faq" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
              </span>
              <span style="display:inline-block; width: 20px;">
              <a id="activate_faq" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
              </span>
              <span style="display:inline-block; width: 20px;">
              <a id="del-faq" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModalFaq"><i class="glyphicon glyphicon-minus-sign"></i></a>
              </span>
          </td>
  </script>

        <script type="text/template" id="faqCreateTpl">
          
                      <div class="widget-body" style="padding:6px;">
                      <h3 class="widget-title"> Create FAQ List</h3>
                      </div>
              <form id="form" class="form-horizontal">
                
                <fieldset>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="faqcategory" class="col-sm-3 col-md-4 control-label"> FAQ Category</label>
                        <div class="col-sm-9 col-md-4">
                             <select id="faq_category" name="faqcategory" class="form-control">
                                    <option value="">--Please Select--</option>
                                   <!--  <option value="1">Engineering</option>
                                    <option value="2">Agricultur</option> -->
                           </select>                 
                         <div id="faq_category_error" style="color:red"></div>
                          </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="faqquestion" class="col-sm-3 col-md-4 control-label">Question</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="faq_question" name="faqquestion" type="text" class="form-control" maxlength="150">
                            <div id="faq_question_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>   

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="faqanswer" class="col-sm-3 col-md-4 control-label">Answer</label>
                        <div class="col-sm-9 col-md-4">
                             <textarea id="faq_answer" name="faqanswer" class="form-control" maxlength="150"></textarea>
                         <div id="faq_answer_error" style="color:red"></div>
                             </div>
                      </div>
                    </div>
                  </div>          

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="faqnotes" class="col-sm-3 col-md-4 control-label">Notes</label>
                        <div class="col-sm-9 col-md-4">
                         <textarea id="faq_notes" name="faqnotes" class="form-control" maxlength="300"></textarea>
                       <div id="faq_notes_error" style="color:red"></div>
                         </div>
                      </div>
                    </div>
                  </div>       

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="faqkeywords" class="col-sm-3 col-md-4 control-label">Keywords</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="faq_keywords" name="faqkeywords" type="text" class="form-control" maxlength="150">
                          <div id="faq_keywords_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="faqpublish" class="col-sm-3 col-md-4 control-label">Publish</label>
                        <div class="col-sm-9 col-md-4">
                            <label>
                        <input type="radio" name="faqpublish"   id="faqpublish" value="1" data-rule-required="true"> Yes
                      </label>&nbsp;<label>
                        <input type="radio" name="faqpublish"   id="faqpublish" value="0" data-rule-required="true"> No
                      </label>
                      <div id="faqpublish_error" style="color:red"></div>
                      </div>
                      </div>
                    </div>
                  </div>         


                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="faqpublic" class="col-sm-3 col-md-4 control-label">Public</label>
                        <div class="col-sm-9 col-md-4">
                            <label>
                        <input type="radio" name="faqpublic"  id="faqpublic" value="1" data-rule-required="true"> Yes
                      </label>&nbsp;<label>
                        <input type="radio" name="faqpublic"  id="faqpublic" value="0" data-rule-required="true"> No
                      </label>
                     <div id="faqpublic_error" style="color:red"></div>
                      </div>
                    </div>
                  </div>           


                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="save-faq"  name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button>
                               <button type="submit" id="cancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
        </script>

        <script type="text/template" id="faqEditFormTpl">
          
            <div class="widget-body" style="padding:6px;">
           <h3 class="widget-title"> Edit FAQ List</h3>
           </div>

              <form id="form" class="form-horizontal">
                 
                <fieldset>
                   <input id="faq_id" type="hidden" class="form-control" value="<%=faq_id%>" />

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="faqcategory" class="col-sm-3 col-md-4 control-label">Category</label>
                        <div class="col-sm-9 col-md-4">
                              <select id="faq_category" name="faqcategory" class="form-control">
                                    <option value="">--Please Select--</option>        
                           </select>                 
                            </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Question</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="faq_question"  value="<%=question%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="150">
                          <div id="faq_question_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>   

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Answer</label>
                        <div class="col-sm-9 col-md-4">
                             <textarea id="faq_answer"  name="txtAddress1Shipping" class="form-control" maxlength="150"><%=answer%></textarea>
                        <div id="faq_answer_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>          

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Notes</label>
                        <div class="col-sm-9 col-md-4">
                            <textarea id="faq_notes" name="txtAddress1Shipping" class="form-control" maxlength="300"> <%=notes%></textarea>
                      <div id="faq_notes_error" style="color:red"></div>
                      </div>
                      </div>
                    </div>
                  </div>       

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Keywords</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="faq_keywords" value="<%=keywords%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="150">
                        <div id="faq_keywords_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="faqpublish" class="col-sm-3 col-md-4 control-label">Publish</label>
                        <div class="col-sm-9 col-md-4">
                            <label>
                        <input type="radio" name="faqpublish"   id="faqpublish" data-rule-required="true" value="1"  <%=(is_published == 1)?"checked":"" %> > Yes
                      </label>&nbsp;<label>
                        <input type="radio" name="faqpublish"  id="faqpublish" data-rule-required="true" value="0" <%=(is_published == 0)?"checked":"" %>> No
                      </label>
                      <div id="faqpublish_error" style="color:red"></div>
                     </div>
                      </div>
                    </div>
                  </div>         


                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="faqpublic" class="col-sm-3 col-md-4 control-label">Public</label>
                        <div class="col-sm-9 col-md-4">
                            <label>

                        <input type="radio" name="faqpublic" id="faqpublic" data-rule-required="true" value="1" <%=(is_public == 1)?"checked":"" %> > Yes

                      </label>&nbsp;

                      <label>
                        <input type="radio" name="faqpublic"  id="faqpublic" data-rule-required="true" value="0" <%=(is_public == 0)?"checked":"" %> > No
                      </label>
                     <div id="faqpublic_error" style="color:red"></div>
                      </div>
                      </div>
                    </div>
                  </div>           


                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="save-faq"  name="btnSubmit" class="btn btn-raised btn-black">Save</button>
                               <button type="submit" id="cancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
        </script>

        <!--faq category -->
       <script type="text/template" id="faqCategoryPageTpl">

             <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">FAQ Category </h3>
            </div>
            <div class="widget-body" style="padding:6px;"> 
            <form  class="form-horizontal">
                   <fieldset>                  

                      <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <div class="col-sm-8 col-md-2">
                                <input id="faqcategory_search" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                            </div>
                              <button type="submit" id="faq-category-create"  name="btnSubmit" class="btn btn-raised btn-black">Add</button>
                             <button id="faq_category_deleteall" type="submit" id="faq-category-delAll" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                            </div>
                      </div>


                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr  class="trrc">
                       <!--  <th>#</th> -->           
                        <th>Category</th>
                        <th>Description</th>
                        <th>Notes</th>
                        <th>Public</th>                       
                        <th>Status</th>
                        <th>Actions</th>
                       
                      </tr>
                    </thead>
                    <tbody id="faqCategoryList">

                    </tbody>
                  </table>   

                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button id="faq_category_load_more" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>
            <div id="myModalfaqcat" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete FAQ Category</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="faqcatid">
                  <button type="button" class="btn btn-black" id="del_faqcat">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>
                 
                </fieldset>
                </form>
            </div>
          </div>

        </script>

      <script type="text/template" id="faqCategoryTemplate">
            <td><a  data-container="body" data-toggle="popover" data-content="<%=faq_category_name%>" ><%=(faq_category_name.length > 8 ? faq_category_name.substring(0, 50) + "..." : faq_category_name)%></a>
            </td>

            <td><a  data-container="body" data-toggle="popover" data-content="<%=faq_category_description%>" ><%=(faq_category_description.length > 8 ? faq_category_description.substring(0, 8) + "..." : faq_category_description)%></a>
            </td>
     
            <td><a  data-container="body" data-toggle="popover" data-content="<%=notes%>" ><%=(notes.length > 8 ? notes.substring(0, 8) + "..." : notes)%></a>
            </td>
           <td><%=(is_public==1 ?  "YES" : "NO")%></td>
           <td><%=is_active%></td>                                              
           <td>
              <span style="display:inline-block; width: 20px;">
              <a id="faq-category-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
              </span>
              <span style="display:inline-block; width: 20px;">
              <a id="activate_faq_category" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
              </span>
              <span style="display:inline-block; width: 20px;">
              <a id="faq-category-delete" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModalfaqcat"><i class="glyphicon glyphicon-minus-sign"></i></a>
              </span>
           </td> 
      </script>

      <script type="text/template" id="faqCategoryCreateFormTpl">
        <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create FAQ Category</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="faq-category" class="col-sm-3 col-md-4 control-label">Category</label>
                        <div class="col-sm-9 col-md-4">
                           <input id="faq-category" name="faq-category" type="text" class="form-control" maxlength="50">
                          <div id="faq-category-error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="faq-category-description" class="col-sm-3 col-md-4 control-label">Description</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="faq-category-description" name="faq-category-description" type="text" class="form-control" maxlength="150">
                        <div id="faq-category-description-error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>      

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="faq-category-notes" class="col-sm-3 col-md-4 control-label">Notes</label>
                        <div class="col-sm-9 col-md-4">
                              <textarea id="faq-category-notes" name="faq-category-notes" class="form-control" maxlength="255"></textarea>
                           <div id="faq-category-notes-error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>       

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="faq-category-public" class="col-sm-3 col-md-4 control-label">Public</label>
                        <div class="col-sm-9 col-md-4">
                            <label>
                        <input type="radio" name="faq-category-public" id="faq-category-public" value="1" data-rule-required="true"> Yes
                      </label>&nbsp;<label>
                        <input type="radio" name="faq-category-public" id="faq-category-public" value="0" data-rule-required="true"> No
                      </label>
                      <div id="faq-category-public-error" style="color:red"></div>
                      </div>
                      </div>
                    </div>
                  </div>           


                   <div class="row">
                    <div class="col-md-12">
                       <!--  <div class="col-sm-9 col-md-4">
                          <button type="button" class="btn btn-default">Save</button><button type="button" class="btn btn-default">Cancel</button>
                        </div> -->
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="faq-category-save"  name="faq-category-save" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button> 
                             <button type="submit" id="faq-category-cancel" name="faq-category-cancel" class="btn btn-raised btn-black">Cancel</button>                          
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
        </script>


        <script type="text/template" id="faqCategoryEditFormTpl">
        <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Edit FAQ Category</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>
                 <input id="faq-category-id" type="hidden" class="form-control" value="<%=faq_category_id%>" />

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="faq-category" class="col-sm-3 col-md-4 control-label">Category</label>
                        <div class="col-sm-9 col-md-4">
                           <input id="faq-category" value="<%=faq_category_name%>" name="faq-category" type="text" class="form-control" maxlength="50">
                           <div id="faq-category-error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="faq-category-description" class="col-sm-3 col-md-4 control-label">Description</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="faq-category-description" value="<%=faq_category_description%>" name="faq-category-description" type="text" class="form-control" maxlength="150" >
                           <div id="faq-category-description-error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>      

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="faq-category-notes" class="col-sm-3 col-md-4 control-label">Notes</label>
                        <div class="col-sm-9 col-md-4">
                              <textarea id="faq-category-notes" name="faq-category-notes" class="form-control" maxlength="255"><%=notes%></textarea>
                            <div id="faq-category-notes-error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>       

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="faq-category-public" class="col-sm-3 col-md-4 control-label">Public</label>
                        <div class="col-sm-9 col-md-4">
                            <label>
                       <input type="radio" name="faq-category-public" id="faq-category-public" value="1" data-rule-required="true"  <%=(is_public == 1)?"checked":"" %> > Yes
                      </label>&nbsp;<label>
                       <input type="radio" name="faq-category-public" id="faq-category-public" value="0" data-rule-required="true"  <%=(is_public == 0)?"checked":"" %> > No
                      </label>
                       <div id="faq-category-public-error" style="color:red"></div>
                       </div>
                      </div>
                    </div>
                  </div>           


                   <div class="row">
                    <div class="col-md-12">
                       <!--  <div class="col-sm-9 col-md-4">
                          <button type="button" class="btn btn-default">Save</button><button type="button" class="btn btn-default">Cancel</button>
                        </div> -->
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="faq-category-save"  name="faq-category-save" class="btn btn-raised btn-black">Save</button> 
                             <button type="submit" id="faq-category-cancel" name="faq-category-cancel" class="btn btn-raised btn-black">Cancel</button>                          
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
        </script>


        <!--currency -->

        <script type="text/template" id="currencyPageTpl">

                <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Currency List</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form  class="form-horizontal">
                   <fieldset>                  

                      <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <div class="col-sm-8 col-md-2">

                             <input id="currency_search" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search" >
                            </div>
                              <button type="button" id="create-currency" name="btnSubmit" class="btn btn-raised btn-black">Add</button> <button id="currency_deleteall" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                            </div>
                      </div>


                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr  class="trrc">
                        <th>Name</th>
                        <th>Short Name</th>
                        <th>Conversion Rate</th>
                        <th>Type</th>
                        <th>Status</th>                                       
                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="currency-list">
                      
                    </tbody>
                    <div id="findStatus"></div>
                  </table>   

                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button id="currency_load_more" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>

                 <div id="myModalCurr" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Currency</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="currid">
                  <button type="button" class="btn btn-black" id="del_curren">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>

                 
                </fieldset>
                </form>
            </div>
          </div>

        </script>

         <script type="text/template" id="currencyTemplate">

         <td><a  data-container="body" data-toggle="popover" data-content="<%=currency_name%>" ><%=(currency_name.length > 50 ? currency_name.substring(0, 50) + "..." : currency_name)%></a>
          </td>
                         <td><%=code%></td>
                        <td><%=conv_rate%></td>
                        <td><%=type%></td>
                        <td><%=is_active%></td>
                        <td>
                            <span style="display:inline-block; width: 20px;">
                            <a id="edit-currency" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
                            </span>
                            <span style="display:inline-block; width: 20px;">
                            <a id="activate_currency" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
                            </span>
                            <span style="display:inline-block; width: 20px;">
                            <a id="del-currency" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModalCurr"><i class="glyphicon glyphicon-minus-sign"></i></a>
                            </span>
                        </td>
        </script>

        <script type="text/template" id="currencyCreateFormTpl">

            <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create Currency</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>

                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="currency-name" class="col-sm-3 col-md-4 control-label"> Name</label>
                        <div class="col-sm-9 col-md-4">
                                    <input id="currency-name" name="currency-name" type="text" class="form-control" maxlength="150"> 
                           <div id="currency-name-error" style="color:red"></div>          
                            </div>
                           
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="currency-code" class="col-sm-3 col-md-4 control-label">Short Name</label>
                        <div class="col-sm-9 col-md-4">
                                    <input id="currency-code" name="currency-code" type="text" class="form-control" maxlength="3"> 
                           <div id="currency-code-error" style="color:red"></div>          
                            </div>
                           
                      </div>
                    </div>
                  </div>
             
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="currency-conversion" class="col-sm-3 col-md-4 control-label">Conversion Rate</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="currency-conversion" name="currency-conversion" type="text" class="form-control" maxlength="5">
                         <div id="currency-conversion-error" style="color:red"></div>
                            </div>
                           
                      </div>
                    </div>
                  </div> 


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="currency-type" class="col-sm-3 col-md-4 control-label">Type</label>
                        <div class="col-sm-9 col-md-4">
                             <label>
                        <input type="radio" name="currencytype" id="currency-type" value="1" data-rule-required="true"> Direct
                      </label>&nbsp;<label>
                        <input type="radio" name="currencytype" id="currency-type" value="0" data-rule-required="true"> Indirect
                      </label>
                        <div id="currency-type-error" style="color:red"></div>
                            </div>
                          
                      </div>
                    </div>
                  </div>   

                   <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="currency-save" name="currency-save" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button>  
                              <button name="currency-cancel" id="currency-cancel" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>

        </script>

         <script type="text/template" id="currencyEditFormTpl">

            <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Edit Currency</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>
                 <input id="currency-id" type="hidden" class="form-control" value="<%=currency_id%>" />

                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="currency-name" class="col-sm-3 col-md-4 control-label"> Name</label>
                        <div class="col-sm-9 col-md-4">
                                    <input id="currency-name" value="<%=currency_name%>" name="currency-name" type="text" class="form-control" maxlength="150">    
                                <div id="currency-name-error" style="color:red"></div>          
                            </div>           
                            </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="currency-code" class="col-sm-3 col-md-4 control-label">Short Name</label>
                        <div class="col-sm-9 col-md-4">
                                    <input id="currency-code" value="<%=code%>" name="currency-code" type="text" class="form-control" maxlength="3"> 
                           <div id="currency-code-error" style="color:red"></div>          
                            </div>
                           
                      </div>
                    </div>
                  </div>
                  
              
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="currency-conversion" class="col-sm-3 col-md-4 control-label">Conversion Rate</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="currency-conversion" value="<%=conv_rate%>" name="currency-conversion" type="text" class="form-control" maxlength="5">
                            <div id="currency-conversion-error" style="color:red"></div>
                            </div>
                            </div>
                      </div>
                    </div>
                   


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="currency-type" class="col-sm-3 col-md-4 control-label">Type</label>
                        <div class="col-sm-9 col-md-4">
                             <label>
                        <input type="radio" name="currencytype"  id="currency-type" value="1" data-rule-required="true" <%=(type==1)?"checked":""%> > Direct
                      </label>&nbsp;<label>
                        <input type="radio" name="currencytype" id="currency-type" value="0" data-rule-required="true" <%=(type==0)?"checked":""%>> Indirect
                      </label>
                       <div id="currency-type-error" style="color:red"></div>
                            </div>
                            
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="currency-save" name="currency-save" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button>  
                              <button name="currency-cancel" id="currency-cancel" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>

        </script>

        <!--zone -->

        <script type="text/template" id="zonePageTpl">

                <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Zone Area</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form class="form-horizontal">
                   <fieldset>                  

                      <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <div class="col-sm-8 col-md-2">
                            <input id="zonearea_search" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                            </div>
                              <button type="submit" id="create-zone"  name="zone-create" class="btn btn-raised btn-black">Add</button> 
                              <button id="zone_deleteall" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                            </div>
                      </div>


                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr  class="trrc">
                       <!--  <th>#</th> -->
                        <th>Name</th>
                        <th>Status</th>           
                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="zone_list">
   
                        
                    </tbody>
                  </table>   

                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button id="zone_load_more" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>

                 <div id="myModalZone" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Zone Area</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="zoneid">
                  <button type="button" class="btn btn-black" id="del_zone_area">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div> 
                </fieldset>
                </form>
            </div>
          </div>

        </script>

         <script type="text/template" id="zoneTemplate">

         <td><a  data-container="body" data-toggle="popover" data-content="<%=zone_name%>" ><%=(zone_name.length > 50 ? zone_name.substring(0, 50) + "..." : zone_name)%></a></td>

                      
                         <td><%=is_active%></td>
                        <td>
                          <span style="display:inline-block; width: 20px;">
                          <a id="edit-zone" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
                          </span>
                          <span style="display:inline-block; width: 20px;">
                          <a id="activate_zone" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
                          </span>
                          <span style="display:inline-block; width: 20px;">
                          <a id="del-zone" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModalZone"><i class="glyphicon glyphicon-minus-sign"></i></a>
                          </span>
                      </td> 
        </script>

         <script type="text/template" id="zoneCreateFormTpl">

                 <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create Zone Area</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="zone-name" class="col-sm-3 col-md-4 control-label">Name</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="zone-name" name="zone-name" type="text" class="form-control" maxlength="150">
                          <div id="zone-name-error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>   

                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="button" id="save-zone"  name="btnSave" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button> 

                               <button type="button" id="cancel-zone" name="btnCancel" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>

         </script>

     <script type="text/template" id="zoneEditFormTpl">

                 <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Edit Zone Area</h3>
            </div>
             <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>
                   <input id="zone-id" type="hidden" class="form-control" value="<%=zone_area_id%>" />
                
                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="zone-name" class="col-sm-3 col-md-4 control-label">Name</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="zone-name" name="zone-name" value="<%=zone_name%>" type="text" class="form-control" maxlength="150">
                            <div id="zone-name-error" style="color:red"></div>
                            </div> 
                      </div>
                    </div>
                  </div>   

                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="save-zone"  name="btnSubmit" class="btn btn-raised btn-black">Save</button> 

                               <button type="submit" id="cancel-zone" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>

         </script>


          <script type="text/template" id="securityQuestionPageTpl">

                  <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Security Question</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form  class="form-horizontal">
                   <fieldset>                  

                      <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <div class="col-sm-8 col-md-2">
                                   <input id="securityQuestionSearch" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                            </div>
                              <button type="button" id="create-sq" name="btnSubmit" class="btn btn-raised btn-black">Add</button> <button id="sq_deleteall" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                            </div>
                      </div>


                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr  class="trrc">
                        <th>Security Question</th>                      
                        <th>Status</th>
                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="security_question_list">

                    </tbody>
                     <div id="findStatus"></div>

                  </table>   

                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button id="sq_load_more" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>
                <div id="myModalsecurity" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Security Question</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="secreid">
                  <button type="button" class="btn btn-black" id="del_securety_qus">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>
                 
                </fieldset>
                </form>
            </div>
          </div>
          </script>

         <script type="text/template" id="securityQuestionTemplate">
              <td><a  data-container="body" data-toggle="popover" data-content="<%=question_name%>" ><%=(question_name.length > 50 ? question_name.substring(0, 50) + "..." : question_name)%></a>
              </td> 
            
              <td><%=is_active%></td>
                    <td>

    <span style="display:inline-block; width: 20px;">
    <a id="edit-security-question" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
    </span>
    <span style="display:inline-block; width: 20px;">
    <a id="activate-security-question" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
    </span>
    <span style="display:inline-block; width: 20px;">
    <a id="delete-security-question" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModalsecurity"><i class="glyphicon glyphicon-minus-sign"></i></a>
    </span>
</td>
        </script>

         <script type="text/template" id="securityQuestioncreateFormTpl">

                 <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create Security Question</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>
                
                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="sqQuestions" class="col-sm-3 col-md-4 control-label">Question </label>
                        <div class="col-sm-9 col-md-4">
                          <input id="sq_questions" name="sqQuestions" type="text" class="form-control" maxlength="255">
                          <div id="sq_questions_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>   


                
                   <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="button" id="createSq" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button> 
                               <button type="submit" id="cancelSq" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>

         </script>

          <script type="text/template" id="securityQuestionEditFormTpl">

                 <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Edit Security Question</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>
              <input id="security_question_id" type="hidden" class="form-control" value="<%=question_id%>">
               
                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="sqQuestions" class="col-sm-3 col-md-4 control-label">Question </label>
                        <div class="col-sm-9 col-md-4">
                          <input id="sq_questions" name="sqQuestions" value="<%=question_name%>" type="text" class="form-control" maxlength="255">
                      <div id="sq_questions_error" style="color:red"></div>
    
                            </div>
                      </div>
                    </div>
                  </div>   


                
                   <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="button" id="createSq" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button> 
                               <button type="submit" id="cancelSq" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>

         </script>

          <script type="text/template" id="instructionPageTpl">

                  <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Instructions</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form class="form-horizontal">
                   <fieldset>                  

                      <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <div class="col-sm-8 col-md-2">
                                   <input id="instructionSearch" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                            </div>
                             <button type="button" id="create-inst" name="btnSubmit" class="btn btn-raised btn-black">Add</button>
                              <button type="submit" id="del-inst" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                            </div>
                      </div>


                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr  class="trrc">

                        <th>Description</th>
                        <th>Type</th>
                        <th>Effective From</th>
                        <th>Effective To</th>                   
                        <th>Status</th> 

                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="instruction_list">
                        
                    </tbody>
                    <div id="findStatus"></div>
                  </table>   

                   <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-4" >                          
                          <button id="inst_load_more" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                        </div>
                  </div> 
                <div id="myModalins" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Instruction</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="insid">
                  <button type="button" class="btn btn-black" id="del_instruct">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>                  
                </fieldset>
              </form>
            </div>
          </div>
      </script>

         <script type="text/template" id="instructionTemplate">
              <td><a  data-container="body" data-toggle="popover" data-content="<%=inst_description%>" ><%=(inst_description.length > 50 ? inst_description.substring(0, 50) + "..." : inst_description)%></a>
              </td>

              <td><a  data-container="body" data-toggle="popover" data-content="<%=inst_type%>" ><%=(inst_type.length > 50 ? inst_type.substring(0, 50) + "..." : inst_type)%></a>
              </td>
  
                          <td><%=inst_eff_date_from%></td>
                           <td><%=inst_eff_date_to%></td>
                        <td><%=is_active%></td>

                   <td>
                        <span style="display:inline-block; width: 20px;">
                        <a id="edit-insctruction" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
                        </span>
                        <span style="display:inline-block; width: 20px;">
                        <a id="activate_instruction" data-toggle="tooltip" data-placement="top" title="Activate"><i class= "glyphicon glyphicon-ban-circle"></i></a>  
                        </span>
                        <span style="display:inline-block; width: 20px;">
                        <a id="del-instruction" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModalins"><i class="glyphicon glyphicon-minus-sign"></i></a>
                        </span>
                    </td> 
        </script>

        <script type="text/template" id="instructionCreateFormTpl">
          
                  <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create Instruction</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="instruction_type" class="col-sm-3 col-md-4 control-label">Type</label>
                        <div class="col-sm-9 col-md-4">
                             <select id="instruction_type" name="instruction_type" class="form-control">
                            <option  value="AGR">AGR</option>
                            <option value="DIS">DIS</option>
                            <option value="INS">INS</option>
                           </select>                 
                           <div id="instruction_type_error" style="color:red"></div>
                           </div>                
                      </div>
                    </div>
                  </div> 

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Description</label>
                        <div class="col-sm-9 col-md-4">
                              <textarea id="instruction_desc" name="txtFirstNameBilling" maxlength="50" type="text" class="form-control"></textarea>
                               <div id="instruction_desc_error"  style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Effective From</label>
                        <div class="col-sm-9 col-md-4">
                          <div id="datetimepicker1" class="input-group date">
                            <input id="instruction_efFrom" data-date-format='YYYY-MM-DD' name="txtFirstNameBilling" type="text" class="form-control" style="width:300px">
                             <div id="news_date_error" class="" style="font-size: 12px; color: #FF0000; "></div>
                             </div>
                          </div>
                      </div>
                    </div>
                  </div> 

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Effective To</label>
                        <div class="col-sm-9 col-md-4">
                        <div id="datetimepicker1" class="input-group date">
                               <input id="instruction_efTo" data-date-format='YYYY-MM-DD' name="txtFirstNameBilling" type="text" class="form-control" style="width:300px">
                                <div id="news_date_error" class="" ></div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>       

                          
                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="button" id="save-instruction" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button> 
                             <button   type="button" id="calcel-inst" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
        </script>

         <script type="text/template" id="instructionEditFormTpl">
          
          <div class="widget">
            <div class="widget-heading">

              <h3 class="widget-title">Edit Instruction</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>
                   <input id="instruction_id" type="hidden" class="form-control" value="<%=instruction_id%>" />

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="instruction_type" class="col-sm-3 col-md-4 control-label">Type</label>
                        <div class="col-sm-9 col-md-4">
                             <select id="instruction_type" name="instruction_type" class="form-control" >
                             
                                  <option  value="AGR">AGR</option>
                                  <option value="DIS">DIS</option>
                                  <option value="INS">INS</option>
                           </select>    
                           <div id="instruction_type_error" style="color:red"></div>             
                      </div>
                    </div>
                  </div> 
                
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Description</label>
                        <div class="col-sm-9 col-md-4">
                           <textarea id="instruction_desc" name="txtFirstNameBilling"  type="text" class="form-control" maxlength="50"><%=inst_description%></textarea>
                                  <div id="instruction_desc_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Effective From</label>
                        <div class="col-sm-9 col-md-4">
                          <div id="datetimepicker1" class="input-group date">
                            <input id="instruction_efFrom" value="<%=inst_eff_date_from%>" data-date-format='YYYY-MM-DD' name="txtFirstNameBilling" type="text" class="form-control" style="width:300px">
                             <div id="inst_date_error" class="" style="font-size: 12px; color: #FF0000; "></div>
                             </div>
                          </div>

                      </div>
                    </div>
                  </div> 

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Effective To</label>
                        <div class="col-sm-9 col-md-4">
                        <div id="datetimepicker1" class="input-group date">
                               <input id="instruction_efTo" value="<%=inst_eff_date_to%>" data-date-format='YYYY-MM-DD' name="txtFirstNameBilling" type="text" class="form-control" style="width:300px">
                                <div id="inst_date_error" class="" ></div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>                 


                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="button" id="save-instruction" name="btnSubmit" class="btn btn-raised btn-black">Save</button> 
                             <button   type="button" id="calcel-inst" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
        </script>

        <script type="text/template" id="questionTypePageTpl">
          

                  <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Question Type</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form class="form-horizontal">
                   <fieldset>                  

                    <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <div class="col-sm-8 col-md-2">
                              <input id="question_type_search" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                            </div>
                              <button type="submit" id="create-questionType" name="btnSubmit" class="btn btn-raised btn-black">Add</button> 

                           <!--    <button id="questiontype_deleteall" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Del All</button> -->
                            </div>
                      </div>
                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr class="trrc">
           
                        <th>Question Type</th>                       
                        <th>Status</th>
                        <th>Actions</th>
                       
                      </tr>
                    </thead>
                    <tbody id="question_type_list">

                    </tbody>
                  </table>   

                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button id="questiontype_load_more" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>
                </fieldset>
                </form>
            </div>
          </div>

        </div>
        </div>

        </script>
        <!-- question type-->

 <script type="text/template" id="questionTypeTemplate">
        <td><a  data-container="body" data-toggle="popover" data-content="<%=question_type_name%>" ><%=(question_type_name.length > 50 ? question_type_name.substring(0, 50) + "..." : question_type_name)%></a>
        </td>   
        <td><%=is_active%></td>

          <td>
            <span style="display:inline-block; width: 20px;">
            <a id="edit-questionType" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
            </span>
         <!--    <span style="display:inline-block; width: 20px;">
            <a id="activate_questiontype" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
            </span> -->
         <!--    <span style="display:inline-block; width: 20px;">
            <a id="del-questionType" data-toggle="tooltip" data-placement="top" title="Delete"><i class="glyphicon glyphicon-minus-sign"></i></a>
            </span> -->
        </td> 

  </script>

  <script type="text/template" id="questionTypeCreateFormTpl">

        <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create Question Type</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Question Type</label>
                        <div class="col-sm-9 col-md-4">
                         <input id="qTypeQuestion" name="txtFirstNameBilling" type="text" class="form-control" maxlength="50">
                              <div id="qTypeQuestion_error" style="color:red"></div>
                            </div>   
                      </div>
                    </div>

                  </div>


<!--                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Description</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="qType_description" name="txtFirstNameBilling" type="text" class="form-control">
                              <div id="qType_descriptionerror" style="color:red"></div>
                            </div>     
                      </div>
                    </div>
                  </div>         -->  



                   <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="button" id="create_qtype" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button>  
                              <button name="btnSubmit" id="cancel_qType" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
      
    </script>

    <script type="text/template" id="questionTypeEditFormTpl">

        <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Edit Question Type</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>

                <input id="question_type_id" type="hidden" class="form-control" value="<%=question_type_id%>" />

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Question Type</label>
                        <div class="col-sm-9 col-md-4">
                         <input id="qTypeQuestion" value="<%=question_type_name%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="50">
                          <div id="qTypeQuestion_error" style="color:red"></div>
                            </div> 
                            </div>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="button" id="create_qtype" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button>  
                              <button name="btnSubmit" id="cancel_qType" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
      
        </script>

        <!--Question complexity-->

        <script type="text/template" id="questionComplexityPageTpl">
          
            <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Complexity Question</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form class="form-horizontal">
                   <fieldset>                  

                     <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <div class="col-sm-8 col-md-2">
                              <input id="question_complexity_search" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                            </div>
                              <button type="submit" id="qus_complexity_create" name="btnSubmit" class="btn btn-raised btn-black">Add</button> <button id="question_complexity_deleteall" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                            </div>
                      </div>

                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr  class="trrc">

                        <th>Question Type</th>
                        <th>Status</th>
                        <th>Actions</th>
                       
                      </tr>
                    </thead>
                    <tbody id="question_complexity_list">


                    </tbody>
                  </table>   

      <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button id="question_complexity_load_more" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>
                 <div id="myModal" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Complexity Question</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="comquesid">
                  <button type="button" class="btn btn-black" id="del_com_qus">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>
                </fieldset>
                </form>
            </div>
          </div>
        </script>

         <script type="text/template" id="complexityQuestionTemplate">
        
                 <td><a  data-container="body" data-toggle="popover" data-content="<%=difficulty_level_name%>" ><%=(difficulty_level_name.length > 50 ? difficulty_level_name.substring(0, 50) + "..." : difficulty_level_name)%></a>
              </td> 
                   <td><%=is_active%></td>
                  <td>
                      <span style="display:inline-block; width: 20px;">
                      <a id="edit-qusComplexity" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
                      </span>
                      <span style="display:inline-block; width: 20px;">
                      <a id="activate_question_compexity" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
                      </span>
                      <span style="display:inline-block; width: 20px;">
                      <a id="del-quscomplexity" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-minus-sign"></i></a>
                      </span>
                  </td>
         </script>

        <script type="text/template" id="complexityQuestionCreateFormTpl">
          
          
          <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create Complexity Question</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Complexity Level</label>
                        <div class="col-sm-9 col-md-4">
                         <input id="cq_level" name="txtFirstNameBilling" type="text" class="form-control" maxlength="50">
                           <div id="cq_level_error" style="color:red"></div>
                            </div>
                          
                      </div>
                    </div>
                  </div>        


                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="saveComQuestion" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button> 
                               <button type="submit" id="cancelCq" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
        </script>

        <script type="text/template" id="complexityQuestionEditFormTpl">
          
          
          <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Edit Complexity Question</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>

                <input id="complexity_qus_id" type="hidden" class="form-control" value="<%=difficulty_level_id%>" />


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Complexity Level</label>
                        <div class="col-sm-9 col-md-4">
                         <input id="cq_level" value="<%=difficulty_level_name%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="50">
                        <div id="cq_level_error" style="color:red"></div>

                            </div>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-12">
                       <!--  <div class="col-sm-9 col-md-4">
                          <button type="button" class="btn btn-default">Save</button><button type="button" class="btn btn-default">Cancel</button>
                        </div> -->
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="saveComQuestion" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button> 
                               <button type="submit" id="cancelCq" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
        </script>

         <script type="text/template" id="userTypePageTpl">

                <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">User Types</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form  class="form-horizontal">
                   <fieldset>                  

                      <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <div class="col-sm-8 col-md-2">
                             <input id="usertype_search" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                            </div>
                              <button type="submit" id="create_usertype" class="btn btn-raised btn-black">Add</button> <button id="usertype_deleteall" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                            </div>
                      </div>


                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr  class="trrc">
                        <th>Name</th>
                        <th>STATUS</th>
                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="userTypeList">

                    </tbody>
                     <div id="findStatus"></div>
                  </table>   

                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button id="usertype_load_more" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>

                <div id="myModalUserType" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete User Types</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="usertypeid">
                  <button type="button" class="btn btn-black" id="del_usertype_id">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div> 
                </fieldset>
                </form>
            </div>
          </div>

         </script>

         <!--user type -->

             <script type="text/template" id="usertypeTemplate">
              <td><a  data-container="body" data-toggle="popover" data-content="<%=user_type_name%>" ><%=(user_type_name.length > 50 ? user_type_name.substring(0, 50) + "..." : user_type_name)%></a></td>
                <td><%=is_active%></td>                         
                <td><span style="display:inline-block; width: 20px;">
                    <a id="edit_usertype" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
                    </span>
                    <span style="display:inline-block; width: 20px;">
                    <a id="activate_usertype" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
                    </span>
                    <span style="display:inline-block; width: 20px;">
                    <a id="del_usertype" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModalUserType"><i class="glyphicon glyphicon-minus-sign"></i></a>
                    </span>
                </td>
        </script>

        <script type="text/template" id="userTypeCreateFormTpl">
          
                 <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create User Types</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>
                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">User Type</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="usertype_name" name="txtFirstNameBilling" type="text" class="form-control" maxlength="50">
                            <div id="usertype_name_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>   

                   <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="save_usertype" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup" >Save</button> 
                               <button type="submit" id="cancel_usertype" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
        </script>

          <script type="text/template" id="userTypeEditFormTpl">
          
                 <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Edit User Types</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>

             <input id="usertype_id" type="hidden" class="form-control" value="<%=user_type_id%>" />
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">User Type</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="usertype_name" value="<%=user_type_name%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="50">
                            <div id="usertype_name_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>   

                   <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="save_usertype" name="btnSubmit" class="btn btn-raised btn-black">Save</button> 
                               <button type="submit" id="cancel_usertype" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
        </script>

        <script type="text/template" id="subjectPageTpl">
          
                  <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Subject List</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form  class="form-horizontal">
                   <fieldset>                  
<span id="upload-span" style="width:190px; position: relative; left: 10px; margin-top: 0px 20px;float: left;">
      <div class="form-group">
        <input type="file" name="uploadFile" id="uploadFile" data-buttonname="btn-outline btn-primary" data-iconname="ion-image mr-5" class="filestyle" >
        <div style="width:300px; position: relative; left: 10px; margin-top: 0px 20px;" class="bootstrap-filestyle input-group">
          <!-- <input id="fileName" class="form-control "  type="text">  -->
          <div id="file_error" class="file_error" style="font-size: 12px; color: #FF0000; "></div>
        </div>         
      </div>
    </span>
                      <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <div class="col-sm-8 col-md-2">
                                    <input id="subjectSearch" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                            </div>
                              <button type="submit" id="create_subject" class="btn btn-raised btn-black">Add</button> <button id="subject_deleteall" type="submit" id="cancel_subject" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                            </div>
                      </div>


                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead class="sublist">
                      <tr  class="trrc">
                       <!--  <th>#</th> -->
                       <!-- <th>Client</th>-->
                        <th>Category</th>
                        <th>Subject Name</th>                        
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="subject_list">                        
                    </tbody>
                    <div id="findStatus"></div>
                  </table>   

                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button id="subject_load_more" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>
                <div id="myModalSub" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Subject</h4>
                              <h6>Deleting Subject will delete all Topics and Products under this Subject.</h6>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="subjid">
                  <button type="button" class="btn btn-black" id="del_subj">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>
                </fieldset>
                </form>
            </div>
          </div>

        </script>

        <script type="text/template" id="subjectTemplate">

        <td><a  data-container="body" data-toggle="popover" data-content="<%=category_name%>" ><%=(category_name.length > 50 ? category_name.substring(0, 50) + "..." : category_name)%></a>
        </td> 

        <td><a  data-container="body" data-toggle="popover" data-content="<%=subject_name%>" ><%=(subject_name.length > 50 ? subject_name.substring(0, 50) + "..." : subject_name)%></a>
        </td>


        <td><a  data-container="body" data-toggle="popover" data-content="<%=sub_description%>" ><%=(sub_description.length > 25 ? sub_description.substring(0, 8) + "..." : sub_description)%></a>
        </td>


            <td><%=is_active%></td>
            <td>
            <span style="display:inline-block; width: 20px;">
          <a id="edit_subject" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
          </span>
          <span style="display:inline-block; width: 20px;">
          <a id="activate_subject" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
          </span>
          <span style="display:inline-block; width: 20px;">
          <a id="del_subject" data-toggle="tooltip" data-placement="top" title="Delete"  data-toggle="modal" data-target="#myModalSub"><i class="glyphicon glyphicon-minus-sign"></i></a>
          </span>
          </td>

        </script>

        <script type="text/template" id="subjectCreateFormTpl">
          
              <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create Subject</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>

             
               <!--   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Client</label>
                        <div class="col-sm-9 col-md-4">-->                                  
                           <!-- <input id="subject_client" name="txtFirstNameBilling" type="text" class="form-control" maxlength="12">
                            <div id="subject_client_error" style="color:red"></div> -->
                        <!--   <select id="subject_client" name="ddlCountryBilling" class="form-control">
                            
                                  <option value="">-Please Select-</option>
                           </select> 
                             <div id="subject_client_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div> -->

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Category</label>
                        <div class="col-sm-9 col-md-4">
                              <select id="subject_category" name="ddlCountryBilling" class="form-control">
                              
                                  <option value="">--Please Select--</option>
                           </select>     
                           <div id="subject_category_error" style="color:red"></div>            
                            </div>
                      </div>
                    </div>
                  </div>   

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Subject Name</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="subject_name" name="txtFirstNameBilling" type="text" class="form-control" maxlength="150">
                            <div id="subject_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>    

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Description</label>
                        <div class="col-sm-9 col-md-4">
                              <textarea id="sub_description" name="txtFirstNameBilling" maxlength="50" type="text" class="form-control"></textarea>
                               <div id="sub_description_error"  style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div> 

                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="save_subject" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button>  
                              <button type="submit" id="cancel_subject" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
        </script>

    <script type="text/template" id="subjectEditFormTpl">
          
              <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Edit Subject</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>

              <input id="subject_id" type="hidden" class="form-control" value="<%=subject_id%>" />
                  
                

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Category</label>
                        <div class="col-sm-9 col-md-4">
                           <select id="subject_category" name="ddlCountryBilling" class="form-control">
                                <option value="">--Please Select--</option>
                           </select>               
                            <div id="subject_category_error" style="color:red"></div>       
                            </div>
                      </div>
                    </div>
                  </div>   


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Subject Name</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="subject_name" value="<%=subject_name%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="150">
                            <div id="subject_name_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>   

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Description</label>
                        <div class="col-sm-9 col-md-4">
                              <textarea id="sub_description"  name="txtFirstNameBilling" maxlength="50" type="text" class="form-control"><%=sub_description%></textarea>
                               <div id="sub_description_error"  style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>  
               

                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="save_subject" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button>  
                              <button type="submit" id="cancel_subject" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
        </script>

        <script type="text/template" id="topicPageTpl">
          
                  <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Topic List</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form  class="form-horizontal">
                   <fieldset>                  
<span id="upload-span" style="width:190px; position: relative; left: 10px; margin-top: 0px 20px;float: left;">
      <div class="form-group">
        <input type="file" name="uploadFile" id="uploadFile" data-buttonname="btn-outline btn-primary" data-iconname="ion-image mr-5" class="filestyle" >
        <div style="width:300px; position: relative; left: 10px; margin-top: 0px 20px;" class="bootstrap-filestyle input-group">
          <!-- <input id="fileName" class="form-control "  type="text">  -->
          <div id="file_error" class="file_error" style="font-size: 12px; color: #FF0000; "></div>
        </div>         
      </div>
    </span>
                      <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <div class="col-sm-8 col-md-2">
                             <input id="topicSearch" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                            </div>
                              <button type="submit" id="create-topic"  class="btn btn-raised btn-black">Add</button> 
                              <button type="submit" id="topic_deleteall" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                            </div>
                      </div>


                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr  class="trrc">
                      <!--  <th>Client</th>-->
                        <th>Category Name</th>
                        <th> Subject Name</th>
                        <th>Topic Name</th>
                        <th>Status</th>                 
                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="topic_list">

                    </tbody>
                    <div id="findStatus"></div>
                  </table>   

                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button id="topic_load_more" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>
           <div id="myModalTop" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Topic</h4>
                              <h6>Deleting Topic will delete all Products under this Topic.</h6>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="topiid">
                  <button type="button" class="btn btn-black" id="del_topicpop">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>
                </fieldset>
                </form>
            </div>
          </div>
        </script>

        <script type="text/template" id="topicTemplate">
        <td><a  data-container="body" data-toggle="popover" data-content="<%=category_name%>" ><%=(category_name.length > 50 ? category_name.substring(0, 50) + "..." : category_name)%></a>
        </td> 

        <td><a  data-container="body" data-toggle="popover" data-content="<%=subject_name%>" ><%=(subject_name.length > 50 ? subject_name.substring(0, 50) + "..." : subject_name)%></a>
        </td>
          
         <td><a  data-container="body" data-toggle="popover" data-content="<%=topic_name%>" ><%=(topic_name.length > 50 ? topic_name.substring(0, 50) + "..." : topic_name)%></a>
        </td>        

     <td><%=is_active%></td>
                      <td>
                        <span style="display:inline-block; width: 20px;">
                        <a id="edit_topic" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
                        </span>
                        <span style="display:inline-block; width: 20px;">
                        <a id="activate_topic" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
                        </span>
                        <span style="display:inline-block; width: 20px;">
                        <a id="del_topic" data-toggle="tooltip" data-placement="top" title="Delete"
                        data-toggle="modal" data-target="#myModalTop"><i class="glyphicon glyphicon-minus-sign"></i></a>
                        </span>
                      </td>
        </script>

   <script type="text/template" id="topicCreateFormTpl">
          
          <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create Topic</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>

               <!-- <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Client</label>
                        <div class="col-sm-9 col-md-4">-->
                            <!-- <input id="client_name" name="txtFirstNameBilling" type="text" class="form-control" maxlength="11">
                            <div id="client_name_error" style="color:red"></div> -->
                         <!--   <select id="client_name" name="ddlCountryBilling" class="form-control">
                             
                                  <option value="">-Please Select-</option>
                           </select> 
                            <div id="client_name_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>-->

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Category </label>
                        <div class="col-sm-9 col-md-4">
                           <select id="topic_category_code" name="ddlCountryBilling" class="form-control">
                               <option value="">--Please Select--</option>
                           </select>                 
                           <div id="topic_category_code_error" style="color:red"></div>               
                            </div>
                      </div>
                    </div>
                  </div> 

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Subject </label>
                        <div class="col-sm-9 col-md-4">
                          <select id="topic_subject_code" name="ddlCountryBilling" class="form-control">
                               <option value="">--Please Select--</option>
                           </select>                 
                           <div id="topic_subject_code_error" style="color:red"></div>               
                            </div>
                      </div>
                    </div>
                  </div>  

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Topic Name</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="topic_name" name="txtFirstNameBilling" type="text" class="form-control" maxlength="150">
                            <div id="topic_name_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Description</label>
                        <div class="col-sm-9 col-md-4">
                              <textarea id="topic_description" name="txtFirstNameBilling" maxlength="50" type="text" class="form-control"></textarea>
                               <div id="topic_description_error"  style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div> 

                   <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="topic_save" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button>  
                              <button type="submit" id="topic_cancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
        </script>

        <script type="text/template" id="topicEditFormTpl">
          
          <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Edit Topic</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>

                  <input id="topic_id" type="hidden" class="form-control" value="<%=topic_id%>" />

               

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Category</label>
                        <div class="col-sm-9 col-md-4">
                        <select id="topic_category_code"  name="ddlCountryBilling" class="form-control" >
                              <option value="">--Please Select--</option>
                           </select> 
                            <div id="topic_category_code_error" style="color:red"></div>                
                            </div>
                      </div>
                    </div>
                  </div> 

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Subject</label>
                        <div class="col-sm-9 col-md-4">
                            <select id="topic_subject_code" name="ddlCountryBilling" class="form-control">
                              <option value="">--Please Select--</option>
 
                           </select> 
                            <div id="topic_subject_code_error" style="color:red"></div>                      
                            </div>
                      </div>
                    </div>
                  </div>  

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Topic Name</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="topic_name" value="<%=topic_name%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="150">
                            <div id="topic_name_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Description</label>
                        <div class="col-sm-9 col-md-4">
                              <textarea id="topic_description" name="txtFirstNameBilling" maxlength="50" type="text" class="form-control"><%=topic_description%></textarea>
                               <div id="topic_description_error"  style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div> 

                   <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="topic_save" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button>  
                              <button type="submit" id="topic_cancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
        </script>

        <script type="text/template" id="categoryPageTpl">
          
                  <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Categories</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form  class="form-horizontal">
                   <fieldset>  
                        
<span id="upload-span" style="width:190px; position: relative; left: 10px; margin-top: 0px 20px;float: left;">
      <div class="form-group">
        <input type="file" name="uploadFile" id="uploadFile" data-buttonname="btn-outline btn-primary" data-iconname="ion-image mr-5" class="filestyle" >
        <div style="width:300px; position: relative; left: 10px; margin-top: 0px 20px;" class="bootstrap-filestyle input-group">
          <!-- <input id="fileName" class="form-control "  type="text">  -->
          <div id="file_error" class="file_error" style="font-size: 12px; color: #FF0000; "></div>
        </div>         
      </div>
    </span>
                      <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <div class="col-sm-8 col-md-2">
                                  <input id="categorySearch" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                            </div>
                              <button type="submit" id="create_category" class="btn btn-raised btn-black">Add</button> 
                              <button type="submit" id="category_deleteall" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                            </div>
                      </div>


                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr  class="trrc">
                       <!--  <th>#</th> -->
                  <!--      <th>Client</th> -->
                        <th>Category</th>
                        <th>Description</th>
                        <th>Status</th>                     
                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="category_list">

                    </tbody>
                    <div id="findStatus"></div>
                  </table>   

                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button id="category_load_more" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>
                     <div id="myModalcat" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Category</h4>
                              <h6>Deleting Category will delete all Subjects,Topics and Products under this Category.</h6>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="cateid">
                  <button type="button" class="btn btn-black" id="del_category">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>
                 
                </fieldset>
                </form>
            </div>
          </div>
        </script>

        <script type="text/template" id="categoryTemplate">
         <td><a  data-container="body" data-toggle="popover" data-content="<%=category_name%>" ><%=(category_name.length > 20 ? category_name.substring(0, 8) + "..." : category_name)%></a>
          </td> 
          
          <td><a  data-container="body" data-toggle="popover" data-content="<%=category_description%>" ><%=(category_description.length > 20 ? category_description.substring(0, 8) + "..." : category_description)%></a>
          </td> 

          <td><%=is_active%></td>
          <td>
              <span style="display:inline-block; width: 20px;">
              <a id="edit_category" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
              </span>
              <span style="display:inline-block; width: 20px;">
              <a id="activate_category" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
              </span>
              <span style="display:inline-block; width: 20px;">
              <a id="del_delete" data-toggle="tooltip" data-placement="top" title="Delete"  data-toggle="modal" data-target="#myModalcat"><i class="glyphicon glyphicon-minus-sign"></i></a>
              </span> 
          </td> 
        </script>

        <script type="text/template" id="categoryCreateFormTpl">
          
                  <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create Category</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>

             
              <!--    <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Client Id</label>
                        <div class="col-sm-9 col-md-4">-->
                           <!--  <input id="category_client_id" name="txtFirstNameBilling" type="text" class="form-control" maxlength="12">
                            <div id="category_client_id_error" style="color:red"></div>
                            </div> -->
                         <!--  <select id="category_client_id" name="ddlCountryBilling" class="form-control">
                            
                                <option value="">-Please Select-</option>
                         </select>  
                         <div id="category_client_id_error" style="color:red"></div>
                      </div>
                    </div>
                  </div> 
                  </div>  -->

    
                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Category Name</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="category_name" name="txtFirstNameBilling" type="text" class="form-control" maxlength="20">
                            <div id="category_name_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>  

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Description</label>
                        <div class="col-sm-9 col-md-4">
                              <textarea id="category_description" name="txtFirstNameBilling" maxlength="50" type="text" class="form-control"></textarea>
                               <div id="category_description_error"  style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div> 

                 

                   <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="save_category" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button> 
                               <button type="submit" id="cancel_category" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
        </script>

         <script type="text/template" id="categoryEditFormTpl">
          
                  <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Edit Category</h3>
            </div>
            <div class="widget-body" style="padding:6px;"> 
              <form id="form" class="form-horizontal">
                
                <fieldset>
             <input id="category_id" type="hidden" class="form-control" value="<%=category_id%>" />
             
  

        
                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Category Name</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="category_name" value="<%=category_name%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="20">
                             <div id="category_name_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>  

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Description</label>
                        <div class="col-sm-9 col-md-4">
                              <textarea id="category_description" name="txtFirstNameBilling" maxlength="50" type="text" class="form-control"> <%=category_description%> </textarea>
                               <div id="category_description_error"  style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>  

                   <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="save_category" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button> 
                               <button type="submit" id="cancel_category" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
    </script>
       


<script type="text/template" id="awsPageTpl">
<div class="widget">
    <div class="widget-heading">
      <h3 class="widget-title">AWS S3 Configuration</h3>
    </div>
    <div class="widget-body" style="padding:6px;"> 
    <form class="form-horizontal">
           <fieldset>                  

              <div class="form-group">
                    <div class="col-sm-offset-8 col-sm-12" >
                     <div class="col-sm-8 col-md-2">
                            <input id="awsSearch" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                    </div>
                      <button type="button" id="create-aws"   name="btnSubmit" class="btn btn-raised btn-black">Add</button> 
                      <button id="aws_deleteall" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                    </div>
              </div>


          <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
            <thead>
              <tr  class="trrc">
               <!--  <th>#</th> -->
                <th>AWS S3 ID</th>
                <th>Access Key ID</th>
                <th>Secret Access Key</th>
                <th>S3 Bucket Name</th>
                <th>S3 Url</th>
                <th>Status</th>                       
                <th>Actions</th>                       
              </tr>
            </thead>
            <tbody id="awsList">
            </tbody>
            <div id="findStatus"></div>
          </table>   

               <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-4" >                          
                      <button id="aws_load_more" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                    </div>
              </div>   

              <div id="myModalaws" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete AWS S3 Configuration</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="awsid">
                  <button type="button" class="btn btn-black" id="del_aws_id">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>
     
        </fieldset>
        </form>
    </div>
  </div>

</script>

<script type="text/template" id="awsTemplate">

    <td><a  data-container="body" data-toggle="popover" data-content="<%=aws_s3_id%>" ><%=(aws_s3_id.length > 25 ? aws_s3_id.substring(0, 25) + "..." : aws_s3_id)%></a>
     </td> 

     <td><a  data-container="body" data-toggle="popover" data-content="<%=aws_access_key_id%>" ><%=(aws_access_key_id.length > 25 ? aws_access_key_id.substring(0, 25) + "..." : aws_access_key_id)%></a>
     </td>

      <td><a  data-container="body" data-toggle="popover" data-content="<%=aws_secret_access_key%>" ><%=(aws_secret_access_key.length > 25 ? aws_secret_access_key.substring(0, 25) + "..." : aws_secret_access_key)%></a>
     </td>

     <td><a  data-container="body" data-toggle="popover" data-content="<%=s3_bucket_name%>" ><%=(s3_bucket_name.length > 25 ? s3_bucket_name.substring(0, 25) + "..." : s3_bucket_name)%></a>
     </td>

     <td><a  data-container="body" data-toggle="popover" data-content="<%=s3_url%>" ><%=(s3_url.length > 25 ? s3_url.substring(0, 25) + "..." : s3_url)%></a>
     </td>
      
      <td><%=is_active%></td>

      <td>
          <span style="display:inline-block; width: 20px;">
          <a id="edit-aws" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
          </span>
          <span style="display:inline-block; width: 20px;">
          <a id="activate_aws" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
          </span>
          <span style="display:inline-block; width: 20px;">
          <a id="del-aws" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModalaws"><i class="glyphicon glyphicon-minus-sign"></i></a>
          </span>
      </td>
</script>

<script type="text/template" id="awsCreateTpl">
  
    <div class="widget-body" style="padding:6px;">
    <h3 class="widget-title">Create AWS S3 Configuration</h3>
      <form id="form" class="form-horizontal">
        <fieldset>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqcode" class="col-sm-3 col-md-4 control-label">AWS S3 ID</label>
                <div class="col-sm-9 col-md-4">
                    <input id="aws_s3_id" name="faqcode" type="text" class="form-control" maxlength="150">
                    <div id="aws_s3_id_error" style="color:red"></div>
                    </div>
              </div>
            </div>
          </div>   


          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqcategory" class="col-sm-3 col-md-4 control-label">Access Key ID</label>
                <div class="col-sm-9 col-md-4">
                     <input id="accessid" name="txtFirstNameBilling" type="text" class="form-control" maxlength="150"> 
                     <div id="accessid_error" style="color:red"></div>               
                  </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqquestion" class="col-sm-3 col-md-4 control-label">Secret Access Key</label>
                <div class="col-sm-9 col-md-4">
                    <input id="secretKey" name="faqquestion" type="text" class="form-control" maxlength="150">
                    <div id="secretKey_error" style="color:red"></div>
                    </div>
              </div>
            </div>
          </div>   

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">S3 Bucket Name</label>
                <div class="col-sm-9 col-md-4">
                    <input id="bucketName" name="faqquestion" type="text" class="form-control" maxlength="150">
                    <div id="bucketName_error" style="color:red"></div>
                    </div>
              </div>
            </div>
          </div>    

           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">S3 Url</label>
                <div class="col-sm-9 col-md-4">
                    <input id="s3url" name="faqquestion" type="text" class="form-control" maxlength="150">
                    <div id="s3url_error" style="color:red"></div>
                    </div>
              </div>
            </div>
          </div>        

           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqnotes" class="col-sm-3 col-md-4 control-label">Used For</label>
                <div class="col-sm-9 col-md-4">
                  <input id="usedFor" name="faqquestion" type="text" class="form-control" maxlength="150">
                  <div id="usedFor_error" style="color:red"></div>
                  </div>
              </div>
            </div>
          </div>       

            <div class="col-md-12">
              <div class="form-group">
                <label for="active" class="col-sm-3 col-md-4 control-label">Active</label>
                <div class="col-sm-9 col-md-4">
                    <label>
                <input type="radio" name="active" value="1" data-rule-required="true"> Yes
              </label>&nbsp;<label>
                <input type="radio" name="active" value="0" data-rule-required="true"> No
              </label>
               <div id="active_error" style="color:red"></div>
              </div>
            </div>
          </div>         

           <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-12">
                      <button type="submit" id="save-aws"  name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button>
                       <button type="submit" id="cancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                      
                    </div>
              </div>
            </div>
          </div>
         
        </fieldset>
      </form>
    </div>
  </div>
</script>

<script type="text/template" id="awsEditFormTpl">
  
    <div class="widget-body" style="padding:6px;">

        <h3 class="widget-title">Edit AWS S3 Configuration</h3>

      <form id="form" class="form-horizontal">                
        <fieldset>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">AWS S3 ID</label>
                <input id="aws_s3_master_id" type="hidden" class="form-control" value="<%=aws_s3_master_id%>" />
                <div class="col-sm-9 col-md-4">
                    <input id="aws_s3_id" value="<%=aws_s3_id%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="150">
               <div id="aws_s3_id_error" style="color:red"></div>
                    </div>
              </div>
            </div>
          </div>   


          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Access Key ID</label>
                <div class="col-sm-9 col-md-4">
                          <input id="accessid"  value="<%=aws_access_key_id%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="150">
                             <div id="accessid_error" style="color:red"></div>
                    </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Secret Access Key</label>
                <div class="col-sm-9 col-md-4">
                    <input id="secretKey"  value="<%=aws_secret_access_key%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="150">
                  <div id="secretKey_error" style="color:red"></div>
                  </div>
              </div>
            </div>
          </div>   

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">S3 Bucket Name</label>
                <div class="col-sm-9 col-md-4">
                      <input id="bucketName"  value="<%=s3_bucket_name%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="150">
                <div id="bucketName_error" style="color:red"></div>
                </div>
              </div>
            </div>
          </div>   

           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">S3 Url</label>
                <div class="col-sm-9 col-md-4">
                    <input id="s3url" value="<%=s3_url%>" name="faqquestion" type="text" class="form-control" maxlength="150">
             <div id="s3url_error" style="color:red"></div>
             </div>
              </div>
            </div>
          </div>         

           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Used For</label>
                <div class="col-sm-9 col-md-4">
                   <input id="usedFor" value="<%=used_for%>" name="faqquestion" type="text" class="form-control" maxlength="150">
                 <div id="usedFor_error" style="color:red"></div>
                 </div>
              </div>
            </div>
          </div>       

            <div class="col-md-12">
              <div class="form-group">
                <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Active</label>
                <div class="col-sm-9 col-md-4">
                    <label>
                <input type="radio" name="active" data-rule-required="true" value="1" <%=(is_active == 1)?"checked":"" %> > Yes
              </label>&nbsp;<label>
                <input type="radio" name="active" data-rule-required="true" value="0" <%=(is_active == 0)?"checked":"" %>> No
              </label>
               <div id="active_error" style="color:red"></div>
              </div>
            </div>
          </div>         

           <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-12">
                      <button type="submit" id="save-aws"  name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button>
                       <button type="submit" id="cancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                      
                    </div>
              </div>
            </div>
          </div>
         
        </fieldset>
      </form>
    </div>
  </div>
</script>

          <!-- email -->
<script type="text/template" id="emailPageTpl">
<div class="widget">
    <div class="widget-heading">
      <h3 class="widget-title">Email Configuration</h3>
    </div>
    <div class="widget-body" style="padding:6px;">
    <form class="form-horizontal">
           <fieldset>                  

              <div class="form-group">
                    <div class="col-sm-offset-8 col-sm-12" >
                     <div class="col-sm-8 col-md-2">
                            <input id="emailSearch" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                    </div>
                      <button type="button" id="create-email"   name="btnSubmit" class="btn btn-raised btn-black">Add</button> 
                      <button id="email_deleteall" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                    </div>
              </div>


          <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
            <thead>
              <tr  class="trrc">
   
                <th>Server Name</th>
                <th>Port</th>
                <th>Email</th>
                <th>Status</th>                       
                <th>Actions</th>                       
              </tr>
            </thead>
            <tbody id="emailList">
            </tbody>
             <div id="findStatus"></div>
          </table>   

               <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-4" >                          
                      <button id="email_load_more" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                    </div>
              </div>

         
        </fieldset>
        </form>
    </div>
  </div>

</script>

<script type="text/template" id="emailTemplate">
      <td><a  data-container="body" data-toggle="popover" data-content="<%=server_name%>" ><%=(server_name.length > 20 ? server_name.substring(0, 20) + "..." : server_name)%></a>
      </td>
      <td><%=port%></td>
       <td><a  data-container="body" data-toggle="popover" data-content="<%=email%>" ><%=(email.length > 20 ? email.substring(0, 20) + "..." : email)%></a>
     </td>  
      <td><%=is_active%></td>
        <td>
          <span style="display:inline-block; width: 20px;">
          <a id="edit-email" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
          </span>
          <span style="display:inline-block; width: 20px;">
          <a id="activate_email" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
          </span>
          <span style="display:inline-block; width: 20px;">
          <a id="del-email" data-toggle="tooltip" data-placement="top" title="Delete"><i class="glyphicon glyphicon-minus-sign"></i></a>
          </span>
      </td>
</script>

<script type="text/template" id="emailCreateTpl">
  
    <div class="widget-body" style="padding:6px;">

        <h3 class="widget-title">Create Email Configuration</h3>

      <form id="form" class="form-horizontal">
        <fieldset>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqcategory" class="col-sm-3 col-md-4 control-label">Server Name</label>
                <div class="col-sm-9 col-md-4">
                     <input id="server_name" name="txtFirstNameBilling" type="text" class="form-control" maxlength="150">                
                  <div id="server_name_error"  style="color:red"></div>
                  </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqquestion" class="col-sm-3 col-md-4 control-label">Port</label>
                <div class="col-sm-9 col-md-4">
                    <input id="port" name="faqquestion" type="text" class="form-control" maxlength="10">
                     <div id="port_error"  style="color:red"></div>
                    </div>
              </div>
            </div>
          </div>   

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">Email</label>
                <div class="col-sm-9 col-md-4">
                    <input id="email" name="faqquestion" type="text" class="form-control" maxlength="60">
                     <div id="email_error"  style="color:red"></div>
                    </div>
              </div>
            </div>
          </div>    

           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">Password</label>
                <div class="col-sm-9 col-md-4">
                    <input id="password" type="password" name="faqquestion" class="form-control" maxlength="60">
                <div id="password_error"  style="color:red"></div>
                </div>
              </div>
            </div>
          </div>        

           <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-12">
                      <button type="submit" id="save-email"  name="btnSubmit" class="btn btn-raised btn-black">Save</button>
                       <button type="submit" id="cancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                      
                    </div>
              </div>
            </div>
          </div>
         
        </fieldset>
      </form>
    </div>
  </div>
</script>

<script type="text/template" id="emailEditFormTpl">
  
    <div class="widget-body" style="padding:6px;">

     <h3 class="widget-title"> Edit Email Configuration</h3>

      <form id="form" class="form-horizontal">                
        <fieldset>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
              <input id="email_config_id" type="hidden" class="form-control" value="<%=email_config_id%>" />
                <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Server Name</label>
                <div class="col-sm-9 col-md-4">
                          <input id="server_name"  value="<%=server_name%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="150">
                       <div id="server_name_error"  style="color:red"></div>
                    </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Port</label>
                <div class="col-sm-9 col-md-4">
                    <input id="port"  value="<%=port%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="10">
               <div id="port_error"  style="color:red"></div>
                    </div>
              </div>
            </div>
          </div>   

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Email</label>
                <div class="col-sm-9 col-md-4">
                      <input id="email"  value="<%=email%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="60">
               <div id="email_error"  style="color:red"></div>
              </div>
              </div>
            </div>
          </div>   

           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">Password</label>
                <div class="col-sm-9 col-md-4">
                    <input id="password" value="<%=password%>" name="faqquestion" type="password" class="form-control" maxlength="60">
              <div id="password_error"  style="color:red"></div>
              </div>
              </div>
            </div>
          </div>         

           <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-12">
                      <button type="submit" id="save-email"  name="btnSubmit" class="btn btn-raised btn-black">Save</button>
                       <button type="submit" id="cancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                      
                    </div>
              </div>
            </div>
          </div>
         
        </fieldset>
      </form>
    </div>
  </div>
</script>

        <!-- sms -->

<script type="text/template" id="smsPageTpl">
    <div class="widget">
    <div class="widget-heading">
      <h3 class="widget-title">SMS Configuration</h3>
    </div>
    <div class="widget-body" style="padding:6px;">

    <form class="form-horizontal">
           <fieldset>                  

              <div class="form-group">
                    <div class="col-sm-offset-8 col-sm-12" >
                     <div class="col-sm-8 col-md-2">
                            <input id="smsSearch" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                    </div>
                      <button type="button" id="create-sms"   name="btnSubmit" class="btn btn-raised btn-black">Add</button> 
                      <button id="sms_deleteall" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                    </div>
              </div>


          <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
            <thead>
              <tr  class="trrc">

                <th>Gateway Name</th>
                <th>User ID</th>
                <th>Gateway URL</th>
                <th>Phone Number</th>
                <th>API ID</th>
                <th>Status</th>                       
                <th>Actions</th>                       
              </tr>
            </thead>
            <tbody id="smsList">
            </tbody>
            <div id="findStatus"></div>
          </table>   

               <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-4" >                          
                      <button id="sms_load_more" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                    </div>
              </div>

         
        </fieldset>
        </form>
    </div>
  </div>
</script>

<script type="text/template" id="smsTemplate">

     <td><a  data-container="body" data-toggle="popover" data-content="<%=app_sms_gateway_name%>" ><%=(app_sms_gateway_name.length > 20 ? app_sms_gateway_name.substring(0, 20) + "..." : app_sms_gateway_name)%></a>
     </td>

     <td><a  data-container="body" data-toggle="popover" data-content="<%=app_sms_user_id%>" ><%=(app_sms_user_id.length > 20 ? app_sms_user_id.substring(0, 20) + "..." : app_sms_user_id)%></a>
     </td>

     <td><a  data-container="body" data-toggle="popover" data-content="<%=app_sms_gateway_url%>" ><%=(app_sms_gateway_url.length > 20 ? app_sms_gateway_url.substring(0, 20) + "..." : app_sms_gateway_url)%></a>
     </td>

     <td><a  data-container="body" data-toggle="popover" data-content="<%=app_sms_registered_phone_number%>" ><%=(app_sms_registered_phone_number.length > 20 ? app_sms_registered_phone_number.substring(0, 20) + "..." : app_sms_registered_phone_number)%></a>
     </td>

     <td><a  data-container="body" data-toggle="popover" data-content="<%=app_sms_gateway_api_id%>" ><%=(app_sms_gateway_api_id.length > 20 ? app_sms_gateway_api_id.substring(0, 20) + "..." : app_sms_gateway_api_id)%></a>
     </td>

      <td><%=is_active%></td>
     <!--  <td><a id="edit-sms" data-toggle="tooltip" data-placement="top" title="Edit"><img src="images/edit.png" /></a> <a href="#">Activate</a> 
       <a id="del-sms" data-toggle="tooltip" data-placement="top" title="Delete"> <img src="images/delete.png" /></a> -->

        <td>
          <span style="display:inline-block; width: 20px;">
          <a id="edit-sms" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
          </span>
          <span style="display:inline-block; width: 20px;">
          <a id="activate_sms" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
          </span>
          <span style="display:inline-block; width: 20px;">
          <a id="del-sms" data-toggle="tooltip" data-placement="top" title="Delete"><i class="glyphicon glyphicon-minus-sign"></i></a>
          </span>
      </td>
</script>

<script type="text/template" id="smsCreateTpl">
  
    <div class="widget-body" style="padding:6px;">

      <h3 class="widget-title">Create SMS Configuration</h3>

      <form id="form" class="form-horizontal">
        <fieldset>
    
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqcategory" class="col-sm-3 col-md-4 control-label">Gateway Name</label>
                <div class="col-sm-9 col-md-4">
                     <input id="app_sms_gateway_name" name="txtFirstNameBilling" type="text" class="form-control" maxlength="150">
                     <div id="app_sms_gateway_name_error"  style="color:red"></div>
                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqquestion" class="col-sm-3 col-md-4 control-label">Gateway URL</label>
                <div class="col-sm-9 col-md-4">
                    <input id="app_sms_gateway_url" name="faqquestion" type="text" class="form-control" maxlength="60">
                    <div id="app_sms_gateway_url_error"  style="color:red"></div>
                    </div>
              </div>
            </div>
          </div>   

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">User ID</label>
                <div class="col-sm-9 col-md-4">
                    <input id="app_sms_user_id" name="faqquestion" type="text" class="form-control" maxlength="60">
                    <div id="app_sms_user_id_error"  style="color:red"></div>
                    </div>
              </div>
            </div>
          </div>    

           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">Password</label>
                <div class="col-sm-9 col-md-4">
                    <input id="app_sms_user_password" name="faqquestion" type="password" class="form-control" maxlength="60">
                    <div id="app_sms_user_password_error"  style="color:red"></div>
                    </div>
              </div>
            </div>
          </div>     

           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">Registerd Phone</label>
                <div class="col-sm-9 col-md-4">
                    <input id="app_sms_registered_phone_number" name="faqquestion" type="text" class="form-control" maxlength="10">
                    <div id="app_sms_registered_phone_number_error"  style="color:red"></div>
                    </div>
              </div>
            </div>
          </div>     
         
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">Authentication Token</label>
                <div class="col-sm-9 col-md-4">
                    <input id="app_sms_gateway_authentication_tocken" name="faqquestion" type="text" class="form-control" maxlength="150">
                    <div id="app_sms_gateway_authentication_tocken_error"  style="color:red"></div>
                    </div>
              </div>
            </div>
          </div>   

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">SMS API ID</label>
                <div class="col-sm-9 col-md-4">
                    <input id="app_sms_gateway_api_id" name="faqquestion" type="text" class="form-control" maxlength="150">
                    <div id="app_sms_gateway_api_id_error"  style="color:red"></div>
                    </div>
              </div>
            </div>
          </div>   

           <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-12">
                      <button type="submit" id="save-sms"  name="btnSubmit" class="btn btn-raised btn-black">Save</button>
                       <button type="submit" id="cancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                      
                    </div>
              </div>
            </div>
          </div>
         
        </fieldset>
      </form>
    </div>
  </div>
</script>

<script type="text/template" id="smsEditFormTpl">
  
    <div class="widget-body" style="padding:6px;">

          <h3 class="widget-title">Edit SMS Configuration</h3>

      <form id="form" class="form-horizontal">                
        <fieldset>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
              <input id="sms_config_id" type="hidden" class="form-control" value="<%=sms_config_id%>" />
                <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Gateway Name</label>
                <div class="col-sm-9 col-md-4">
                    <input id="app_sms_gateway_name"  value="<%=app_sms_gateway_name%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="150">  
               <div id="app_sms_gateway_name_error"  style="color:red"></div>
                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Gateway URL</label>
                <div class="col-sm-9 col-md-4">
                    <input id="app_sms_gateway_url"  value="<%=app_sms_gateway_url%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="60">
                  <div id="app_sms_gateway_url_error"  style="color:red"></div>
                    </div>
              </div>
            </div>
          </div>   

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">User ID</label>
                <div class="col-sm-9 col-md-4">
                      <input id="app_sms_user_id"  value="<%=app_sms_user_id%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="60">
                      <div id="app_sms_user_id_error"  style="color:red"></div>
              </div>
              </div>
            </div>
          </div>   

           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">Password</label>
                <div class="col-sm-9 col-md-4">
                    <input id="app_sms_user_password" value="<%=app_sms_user_password%>" name="faqquestion" type="password" class="form-control" maxlength="60">
                <div id="app_sms_user_password_error"  style="color:red"></div>
              </div>
              </div>
            </div>
          </div>       

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">Registerd Phone</label>
                <div class="col-sm-9 col-md-4">
                    <input id="app_sms_registered_phone_number" value="<%=app_sms_registered_phone_number%>" name="faqquestion" type="text" class="form-control" maxlength="10">
                <div id="app_sms_registered_phone_number_error"  style="color:red"></div>
              </div>
              </div>
            </div>
          </div>  
         
           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">Authentication Token</label>
                <div class="col-sm-9 col-md-4">
                    <input id="app_sms_gateway_authentication_tocken" value="<%=app_sms_gateway_authentication_tocken%>" name="faqquestion" type="text" class="form-control" maxlength="150">
                    <div id="app_sms_gateway_authentication_tocken_error"  style="color:red"></div>
               </div>
              </div>
            </div>
          </div>  

           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label"> SMS API ID</label>
                <div class="col-sm-9 col-md-4">
                    <input id="app_sms_gateway_api_id" value="<%=app_sms_gateway_api_id%>" name="faqquestion" type="text" class="form-control" maxlength="150">
                 <div id="app_sms_gateway_api_id_error"  style="color:red"></div>
               </div>
              </div>
            </div>
          </div>  

           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-12">
                  <button type="submit" id="save-sms"  name="btnSubmit" class="btn btn-raised btn-black">Save</button>
                   <button type="submit" id="cancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>                  
                </div>
              </div>
            </div>
          </div>
         
        </fieldset>
      </form>
    </div>
  </div>
</script>

  <!-- city -->

  <script type="text/template" id="cityPageTpl">
    <div class="widget">
    <div class="widget-heading">
      <h3 class="widget-title">City</h3>
    </div>
    <div class="widget-body" style="padding:6px;">
    <form class="form-horizontal">
           <fieldset>                  

              <div class="form-group">
                    <div class="col-sm-offset-8 col-sm-12" >
                     <div class="col-sm-8 col-md-2">
                            <input id="city_search" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                    </div>
                      <button type="button" id="create-city"   name="btnSubmit" class="btn btn-raised btn-black">Add</button> 
                      <button id="city_deleteall" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                    </div>
              </div>


          <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
            <thead>
              <tr  class="trrc">
               <!--  <th>#</th> -->           
                <th>City Name</th>
                 <th>Short Name</th>
                 <th>State Name</th>
                <th>Country Name</th>               
                 <th>Status</th>                 
                <th>Actions</th>   
                   
              </tr>
            </thead>
            <tbody id="cityList">
            </tbody>
          </table>   

               <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-4" >                          
                      <button id="city_load_more" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                    </div>
              </div>
         <div id="myModalCity" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete City</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="cityid">
                  <button type="button" class="btn btn-black" id="del_city_id">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>
         
        </fieldset>
        </form>
    </div>
  </div>
</script>

<script type="text/template" id="cityTemplate">
        <td><a  data-container="body" data-toggle="popover" data-content="<%=city_full_name%>" ><%=(city_full_name.length > 50 ? city_full_name.substring(0, 50) + "..." : city_full_name)%></a>
        </td>

        <td><%=code%>
        </td>

        <td><a  data-container="body" data-toggle="popover" data-content="<%=state_full_name%>" ><%=(state_full_name.length > 25 ? state_full_name.substring(0, 25) + "..." : state_full_name)%></a>
        </td>

        <td><a  data-container="body" data-toggle="popover" data-content="<%=country_full_name%>" ><%=(country_full_name.length > 25 ? country_full_name.substring(0, 25) + "..." : country_full_name)%></a>
        </td>

      <td><%=is_active%></td>       

     <!-- 
      <td><a id="edit-city" data-toggle="tooltip" data-placement="top" title="Edit"><img src="images/edit.png" /></a> <a href="#">Activate</a>  <a id="del-city" data-toggle="tooltip" data-placement="top" title="Delete"><img src="images/delete.png" /></a></td> -->
        <td>
          <span style="display:inline-block; width: 20px;">
          <a id="edit-city" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
          </span>
          <span style="display:inline-block; width: 20px;">
          <a id="activate_city" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
          </span>
          <span style="display:inline-block; width: 20px;">
          <a id="del-city" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModal" data-toggle="modal" data-target="#myModalCity"><i class="glyphicon glyphicon-minus-sign"></i></a>
          </span>
        </td>

</script>


<!--city -->
<script type="text/template" id="cityCreateTpl"> 
   <div class="widget-body" style="padding:6px;">
    <h3 class="widget-title">Create City</h3>
      <form id="form" class="form-horizontal">
        <fieldset>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">Zone</label>
                <div class="col-sm-9 col-md-4">
                  <select id="select_zone" name="faqcategory" class="form-control">
                           <option value="">--Please Select--</option>
                  </select> 
                   <div id="zone_name_error" style="color:red"></div>
                  </div>
              </div>
            </div>
          </div> 

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">Country</label>
                <div class="col-sm-9 col-md-4">
                    <select id="select_country" name="faqcategory" class="form-control">
                           <option value="">--Please Select--</option>
                    </select>  
                    <div id="country_name_error" style="color:red"></div> 
                    </div>        
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqquestion" class="col-sm-3 col-md-4 control-label">State</label>
                <div class="col-sm-9 col-md-4">
                     <select id="select_state" name="faqcategory" class="form-control">
                            <option value="">--Please Select--</option>
                      </select> 
                      <div id="state_id_error" style="color:red"></div>  
                    </div>          
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="cityName" class="col-sm-3 col-md-4 control-label">City Name</label>
                <div class="col-sm-9 col-md-4">
                     <input id="city_full_name" name="txtFirstNameBilling" type="text" class="form-control" maxlength="50">
                      <div id="city_full_name_error" style="color:red"></div>
                </div>
               
              </div>
            </div>
          </div>

           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="cityCode" class="col-sm-3 col-md-4 control-label">Sort Name</label>
                <div class="col-sm-9 col-md-4">
                     <input id="cty_code" name="txtFirstNameBilling" type="text" class="form-control" maxlength="3">
                      <div id="cty_code_error" style="color:red"></div>
                </div>
               
              </div>
            </div>
          </div>

           <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-12">
                      <button type="submit" id="save-city"  name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button>
                       <button type="submit" id="cancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                      
                    </div>
              </div>
            </div>
          </div>
</script>

<script type="text/template" id="cityEditFormTpl">
  
    <div class="widget-body" style="padding:6px;">
     <h3 class="widget-title">Edit City</h3>
      <form id="form" class="form-horizontal">                
        <fieldset>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">Zone</label>
                <div class="col-sm-9 col-md-4">
                     <select id="select_zone" name="faqcategory" class="form-control">
                  <option value="">--Please Select--</option>
                  </select>
                   <div id="zone_name_error" style="color:red"></div> 
                  
              </div>
            </div>
          </div>
          </div> 

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">Country</label>
                <div class="col-sm-9 col-md-4">
                   <select id="select_country" name="faqcategory" class="form-control">
                    <option value="">--Please Select--</option>
                    </select> 
                     <div id="country_name_error" style="color:red"></div>                    
              </div>
            </div>
          </div>  
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">State</label>
                <div class="col-sm-9 col-md-4">
                   <select id="select_state" name="faqcategory" class="form-control">
                      <option value="">--Please Select--</option>
                      </select>                        
                      <div id="state_id_error" style="color:red"></div> 
                    </div>
              </div>
            </div>
          </div> 

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">City Name</label>
                <div class="col-sm-9 col-md-4">
                    <input id="city_full_name"  value="<%=city_full_name%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="50">   
                     <div id="city_full_name_error" style="color:red"></div>          
                </div>
              </div>
            </div>
          </div>

           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="cityCode" class="col-sm-3 col-md-4 control-label">Short Name</label>
                <div class="col-sm-9 col-md-4">
                     <input id="cty_code" name="txtFirstNameBilling" value="<%=code%>" type="text" class="form-control" maxlength="3">
                      <div id="cty_code_error" style="color:red"></div>
                </div>
               
              </div>
            </div>
          </div>

           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-12">
                  <button type="submit" id="save-city"  name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button>
                   <button type="submit" id="cancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>                  
                </div>
              </div>
            </div>
          </div>
         
        </fieldset>
      </form>
    </div>
  </div>
</script>

 <!-- state -->

  <script type="text/template" id="statePageTpl">
    <div class="widget">
    <div class="widget-heading">
      <h3 class="widget-title">States</h3>
    </div>
    <div class="widget-body" style="padding:6px;">
    <form class="form-horizontal">
           <fieldset>                  

              <div class="form-group">
                    <div class="col-sm-offset-8 col-sm-12" >
                     <div class="col-sm-8 col-md-2">
                            <input id="state_search" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                    </div>
                      <button type="button" id="create-state"   name="btnSubmit" class="btn btn-raised btn-black">Add</button> 
                      <button id="state_deleteall" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                    </div>
              </div>


          <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
            <thead>
              <tr  class="trrc">

                <th> Name</th>
                 <th>Short Name</th>
                <th>Country Name</th>
                 <th>States</th>
               <!--  <th>Zone</th>   -->
                <th>Actions</th>                 
              </tr>
            </thead>
            <tbody id="stateList">
            </tbody>
          </table>   

               <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-4" >                          
                      <button  id="state_load_more" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                    </div>
              </div>
        <div id="myModalState" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete State</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="statid">
                  <button type="button" class="btn btn-black" id="del_state_id">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>
         
        </fieldset>
        </form>
    </div>
  </div>
</script>

<script type="text/template" id="stateTemplate">
   <td><a  data-container="body" data-toggle="popover" data-content="<%=state_full_name%>" ><%=(state_full_name.length > 50 ? state_full_name.substring(0, 50) + "..." : state_full_name)%></a>
        </td>
      <td><%=code%></td>
      <td><a  data-container="body" data-toggle="popover" data-content="<%=country_full_name%>" ><%=(country_full_name.length > 50 ? country_full_name.substring(0, 50) + "..." : country_full_name)%></a>
        </td>
      <td><%=is_active%></td>
      <!-- <td><%=zone_area_id%></td> -->
    
      <!-- <td><a id="edit-state">Edit</a> <a href="#">Activate</a>  <a id="del-state">Delete</a> -->
       <td>
          <span style="display:inline-block; width: 20px;">
          <a id="edit-state" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
          </span>
          <span style="display:inline-block; width: 20px;">
          <a id="activate_state" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
          </span>
          <span style="display:inline-block; width: 20px;">
          <a id="del-state" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModalState"><i class="glyphicon glyphicon-minus-sign"></i></a>
          </span>
        </td>

</script>

<!-- state-->

<script type="text/template" id="stateCreateTpl">
  
   <div class="widget-body" style="padding:6px;">
    <h3 class="widget-title">Create State</h3>
      <form id="form" class="form-horizontal">
        <fieldset>
        
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqcategory" class="col-sm-3 col-md-4 control-label"> Name</label>
                <div class="col-sm-9 col-md-4">
                     <input id="state_full_name" name="txtFirstNameBilling" type="text" class="form-control" maxlength="50">
                       <div id="state_full_name_error" style="color:red"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqcategory" class="col-sm-3 col-md-4 control-label">Short Name</label>
                <div class="col-sm-9 col-md-4">
                     <input id="st_code" name="txtFirstNameBilling" type="text" class="form-control" maxlength="3">
                       <div id="st_code_error" style="color:red"></div>
                </div>
              </div>
            </div>
          </div> 
           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">Zone</label>
                <div class="col-sm-9 col-md-4">
                  <select id="select_zone" name="faqcategory" class="form-control">
                            <option value="">--Please Select--</option>
                  </select> 
                     <div id="zone_id_error" style="color:red"></div>
                  </div>
              </div>
            </div>
          </div> 


          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqquestion" class="col-sm-3 col-md-4 control-label">Country</label>
                <div class="col-sm-9 col-md-4">
                     <select id="select_country" name="faqcategory" class="form-control">
                            <option value="">--Please Select--</option>
                      </select>  
                      <div id="country_id_error" style="color:red"></div> 
                    </div>
              </div>
            </div>
          </div>          

    

           <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-12">
                      <button type="submit" id="save-state"  name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button>
                       <button type="submit" id="cancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                      
                    </div>
              </div>
            </div>
          </div>
</script>

<script type="text/template" id="stateEditFormTpl">
  
    <div class="widget-body" style="padding:6px;">
     <h3 class="widget-title">Edit State</h3>
      <form id="form" class="form-horizontal">                
        <fieldset>
         

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
              <input id="state_id" type="hidden" class="form-control" value="<%=state_id%>" />
                <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">State Name</label>
                <div class="col-sm-9 col-md-4">
                    <input id="state_full_name"  value="<%=state_full_name%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="50">    
                    <div id="state_full_name_error" style="color:red"></div>         
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqcategory" class="col-sm-3 col-md-4 control-label">Short Name</label>
                <div class="col-sm-9 col-md-4">
                     <input id="st_code" value="<%=code%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="3">
                       <div id="st_code_error" style="color:red"></div>
                </div>
              </div>
            </div>
          </div>
           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">Zone</label>
                <div class="col-sm-9 col-md-4">
                     <select id="select_zone" name="faqcategory" class="form-control">
                            <option value="">--Please Select--</option>
                  </select>
                  <div id="zone_id_error" style="color:red"></div>
              </div>
            </div>
          </div> 

           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">Country</label>
                <div class="col-sm-9 col-md-4">
                   <select id="select_country" name="faqcategory" class="form-control">
                            <option value="">--Please Select--</option>
                    </select> 
                    <div id="country_id_error" style="color:red"></div> 
              </div>
            </div>
          </div>       

        
 
         
           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-12">
                  <button type="submit" id="save-state"  name="btnSubmit" class="btn btn-raised btn-black">Save</button>
                   <button type="submit" id="cancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>                  
                </div>
              </div>
            </div>
          </div>
         
        </fieldset>
      </form>
    </div>
  </div>
</script>

<!-- country -->

  <script type="text/template" id="countryPageTpl">
    <div class="widget">
    <div class="widget-heading">
      <h3 class="widget-title">Countries</h3>
    </div>
    <div class="widget-body" style="padding:6px;">
    <form class="form-horizontal">
           <fieldset>                  
              <div class="form-group">
                    <div class="col-sm-offset-8 col-sm-12" >
                     <div class="col-sm-8 col-md-2">
                            <input id="country_search" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                    </div>
                      <button type="button" id="create-country"   name="btnSubmit" class="btn btn-raised btn-black">Add</button> 
                      <button id="country_deleteall" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                    </div>
              </div>


          <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
            <thead>
              <tr  class="trrc">
                <th>Name</th>
                <th>Short Name</th>
                <th>Phone Code</th>
                 <th>Zone</th>  
                <th>Status</th>               
                <th>Actions</th>                 
              </tr>
            </thead>
            <tbody id="countryList">
            </tbody>
          </table>   

               <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-4" >                          
                      <button  id="country_load_more" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                    </div>
              </div>
        <div id="myModalCountry" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Country</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="countrid">
                  <button type="button" class="btn btn-black" id="del_Country_id">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>
         
        </fieldset>
        </form>
    </div>
  </div>
</script>

<script type="text/template" id="countryTemplate">
<td><a  data-container="body" data-toggle="popover" data-content="<%=country_full_name%>" ><%=(country_full_name.length > 50 ? country_full_name.substring(0, 50) + "..." : country_full_name)%></a>
        </td>
      
      <td><%=country_short_name%></td>
      <td><%=country_phonecode%></td>
      <td><%=zone_name%></td>
      <td><%=is_active%></td>
     
      <td>
          <span style="display:inline-block; width: 20px;">
          <a id="edit-country" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
          </span>
          <span style="display:inline-block; width: 20px;">
          <a id="activate_country" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
          </span>
          <span style="display:inline-block; width: 20px;">
          <a id="del-country" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModalCountry"><i class="glyphicon glyphicon-minus-sign"></i></a>
          </span>
      </td> 

</script>

<script type="text/template" id="countryCreateTpl">
  
   <div class="widget-body" style="padding:6px;">
    <h3 class="widget-title">Create Country </h3>
      <form id="form" class="form-horizontal">
        <fieldset>
 
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqcode" class="col-sm-3 col-md-4 control-label">Name</label>
                <div class="col-sm-9 col-md-4">
                    <input id="country_full_name" name="faqcode" type="text" class="form-control" maxlength="50">
                      <div id="country_full_nameerror" style="color:red"></div>
                    </div>
              </div>
            </div>
          </div>   


          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqcategory" class="col-sm-3 col-md-4 control-label">Short Name</label>
                <div class="col-sm-9 col-md-4">
                     <input id="country_short_name" name="txtFirstNameBilling" type="text" class="form-control" maxlength="3">
                      <div id="country_short_name_error" style="color:red"></div>
                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqquestion" class="col-sm-3 col-md-4 control-label">Phone Code</label>
                <div class="col-sm-9 col-md-4">
                   <input id="country_phonecode" name="txtFirstNameBilling" type="text" class="form-control" maxlength="3">
                <div id="country_phonecode_error" style="color:red"></div>
                </div>
              </div>
            </div>
          </div> 
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">Zone</label>
                <div class="col-sm-9 col-md-4">
                  <select id="select_zone" name="faqcategory" class="form-control">
                        <option value="">--Please Select--</option>
                  </select> 
                   <div id="zone_id_error" style="color:red"></div>
                  </div>
              </div>
            </div>
          </div>    

             

           <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-12">
                      <button type="submit" id="save-country"  name="btnSubmit" class="btn btn-raised btn-black"  data-toggle="modal" data-target="#myModalPopup">Save</button>
                       <button type="submit" id="cancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                      
                    </div>
              </div>
            </div>
          </div>
</script>

<script type="text/template" id="countryEditFormTpl">
  
    <div class="widget-body" style="padding:6px;">
     <h3 class="widget-title">Edit country</h3>
      <form id="form" class="form-horizontal">                
        <fieldset>
       
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label"> Name</label>
                <input id="country_id" type="hidden" class="form-control" value="<%=country_id%>" />
                <div class="col-sm-9 col-md-4">
                    <input id="country_full_name" value="<%=country_full_name%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="50">
                    <div id="country_full_nameerror" style="color:red"></div>
                    </div>
              </div>
            </div>
          </div>   


          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Short Name</label>
                <div class="col-sm-9 col-md-4">
                    <input id="country_short_name"  value="<%=country_short_name%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="3">
                    <div id="country_short_name_error" style="color:red"></div>             
                </div>
              </div>
            </div>
          </div>

           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">Phone Code</label>
                <div class="col-sm-9 col-md-4">
                   <input id="country_phonecode"  value="<%=country_phonecode%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="3" >
                   <div id="country_phonecode_error" style="color:red"></div>   
              </div>
            </div>
          </div>
           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="faqanswer" class="col-sm-3 col-md-4 control-label">Zone</label>
                <div class="col-sm-9 col-md-4">
                     <select id="select_zone" name="faqcategory" class="form-control">
                           <option value="">--Please Select--</option>
                  </select>
              </div>
            </div>
          </div>         

          
         
           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-12">
                  <button type="submit" id="save-country"  name="btnSubmit" class="btn btn-raised btn-black">Save</button>
                   <button type="submit" id="cancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>                  
                </div>
              </div>
            </div>
          </div>
         
        </fieldset>
      </form>
    </div>
  </div>
</script>

  <script type="text/template" id="addressTypePageTpl">
          <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Address Type</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form  class="form-horizontal">
                   <fieldset>                  

                      <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <div class="col-sm-8 col-md-2">
                                  <input id="addressTypeSearch" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                            </div>
                              <button type="submit" id="create_addresstype" name="btnSubmit" class="btn btn-raised btn-black">Add</button> 
                              <button id="addresstype_deleteall" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                            </div>
                      </div>


                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr  class="trrc">
                        <th>Address Type</th>                               
                        <th>Status</th>
                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="address_type_list">                        
                    </tbody>
                       <div id="findStatus"></div>
                  </table>   

                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button id="addresstype_load_more" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>
            <div id="myModalAddtype" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Address Type</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="addtypeid">
                  <button type="button" class="btn btn-black" id="del_add_type">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>
                 
                </fieldset>
                </form>
            </div>
          </div>
  </script>
  <script type="text/template" id="addressTypeTemplate">

        <td><a  data-container="body" data-toggle="popover" data-content="<%=add_type_name%>" ><%=(add_type_name.length > 50 ? add_type_name.substring(0, 50) + "..." : add_type_name)%></a>
        </td>
            
            <td><%=is_active%></td>
            <td>

              <span style="display:inline-block; width: 20px;">
              <a id="edit-address-type" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
              </span>
              <span style="display:inline-block; width: 20px;">
              <a id="activate-address-type" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
              </span>
              <span style="display:inline-block; width: 20px;">
              <a id="delete-address-type" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModalAddtype"><i class="glyphicon glyphicon-minus-sign"></i></a>
              </span>
            </td>
                    
  </script>

  <script type="text/template" id="addressTypeCreateFormTpl">
    
           <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create Address Type</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Address Type</label>
                        <div class="col-sm-9 col-md-4">
                          <input id="addresstype_name" name="txtFirstNameBilling" type="text" class="form-control" maxlength="150">
                          <div id="addresstype_name_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="save_addresstype" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button> 
                               <button type="submit" id="cancel_addresstype" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
  </script>

   <script type="text/template" id="addressTypeEditFormTpl">
    
           <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Edit Address Type</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>
               <input id="addresstype_id" name="txtFirstNameBilling" value="<%=add_type_id%>" type="hidden" class="form-control">

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Address Type</label>
                        <div class="col-sm-9 col-md-4">
                          <input id="addresstype_name" value="<%=add_type_name%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="150">
                          <div id="addresstype_name_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>
   

                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="save_addresstype" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button> 
                               <button type="submit" id="cancel_addresstype" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
  </script>

<!-- Schedule -->
<script type="text/template" id="schedulePageTpl">
  <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Assesments</h3>
            </div>
            <div class="widget-body" style="padding:6px;">

               <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                              <button type="submit" id="schedule" name="btnSubmit" class="btn btn-raised btn-black">Schedule</button> 
                            </div>
                      </div>
                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr  class="trrc">
                       <!--  <th>#</th> -->
                        <th>Candiate Name</th>
                        <th>Category</th>
                        <th>Subject</th>
                        <th>Topic</th>
                        <th>Created On</th>
                        <th>Scheduled On</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Status</th>
                        <th>Actions</th>                       
                      </tr>
                      <!--  <tr>
                        <th>1</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><a id="schedule">Schedule</a>  <a id="reSchedule">Re-Schedule</a></th>                       
                      </tr> -->
                    </thead>
                    <tbody id="scheduleList">
                    </tbody>
                  </table>   
            </div>
          </div>

</script>

<script type="text/template" id="scheduleTemplate">
      <td><%=category_id%></td>
      <td><%=subject_id%></td>
      <td><%=topic_id%></td>
      <td><%=created_on_timestamp%></td>
      <td></td>
      <td><%=start_time%></td>
      <td><%=end_time%></td>      
      <td><%=is_active%></td>
      <td> <a id="reSchedule">Re-Schedule</a></td>
              
  </script>

<script type="text/template" id="createScheduleTpl">
 <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Schedule Assesment</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
                <form id="form" class="form-horizontal">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Candidate Id</label>
                        <div class="col-sm-9 col-md-4">
                              <input id="user_id" name="txtFirstNameBilling" type="text" class="form-control" >
                        </div>
                      </div>
                    </div>
                  </div>                   

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Category</label>
                        <div class="col-sm-9 col-md-4">
                            <select id="category_id" name="ddlCountryBilling" class="form-control">
                            <option value="">--Please Select--</option>
                            <option value="1">Engineering</option>
                            <option value="2">Agriculture</option>
                           </select> 
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Subject</label>
                         <div class="col-sm-9 col-md-4">
                          <select id="subject_id" name="ddlCountryBilling" class="form-control">
                            <option value="">--Please Select--</option>
                            <option value="1">Computer</option>
                            <option value="2">Science</option>
                           </select> 
                            </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Topic</label>
                        <div class="col-sm-9 col-md-4">
                            <select id="topic_id" name="ddlCountryBilling" class="form-control">
                            <option value="">--Please Select--</option>
                            <option value="1">pgm</option>
                            <option value="2">land</option>
                           </select> 
                        </div>
                      </div>
                    </div>
                  </div>

                   <!-- <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Created On</label>
                        <div class="col-sm-9 col-md-4">
                              <input id="createdOn" name="txtFirstNameBilling" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>
 -->

                 <!--  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Valid On</label>
                        <div class="col-sm-9 col-md-4">
                              <input id="validityOn" name="txtFirstNameBilling" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div> -->


                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Exam Date</label>
                        <div class="col-sm-9 col-md-4">
                          <div id="datetimepicker1" class="input-group date">
                            <input type="text" id="exam_date" data-date-format='YYYY-MM-DD' class="form-control">
                            <span class="input-group-addon"><span class="ti-calendar"></span></span>
                      </div>
                        </div>
                      </div>
                    </div>
                  </div>



                 <!-- <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Start time</label>
                        <div class="col-sm-9 col-md-4">
                              <div id="datetimepicker3" class="input-group date">
                              <input type="text" id="start_time" class="form-control"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">End time</label>
                        <div class="col-sm-9 col-md-4">
                              <div id="datetimepicker3" class="input-group date">
                              <input type="text" id="end_time" class="form-control"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div> -->

                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="button" name="btnSubmit" id="create-schedule" class="btn btn-raised btn-black">Save</button>   
                              <button type="button" name="btnSubmit" id="cancel-schedule" class="btn btn-raised btn-black">Cancel</button> 

                            </div>
                      </div>
                    </div>
                  </div>
                  </form>
            </div>
          </div>

        </div>
        </div>
    </script>

<script type="text/template" id="editScheduleTpl">
  
    <div class="widget-body" style="padding:6px;">
      <form id="form" class="form-horizontal">                
        <fieldset>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Candidate Id</label>
                <input id="exam_schedule_id" type="hidden" class="form-control" value="<%=exam_schedule_id%>" />
                <div class="col-sm-9 col-md-4">
                    <input id="user_id" value="<%=user_id%>" name="txtFirstNameBilling" type="text" class="form-control">
                </div>
              </div>
            </div>
          </div>   


          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Category</label>
                <div class="col-sm-9 col-md-4">
                          <select id="category_id" name="ddlCountryBilling" class="form-control">
                            <option value="">--Please Select--</option>
                            <option value="1">Engineering</option>
                            <option value="2">Agriculture</option>
                           </select>           
                    </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Subject</label>
                <div class="col-sm-9 col-md-4">
                      <select id="subject_id" name="ddlCountryBilling" class="form-control">
                            <option value="">--Please Select--</option>
                            <option value="1">Computer</option>
                            <option value="2">Science</option>
                      </select> 
                    </div>
              </div>
            </div>
          </div>   

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Topic</label>
                <div class="col-sm-9 col-md-4">
                      <select id="subject_id" name="ddlCountryBilling" class="form-control">
                            <option value="">--Please Select--</option>
                            <option value="1">Computer</option>
                            <option value="2">Science</option>
                      </select> 
              </div>
            </div>
          </div>   

           <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Exam Date</label>
                    <div class="col-sm-9 col-md-4">
                      <div id="datetimepicker1" class="input-group date">
                        <input type="text" id="exam_date" value="<%=exam_date%>" data-date-format='YYYY-MM-DD' class="form-control">
                        <span class="input-group-addon"><span class="ti-calendar"></span></span>
                  </div>
                    </div>
                  </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-12">
                          <button type="button" name="btnSubmit" id="create-schedule" class="btn btn-raised btn-black">Save</button>   
                          <button type="button" name="btnSubmit" id="cancel-schedule" class="btn btn-raised btn-black">Cancel</button> 
                        </div>
                  </div>
                </div>
            </div>

        </fieldset>
      </form>
    </div>
  </div>
</script> 

  <!--    Client      -->

<script type="text/template" id="clientPageTpl">
<div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Client List</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form  class="form-horizontal">
            <fieldset>                  
                <div class="form-group">
                      <div class="col-sm-offset-8 col-sm-12" >
                       <div class="col-sm-8 col-md-2">
                            <input id="clientSearch" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                      </div>
                       <button type="submit" id="create-client" name="btnSubmit" class="btn btn-raised btn-black">Add</button>
                        <button type="submit" name="btnSubmit" id="clientDelAll" class="btn btn-raised btn-black">Del All</button>
                      </div>
                </div>

                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr class="trrc">
                       <!--  <th>#</th> -->
                        <th>Name</th>
                        <th>Contact Name</th>
                        <th>Phone</th>
                        <th>Status</th>                  
                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="clientList">
                        
                    </tbody>
                  </table>   

                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button name="btnSubmit" id="clientLoadMore" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>
                <div id="myModalclient" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Client</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="clienid">
                  <button type="button" class="btn btn-black" id="del_clnt_id">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>

                 
                </fieldset>
                </form>
            </div>
          </div>
</script>

<script type="text/template" id="clientTemplate">
      <td><a  data-container="body" data-toggle="popover" data-content="<%=clnt_name%>" ><%=(clnt_name.length > 25 ? clnt_name.substring(0, 25) + "..." : clnt_name)%></a>
      </td>

      <td><a  data-container="body" data-toggle="popover" data-content="<%=clnt_contact_person_first_name%>" ><%=(clnt_contact_person_first_name.length > 8 ? clnt_contact_person_first_name.substring(0, 25) + "..." : clnt_contact_person_first_name)%></a>
      </td>

      <td><%=clnt_contact_person_off_phone%></td>
      <td><%=is_active%></td>     
      <td>

        <span style="display:inline-block; width: 20px;">
        <a id="edit-client" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
        </span>
         @if (Session::has('user_type') && Session::get('user_type') == 'S')               
               <span style="display:inline-block; width: 20px;">
        <a id="activate-client" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
        </span>
               <span style="display:inline-block; width: 20px;">
        <a id="delete-client" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModalclient"><i class="glyphicon glyphicon-minus-sign"></i></a>
        </span>   
              @endif
       
      
      </td>
  </script>

<script type="text/template" id="createClientTpl">
     <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create Client</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
                 
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

                     <div class="row">
                   <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">GST</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="gst_tax" name="txtCompanyBilling" type="text" class="form-control" maxlength="20">
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
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_contact_person_off_phone" placeholder="Number" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="10" style="margin-top: -31px;/*! margin-right: 160px; */margin: -33px 260px;width: 192px;">
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

              <div class="form-group">
                    <div class="col-sm-offset-9" >
                         <button id="register-client" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Register</button> 
                         <button id="register-cancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button> 
                    </div>
              </div>

            </div>
          </div>
      </script>

<script type="text/template" id="editClientTpl">
     <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Edit Client</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
                
              <form id="form-tabs" class="form-horizontal">
                <h3>Basic Infomation</h3>
                <fieldset>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                      <input id="clnt_id" type="hidden" class="form-control" value="<%=client_id%>" />
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Client Type</label>
                        <div class="col-sm-9 col-md-8">
                          <select id="clnt_type_id" name="ddlCreditCardType" class="form-control">
                            <option value="">--Please Select--</option>
                            <!-- <option value="1">IT</option>
                            <option value="2">Hospital</option> -->
                          </select>
                          <div id="clnt_type_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Corporate Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_name" name="txtLastNameBilling" value="<%=clnt_name%>" type="text" class="form-control" maxlength="150">
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
                          <input id="clnt_pan" name="txtCompanyBilling" value="<%=clnt_pan%>" type="text" class="form-control" maxlength="10">
                          <div id="clnt_pan_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Email</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_off_email_id" name="txtEmailAddressBilling" value="<%=clnt_off_email_id%>" type="text" class="form-control"  maxlength="30">
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
                          <input id="clnt_facbook_id" name="txtCompanyBilling" value="<%=clnt_facbook_id%>" type="text" class="form-control" maxlength="30">
                          <div id="clnt_facbook_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Twitter Id</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_twitter_id" name="txtEmailAddressBilling" value="<%=clnt_twitter_id%>" type="text" class="form-control" maxlength="30">
                          <div id="clnt_twitter_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                

                  <div class="row">
                    <!-- <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Logo</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_logo_file_name" name="txtCompanyBilling" value="<%=clnt_logo_file_name%>" type="text" class="form-control">
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
                           <!--  <option value="1">A</option>
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
                          <input id="tax_id" name="txtCompanyBilling" value="<%=tax_id%>" type="text" class="form-control" maxlength="150">
                          <div id="tax_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>

                    <div class="row">                   
                     <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">GST</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="gst_tax" name="txtCompanyBilling" value="<%=gst%>" type="text" class="form-control" maxlength="3">
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
                           <input id="website_url" name="txtCompanyBilling" value="<%=website_url%>" type="text" class="form-control" maxlength="30">
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
                          <input id="clnt_contact_person_first_name" name="txtCompanyBilling" value="<%=clnt_contact_person_first_name%>" type="text" class="form-control" maxlength="150">
                          <div id="clnt_contact_person_first_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Last Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_contact_person_last_name" value="<%=clnt_contact_person_last_name%>" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="150">
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
                          <input id="clnt_contact_person_mobile" value="<%=clnt_contact_person_mobile%>" name="txtCompanyBilling" type="text" class="form-control" maxlength="10">
                          <div id="clnt_contact_person_mobile_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                     <div class="form-group">
                       <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Office Phone</label>
                       <div class="col-sm-3 col-md-3">
                         <input id="phone_code1" placeholder="Code" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="5">
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
                         <!--  <input id="clnt_dept_name" value="<%=clnt_dept_name%>" name="txtCompanyBilling" type="text" class="form-control" maxlength="15">
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
                          <input id="clnt_contact_person_desgination" value="<%=clnt_contact_person_desgination%>" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="30">
                           <div id="clnt_contact_person_desgination_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

  

                </fieldset>
                  <h3>Address 1</h3>
                   <input    id="add_id1" type="hidden" value="<%=address[0].address_id%>" />
                <fieldset>
                  
                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                      <input id="clnt_id" type="hidden" class="form-control" value="<%=client_id%>" />
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
                          <textarea id="cust_add_line_1" name="txtAddress1Shipping" class="form-control" maxlength="150"><%=address[0].cust_add_line_1%></textarea>
                          <div id="cust_add_line_1_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress2Shipping" class="col-sm-3 col-md-4 control-label">Address 2</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_line_2" name="txtAddress2Shipping" class="form-control" maxlength="150" ><%=address[0].cust_add_line_2%></textarea>
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
                          <textarea id="cust_add_line_3" name="txtAddress1Shipping" class="form-control" maxlength="150"><%=address[0].cust_add_line_3%></textarea>
                           <div id="cust_add_line_3_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Land Mark</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_landmark" name="txtAddress1Shipping" class="form-control" maxlength="150"><%=address[0].cust_add_landmark%></textarea>
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
                           <!--  <option value="1">A</option>
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
                         <!--    <option value="1">A</option>
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
                           <!--  <option value="1">A</option>
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
                            <!-- <option value="1">A</option>
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
                  <input id="add_id2" type="hidden" value="<%=address[1].address_id%>" />
                <fieldset>
                  
                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                      <input id="clnt_id" type="hidden" class="form-control" value="<%=client_id%>" />
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
                          <textarea id="cust_add_1" name="txtAddress1Shipping" class="form-control" maxlength="150"><%=address[1].cust_add_line_1%></textarea>
                          <div id="cust_add_1_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress2Shipping" class="col-sm-3 col-md-4 control-label">Address 2</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_2" name="txtAddress2Shipping" class="form-control" maxlength="150"><%=address[1].cust_add_line_2%></textarea>
                           <div id="cust_add_2_error" style="color:red"></div>
                        </div>
                    </div>
                    </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Address 3</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_3" name="txtAddress1Shipping" class="form-control" maxlength="150"><%=address[1].cust_add_line_3%></textarea>
                          
                           <div id="cust_add_3_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Land Mark</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_landmark" name="txtAddress1Shipping" class="form-control" maxlength="150"><%=address[1].cust_add_landmark%></textarea>
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
                      <input id="clnt_id" type="hidden" class="form-control" value="<%=client_id%>" />
                        <label for="txtNameCard" class="col-sm-3 col-md-4 control-label">Security Question</label>
                         <div class="col-sm-9 col-md-8">
                          <select id="question_id" name="ddlCreditCardType" class="form-control">
                            <option value="">--Please Select--</option>
                            <!-- <option value="1">A</option>
                            <option value="2">B</option> -->
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
                          <input id="cust_answer" value="<%=security_qus.cust_answer%>" name="txtNameCard" type="text" class="form-control" maxlength="150">
                          <div id="cust_answer_error" style="color:red"></div>
                        </div>
                      </div>
                      </div>
                    </div>
                  </fieldset>
                  </form>

                   <div class="form-group">
                   <div class="col-sm-offset-9" >
                         <button id="register-client" name="btnSubmit" class="btn btn-raised btn-black">Register</button>                  
                         <button id="register-cancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button> 
                    </div>
                  </div>

              </div>
            </div>
                       
    </script>


      <script type="text/template" id="departmentPageTpl">
                <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Department</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form  class="form-horizontal">
                   <fieldset>                  

                      <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <div class="col-sm-8 col-md-2">
                            <input id="departmentSearch" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                            </div>

                              <button type="button" id="create-department" name="btnSubmit" class="btn btn-raised btn-black">Add</button> <button id="department_deleteall" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                            </div>
                      </div>

                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr  class="trrc">
                        <th>Name</th>
                        <th>Status</th>             
                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="departmentList">
                    </tbody>
                    <div id="findStatus"></div>
                  </table>   


                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button id="department_load_more" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>
            <div id="myModaldepart" class="modal fade" role="dialog">
                <div class="modal-dialog">       
                     <div class="modal-content">
                         <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Department</h4>
                           </div>
                      <div class="modal-body" id ="com_ques">
                     <div id="texval"></div>
                <h5>Do You Want to Continue ?<div></div></h5>     
            </div>
                   <div class="modal-footer">
                   <input type="hidden" id="departid">
                  <button type="button" class="btn btn-black" id="del_department">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>

                </fieldset>
                </form>
            </div>
          </div>
        </script>
   <script type="text/template" id="departmentTemplate">

    <td><a  data-container="body" data-toggle="popover" data-content="<%=emp_dept_name%>" ><%=(emp_dept_name.length > 50 ? emp_dept_name.substring(0, 50) + "..." : emp_dept_name)%></a>
    </td>

        <td><%=is_active%></td> 
        <td>

    <span style="display:inline-block; width: 20px;">
    <a id="edit-department" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
    </span>
    <span style="display:inline-block; width: 20px;">
    <a id="activate-department" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
    </span>
    <span style="display:inline-block; width: 20px;">
    <a id="delete-depart" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModaldepart"><i class="glyphicon glyphicon-minus-sign"></i></a>
    </span>
</td>
  </script>
        <script type="text/template" id="departmentCreateFormTpl">
            <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create Department</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                <fieldset>
     
                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="emp_dept_name" class="col-sm-3 col-md-4 control-label">Department Name</label>
                        <div class="col-sm-9 col-md-4">
                              <input id="emp_dept_name" name="emp_dept_name" type="text" class="form-control" maxlength="30"> 
                           <div id="emp_dept_name_error" style="color:red"></div>          
                            </div>
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="department-save" name="department-save" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button>  
                              <button name="department-cancel" id="department-cancel" class="btn btn-raised btn-black">Cancel</button>
                            </div>
                      </div>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </script>
         <script type="text/template" id="departmentEditFormTpl">
            <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Edit Department</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                <fieldset>
               <input id="emp_dept_id" type="hidden" class="form-control" value="<%=emp_dept_id%>" />
           
                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="emp_dept_name" class="col-sm-3 col-md-4 control-label">Department Name</label>
                        <div class="col-sm-9 col-md-4">
                              <input id="emp_dept_name" value="<%=emp_dept_name%>" name="emp_dept_name" type="text" class="form-control" maxlength="30">
                              <div id="emp_dept_name_error" style="color:red"></div>           

                            </div>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="department-save" name="dapartment-save" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button>  
                              <button name="department-cancel" id="department-cancel" class="btn btn-raised btn-black">Cancel</button>

                            </div>
                      </div>
                    </div>
                  </div>

                </fieldset>
              </form>
            </div>
          </div>

        </script>
        <!-- file type -->
        <script type="text/template" id="FileTypePageTpl">
                <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">File Type</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form  class="form-horizontal">
                                   
                      <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <div class="col-sm-8 col-md-2">
                            <input id="fileTypeSearch" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                            </div>
                              <button type="button" id="create-filetype" name="btnSubmit" class="btn btn-raised btn-black">Add</button> 
                              
                              <button id="filetype_deleteall" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                            </div>
                      </div>
                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr  class="trrc">
                        
                        <th> Extension</th>  
                        <th> Description</th>   
                        <th>Status</th>        
                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="filetypeList"></tbody>
                     <div id="findStatus"></div>
                  </table>   
                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button id="filetype_load_more" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>
                <div id="myModalfile" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete File Type</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="filetyid">
                  <button type="button" class="btn btn-black" id="del_file_type">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>

                </form>
            </div>
          </div>
        </script>

        <script type="text/template" id="fileTypeTemplate">
        <td><a  data-container="body" data-toggle="popover" data-content="<%=file_type_extension%>" ><%=(file_type_extension.length > 50 ? file_type_extension.substring(0, 50) + "..." : file_type_extension)%></a></td>
        
        <td><a  data-container="body" data-toggle="popover" data-content="<%=file_type_description%>" ><%=(file_type_description.length > 50 ? file_type_description.substring(0, 50) + "..." : file_type_description)%></a></td>
           
           
            <td><%=is_active%></td>
            <td>
                <span style="display:inline-block; width: 20px;">
                <a id="edit-file-type" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
                </span>
                <span style="display:inline-block; width: 20px;">
                <a id="activate-file-type" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
                </span>
                <span style="display:inline-block; width: 20px;">
                <a id="delete-file-type" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModalfile"><i class="glyphicon glyphicon-minus-sign"></i></a>
                </span>
            </td>
        </script>

        <script type="text/template" id="filetypeCreateFormTpl">

         <div class="widget">
            <div class="widget-heading">
                 <h3 class="widget-title">Create File Type</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Extension</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="file_extension" name="txtFirstNameBilling" type="text" class="form-control" maxlength="10">
                            <div id="file_extension_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>   

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label"> Description</label>
                        <div class="col-sm-9 col-md-4">
                        <textarea id="file_name" name="txtFirstNameBilling" type="text" class="form-control" maxlength="200"></textarea>
                            <div id="file_name_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>   

                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="button" id="save-file" name="btnSubmit" class="btn btn-raised btn-black" >Save</button>
                               <button type="submit" id="cancel-file" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>



        </script>



        <script type="text/template" id="filetypeEditFormTpl">

         <div class="widget">
            <div class="widget-heading">
                 <h3 class="widget-title">Edit File Type</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>

                 <input id="file_type_id" value="<%=file_type_id%>" name="txtFirstNameBilling" type="hidden" class="form-control">

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Extension</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="file_extension" value="<%=file_type_extension%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="10">
                            <div id="file_extension_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div> 

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label"> Description</label>
                        <div class="col-sm-9 col-md-4">
                        <textarea id="file_name" name="txtFirstNameBilling" type="text" class="form-control" maxlength="200"><%=file_type_description%></textarea>
                            <div id="file_name_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>    

                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="button" id="save-file" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup" >Save</button>
                               <button type="submit" id="cancel-file" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>


        </script>



        <!--client type -->
         <script type="text/template" id="clientTypePageTpl">
                <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Client Type</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form  class="form-horizontal">
                   <fieldset>                  
                      <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <div class="col-sm-8 col-md-2">
                                   <input id="clientTypeSearch" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                            </div>
                              <button type="button" id="create-clienttype" name="btnSubmit" class="btn btn-raised btn-black">Add</button> <button id="clienttype_deleteall" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                            </div>
                      </div>
                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr  class="trrc">
                        <th>Name</th>     
                        <th>Status</th>        
                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="clienttypeList">
                    </tbody>
                     <div id="findStatus"></div>
                  </table>   
                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button id="clienttype_load_more" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>
                 <div id="myModalclnttype" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Client Type</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="clnttypeid">
                  <button type="button" class="btn btn-black" id="del_clnt_type">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>

                </fieldset>
                </form>
            </div>
          </div>
        </script>
  <script type="text/template" id="clientTypeTemplate">
       <td><a  data-container="body" data-toggle="popover" data-content="<%=clnt_type_name%>" ><%=(clnt_type_name.length > 50 ? clnt_type_name.substring(0, 50) + "..." : clnt_type_name)%></a>
        </td>
       
        <td><%=is_active%></td>
        <td>

    <span style="display:inline-block; width: 20px;">
    <a id="edit-client-type" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
    </span>
    <span style="display:inline-block; width: 20px;">
    <a id="activate-client-type" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
    </span>
    <span style="display:inline-block; width: 20px;">
    <a id="delete-client-type" data-toggle="tooltip" data-placement="top" title="Delete"data-toggle="modal" data-target="#myModalclnttype"><i class="glyphicon glyphicon-minus-sign"></i></a>
    </span>
</td>
        </script>
        <script type="text/template" id="clientTypeCreateFormTpl">
            <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create Client Type</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                <fieldset>
                 <!--  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="clnt_type_code" class="col-sm-3 col-md-4 control-label">Client Code</label>
                        <div class="col-sm-9 col-md-4">
                                    <input id="clnt_type_code" name="clnt_type_code" type="text" class="form-control">  
                            <div id="clnt_type_code_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div> -->
                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="clnt_type_name" class="col-sm-3 col-md-4 control-label">Client Type</label>
                        <div class="col-sm-9 col-md-4">
                                <input id="clnt_type_name" name="clnt_type_name" type="text" class="form-control" maxlength="60"> 
                           <div id="clnt_type_name_error" style="color:red"></div>          
                            </div>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="clienttype-save" name="clienttype-save" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button>  
                              <button name="clienttype-cancel" id="clienttype-cancel" class="btn btn-raised btn-black">Cancel</button>
                            </div>
                      </div>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </script>
         <script type="text/template" id="clientTypeEditFormTpl">
            <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Edit Client Type</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                <fieldset>
               <input id="clnt_type_id" type="hidden" class="form-control" value="<%=clnt_type_id%>" />
                 <!--  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="clnt_type_code" class="col-sm-3 col-md-4 control-label">Client Code</label>
                        <div class="col-sm-9 col-md-4">
                                    <input id="clnt_type_code" value="<%=clnt_type_code%>" name="clnt_type_code" type="text" class="form-control"> 
                             <div id="clnt_type_code_error" style="color:red"></div>          
             
                            </div>
                      </div>
                    </div>
                  </div> -->
                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="clnt_type_name" class="col-sm-3 col-md-4 control-label">Client Name</label>
                        <div class="col-sm-9 col-md-4">
                                <input id="clnt_type_name" value="<%=clnt_type_name%>" name="clnt_type_name" type="text" class="form-control" maxlength="60">  
                       <div id="clnt_type_name_error" style="color:red"></div>          
                            </div>
                      </div>
                    </div>
                </div>
                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="clienttype-save" name="clienttype-save" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button>  
                              <button name="clienttype-cancel" id="clienttype-cancel" class="btn btn-raised btn-black">Cancel</button>

                            </div>
                      </div>
                    </div>
                  </div>

                </fieldset>
              </form>
            </div>
          </div>

     </script>
     <!-- Origin page-->

     <script type="text/template" id="originPageTpl">
       <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Origin</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form  class="form-horizontal">
                   <fieldset>                  

                      <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <div class="col-sm-8 col-md-2">
                                  <input id="origin_search" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                            </div>
                              <button type="submit" id="create_origin" name="btnSubmit" class="btn btn-raised btn-black">Add</button> <button id="origin_deleteall" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                            </div>
                      </div>


                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr  class="trrc">
                        <th>Origin</th>
                         <th>Status</th>        
                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="origin_list">
                        
                    </tbody>
                     <div id="findStatus"></div>
                  </table>   

                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button id="origin_load_more" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>
                <div id="myModalOrigin" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Origin</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="originid">
                  <button type="button" class="btn btn-black" id="del_origin_id">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>
                 
                </fieldset>
                </form>
            </div>
          </div>
</script>

<script type="text/template" id="originTemplate">

    <td><a  data-container="body" data-toggle="popover" data-content="<%=orig_type_name%>" ><%=(orig_type_name.length > 50? orig_type_name.substring(0, 50) + "..." : orig_type_name)%></a>
    </td>
    <td><%=is_active%></td>
    <td>
      <span style="display:inline-block; width: 20px;">
      <a id="edit_origin" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
      </span>
      <span style="display:inline-block; width: 20px;">
      <a id="activate_origin" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
      </span>
      <span style="display:inline-block; width: 20px;">
      <a id="del_origin" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModalOrigin"><i class="glyphicon glyphicon-minus-sign"></i></a>
      </span>
    </td> 
   

 </script>

<script type="text/template" id="OriginCreateFormTpl">
  
         <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create Origin</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Origin Name</label>
                        <div class="col-sm-9 col-md-4">
                       <input id="origin_name" name="txtFirstNameBilling" type="text" class="form-control" maxlength="150">
                       <div id="origin_name_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="save_origin" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button>  

                              <button type="submit" id="cancel_origin" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
</script>

<script type="text/template" id="OriginEditFormTpl">
  
         <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Edit Origin</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                       <input id="orig_type_id" type="hidden" class="form-control" value="<%=orig_type_id%>" />
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Origin Name</label>
                        <div class="col-sm-9 col-md-4">
                           <input id="origin_name"  value="<%=orig_type_name%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="150">
                           <div id="origin_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="save_origin" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button>  

                              <button type="submit" id="cancel_origin" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>

     </script>

     <!--    Client Group     -->

<script type="text/template" id="clientGroupPageTpl">
<div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Client Group List</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form  class="form-horizontal">
            <fieldset>                  
                <div class="form-group">
                      <div class="col-sm-offset-8 col-sm-12" >
                       <div class="col-sm-8 col-md-2">
                            <input id="clientGroupSearch" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                      </div>
                       <button type="submit" id="create-client-group" name="btnSubmit" class="btn btn-raised btn-black">Add</button>
                        <button type="submit" name="btnSubmit" id="clientGroupDellAll" class="btn btn-raised btn-black">Del All</button>
                      </div>
                </div>

                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr class="trrc">
                       <!--  <th>#</th> -->
                        <th>Name</th>
                        <th>Type</th>
                        <th>Contact Name</th>
                        <th>Phone</th>
                        <th>Status</th>                
                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="clientGroupList">
                        
                    </tbody>
                    <div id="findStatus"></div>
                  </table>   

                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button name="btnSubmit" id="clientGroupLoadMore" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>
                      <div id="myModalClntGr" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Client Group</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="clntgrid">
                  <button type="button" class="btn btn-black" id="del_clnt_grop">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>

                 
                </fieldset>
                </form>
            </div>
          </div>
</script>

<script type="text/template" id="clientgroupTemplate">
      <td><a  data-container="body" data-toggle="popover" data-content="<%=clnt_group_name%>" ><%=(clnt_group_name.length > 25 ? clnt_group_name.substring(0, 25) + "..." : clnt_group_name)%></a>
      </td>

      <td><%=user_type_id%></td>

      <td><a  data-container="body" data-toggle="popover" data-content="<%=clnt_group_contact_person_first_name%>" ><%=(clnt_group_contact_person_first_name.length > 25 ? clnt_group_contact_person_first_name.substring(0, 25) + "..." : clnt_group_contact_person_first_name)%></a>
      </td>

      <td><%=clnt_group_contact_person_off_phone%></td>   
      <td><%=is_active%></td>
      <td> 
        <span style="display:inline-block; width: 20px;">
        <a id="edit-client-group" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
        </span>
        <span style="display:inline-block; width: 20px;">
        <a id="activate-client-group" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
        </span>
        <span style="display:inline-block; width: 20px;">
        <a id="delete-client-group" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModalClntGr"><i class="glyphicon glyphicon-minus-sign"></i></a>
        </span>

      </td>
              
  </script>

<script type="text/template" id="createClientGroupTpl">
     <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create Client Group</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
                 
              <form id="form-tabs" class="form-horizontal">
                <h3>Basic Infomation</h3>
                <fieldset>
          
                  <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Group Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_group_name" name="txtCompanyBilling" type="text" class="form-control" maxlength="150">
                          <div id="clnt_group_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">PAN</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_group_pan" name="txtCompanyBilling" type="text" class="form-control" maxlength="10">
                          <div id="clnt_group_pan_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>                    
                  </div>


                  <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Email</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_group_off_email_id" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="30">
                          <div id="clnt_group_off_email_id_error" style="color:red"></div>
                        </div>
                      </div>
                </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Facebook Id</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_group_facbook_id" name="txtCompanyBilling" type="text" class="form-control" maxlength="30">
                          <div id="clnt_group_facbook_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    
                  </div>

                 
                  <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Twitter Id</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_group_twitter_id" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="30">
                          <div id="clnt_group_twitter_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                   <!--  <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Logo</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_group_logo_file_name" name="txtCompanyBilling" type="text" class="form-control">
                        </div>
                      </div>
                    </div>      -->   
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Website URL</label>
                        <div class="col-sm-9 col-md-8">
                         <input id="website_url" name="txtCompanyBilling" type="text" class="form-control" maxlength="150">
                          <div id="website_url_error" style="color:red"></div>
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
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Origin</label>
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
                 <h3>Contact Person</h3>
                <fieldset>
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">First Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_group_contact_person_first_name" name="txtCompanyBilling" type="text" class="form-control" maxlength="150">
                          <div id="clnt_group_contact_person_first_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Last Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_group_contact_person_last_name" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="150">
                          <div id="clnt_group_contact_person_last_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label"> Mobile</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_group_contact_person_mobile" name="txtCompanyBilling" type="text" class="form-control" maxlength="10">
                          <div id="clnt_group_contact_person_mobile_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                       <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Office Phone</label>
                       <div class="col-sm-3 col-md-3">
                         <input id="phone_code1" placeholder="Code" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="10">
                         <div id="clnt_group_contact_person_off_phone_code_error" style="color:red"></div>
                       </div>
                       <div class="col-md-3">
                         <input id="clnt_group_contact_person_off_phone" placeholder="Number" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="10" style="margin-top: -31px; margin: 0px 0px;width: 170px"; >
                       <div id="clnt_group_contact_person_off_phone_error" style="color:red;width: 120px";></div>
                       </div>
                     </div>
                     </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Department</label>
                        <div class="col-sm-9 col-md-8">
                          <!-- <input id="clnt_group_dept_name" name="txtCompanyBilling" type="text" class="form-control" maxlength="15">
                           <div id="clnt_group_dept_name_error" style="color:red"></div> -->
                        <select id="clnt_group_dept_name" name="ddlCreditCardType" class="form-control">
                            <option value="">--Please Select--</option>                        
                          </select>
                          <div id="clnt_group_dept_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Designation</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_group_contact_person_desgination" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="30">
                          <div id="clnt_group_contact_person_desgination_error" style="color:red"></div>
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

                 <h3>Address 2</h3>
                <fieldset>
                  
                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Address Type</label>
                        <div class="col-sm-9 col-md-8">
                           <select value="2" id="address_type2" name="ddlCountryShipping" class="form-control">
                            <option value="">--Please Select--</option>
                            
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

              <div class="form-group">
                        <div class="col-sm-offset-9" >
                         <button id="register-client-group" name="btnSubmit" class="btn btn-raised btn-black">Register</button> 
                         <button id="registerCancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button> 
                    </div>
              </div>

            </div>
          </div>
</script>

<script type="text/template" id="editClientGroupTpl">
     <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Edit Client Group</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
                 
              <form id="form-tabs" class="form-horizontal">
                <h3>Basic Infomation</h3>
                <fieldset>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                       <input id="clnt_group_id" type="hidden" class="form-control" value="<%=clnt_group_id%>">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Group Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_group_name" name="txtCompanyBilling" value="<%=clnt_group_name%>" type="text" class="form-control" maxlength="150">
                          <div id="clnt_group_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">PAN</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_group_pan" name="txtCompanyBilling" value="<%=clnt_group_pan%>"  type="text" class="form-control" maxlength="10">
                           <div id="clnt_group_pan_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>                    
                  </div>

                  <div class="row">
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Email</label>
                        <div class="col-sm-9 col-md-8">

                          <input id="clnt_group_off_email_id" name="txtEmailAddressBilling" value="<%=clnt_group_off_email_id%>" type="text" class="form-control" maxlength="30">
                          <div id="clnt_group_off_email_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Facebook Id</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_group_facbook_id" name="txtCompanyBilling" value="<%=clnt_group_facbook_id%>" type="text" class="form-control" maxlength="30">
                          <div id="clnt_group_facbook_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Twitter Id</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_group_twitter_id" name="txtEmailAddressBilling" value="<%=clnt_group_twitter_id%>" type="text" class="form-control" maxlength="30">
                           <div id="clnt_group_twitter_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>

                  <!--    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Logo</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_group_logo_file_name" name="txtCompanyBilling" value="<%=clnt_group_logo_file_name%>" type="text" class="form-control">
                        </div>
                      </div>
                    </div> -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Website 
                        URL</label>
                        <div class="col-sm-9 col-md-8">
                           <input id="website_url" name="txtCompanyBilling" value="<%=website_url%>" type="text" class="form-control" maxlength="150">
                            <div id="website_url_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">TAX ID</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="tax_id" name="txtCompanyBilling" value="<%=tax_id%>" type="text" class="form-control" maxlength="150">
                          <div id="tax_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>

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
                 <h3>Contact Person</h3>
                <fieldset>
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">First Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_group_contact_person_first_name" name="txtCompanyBilling" value="<%=clnt_group_contact_person_first_name%>" type="text" class="form-control" maxlength="150">
                           <div id="clnt_group_contact_person_first_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Last Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_group_contact_person_last_name" value="<%=clnt_group_contact_person_last_name%>" name="txtEmailAddressBilling"  type="text" class="form-control" maxlength="150">
                          <div id="clnt_group_contact_person_last_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label"> Mobile</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_group_contact_person_mobile" value="<%=clnt_group_contact_person_mobile%>" name="txtCompanyBilling" type="text" class="form-control" maxlength="10">
                          <div id="clnt_group_contact_person_mobile_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                     <div class="form-group">
                       <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Office Phone</label>
                       <div class="col-sm-3 col-md-3">
                         <input id="phone_code1" placeholder="Code" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="5">
                          <div id="clnt_group_contact_person_off_phone_code_error" style="color:red"></div>
                       </div>
                       <div class="col-md-3">
                         <input id="clnt_group_contact_person_off_phone" placeholder="Number" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="10" style="margin-top: -31px; margin: 0px 0px;width: 170px";>
                          <div id="clnt_group_contact_person_off_phone_error" style="color:red;width: 120px;"></div>
                       </div>
                     </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Department</label>
                        <div class="col-sm-9 col-md-8">
                         <!--  <input id="clnt_group_dept_name" value="<%=clnt_group_dept_name%>" name="txtCompanyBilling" type="text" class="form-control" maxlength="15">
                          <div id="clnt_group_dept_name_error" style="color:red"></div> -->
                        <select id="clnt_group_dept_name" name="ddlCreditCardType" class="form-control">
                            <option value="">--Please Select--</option>                        
                          </select>
                          <div id="clnt_group_dept_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Designation</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="clnt_group_contact_person_desgination" value="<%=clnt_group_contact_person_desgination%>" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="30">
                           <div id="clnt_group_contact_person_desgination_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

  

                </fieldset>
                  <h3>Address 1</h3>
                   <input id="add_id1" type="hidden" value="<%=address[0].address_id%>" />
                <fieldset>
                  
                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                      <input id="clnt_group_id" type="hidden" class="form-control" value="<%=clnt_group_id%>">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Address Type</label>
                        <div class="col-sm-9 col-md-8">
                           <select id="address_type" name="ddlCountryShipping" class="form-control">
                            <option value="">--Please Select--</option>
                          
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
                          <textarea id="cust_add_line_1" name="txtAddress1Shipping" class="form-control" maxlength="150"><%=address[0].cust_add_line_1%></textarea>
                          <div id="cust_add_line_1_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress2Shipping" class="col-sm-3 col-md-4 control-label">Address 2</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_line_2" name="txtAddress2Shipping" class="form-control" maxlength="150"><%=address[0].cust_add_line_2%></textarea>
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
                          <textarea id="cust_add_line_3" name="txtAddress1Shipping" class="form-control" maxlength="150"><%=address[0].cust_add_line_3%></textarea>
                          <div id="cust_add_line_3_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Land Mark</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_landmark" name="txtAddress1Shipping" class="form-control" maxlength="150"><%=address[0].cust_add_landmark%></textarea>
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

                 <h3>Address 2</h3>
                  <input id="add_id2" type="hidden" value="<%=address[1].address_id%>" />
                <fieldset>
                  
                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                      <input id="clnt_group_id" type="hidden" class="form-control" value="<%=clnt_group_id%>">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Address Type</label>
                        <div class="col-sm-9 col-md-8">
                           <select id="address_type2" name="ddlCountryShipping" class="form-control">
                            <option value="">--Please Select--</option>
                            
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
                          <textarea id="cust_add_1" name="txtAddress1Shipping" class="form-control" maxlength="150"><%=address[1].cust_add_line_1%></textarea>
                           <div id="cust_add_1_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress2Shipping" class="col-sm-3 col-md-4 control-label">Address 2</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_2" name="txtAddress2Shipping" class="form-control" maxlength="150"><%=address[1].cust_add_line_2%></textarea>
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
                          <textarea id="cust_add_3" name="txtAddress1Shipping" class="form-control" maxlength="150"><%=address[1].cust_add_line_3%></textarea>
                           <div id="cust_add_3_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Land Mark</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_landmark" name="txtAddress1Shipping" class="form-control" maxlength="150"><%=address[1].cust_add_landmark%></textarea>
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
                      <input id="clnt_group_id" type="hidden" class="form-control" value="<%=clnt_group_id%>">
                        <label for="txtNameCard" class="col-sm-3 col-md-4 control-label">Security Question</label>
                         <div class="col-sm-9 col-md-8">
                          <select id="question_id" name="ddlCreditCardType" class="form-control">
                            <option value="">--Please Select--</option>
                            <!-- <option value="1">A</option>
                            <option value="2">B</option> -->
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
                          <input id="cust_answer" name="txtNameCard" value="<%=security_qus.cust_answer%>" type="text" class="form-control" maxlength="150">
                          <div id="cust_answer_error" style="color:red"></div>
                        </div>
                       
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>

              <div class="form-group">
                   <div class="col-sm-offset-9" >
                         <button id="register-client-group" name="btnSubmit" class="btn btn-raised btn-black">Register</button> 
                         <button id="registerCancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button> 
                    </div>
              </div>

            </div>
          </div>
</script>

 <!--    Employee    -->

<script type="text/template" id="employeePageTpl">
<div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Employee List</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form  class="form-horizontal">
            <fieldset>                  
                <div class="form-group">
                      <div class="col-sm-offset-8 col-sm-12" >
                       <div class="col-sm-8 col-md-2">
                            <input id="employeeSearch" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                      </div>
                       <button type="submit" id="create-employee" name="btnSubmit" class="btn btn-raised btn-black">Add</button>
                        <button type="submit" id="employeeDelAll" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                      </div>
                </div>

                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr class="trrc">
                       <!--  <th>#</th> -->
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Client Group</th>
                        <th>Phone</th>                      
                        <th>Status</th>                 
                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="employeeList">
                        
                    </tbody>
                    <div id="findStatus">
                      
                    </div>
                  </table>   

                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button name="btnSubmit" id="employeeLoadMore" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>

            <div id="myModalEmp" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Employee</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="emplid">
                  <button type="button" class="btn btn-black" id="del_Emp_id">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>
                </fieldset>
                </form>
            </div>
          </div>
</script>

<script type="text/template" id="employeeTemplate">
      <td><a  data-container="body" data-toggle="popover" data-content="<%=emp_first_name%>" ><%=(emp_first_name.length > 25 ? emp_first_name.substring(0, 25) + "..." : emp_first_name)%></a>
      </td>

      <td><a  data-container="body" data-toggle="popover" data-content="<%=emp_last_name%>" ><%=(emp_last_name.length > 25 ? emp_last_name.substring(0, 25) + "..." : emp_last_name)%></a>
      </td>

      <td><a  data-container="body" data-toggle="popover" data-content="<%=clnt_group_name%>" ><%=(clnt_group_name.length > 25 ? clnt_group_name.substring(0, 25) + "..." : clnt_group_name)%></a>
      </td>

      <td><%=emp_off_phone%></td>
      <td><%=is_active%></td>  
      <td>

        <span style="display:inline-block; width: 20px;">
        <a id="edit-employee" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
        </span>
        <span style="display:inline-block; width: 20px;">
        <a id="activate-employee" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
        </span>
        <span style="display:inline-block; width: 20px;">
        <a id="delete-employee" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModalEmp"><i class="glyphicon glyphicon-minus-sign"></i></a>
        </span>
      </td>
              
  </script>

<script type="text/template" id="createEmployeeTpl">
     <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create Employee</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
             
              <form id="form-tabs" class="form-horizontal">
                <h3>Basic Infomation</h3>
                <fieldset>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Corporate Group</label>
                        <div class="col-sm-9 col-md-8">
                           <select id="clnt_group_id" name="ddlCreditCardType" class="form-control">
                            <option value="">--Please Select--</option>
                           
                          </select>
                           <div id="clnt_group_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">First Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="emp_first_name" name="txtLastNameBilling" type="text" class="form-control" maxlength="150">
                          <div id="emp_first_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  
                  <div class="row">

                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Last Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="emp_last_name" name="txtCompanyBilling" type="text" class="form-control"  maxlength="150">
                          <div id="emp_last_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">PAN</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="emp_pan" name="txtCompanyBilling" type="text" class="form-control" maxlength="15">
                           <div id="emp_pan_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    
                  </div>


                  <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Email</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="emp_off_email_id" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="150">
                          <div id="emp_off_email_id_error" style="color:red"></div>
                        </div>
                      </div>
                </div>
                <div class="col-md-6">
                      <div class="form-group">
                       <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Phone</label>

                       <div class="col-sm-3 col-md-3">
                         <input id="phone_code1" placeholder="Code" name="txtCompanyBilling" type="text" class="form-control" maxlength="10">
                         <div id="emp_off_code_error" style="color:red"></div>
                       </div>
                       <div class="col-md-3">
                         <input id="emp_off_phone" placeholder="Number" name="txtCompanyBilling" type="text" class="form-control" maxlength="10" style="margin-top: -31px; margin: -0px 0px;width: 170px;">
                         <div id="emp_off_phone_error" style="color:red;width: 120px;"></div>
                       </div>
                  </div>
                    
                  </div>

                  <div class="row">
                   <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Mobile</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="emp_mobile" name="txtCompanyBilling" type="text" class="form-control" maxlength="10">
                           <div id="emp_mobile_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Facebook Id</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="emp_facbook_id" name="txtCompanyBilling" type="text" class="form-control" maxlength="100">
                          <div id="emp_facbook_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                 

                  <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Twitter Id</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="emp_twitter_id" name="txtEmailAddressBilling" type="text" class="form-control" maxlength="150">
                          <div id="emp_twitter_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>

                    <!-- <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Photo</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="emp_photo_file_name" name="txtCompanyBilling" type="text" class="form-control">
                            <div id="emp_photo_file_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div> -->
                     <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Reporting Manager</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="emp_reporting_manager" name="txtCompanyBilling" type="text" class="form-control" maxlength="50">
                           <div id="emp_reporting_manager_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    </div>
                   
                  
                  <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">band</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="emp_band" name="txtCompanyBilling" type="text" class="form-control" maxlength="5">
                           <div id="band_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    
  
                     <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Department 
                        </label>
                        <div class="col-sm-9 col-md-8">
                           <!-- <input id="emp_department" name="txtCompanyBilling" type="text" class="form-control" maxlength="50">
                           <div id="emp_department_error" style="color:red"></div> -->
                           <select id="emp_department" name="ddlCreditCardType" class="form-control">
                            <option value="">--Please Select--</option>                        
                          </select>
                          <div id="emp_department_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    </div>
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Employee No</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="emp_no" name="txtCompanyBilling" type="text" class="form-control" maxlength="15">
                           <div id="emp_no_error" style="color:red"></div>
                        </div>
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

                 <h3>Address 2</h3>
                <fieldset>
                  
                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Address Type</label>
                        <div class="col-sm-9 col-md-8">
                           <select value="2" id="address_type2" name="ddlCountryShipping" class="form-control">
                            <option value="">--Please Select--</option>
                            
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
              </form>

                  <div class="form-group">
                        <div class="col-sm-offset-9" >
                         <button id="register-employee" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Register</button> 
                         <button id="registerCancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button> 
                    </div>
              </div>

            </div>
          </div>
</script>

<script type="text/template" id="editEmployeeTpl">
     <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Edit Employee</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
                 
              <form id="form-tabs" class="form-horizontal">
                <h3>Basic Infomation</h3>
                <fieldset>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                      <input id="emp_id" type="hidden" class="form-control" value="<%=emp_employee_id%>">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Corporate Group</label>
                        <div class="col-sm-9 col-md-8">
                           <select id="clnt_group_id" name="ddlCreditCardType" class="form-control">
                            <option value="">--Please Select--</option>
                            
                          </select>
                          <div id="clnt_group_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">First Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="emp_first_name" name="txtLastNameBilling" value="<%=emp_first_name%>" type="text" class="form-control" maxlength="150">
                          <div id="emp_first_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  
                  <div class="row">

                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Last Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="emp_last_name" name="txtCompanyBilling" value="<%=emp_last_name%>" type="text" class="form-control" maxlength="150">
                          <div id="emp_last_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">PAN</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="emp_pan" name="txtCompanyBilling" value="<%=emp_pan%>" type="text" class="form-control" maxlength="15">
                          <div id="emp_pan_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    
                  </div>


                  <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Email</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="emp_off_email_id" name="txtEmailAddressBilling" value="<%=emp_off_email_id%>" type="text" class="form-control" maxlength="150">
                          <div id="emp_off_email_id_error" style="color:red"></div>
                        </div>
                      </div>
                </div>
                <div class="col-md-6">
                     <div class="form-group">
                       <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Phone</label>
                       <div class="col-sm-3 col-md-3">
                         <input id="phone_code1" placeholder="Code" name="txtCompanyBilling"  type="text" class="form-control" maxlength="5">
                         <div id="emp_off_code_error" style="color:red"></div>
                       </div>
                       <div class="col-md-3">
                         <input id="emp_off_phone" placeholder="Number" name="txtCompanyBilling"  type="text" class="form-control" maxlength="10" style="margin-top: -31px; margin: 0px 0px;width: 170px;">
                         <div id="emp_off_phone_error" style="color:red;width: 120px"></div>
                       </div>
                     </div>
                 </div>
                    
                  </div>

                  <div class="row">
                   <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Mobile</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="emp_mobile" name="txtCompanyBilling" value="<%=emp_mobile%>" type="text" class="form-control" maxlength="10">
                          <div id="emp_mobile_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Facebook Id</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="emp_facbook_id" name="txtCompanyBilling" value="<%=emp_facbook_id%>" type="text" class="form-control" maxlength="100">
                          <div id="emp_facbook_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                 

                  <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtEmailAddressBilling" class="col-sm-3 col-md-4 control-label">Twitter Id</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="emp_twitter_id" name="txtEmailAddressBilling" value="<%=emp_twitter_id%>" type="text" class="form-control" maxlength="150">
                           <div id="emp_twitter_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Photo</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="emp_photo_file_name" name="txtCompanyBilling" value="<%=emp_photo_file_name%>" type="text" class="form-control">
                           <div id="emp_twitter_id_error" style="color:red"></div>
                        </div>
                      </div>
                    </div> -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Reporting Manager</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="emp_reporting_manager" name="txtCompanyBilling" value="<%=emp_reporting_manager%>" type="text" class="form-control" maxlength="50">
                           <div id="emp_reporting_manager_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  
                   </div>
              <div class="row">
                <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">band</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="emp_band" name="txtCompanyBilling" value="<%=band%>" type="text" class="form-control" maxlength="5">
                           <div id="band_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>

                   
                   <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Department 
                        </label>
                        <div class="col-sm-9 col-md-8">
                           <select id="emp_department" name="ddlCreditCardType" class="form-control">
                            <option value="">--Please Select--</option>                        
                          </select>
                          <div id="emp_department_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  
                  <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtCompanyBilling" class="col-sm-3 col-md-4 control-label">Employee No</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="emp_no" name="txtCompanyBilling" type="text" class="form-control" value="<%=employee_no%>" maxlength="15">
                           <div id="emp_no_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                     
                   </div>

                </fieldset>

                  <h3>Address 1</h3>
                   <input id="add_id1" type="hidden" value="<%=address[0].address_id%>" />
                <fieldset>
                  
                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                       <input id="emp_id" type="hidden" class="form-control" value="<%=emp_employee_id%>" />
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Address Type</label>
                        <div class="col-sm-9 col-md-8">
                           <select value="1" id="address_type" name="ddlCountryShipping" class="form-control">
                            <option value="">--Please Select--</option>
                         
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
                          <textarea id="cust_add_line_1" name="txtAddress1Shipping" class="form-control" maxlength="150"><%=address[0].cust_add_line_1%></textarea>
                            <div id="cust_add_line_1_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress2Shipping" class="col-sm-3 col-md-4 control-label">Address 2</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_line_2" name="txtAddress2Shipping" class="form-control" maxlength="150"><%=address[0].cust_add_line_2%></textarea>
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
                          <textarea id="cust_add_line_3" name="txtAddress1Shipping" class="form-control" maxlength="150"><%=address[0].cust_add_line_3%></textarea>
                          <div id="cust_add_line_3_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Land Mark</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_landmark" name="txtAddress1Shipping"  class="form-control" maxlength="150"><%=address[0].cust_add_landmark%></textarea>
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

                 <h3>Address 2</h3>
                  <input id="add_id2" type="hidden" value="<%=address[1].address_id%>" />
                <fieldset>
                  
                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                      <input id="emp_id" type="hidden" class="form-control" value="<%=emp_employee_id%>" />
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Address Type</label>
                        <div class="col-sm-9 col-md-8">
                           <select value="2" id="address_type2" name="ddlCountryShipping" class="form-control">
                            <option value="">--Please Select--</option>
                           
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
                          <textarea id="cust_add_1" name="txtAddress1Shipping" class="form-control" maxlength="150"><%=address[1].cust_add_line_1%></textarea>
                          <div id="cust_add_1_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress2Shipping" class="col-sm-3 col-md-4 control-label">Address 2</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_add_2" name="txtAddress2Shipping" class="form-control" maxlength="150"><%=address[1].cust_add_line_2%></textarea>
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
                          <textarea id="cust_add_3" name="txtAddress1Shipping" class="form-control" maxlength="150"><%=address[1].cust_add_line_3%></textarea>
                          <div id="cust_add_3_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtAddress1Shipping" class="col-sm-3 col-md-4 control-label">Land Mark</label>
                        <div class="col-sm-9 col-md-8">
                          <textarea id="cust_landmark" name="txtAddress1Shipping" class="form-control" maxlength="150"><%=address[1].cust_add_landmark%></textarea>
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
              </form>

              <div class="form-group">
                   <div class="col-sm-offset-9" >
                         <button id="register-employee" name="btnSubmit" class="btn btn-raised btn-black">Register</button> 
                         <button id="registerCancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button> 
                    </div>
              </div>

            </div>
          </div>
</script>

<!--Question Bank -->

<script type="text/template" id="questionBankTpl">
    <div class="widget">
    
    <div class="widget-heading">
      <h4 class="widget-title">Question Bank</h4>
    </div>
    <div class="widget-body" style="padding:6px;">
    <form class="form-horizontal">
           <fieldset>  
           <span id="upload-span" style="width:190px; position: relative; left: 25px; margin-top: 0px 20px;float: left;">
              <div class="form-group" id="formmine">
                <input type="file" name="uploadFile" id="uploadFile" data-buttonname="btn-outline btn-primary" data-iconname="ion-image mr-5" class="filestyle" >
                <div style="width:300px; position: relative; left: 10px; margin-top: 0px 20px;" class="bootstrap-filestyle input-group">
                  <!-- <input id="fileName" class="form-control "  type="text">  -->
                  <div id="file_error" class="file_error" style="font-size: 12px; color: #FF0000; "></div>
                </div>         
              </div>

              
            </span>                
              <div class="form-group">
                    <div class="col-sm-offset-8 col-sm-12" >
                      <div id="listmove">
                    <div class="col-sm-offset-0 col-sm-12" >
                        <div class="col-sm-8 col-md-10">
                            <select id="listQuestion" name="ddlQuestion" class="form-control questinpage">
                                  <option value="10">10</option>
                                  <option value="25">25</option>
                                  <option value="50">50</option>
                                  <option value="100">100</option>
                            </select> 
                        </div>
                    </div>
                </div>
                     <div class="col-sm-8 col-md-2">
                            <input id="search-question" name="search-question" type="text" class="form-control" placeholder="Search">
                    </div>
                      <button type="button" id="create-question"   name="btnSubmit" class="btn btn-raised btn-black">Add</button> 
                      <button type="button" id="question_deleteall" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Del All</button>
                    </div>
              
            <div id="myModalChemistry">
            <div>
            <span id="kekuleChem" style="position: absolute; border-width: 1px;border: 1px solid black;padding: 20px;width: 400px;height: 250px;">
            <div>
            <span id="cancelPopover" class="glyphicon glyphicon-remove" data-dismiss="modal" style="position: absolute;bottom: 21px;top: 7px;left: 380px;display: inline-block;font-family: 'Glyphicons Halflings';font-style: normal;font-weight: 400;line-height: 1;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;"></span>


            </div>
            </span>

            </div>

            </div>
        </div>
          <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
            <thead>
              <tr class="trrc">
                <td>Client Name</td>
                <td>Category</td>
                <td>Subject</td>
                <td>Topic</td>
                <td>Level</td>
                <td>Type</td>
                <td>Question</td>
                <td>Mark</td>
                <td>Negative</td>
                <td>Status</td>   
                <td>Actions</td>      
              </tr>
            </thead>
            <div id = "searchResQues"></div>
            <tbody id="questionList">
            </tbody>
          </table>   

              <!--  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-4" >                          
                      <button type="button" name="btnSubmit" id="question_load_more" class="btn btn-raised btn-black">Load More</button>
                    </div>
              </div> -->
               
              <div id="paginationListques"></div>

         <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Question</h4>
                           </div>
                        <div class="modal-body" id ="com_ques">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="quesid">
                   <input type="hidden" id="catid">
                   <input type="hidden" id="subid">
                   <input type="hidden" id="topid">
                   <input type="hidden" id="clnid">
                  <button type="button" class="btn btn-black" id="delete-confirm">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>


        </fieldset>
        </form>
    </div>
  </div>
</script>

 <script type="text/template" id="questionTemplate">
    <td>
         <a  data-container="body" data-toggle="popover" data-content="<%=clnt_name%>">
              <%=(clnt_name.length > 19 ? clnt_name.substring(0, 19) + "..." : clnt_name)%>
         </a>
      </td>
       <td>
         <a  data-container="body" data-toggle="popover" data-content="<%=category_name%>">
              <%=(category_name.length > 19 ? category_name.substring(0, 19) + "..." : category_name)%>
         </a>
      </td>

      <td>
         <a  data-container="body" data-toggle="popover" data-content="<%=subject_name%>">
              <%=(subject_name.length > 19 ? subject_name.substring(0, 19) + "..." : subject_name)%>
         </a>
      </td>

      <td>
         <a  data-container="body" data-toggle="popover" data-content="<%=topic_name%>">
              <%=(topic_name.length > 19 ? topic_name.substring(0, 19) + "..." : topic_name)%>
         </a>
      </td>

      <td>
         <a  data-container="body" data-toggle="popover" data-content="<%=difficulty_level_name%>">
              <%=(difficulty_level_name.length > 10 ? difficulty_level_name.substring(0, 10) + "..." : difficulty_level_name)%>
         </a>
      </td>

       <td>
         <a  data-container="body" data-toggle="popover" data-content="<%=question_type_name%>">
              <%=(question_type_name.length > 19 ? question_type_name.substring(0, 19) + "..." : question_type_name)%>
         </a>
      </td>

      <% if (question_txt_format.indexOf(':KEKULE_MARKER:') >= 0) { %>

            <td id="chemistryOptionDiv">
               <a id="<%=question_id%>" class="kekule1" data-container="body" data-toggle="popover" 
               href="#">Chemistry

               </a>
 
            </td>
      <% } else if(question_txt_format.indexOf(':LATEX_GROUP_SEPERATOR:') >= 0) { %> 
            <td>

             <a id="<%=question_id%>" class="maths" data-container="body" data-toggle="popover"
             href="#"> Maths
                 
               </a>

           <div id="myModalMath" class="modal fade" role="dialog" data-backdrop="false">
                <div class="modal-dialog" style="border-width: 1px;border: 1px solid black;">       
                  <div class="modal-content" style=" -webkit-box-shadow: 0 5px 15px rgba(0,0,0,0);-moz-box-shadow: 0 5px 15px rgba(0,0,0,0);-o-box-shadow: 0 5px 15px rgba(0,0,0,0);box-shadow: 0 5px 15px rgba(0,0,0,0);">  
                    <div class="modal-header" style="border-top-style:none;">
                      <a href="#">
                       <span class="glyphicon glyphicon-remove" data-dismiss="modal" style="position: absolute;bottom: 21px;top: 7px;left: 579px;display: inline-block;font-family: 'Glyphicons Halflings';font-style: normal;font-weight: 400;line-height: 1;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;"></span>
                      </a> 
                    </div>                
                    <div class="modal-body">
                    <div id="math"></div>  
                    </div>
                    <div class="modal-footer">

                    </div>
                  </div>
                </div>
              </div>
            </td>

      <% } else  { %>
       
           <td>
             <a data-container="body" data-toggle="popover" data-content="<%=question_txt_format%>">
                  <%=(question_txt_format.length > 10 ? question_txt_format.substring(0, 10) + "..." : question_txt_format)%>
             </a>
           </td>

      <% } %>

    
      <td><%=pos_marks%></td>
      <td><%=neg_marks%></td>
      <td><%=is_active%></td>
      

  <!-- <td><a id="edit-question">E</a>  <a id="activate-question">A</a>  <a id="delete-question">D</a> -->

  <td>

    <span style="display:inline-block; width: 20px;">
    <a id="edit-question" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
    </span>
    <span style="display:inline-block; width: 20px;">
    <a id="activate-question" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
    </span>
    <span style="display:inline-block; width: 20px;">
    <a id="delete-question" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-minus-sign" ></i></a>
    </span>

</td>

 
    </script>


  <script type="text/template" id="createQuestionTpl">

        <div class="widget"> 
            <div class="widget-heading">
              <h3 class="widget-title">Create Question 
            </div>              
            <div class="widget-body" style="padding:6px;"> 
            <div class="form-group">
                            <div class="col-sm-offset-10" >
                             <button type="button" id="saveQuestion"  name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button> 
                             <button id ="cancel" type="button"  name="btnSubmit" class="btn btn-raised btn-black">Cancel</button> 
                           </div>
              </div>

            
              <form id="form-tabs" class="form-horizontal">
                <h3>Question</h3>
                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Client</label>
                             <div class="col-sm-9 col-md-8">
                                  <select id="questionClient" name="ddlQuestionClient" class="form-control">
                               </select> 
                                <div id="client_not_select_error" style="color:red"></div>

                              </div>
                          </div>
                        </div>
                    
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Category</label>
                            <div class="col-sm-9 col-md-8">
                                <select id="questionCategory" name="ddlQuestionCategory" class="form-control">
                              </select> 
                                <div id="category_not_select_error" style="color:red"></div>
                              </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Subject</label>
                             <div class="col-sm-9 col-md-8">
                                  <select id="questionSubject" name="ddlQuestionSubject" class="form-control">
                               </select> 
                                <div id="subject_not_select_error" style="color:red"></div>
                              </div>
                          </div>
                        </div>
                     
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Topic</label>
                            <div class="col-sm-9 col-md-8">
                                     <select id="questionTopic" name="ddlQuestionTopic" class="form-control">
                               </select> 

                             <div id="topic_not_select_error" style="color:red"></div>

                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Complexity Level</label>
                            <div class="col-sm-9 col-md-8">
                                     <select id="questionComplexity" name="ddlQuestionComplexity" class="form-control">
                            </select> 
                            <div id="complexity_not_select_error" style="color:red"></div>                          

                            </div>
                          </div>
                        </div>
                   
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Descriptive</label>
                            <div class="col-sm-9 col-md-8">
                                     <label>
                            <input type="radio" class="q_desc" name="questionDescriptive" value="y" data-rule-required="true"> Yes
                          </label>&nbsp;<label>
                            <input type="radio" class="q_desc" name="questionDescriptive" value="n" data-rule-required="true"> No
                          </label>
                              <div id="descriptive_not_select_error" style="color:red"></div>                          

                            </div>
                          </div>
                        </div>
                      </div>

                       <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Total Marks</label>
                            <div class="col-sm-9 col-md-8">
                                  <input id="questionTotalMark" name="txtTotalMark" type="text" class="form-control"  maxlength="3" >
                              <div id="total_mark_input_error" style="color:red"></div>
                            </div>

                          </div>
                        </div>
                  
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Negative Marks</label>
                            <div class="col-sm-9 col-md-8">
                                      <input id="questionNegativeMark" name="txtQuestionNegativeMark" type="text" class="form-control" maxlength="3" >
                                    <div id="negative_mark_input_error" style="color:red"></div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Weightage</label>
                            <div class="col-sm-9 col-md-8">
                               <input id="questionWeightage" name="txtQuestionWeightage" type="text" class="form-control" maxlength="3">
                               <div id="weightage_input_error" style="color:red"></div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Question Type</label>
                            <div class="col-sm-9 col-md-8">
                                     <select id="questionType" name="ddlQuestionType" class="form-control">
                               </select> 
                              <div id="question_type_not_select_error" style="color:red"></div>
                                   <div id="myModal1" class="modal fade" role="dialog">
                                     <div class="modal-dialog">       
                                    <div class="modal-content">
                                       <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h5 class="modal-title">Please use 3 underscore symbol (___) For Blank Spaces</h5>
                                       </div>
                                    <div class="modal-body">
                                    <div id="texval"></div>
                                    <h5><div></div></h5>
                             
                                    </div>
                                       <div class="modal-footer">
                                       <input type="hidden" id="countrid">
                                      <button type="button" class="btn btn-black" id="del_Country_id" >Ok</button>
                                      
                                      </div>
                                    </div>
                                   </div>
                                  </div> 

                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">                                           
                       <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Question</label>
                            <div class="col-sm-9 col-md-8">
                              <!-- ############### tags for mathquill create mode #################### -->
                                <div id="qnformat_links" style="width:400px;">
                                  <span style="padding:15px 30px 10px 30px"><a id="plainText" href="#plainText" >Plain Text</a></span>
                                  <span style="padding:15px 30px 10px 30px"><a id="mathQuestion" href="#mathQuestion" >Maths</a></span>
                                  <span style="padding:15px 30px 10px 30px"><a id="chemistryQuestion" href="#chemistryQuestion" >Chemistry</a>
                                  </span>
                                </div>
                              <div id='mathquill' contenteditable="true" style="width: 763px; height: 122px; border-style: solid;border-color: gainsboro border:solid 2px black;overflow:scroll;overflow-x:hidden;overflow-y:scroll;"></div>
                                <!-- <p>LaTeX of what you typed: <span id="latex"></span></p> -->
                              <!-- <p>LaTeX of what you typed: <div id="latex"></div></p> -->

                              <div id='kekule' style="border-style: solid; border-color: gainsboro"></div>
                              <textarea id="questionText" style="width: 770px;height: 130px;" name="txtQuestionText" class="form-control"></textarea>
                              <!-- <input type="file" id="imageupload" name="imageupload"><span id="pix"> Min Pixels Should be 480 X 480</span> -->
                               <div id="question_input_error" style="color:red"></div> 
                               <div id="instruction"  style="width:650px"> (Press back quote(`) for typing Math equation. Press same key again to return to normal text. Cut, Paste and Delete Events are disabled.)
                              <span data-internal-id="latex_instruction"><a target="_blank" href="https://inspera.atlassian.net/wiki/spaces/KB/pages/62062830/MathQuill+symbols" class="PageTree_anchor_20K PageTree_selectedAnchor_Ys_">&#9432;MathQuill Insturction</span></a>

                               </div> 
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">                                           
                       <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Tips</label>
                            <div class="col-sm-9 col-md-8">
                                  
                              <textarea id="tips_id" name="tips-name" type="text" class="form-control" maxlength="300"></textarea>
                               <div id="tips_input_error" style="color:red"></div>                          
                            </div>
                          </div>
                        </div>
                      </div>
         
                </fieldset>

                <!-- -====================== Create Options screen template =============== -->
                <h3>Options</h3>
                <fieldset id="id2">

                <div class="row" id="otherType">

                    <div id="optionDiv" class="col-md-12">
                    <div id="formatLinks" style="width: fit-content; margin:0 auto;">
                      
                      <span style="padding:15px 30px 10px 30px"><a id="plainOptions" href="#plainText" >Plain Text</a></span>
                      <span style="padding:15px 30px 10px 30px"><a id="mathOptions" href="#mathOption" >Maths</a></span>
                      <span style="padding:15px 30px 10px 30px"><a id="chemistryOptions" href="#chemistryOption" >Chemistry</a>
                      </span>
                    
                    </div>
                      <div class="form-group">
                            <center><div id="question_answers_error" style="color:red"></div></center>

                      </div>
                      <div id="plainAnswerdiv" ></div>

                      <div id='mathquillAnswerdiv'>
<!--                         <div><span id="mathAnswerSpan"  style="width: 80px; height: 12px;"></span></div>
                        <p>LaTeX of what you typed: <span id="latexAnswerSpan"></span></p> -->
                      </div>
                      <div id='kekuleAnswerdiv'></div>
                    </div>
                       <!-- <button type="button" id="addOption" name="btnSubmit" class="btn btn-raised btn-black">+</button> <button id="removeOption" type="button" name="btnSubmit" class="btn btn-raised btn-black">-</button> -->
                </div>   
                  <!-- Match the following -->
                  <div class="row">
                   <div id="matchOption" class="col-md-6">          
                      <div class="form-group">
                            <center><div id="question_answers_error" style="color:red"></div></center>

                      </div>

                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-2  control-label">Option</label>
                        <div class="col-sm-9 col-md-8">
                           <input id="questionAnswerOptionMatch1"  type="text" class="form-control">
                            </div>
                         <button type="button" id="addOption" name="btnSubmit" class="btn btn-raised btn-black" style="position:absolute;top:14px">+</button> 
                         <button id="removeOption" type="button" name="btnSubmit" class="btn btn-raised btn-black" style="position:absolute;top:14px">-</button>
                      </div>
                    </div>

                    <div id="matchAnswer" class="col-md-6" style="display:block;diplay:inline-block;left:120px;top:2px">          
                      <div class="form-group">
                            <center><div id="question_answers_error" style="color:red"></div></center>

                      </div>

                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-2 control-label">Answer</label>
                        <div class="col-sm-9 col-md-8">
                           <input id="questionAnswerOption1" type="text" class="form-control optionChanged">
                            </div>
                         
                      </div>
                    </div>
                  </div>


                  <!-- Template for fill in the blanks -->

                  <!-- <div class="row"> -->
                   <div id="fillIntheBlanks">          
  <!--                     <div class="form-group">
                            <center><div id="question_answers_error" style="color:red"></div></center>

                      </div>

                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Option 1</label>
                        <div class="col-sm-9 col-md-4">
                           <input id="questionAnswerOptionMatch1"  type="text" class="form-control">
                            </div>
                         <button type="button" id="addOption" name="btnSubmit" class="btn btn-raised btn-black">+</button> <button id="removeOption" type="button" name="btnSubmit" class="btn btn-raised btn-black">-</button>
                      </div> -->
                    </div>

                  <!-- </div>         -->

                <!-- End of fill in the blanks -->      

                   <div class="row" id="sequenceRow">
                   <div id="sequenceOption" class="col-md-6">          
                      <div class="form-group">
                            <center><div id="question_answers_error" style="color:red"></div></center>

                      </div>

                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-2 control-label">Option</label>
                        <div class="col-sm-9 col-md-8" id="ans">
                           <input id="questionAnswerOption1"  type="text" class="form-control">
                            </div>
                         <button type="button" id="addOption" name="btnSubmit" class="btn btn-raised btn-black" style="position:absolute;top:14px">+</button> 
                         <button id="removeOption" type="button" name="btnSubmit" class="btn btn-raised btn-black" style="position:absolute;top:14px">-</button>
                      </div>
                    </div>

                    <div id="sequenceAnswer" class="col-md-6" style="diplay:inline-block;left:120px;top:2px">          
                      <div class="form-group">
                            <center><div id="question_answers_error" style="color:red"></div></center>

                      </div>

                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Answer</label>
                        <div class="col-sm-9 col-md-4">
                           <input id="questionAnswerOption1" type="text" class="form-control optionChanged">
                            </div>
                        
                      </div>
                    </div>

                  </div>  

                  <!-- =========  Puzzle Create Options ====== -->

                  <div id="tabHeaderContainer" style="border:0;padding:0.5em;">
                    <div id="puzzleTabHeaderSolve" class="tabHeaderOff">View Puzzle</div>
                    <div id="puzzleTabHeaderCreate" class="tabHeaderOn">Create Puzzle</div>
                  </div>

                  <div id="tabContentContainer" style="border:1px solid #888;padding:4px">
                  <!-- ====================== -->
                  <div id="puzzleTabSolve" style="font-family: tahoma, sans-serif; font-size: 12px; display: none;">
                  <div style="padding:0.5em;">
                  <div id="puzzleParent" style="background-color: rgb(136, 136, 136); color: black; width: 768px; height: 576px;"><canvas id="puzzleCanvas" width="768" height="576" style="cursor: auto;">
                  <p style="margin-bottom:0">This Jigsaw Puzzle game requires that your browser supports the <a target="_blank" href="http://en.wikipedia.org/wiki/Canvas_(HTML_element)">HTML5 &lt;canvas&gt; element</a>. See <a target="_blank" href="http://en.wikipedia.org/wiki/Canvas_(HTML_element)">Wikipedia</a> for information on which browsers support the <u>HTML5 &lt;canvas&gt;</u> technology. Google code offers <a href="http://code.google.com/p/explorercanvas/">ExplorerCanvas</a> to bring the functionality of the &lt;canvas&gt; tag to Internet Explorer, unfortunately, complex clipping regions are not supported, a requirement for this software.</p>
<!--                   <p><img src="./Jigsaw Puzzle by Raymond Hill_ An HTML5 _canvas_-based jigsaw puzzle_files/jigsawpuzzle-rhill-gadget-snapshot.png" alt="Snapshot"> <br><small>Thumbnail preview</small></p> -->
                  </canvas></div>
<!--                   <audio id="puzzleSnap1" autobuffer=""><source src="12842__schluppipuppie__klick_01.ogg"><source src="12842__schluppipuppie__klick_01.wav"></audio>
                  <audio id="puzzleSnap2" autobuffer=""><source src="12843__schluppipuppie__klick_02.ogg"><source src="12843__schluppipuppie__klick_02.wav"></audio>
                  <audio id="puzzleClap1"><source src="35102_m1rk0_applause_5sec.ogg"><source src="35102_m1rk0_applause_5sec.mp3"></audio>
                  <audio id="puzzleClap2"><source src="35104_m1rk0_applause_8sec.ogg"><source src="35104_m1rk0_applause_8sec.mp3"></audio>
                  <audio id="puzzleClap3"><source src="60789_J.Zazvurek_Applause_9s.ogg"><source src="60789_J.Zazvurek_Applause_9s.mp3"></audio> -->
                  <div style="margin-top:1em;">
                <!--   <input id="puzzleShowEdges" style="width:12em;padding:3px;border:solid 1px #333;" type="button" value="Show edge pieces only" onclick="javascript:this.toggleEdges();"> -->
                  <input id="puzzleShowPreview" style="width:12em;padding:3px;border:solid 1px #333;" type="button" value="Show Original Picture" onclick="javascript:this.togglePreview();">
                  </div>
                  <div style="margin-top:1em;font-size:11px;color:#777">
                  How to play:
                  <ul style="margin-top:0;">
                  <li>Click on a piece to move it, click again to release it</li>
                  <li><b>Left</b> and <b>right</b> arrows (or alternatively <b>'A'</b> or <b>'D'</b>, or <b>mousewheel</b>) to rotate a piece</li>
                  <li><b>Up</b> and <b>down</b> arrows (or alternatively <b>'W'</b> or <b>'S'</b>) to send a piece behind or on top of other pieces</li>
                  <li><b>'E'</b> to toggle on/off visibility of non-edge pieces</li>
                  <li><b>'Q'</b> to show/hide preview tile</li>
                  <li><b>Space bar</b> to show/hide non-composite pieces (pieces made up of two or more atomic pieces)</li>
                  </ul>
                  </div>
                  </div>
                  </div>

                  <!-- =========================== -->

                  <div id="puzzleTabCreate" style="">
                  <table style="margin-top:1em;font-family:tahoma,sans-serif;font-size:12px">
                  <tbody><tr><td style="vertical-align:top">Cut&nbsp;</td><td style="vertical-align:top"><select id="puzzleCut"><option value="classic" selected="selected">Classic</option><option value="straight">Straight</option><option value="tenon">Tenon</option><option value="wave">Wave</option></select></td></tr>
                  <tr><td colspan="2">&nbsp;</td></tr>
                  <tr><td style="white-space:nowrap;vertical-align:top">Screen size&nbsp;</td><td style="vertical-align:top"><select id="puzzleScreenSize"><option value="h600">800×600</option><option value="h768">1024×768</option><option value="h1024" selected="selected">1280×1024</option><option value="h1050">1680×1050</option><option value="h1200">1920×1200</option></select>
                  <span style="color:#888">(Screen size determine work area size, which determine puzzle size, which influence the size of individual pieces)</span></td></tr>
                  <tr><td colspan="2">&nbsp;</td></tr>
                  <tr><td style="white-space:nowrap;vertical-align:top">Suggested number of pieces&nbsp;</td><td style="vertical-align:top"><input id="puzzlePieces" type="text" size="2" maxlength="3" value="16">
                  <span style="color:#888">(This number is used as a guide only, restrictions may apply. More pieces = smaller pieces)</span></td></tr>
                  <tr><td colspan="2">&nbsp;</td></tr>
                  <tr><td style="white-space:nowrap;vertical-align:top">Complexity of puzzle pieces&nbsp;</td><td style="vertical-align:top"><select id="puzzleComplexity"><option value="0">Regular</option><option value="1" selected="selected">Slightly irregular</option><option value="3">Moderatly irregular</option><option value="8">Very irregular</option></select></td></tr>
                  <tr><td colspan="2">&nbsp;</td></tr>
                  <tr><td style="white-space:nowrap;vertical-align:top">Whether pieces can be rotated&nbsp;</td><td style="vertical-align:top"><select id="puzzleRotate"><option value="1">No rotation</option><option value="4">Rotate 90°</option><option value="24" selected="selected">Rotate fully</option></select></td></tr>
                  <tr><td colspan="2">&nbsp;</td></tr>
                  <tr><td style="white-space:nowrap;vertical-align:top">URL of picture to use&nbsp;</td><td style="vertical-align:top">
                  <!-- <input id="puzzleURL" type="text" size="80" maxlength="256" value=""> -->
                  <input type="file" id="puzzleURL" name="imageupload"><span id="pix"> Min Pixels Should be 480 X 480</span>
                 <!--  <span style="color:#888">(Of interest: <a target="_blank" href="http://en.wikipedia.org/wiki/Public_domain_image_resources#General_collections">general collections of public domain images</a>)</span> -->
                  </td></tr>
                  <tr><td colspan="2">&nbsp;</td></tr>
                  <tr><td style="color:#f77;" colspan="2">Beware: Clicking on the “Create” button will cause the current jigsaw puzzle in the “Solve” tab to be replaced. Also, note that the more pieces there are, the longer it will take to generate the jigsaw puzzle, so you might experience a delay.</td></tr>
                  <tr><td colspan="2">&nbsp;</td></tr>
                  <tr><td style="white-space:nowrap;vertical-align:top"><input id="puzzleCreate" style="width:9em;padding:3px;border:solid 1px #333;" type="button" value="Create" onclick="javascript:console.log(this);this.createPuzzle();self.location.hash=&#39;#&#39;;"></td></tr>
                  </tbody></table>
                  </div>
                  <!-- ================================== -->
                  <div id="puzzleTabShare" style="display:none">
                  <div style="margin-top:1em;font-family:tahoma,sans-serif;font-size:12px">
                  <p>You can generate a <b>permalink</b> of the current state of your puzzle (progress included!):<br>
                  <input id="puzzleGeneratePermalink" style="width:9em;padding:3px;border:solid 1px #333;" type="button" value="Create permalink" onclick="javascript:this.generatePuzzlePermalink();">&nbsp;<input id="puzzlePermalink" style="padding:3px;" type="text" size="100" readonly="readonly" value="" onclick="javascript:this.focus();this.select();"></p>
                  <p style="display:none"><a id="puzzleEmailTo" href="mailto:?subject=Have%20fun%20with%20this%20jigsaw%20puzzle!&amp;body=http%3A%2F%2Fwww.raymondhill.net%2Fpuzzle-rhill%2Fjigsawpuzzle-rhill.php">Email this permalink to...</a></p>
                  <p>Alternatively, you can generate a <b>Jigsaw Puzzle Key</b> identifying uniquely the current state of your puzzle (progress included!):<br>
                  <input id="puzzleGenerateKey" style="width:9em;padding:3px;border:solid 1px #333;" type="button" value="Generate key" onclick="javascript:this.generatePuzzleKey();">&nbsp;<input id="puzzleKeyOut" style="padding:3px;" type="text" size="100" readonly="readonly" value="" onclick="javascript:this.focus();this.select();"><br><span style="font-size:11px;color:#999">(Be sure to copy <b>all</b> the characters!)</span></p>
                  <p>You can save this key for later use, or you can send this key to a friend, who can then use it to generate the same puzzle on his side.</p>
                  <p>A friend sent you a <b>Jigsaw Puzzle Key</b>? Enter it here to generate his/her custom-made jigsaw puzzle in your “Solve” tab:<br>
                  <input id="puzzleKeyInCreate" style="width:9em;padding:3px;border:solid 1px #333;" type="button" value="Create" onclick="javascript:this.createPuzzleFromKey();">&nbsp;<input id="puzzleKeyIn" style="padding:3px;" type="text" size="100" value=""><br><span style="font-size:11px;color:#999">(Be sure to paste <b>all</b> the characters!)</span></p>
                  <p style="white-space:nowrap;color:#f77;">Beware: Clicking on the “Create” button will cause the current jigsaw puzzle to be replaced (Your selected “Screen size” setting will be preserved though.)</p>
                  </div>
                  </div>
                
                  </div>
                    <!-- ======== End of Puzzle Create Options ============ -->

                </fieldset>

                <!-- ========================== Create Key answer template ========================== -->
                  <h3>Key Answers</h3>
                <fieldset id="id3">

                  <div class="row">
                    <div id="answerDiv" class="col-md-12">
                      <div class="form-group">
                        <center><div id="question_key_answers_error" style="color:red"></div></center>
                      </div>
                      <div id="chemistryOptionDiv">         
                      </div>
                      <div class='form-group'>
                        <div id="answeroptiondiv" ></div>
                      </div>
                    </div>
                  </div>      

                  <div class="row" >
                   <div id="matchAnswerDiv" class="matchKeyAns">         
                    </div>
                  </div>
        
                   
                  <div id="finalDiv" style="height:fit-content; margin-top:20px; min-height:50px; box-shadow: 0px 1px 17px #aaaaaa; background: #f6f5f6" ondrop="drop(event)" ondragover="allowDrop(event)">

                      <h3 style="padding-bottom:10px; padding-top:5px;">Jumbled Answers :</h3> <div id="matchAnserDiv"></div>
                  </div>  
                   <canvas id="puzzleAnswer"></canvas>
                   <!--  <canvas id="puzzle1"></canvas> -->
                </fieldset> 

              </form>
            </div>
          </div>

      </script>

    <!-- =================== fill in the blanks template ============================ -->
    <script type="text/template" id="fillintheblank">      
        <option value="<%=question_option_txt%>" <%=isSelected%>><%=question_option_txt%></option>
    </script>


    <!-- =================== Edit template ============================ -->

    <script type="text/template" id="editQuestionTpl">

        <div class="widget"> 
            <div class="widget-heading">
              <h3 class="widget-title">Edit Question 
            </div>              
            <div class="widget-body" style="padding:6px;"> 
            <div class="form-group">
                      <div class="col-sm-offset-9" >
                       <button type="button" id="saveQuestion"  name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button> 
                       <button id ="cancel" type="button"  name="btnSubmit" class="btn btn-raised btn-black">Cancel</button> 
                     </div>
            </div>
            
              <form id="form-tabs" class="form-horizontal">
                <h3>Question</h3>

                <fieldset>
                
                <input type="hidden" id="question_id" value="<%=question_id%>">

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Client</label>
                        <div class="col-sm-9 col-md-8">
                              <select id="questionClient" name="ddlQuestionClient" class="form-control" disabled="disabled">
                               </select> 
                               <div id="client_not_select_error" style="color:red"></div>
                          </div>
                      </div>
                    </div>
                
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Category</label>
                        <div class="col-sm-9 col-md-8">
                            <select  id="questionCategory" name="ddlQuestionCategory" class="form-control" disabled="disabled">
                          </select>
                           <div id="category_not_select_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Subject</label>
                         <div class="col-sm-9 col-md-8">
                                <select id="questionSubject" name="ddlQuestionSubject" class="form-control" disabled="disabled">

                           </select> 
                            <div id="subject_not_select_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                 
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Topic</label>
                        <div class="col-sm-9 col-md-8">
                                 <select id="questionTopic" name="ddlQuestionTopic" class="form-control" disabled="disabled">                           
                           </select> 
                            <div id="topic_not_select_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Complexity Level</label>
                        <div class="col-sm-9 col-md-8">
                              <select id="questionComplexity" name="ddlQuestionComplexity" class="form-control">
                              </select> 
                                <div id="complexity_not_select_error" style="color:red"></div>                          

                        </div>
                      </div>
                    </div>
               
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Descriptive</label>
                        <div class="col-sm-9 col-md-8">
                                 <label>
                        <input type="radio" class="q_desc" name="questionDescriptive"  value="y" data-rule-required="true" <%=(descriptive == 'y')?"checked":"" %> > Yes
                      </label>&nbsp;<label>
                        <input type="radio" class="q_desc" name="questionDescriptive" value="n" data-rule-required="true"  <%=(descriptive == 'n')?"checked":"" %> > No
                      </label>
                            <div id="descriptive_not_select_error" style="color:red"></div>                          

                        </div>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Total Marks</label>
                        <div class="col-sm-9 col-md-8">
                                  <input id="questionTotalMark" value="<%=pos_marks%>" name="txtTotalMark" type="text" class="form-control" maxlength="3">
                                 <div id="total_mark_input_error" style="color:red"></div>     
                        </div>
                      </div>
                    </div>
              
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Negative Marks</label>
                        <div class="col-sm-9 col-md-8">
                                  <input id="questionNegativeMark" value="<%=neg_marks%>" name="txtQuestionNegativeMark" type="text" class="form-control" maxlength="3">
                              <div id="negative_mark_input_error" style="color:red"></div>     
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Weightage</label>
                        <div class="col-sm-9 col-md-8">
                                 <input id="questionWeightage" name="txtQuestionWeightage" value="<%=weightage%>" type="text" class="form-control" maxlength="3">
                              <div id="weightage_input_error" style="color:red"></div> 
                        </div>
                      </div>
                    </div>

                   <div class="col-md-6">


                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Question Type</label>
                        <div class="col-sm-9 col-md-8">
                                 <select  id="questionType" name="ddlQuestionType" class="form-control" disabled="disabled">
                           </select> 
                             <div id="question_type_not_select_error" style="color:red"></div>                          

                        </div>
                      </div>
                   
                      
                    </div>
              
                    
                  </div>

                <div class="row"> 
                  <div class="col-md-6"> 
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Question</label>
                        <div class="col-sm-9 col-md-8">
                          <!-- ############### tags for mathquill edit mode #################### -->
                          <div id="qnformat_links" style="width:400px;">
                            <span style="padding:15px 30px 10px 30px"><a id="plainText" href="#plainText" >Plain Text</a></span>
                            <span style="padding:15px 30px 10px 30px"><a id="mathQuestion" href="#mathQuestion" >Maths</a></span>
                            <span style="padding:15px 30px 10px 30px"><a id="chemistryQuestion" href="#chemistryQuestion" >Chemistry</a>
                            </span>
                          </div>
                          <% if (question_txt_format.indexOf(':LATEX_GROUP_SEPERATOR:') >= 0) { %>
                          <div id='mathquill' contenteditable="true" style="width: 763px; height: 122px; border-style: solid;border-color: gainsboro border:solid 2px black;overflow:scroll;overflow-x:hidden;overflow-y:scroll;"></div>
                          <div id='kekule' style="width: 763px; height: 400px; border-style: solid; border-color: gainsboro; display: none;"></div>
                          <textarea id="questionText" style="width: 763px; height: 122px;width: 770px;height: 130px; display: none;" name="txtQuestionText" class="form-control"></textarea>

                          <div id="question_input_error" style="color:red"></div>
                          <% } else if (question_txt_format.indexOf(':KEKULE_MARKER:') >= 0) { %>
                          <div id='mathquill' contenteditable="true" style="width: 763px; height: 122px; border-style: solid;border-color: gainsboro; display: none;"></div>
                          <div id='kekule' style=" border-style: solid; border-color: gainsboro; display: block;"></div>
                          <textarea id="questionText" style="width: 763px; height: 122px;width: 770px;height: 130px; display: none;" name="txtQuestionText" class="form-control"></textarea>
                          <div id="question_input_error" style="color:red"></div>                          
                          <% } else { %> 
                          <div id='mathquill' contenteditable="true" style="width: 763px; height: 122px; border-style: solid;border-color: gainsboro; display: none;" ></div>
                          <div id='kekule' style="width: 763px; height: 400px; border-style: solid; border-color: gainsboro; display: none;"></div>
                          <textarea id="questionText" style="width: 763px; height: 122px;width: 770px;height: 130px;" name="txtQuestionText" class="form-control"><%=question_txt_format%></textarea>
                          <!--  <input type="file" id="imageupload" name="imageupload"><span id="pix"> Min Pixels Should be 480 X 480</span> -->
                          <% } %>
                          <div id="question_input_error" style="color:red"></div>

                        <div id="instruction" style="width:650px"> (Press back quote(`) for typing Math equation. Press same key again to return to normal text. Cut, Paste and Delete Events are disabled.)
                         <span data-internal-id="latex_instruction"><a target="_blank" href="https://inspera.atlassian.net/wiki/spaces/KB/pages/62062830/MathQuill+symbols" class="PageTree_anchor_20K PageTree_selectedAnchor_Ys_">&#9432;MathQuill Instruction</a></span>
                        </div>
                
                        </div>
                      </div>

                  </div>
                </div>

                  <div class="row"> 
                  <div class="col-md-6"> 
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Tips</label>
                        <div class="col-sm-9 col-md-8">
                              
                           <textarea id="tips_id" name="tips-name" type="text" class="form-control" maxlength="300"><%=tips%></textarea>
                       <div id="tips_input_error" style="color:red"></div>
                        </div>
                      </div>

                    </div>
                  </div>
         
                </fieldset>

                <!-- ================== Edit Options screen ======================= -->
                <h3>Options</h3>
                <fieldset>

                 <div class="row">
                    <div id="optionDiv" class="col-md-12">
                      <div id="formatLinks" style="width: fit-content; margin: 0 auto;">
                        
                        <span style="padding:15px 30px 10px 30px"><a id="plainOptions" href="#plainText" >Plain Text</a></span>
                        <span style="padding:15px 30px 10px 30px"><a id="mathOptions" href="#mathOption" >Maths</a></span>
                        <span style="padding:15px 30px 10px 30px"><a id="chemistryOptions" href="#chemistryOption" >Chemistry</a>
                        </span>
                      
                      </div>
                      <div class="form-group">
                            <center><div id="question_answers_error" style="color:red"></div></center>
                      </div>
<!-- 
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Answer</label>
                        <div class="col-sm-9 col-md-4">
                           <input id="questionAnswerOption1" class="optionChanged" type="text" class="form-control">
                            </div>
                         <button type="button" id="addOption" name="btnSubmit" class="btn btn-raised btn-black">+</button> <button id="removeOption" type="button" name="btnSubmit" class="btn btn-raised btn-black">-</button>
                      </div> -->
                      <div id="plainAnswerdiv" ></div>
                      <div id='mathquillAnswerdiv'></div>
                      <div id='kekuleAnswerdiv'></div>
                  </div>     

                  <div class="row" id="matchRow">
                   <div id="matchOption" class="col-md-6">          
                      <div class="form-group">
                            <center><div id="question_answers_error" style="color:red"></div></center>

                      </div>


                      <div class="form-group">
                      
                         <button type="button" id="addOption" name="btnSubmit" class="btn btn-raised btn-black">+</button> <button id="removeOption" type="button" name="btnSubmit" class="btn btn-raised btn-black">-</button>
                      </div>
                    </div>

                    <div id="ansOption">
                    <div id="matchAnswer" class="col-md-6">          
                      <div class="form-group">
                            <center><div id="question_answers_error" style="color:red"></div></center>

                      </div>

                    
                    </div>

                    </div>

                  </div>

                  <div id='fillIntheBlanks'></div>     

                  <div class="row" id="sequenceRow">
                   <div id="sequenceOption" class="col-md-6">          
                      <div class="form-group">
                            <center><div id="question_answers_error" style="color:red"></div></center>

                      </div>


                     <div class="form-group">
                                           

                       
                         <button type="button" id="addOption" name="btnSubmit" class="btn btn-raised btn-black">+</button> <button id="removeOption" type="button" name="btnSubmit" class="btn btn-raised btn-black">-</button>
                      </div>              
                     
                    </div>

                    <div id="sequenceAnswer" class="col-md-6">          
                      <div class="form-group">
                            <center><div id="question_answers_error" style="color:red"></div></center>

                      </div>

                 
                    </div>

                  </div>  
                  <!-- =========  Puzzle Create Options ====== -->

                  <div id="tabHeaderContainer" style="border:0;padding:0.5em;">
                    <div id="puzzleTabHeaderSolve" class="tabHeaderOff">View Puzzle</div>
                    <div id="puzzleTabHeaderCreate" class="tabHeaderOn">Create Puzzle</div>
                  </div>

                  <div id="tabContentContainer" style="border:1px solid #888;padding:4px">
                  <!-- ====================== -->
                  <div id="puzzleTabSolve" style="font-family: tahoma, sans-serif; font-size: 12px; display: none;">
                  <div style="padding:0.5em;">
                  <div id="puzzleParent" style="background-color: rgb(136, 136, 136); color: black; width: 768px; height: 576px;"><canvas id="puzzleCanvas" width="768" height="576" style="cursor: auto;">
                  <p style="margin-bottom:0">This Jigsaw Puzzle game requires that your browser supports the <a target="_blank" href="http://en.wikipedia.org/wiki/Canvas_(HTML_element)">HTML5 &lt;canvas&gt; element</a>. See <a target="_blank" href="http://en.wikipedia.org/wiki/Canvas_(HTML_element)">Wikipedia</a> for information on which browsers support the <u>HTML5 &lt;canvas&gt;</u> technology. Google code offers <a href="http://code.google.com/p/explorercanvas/">ExplorerCanvas</a> to bring the functionality of the &lt;canvas&gt; tag to Internet Explorer, unfortunately, complex clipping regions are not supported, a requirement for this software.</p>
                  <!-- <p><img src="./Jigsaw Puzzle by Raymond Hill_ An HTML5 _canvas_-based jigsaw puzzle_files/jigsawpuzzle-rhill-gadget-snapshot.png" alt="Snapshot"> <br><small>Thumbnail preview</small></p> -->
                  </canvas></div>
<!--                   <audio id="puzzleSnap1" autobuffer=""><source src="12842__schluppipuppie__klick_01.ogg"><source src="12842__schluppipuppie__klick_01.wav"></audio>
                  <audio id="puzzleSnap2" autobuffer=""><source src="12843__schluppipuppie__klick_02.ogg"><source src="12843__schluppipuppie__klick_02.wav"></audio>
                  <audio id="puzzleClap1"><source src="35102_m1rk0_applause_5sec.ogg"><source src="35102_m1rk0_applause_5sec.mp3"></audio>
                  <audio id="puzzleClap2"><source src="35104_m1rk0_applause_8sec.ogg"><source src="35104_m1rk0_applause_8sec.mp3"></audio>
                  <audio id="puzzleClap3"><source src="60789_J.Zazvurek_Applause_9s.ogg"><source src="60789_J.Zazvurek_Applause_9s.mp3"></audio> -->
                  <div style="margin-top:1em;">
                  <!-- <input id="puzzleShowEdges" style="width:12em;padding:3px;border:solid 1px #333;" type="button" value="Show edge pieces only" onclick="javascript:this.toggleEdges();"> -->
                  <input id="puzzleShowPreview" style="width:12em;padding:3px;border:solid 1px #333;" type="button" value="Show Original Picture" onclick="javascript:this.togglePreview();">
                  </div>
                  <div style="margin-top:1em;font-size:11px;color:#777">
                  How to play:
                  <ul style="margin-top:0;">
                  <li>Click on a piece to move it, click again to release it</li>
                  <li><b>Left</b> and <b>right</b> arrows (or alternatively <b>'A'</b> or <b>'D'</b>, or <b>mousewheel</b>) to rotate a piece</li>
                  <li><b>Up</b> and <b>down</b> arrows (or alternatively <b>'W'</b> or <b>'S'</b>) to send a piece behind or on top of other pieces</li>
                  <li><b>'E'</b> to toggle on/off visibility of non-edge pieces</li>
                  <li><b>'Q'</b> to show/hide preview tile</li>
                  <li><b>Space bar</b> to show/hide non-composite pieces (pieces made up of two or more atomic pieces)</li>
                  </ul>
                  </div>
                  </div>
                  </div>

                  <!-- =========================== -->

                  <div id="puzzleTabCreate" style="">
                  <table style="margin-top:1em;font-family:tahoma,sans-serif;font-size:12px">
                  <tbody><tr><td style="vertical-align:top">Cut&nbsp;</td><td style="vertical-align:top"><select id="puzzleCut"><option value="classic" selected="selected">Classic</option><option value="straight">Straight</option><option value="tenon">Tenon</option><option value="wave">Wave</option></select></td></tr>
                  <tr><td colspan="2">&nbsp;</td></tr>
                  <tr><td style="white-space:nowrap;vertical-align:top">Screen size&nbsp;</td><td style="vertical-align:top"><select id="puzzleScreenSize"><option value="h600">800×600</option><option value="h768">1024×768</option><option value="h1024" selected="selected">1280×1024</option><option value="h1050">1680×1050</option><option value="h1200">1920×1200</option></select>
                  <span style="color:#888">(Screen size determine work area size, which determine puzzle size, which influence the size of individual pieces)</span></td></tr>
                  <tr><td colspan="2">&nbsp;</td></tr>
                  <tr><td style="white-space:nowrap;vertical-align:top">Suggested number of pieces&nbsp;</td><td style="vertical-align:top"><input id="puzzlePieces" type="text" size="2" maxlength="3" value="16">
                  <span style="color:#888">(This number is used as a guide only, restrictions may apply. More pieces = smaller pieces)</span></td></tr>
                  <tr><td colspan="2">&nbsp;</td></tr>
                  <tr><td style="white-space:nowrap;vertical-align:top">Complexity of puzzle pieces&nbsp;</td><td style="vertical-align:top"><select id="puzzleComplexity"><option value="0">Regular</option><option value="1" selected="selected">Slightly irregular</option><option value="3">Moderatly irregular</option><option value="8">Very irregular</option></select></td></tr>
                  <tr><td colspan="2">&nbsp;</td></tr>
                  <tr><td style="white-space:nowrap;vertical-align:top">Whether pieces can be rotated&nbsp;</td><td style="vertical-align:top"><select id="puzzleRotate"><option value="1">No rotation</option><option value="4">Rotate 90°</option><option value="24" selected="selected">Rotate fully</option></select></td></tr>
                  <tr><td colspan="2">&nbsp;</td></tr>
                  <tr><td style="white-space:nowrap;vertical-align:top">URL of picture to use&nbsp;</td><td style="vertical-align:top">
                  <!-- <input id="puzzleURL" type="text" size="80" maxlength="256" value=""> -->
                  <input type="file" id="puzzleURL" name="imageupload"><span id="pix"> Min Pixels Should be 480 X 480</span>
                 <!--  <span style="color:#888">(Of interest: <a target="_blank" href="http://en.wikipedia.org/wiki/Public_domain_image_resources#General_collections">general collections of public domain images</a>)</span> -->
                  </td></tr>
                  <tr><td colspan="2">&nbsp;</td></tr>
                  <tr><td style="color:#f77;" colspan="2">Beware: Clicking on the “Create” button will cause the current jigsaw puzzle in the “Solve” tab to be replaced. Also, note that the more pieces there are, the longer it will take to generate the jigsaw puzzle, so you might experience a delay.</td></tr>
                  <tr><td colspan="2">&nbsp;</td></tr>
                  <tr><td style="white-space:nowrap;vertical-align:top"><input id="puzzleCreate" style="width:9em;padding:3px;border:solid 1px #333;" type="button" value="Create" onclick="javascript:console.log(this);this.createPuzzle();self.location.hash=&#39;#&#39;;"></td></tr>
                  </tbody></table>
                  </div>
                  <!-- ================================== -->
                  <div id="puzzleTabShare" style="display:none">
                  <div style="margin-top:1em;font-family:tahoma,sans-serif;font-size:12px">
                  <p>You can generate a <b>permalink</b> of the current state of your puzzle (progress included!):<br>
                  <input id="puzzleGeneratePermalink" style="width:9em;padding:3px;border:solid 1px #333;" type="button" value="Create permalink" onclick="javascript:this.generatePuzzlePermalink();">&nbsp;<input id="puzzlePermalink" style="padding:3px;" type="text" size="100" readonly="readonly" value="" onclick="javascript:this.focus();this.select();"></p>
                  <p style="display:none"><a id="puzzleEmailTo" href="mailto:?subject=Have%20fun%20with%20this%20jigsaw%20puzzle!&amp;body=http%3A%2F%2Fwww.raymondhill.net%2Fpuzzle-rhill%2Fjigsawpuzzle-rhill.php">Email this permalink to...</a></p>
                  <p>Alternatively, you can generate a <b>Jigsaw Puzzle Key</b> identifying uniquely the current state of your puzzle (progress included!):<br>
                  <input id="puzzleGenerateKey" style="width:9em;padding:3px;border:solid 1px #333;" type="button" value="Generate key" onclick="javascript:this.generatePuzzleKey();">&nbsp;<input id="puzzleKeyOut" style="padding:3px;" type="text" size="100" readonly="readonly" value="" onclick="javascript:this.focus();this.select();"><br><span style="font-size:11px;color:#999">(Be sure to copy <b>all</b> the characters!)</span></p>
                  <p>You can save this key for later use, or you can send this key to a friend, who can then use it to generate the same puzzle on his side.</p>
                  <p>A friend sent you a <b>Jigsaw Puzzle Key</b>? Enter it here to generate his/her custom-made jigsaw puzzle in your “Solve” tab:<br>
                  <input id="puzzleKeyInCreate" style="width:9em;padding:3px;border:solid 1px #333;" type="button" value="Create" onclick="javascript:this.createPuzzleFromKey();">&nbsp;<input id="puzzleKeyIn" style="padding:3px;" type="text" size="100" value=""><br><span style="font-size:11px;color:#999">(Be sure to paste <b>all</b> the characters!)</span></p>
                  <p style="white-space:nowrap;color:#f77;">Beware: Clicking on the “Create” button will cause the current jigsaw puzzle to be replaced (Your selected “Screen size” setting will be preserved though.)</p>
                  </div>
                  </div>
                
                  </div>
                    <!-- ======== End of Puzzle Create Options ============ -->
                 

                   
                </fieldset>

                <!-- ====================== Key Answer Screen EDIT mode ============================ -->
                <h3>Key Answers</h3>
                <fieldset>
 

                 <div class="row">
                    <div id="answerDiv" class="col-md-12">
                       <div class="form-group">
                            <center><div id="question_key_answers_error" style="color:red"></div></center>
                      </div>
                      <div id="chemistryOptionDiv"></div>
                      <div id="answeroptiondiv"></div>
                      <div class="form-group" id="finalAns">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Answer</label>
                        <div class="col-sm-9 col-md-4">
                           <input id="questionKeyAnswer1" type="text" class="form-control">
                        </div> 
                         <button type="button" id="addAnswer" name="btnSubmit" class="btn btn-raised btn-black">+</button> <button id="removeAnswer" name="btnSubmit" class="btn btn-raised btn-black">-</button>
                      </div>
                    </div>
                  </div>     

                   <div class="row" >
                   <div id="matchAnswerDiv" class="matchKeyAns">   
                    <div class="form-group">
                            <center><div id="question_key_answers_error" style="color:red"></div></center>
                      </div>         
                    </div>
                  </div>

                   <div id="finalDiv" style="height:fit-content; margin-top:20px; min-height:50px; box-shadow: 0px 1px 17px #aaaaaa; background: #f6f5f6" ondrop="drop(event)" ondragover="allowDrop(event)">

                      <h3 style="padding-bottom:10px; padding-top:5px;">Jumbled Answers :</h3> <div id="matchAnserDiv"></div>
                    </div> 
                    <canvas id="puzzleAnswer"></canvas>
                    <!-- <canvas id="puzzle1" width="480px" height="480px"></canvas> -->
                </fieldset>             
              </form>
            </div>
          </div>

      </script>

<!--Question Bank End -->

<!--      Language      -->

<script type="text/template" id="languagePageTpl">
       <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Language</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form  class="form-horizontal">
                   <fieldset>                  

                      <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <div class="col-sm-8 col-md-2">
                                  <input id="language_search" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                            </div>
                              <button type="submit" id="create_language" name="btnSubmit" class="btn btn-raised btn-black">Add</button> 
                              <button id="language_deleteall" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                            </div>
                      </div>


                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr  class="trrc">
                        <th>Name</th>
                        <th>Short Name</th>
                        <th>Status</th>        
                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="language_list">
                        
                    </tbody>
                     <div id="findStatus"></div>
                  </table>   

                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button id="language_load_more" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>
                  <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Language</h4>
                           </div>
                        <div class="modal-body" id ="com_ques">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="langid">
                  <button type="button" class="btn btn-black" id="del_language">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>
   

                 
                </fieldset>
                </form>
            </div>
          </div>
</script>

<script type="text/template" id="languageTemplate">

    <td><a  data-container="body" data-toggle="popover" data-content="<%=language%>" ><%=(language.length > 50 ? language.substring(0, 50) + "..." : language)%></a>
    </td>
    <td><%=language_short_name%></td>
    <td><%=is_active%></td>
    <td>
      <span style="display:inline-block; width: 20px;">
      <a id="edit_language" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
      </span>
      <span style="display:inline-block; width: 20px;">
      <a id="activate_language" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
      </span>
      <span style="display:inline-block; width: 20px;">
      <a id="del_language_one" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-minus-sign"></i></a>
      </span>
    </td> 



 </script>

<script type="text/template" id="languageCreateFormTpl">
  
         <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create Language</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Language Name</label>
                        <div class="col-sm-9 col-md-4">
                       <input id="language_name" name="txtFirstNameBilling" type="text" class="form-control" maxlength="25">
                       <div id="language_name_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Short Name</label>
                        <div class="col-sm-9 col-md-4">
                       <input id="language_short_name" name="txtFirstNameBilling" type="text" class="form-control" maxlength="5">
                       <div id="language_short_name_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="save_language" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button>  

                              <button type="submit" id="cancel_language" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
</script>

<script type="text/template" id="languageEditFormTpl">
  
         <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Edit Language</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                       <input id="language_id" type="hidden" class="form-control" value="<%=language_id%>" />
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Language Name</label>
                        <div class="col-sm-9 col-md-4">
                           <input id="language_name"  value="<%=language%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="25">
                           <div id="language_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Short Name</label>
                        <div class="col-sm-9 col-md-4">
                           <input id="language_short_name"  value="<%=language_short_name%>" name="txtFirstNameBilling" type="text" class="form-control" maxlength="5">
                           <div id="language_short_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="save_language" name="btnSubmit" class="btn btn-raised btn-black">Save</button>  

                              <button type="submit" id="cancel_language" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>

     </script>
      <!--pricing -->

        <script type="text/template" id="pricingPageTpl">

                <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Pricing</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form class="form-horizontal">
                   <fieldset>                  

                      <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <div class="col-sm-8 col-md-2">
                            <input id="pricing_search" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                            </div>
                              <button type="submit" id="create_pricing"  name="pricing-create" class="btn btn-raised btn-black">Add</button> 
                              <button id="pricing_deleteall" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                            </div>
                      </div>


                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr  class="trrc">
                       
                        <th>Description</th>
                        <th>Effective From</th>
                         <th>Effective Till</th>
                         <th>Currency</th>
                        <th>Status</th>           
                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="pricing_list">
   
                        
                    </tbody>
                  </table>   

                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button id="pricing_load_more" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>
                <div id="myModal" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Pricing</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="priceid">
                  <button type="button" class="btn btn-black" id="del_pric">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>                        
                </fieldset>
                </form>
            </div>
          </div>

        </script>

         <script type="text/template" id="pricingTemplate">


         <td><a  data-container="body" data-toggle="popover" data-content="<%=prc_description%>" ><%=(prc_description.length > 50 ? prc_description.substring(0, 50) + "..." : prc_description)%></a></td>


         <td><%=prc_eff_from_date%></td>

         <td><%=prc_eff_to_date%></td>
         <td><%=currency_name%></td>
         <td><%=is_active%></td>
          <td>
              <span style="display:inline-block; width: 20px;">
              <a id="edit_pricing" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
              </span>
              <span style="display:inline-block; width: 20px;">
              <a id="activate_pricing" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
              </span>
              <span style="display:inline-block; width: 20px;">
              <a id="del_pricing" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-minus-sign"></i></a>
              </span>
          </td> 
        </script>

         <script type="text/template" id="pricingCreateFormTpl">

                 <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create Pricing</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="zone-name" class="col-sm-3 col-md-4 control-label">Pricing Type</label>
                        <div class="col-sm-9 col-md-4">
                            <select id="prc_type" name="zone-name" type="text" class="form-control" maxlength="10">
                            <option value="">Select</option>
                              <option value="1">a</option>
                            <option value="2">b</option>
                            </select>

                          <div id="prc_type_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="zone-name" class="col-sm-3 col-md-4 control-label">Description</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="prc_description" name="zone-name" type="text" class="form-control" maxlength="150">
                          <div id="prc_description_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>  
                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Effective From</label>
                        <div class="col-sm-9 col-md-4">
                          <div id="datetimepicker1" class="input-group date">
                            <input id="prc_eff_from_date" data-date-format='YYYY-MM-DD' name="txtFirstNameBilling" type="text" class="form-control" style="width:300px">
                             <div id="prc_eff_from_date_error" class="" style="font-size: 12px; color: #FF0000; "></div>
                             </div>
                          </div>
                      </div>
                    </div>
                  </div> 

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Effective To</label>
                        <div class="col-sm-9 col-md-4">
                        <div id="datetimepicker1" class="input-group date">
                               <input id="prc_eff_to_date" data-date-format='YYYY-MM-DD' name="txtFirstNameBilling" type="text" class="form-control" style="width:300px">
                                <div id="prc_eff_to_date_error" class="" ></div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>       
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="pricing-desc-name" class="col-sm-3 col-md-4 control-label">Pricing Detail Description</label>
                        <div class="col-sm-9 col-md-4">
                            <textarea id="prc_detail_desc" name="pricing-desc-name" type="text" class="form-control" maxlength="150"></textarea>
                          <div id="prc_detail_desc_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>  
                  <div class="row" style="right:30px">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Pricing Currency</label>
                        <div class="col-sm-9 col-md-4">
                        <select id="prc_currency"  name="ddlQuestionComplexity" class="form-control">
                           <option value="">Select</option>
                        </select>                       
                        <div id="prc_currency_error" style="color:red"></div>                      
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="zone-name" class="col-sm-3 col-md-4 control-label">Price</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="prc_price" name="zone-name" type="text" class="form-control" maxlength="12">
                          <div id="prc_price_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>   
                   
                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="zone-name" class="col-sm-3 col-md-4 control-label">Price Discount</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="prc_disc" name="zone-name" type="text" class="form-control" maxlength="2">
                          <div id="prc_disc_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="zone-name" class="col-sm-3 col-md-4 control-label">Payment Method</label>
                        <div class="col-sm-9 col-md-4">
                            <select id="prc_payment_mode" name="zone-name" type="text" class="form-control" maxlength="15">
                             <option value="">Select</option>
                              <option value="1">a</option>
                            <option value="2">b</option>
                            </select>
                            
                          <div id="prc_payment_mode_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>   
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="zone-name" class="col-sm-3 col-md-4 control-label">Payment Usance</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="prc_usance" name="zone-name" type="text" class="form-control" maxlength="15">
                          <div id="prc_usance_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>   

                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="button" id="save_pricing"  name="btnSave" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button> 
                               <button type="button" id="cancel_pricing" name="btnCancel" class="btn btn-raised btn-black">Cancel</button>                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>

         </script>

     <script type="text/template" id="pricingEditFormTpl">

                 <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Edit Pricing</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>
                   <input id="" type="hidden" class="form-control" value="<%=pricing_id%>" />

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="zone-name" class="col-sm-3 col-md-4 control-label">Pricing Type</label>
                        <div class="col-sm-9 col-md-4">
                            <select id="prc_type" name="zone-name" type="text" value="<%=prc_type%>" class="form-control" maxlength="10">
                             <option value="">Select</option>
                            <option value="1">a</option>
                            <option value="2">b</option>
                            </select>
                          <div id="prc_type_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="zone-name" class="col-sm-3 col-md-4 control-label">Description</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="prc_description" name="zone-name" value="<%=prc_description%>"  type="text" class="form-control" maxlength="150">
                          <div id="prc_description_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>  
                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Effective From</label>
                        <div class="col-sm-9 col-md-4">
                          <div id="datetimepicker1" class="input-group date">
                            <input id="prc_eff_from_date" data-date-format='YYYY-MM-DD' name="txtFirstNameBilling" type="text" class="form-control"  value="<%=prc_eff_from_date%>" style="width:300px">
                             <div id="prc_eff_from_date_error" class="" style="font-size: 12px; color: #FF0000; "></div>
                             </div>
                          </div>
                      </div>
                    </div>
                  </div> 

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Effective To</label>
                        <div class="col-sm-9 col-md-4">
                        <div id="datetimepicker1" class="input-group date">
                               <input id="prc_eff_to_date" data-date-format='YYYY-MM-DD' name="txtFirstNameBilling" type="text" class="form-control" value="<%=prc_eff_to_date%>" style="width:300px">
                                <div id="prc_eff_to_date_error" class="" ></div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>       
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="pricing-desc-name" class="col-sm-3 col-md-4 control-label">Pricing Detail Description</label>
                        <div class="col-sm-9 col-md-4">
                            <textarea id="prc_detail_desc" name="pricing-desc-name" type="text" class="form-control" maxlength="150"><%=prc_detail_desc%></textarea>
                          <div id="prc_detail_desc_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Pricing Currency</label>
                        <div class="col-sm-9 col-md-4">
                              <select id="prc_currency"  name="ddlQuestionComplexity" class="form-control">
                              <option value="">Select</option>
                              </select> 
                                <div id="prc_currency_error" style="color:red"></div>                 
                       </div>
                      </div>
                    </div>
                    </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="zone-name" class="col-sm-3 col-md-4 control-label">Price</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="prc_price" name="zone-name" type="text" value="<%=prc_price%>"  class="form-control" maxlength="12">
                          <div id="prc_price_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>   
                   
                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="zone-name" class="col-sm-3 col-md-4 control-label">Price Discount</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="prc_disc" name="zone-name" type="text" value="<%=prc_disc%>"  class="form-control" maxlength="2">
                          <div id="prc_disc_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="zone-name" class="col-sm-3 col-md-4 control-label">Payment Method</label>
                        <div class="col-sm-9 col-md-4">
                            <select id="prc_payment_mode" name="zone-name" value="<%=prc_payment_mode%>"  type="text" class="form-control" maxlength="15">
                             <option value="">Select</option>
                             <option value="1">a</option>
                            <option value="2">b</option>                              
                            </select>
                          <div id="prc_payment_mode_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>   
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="zone-name" class="col-sm-3 col-md-4 control-label">Payment Usance</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="prc_usance" name="zone-name" type="text" value="<%=prc_usance%>" class="form-control" maxlength="15">
                          <div id="prc_usance_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>   

                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="button" id="save_pricing"  name="btnSave" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button> 

                               <button type="button" id="cancel_pricing" name="btnCancel" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>

         </script>


     <!-- Questions and options -->


     <script type="text/template" id="ExamPageTpl">
     <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Examination</h3>
            </div>
            <div ><font id="time" size="7" style="border: 5px solid purple;"></font></div>
            <div id="alert_messages"></div>
            <div class="widget-body" style="padding:6px;">
              <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">                   
                    <tbody>                    
                      <tr  class="trrc">
                        <td>Exam Date</td>
                        <td>Start Time</td>
                        <td>End Time</td>
                        <td>Category</td>
                        <td>Subject</td>
                        <td>Topic</td>
                        <td>Tot. Qtns</td>
                       </tr>
                        <tr>
                        <td>22/10/2017</td>
                        <td>17:00</td>
                        <td>18:30</td>
                        <td>Comp Eng</td>
                        <td>Networking</td>
                        <td>Protocol</td>
                        <td>100</td>
                       </tr>
                        <tr border="0">
                          <td colspan="3" align ="right">Attented Question(s) : 10</td>
                          <td colspan="2" align ="right">Remain Question(s): 10</td>
                          <td colspan="2" align ="right">Remain Time : 60 min</td>
                        </tr>
               </tbody>
               </table>

              <B>In the following questions,four options are  given out of which one is correct,Please select the correct answer by clicking on it.</B>

              <table  cellspacing="0" height="50%" width="100%" border="0" style="overflow:auto">
                   <tr>
                     <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered" style="overflow:auto">
                    <tbody id="Questions_list">                    
                    
                     
                   
                    </tbody>
                    </table>                     
                   </tr>

               </table>



              <div class="form-group">
                            <div class="col-sm-offset-4 " >
                             <button type="button" name="btnSubmit" class="btn btn-raised btn-black">Previous</button> 
                              <button type="button" name="btnSubmit" class="btn btn-raised btn-black">Next</button>    <button type="button" name="btnSubmit" onclick="location.href='main_assesments.html';"class="btn btn-raised btn-black">Submit</button> 
                              </div>
                </div>
            
            </div>
          </div>

     </script>

     <script type="text/template" id="ExamTemplate">
       <tr>                       
       <td colspan="2"><%=Questions%></td>
      </tr>
      <tr>
      <td><div class="radio">
      <label>
       <input type="radio" name="rdbGenderHor" value="a1" data-rule-required="true"> <%='Option1'%>
      </label>
      </div> </td>
        <td><div class="radio">
      <label>
      <input type="radio" name="rdbGenderHor" value="male" data-rule-required="true"> <%='Option2'%>
      </label>
      </div></td>
      </tr>
      <tr>
        <td><div class="radio">
      <label>
        <input type="radio" name="rdbGenderHor" value="male" data-rule-required="true"> <%='Option3'%>
      </label>
      </div></td>
            <td> <div class="radio">
      <label>
      <input type="radio" name="rdbGenderHor" value="male" data-rule-required="true"> <%='Option4'%>
      </label>
      </div></td>
      </tr>               
      

     </script>

  <!--     Generic Param -->

  <script type="text/template" id="genpPageTpl">
       <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Generic Param</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form  class="form-horizontal">
                   <fieldset>                  

                      <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <div class="col-sm-8 col-md-2">
                                  <input id="genp_search" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                            </div>
                              <button type="submit" id="create_genp" name="btnSubmit" class="btn btn-raised btn-black">Add</button> 
                              <button id="genp_deleteall" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                            </div>
                      </div>


                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr  class="trrc">
                        <th>Type</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Currency</th>
                        <th>Language</th>
                        <th>Status</th>        
                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="genp_list">
                        
                    </tbody>
                     <div id="findStatus"></div>
                  </table>   

                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button id="genp_load_more" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>

                 <div id="myModalgen" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Generic Param</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="genparid">
                  <button type="button" class="btn btn-black" id="del_gen_parm">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>
                </fieldset>
                </form>
            </div>
          </div>
</script>

<script type="text/template" id="genpTemplate">
    <td><a  data-container="body" data-toggle="popover" data-content="<%=genp_type%>" ><%=(genp_type.length > 15 ? genp_type.substring(0, 15) + "..." : genp_type)%></a>

    <td><a  data-container="body" data-toggle="popover" data-content="<%=genp_desc%>" ><%=(genp_desc.length > 15 ? genp_desc.substring(0, 15) + "..." : genp_desc)%></a>
    </td>

    <td><%=genp_app_date_format%></td>

    <td><a  data-container="body" data-toggle="popover" data-content="<%=currency_name%>" ><%=(currency_name.length > 15 ? currency_name.substring(0, 15) + "..." : currency_name)%></a>
    </td>

    <td><a  data-container="body" data-toggle="popover" data-content="<%=language%>" ><%=(language.length > 15 ? language.substring(0, 15) + "..." : language)%></a>
    </td>

    <td><%=is_active%></td>
    <td>
      <span style="display:inline-block; width: 20px;">
      <a id="edit_genp" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
      </span>
      <span style="display:inline-block; width: 20px;">
      <a id="activate_genp" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
      </span>
      <span style="display:inline-block; width: 20px;">
      <a id="del_genp" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModalgen"><i class="glyphicon glyphicon-minus-sign"></i></a>
      </span>
    </td> 
   

 </script>

   <script type="text/template" id="genpCreateFormTpl">

        <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Create Generic Param</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset> 
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label"> Type</label>
                        <div class="col-sm-9 col-md-4">
                                   <select id="genp_type" name="ddlCountryBilling" class="form-control">
                            <option value="">--Please Select--</option>
                                  <option value="Application">Application</option>
                                  <option value="Environment"> Environment</option>
                                  <option value="Operations"> Operations</option>
                           </select>    
                            <div id="genp_type_error" style="color:red"></div>             
                            </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label"> Description</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="genp_desc" name="txtFirstNameBilling" type="text" class="form-control" maxlength="50">
                            <div id="genp_desc_error" style="color:red"></div> 
                            </div>
                      </div>
                    </div>
                  </div>   

                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label"> Time Zone</label>
                        <div class="col-sm-9 col-md-4">
                  
                            <input id="genp_app_timezone" name="txtFirstNameBilling" type="text" class="form-control" maxlength="50">
                           <div id="genp_app_timezone_error" style="color:red"></div>             
                            </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">  Date</label>
                        <div class="col-sm-9 col-md-4">
                        <div id="datetimepicker1" class="input-group date">
                            <input id="genp_app_date_format" name="txtFirstNameBilling" data-date-format='YYYY-MM-DD' type="text" class="form-control" style="width:300px">
                             <div id="genp_app_date_format_error" style="font-size: 12px; color: #FF0000; "></div>      
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>  

                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">  Currency</label>
                        <div class="col-sm-9 col-md-4">
                                   <select id="genp_app_currency" name="ddlCountryBilling" class="form-control">
                            <option value="">--Please Select--</option>
                           </select>    
                           <div id="genp_app_currency_error" style="color:red"></div>               
                            </div>
                      </div>
                    </div>
                  </div>

                  <!--  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label"> Currency Symbol</label>
                        <div class="col-sm-9 col-md-4">
                                   <select id="genp_app_currency_symbol" name="ddlCountryBilling" class="form-control">
                            <option value="">-Please Select</option>
                           </select>                 
                            </div>
                      </div>
                    </div>
                  </div> -->

                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Language</label>
                        <div class="col-sm-9 col-md-4">
                                   <select id="genp_app_default_language" name="ddlCountryBilling" class="form-control">
                            <option value="">--Please Select--</option>
                           </select>  
                           <div id="genp_app_default_language_error" style="color:red"></div>                   
                            </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label"> Out Going Email Address</label>
                        <div class="col-sm-9 col-md-4">
                              <input id="genp_app_out_going_email_add" name="txtFirstNameBilling" type="text" class="form-control" maxlength="50">
                              <div id="genp_app_out_going_email_add_error" style="color:red"></div>
                            </div>          
                            </div>
                      </div>
                    </div>
                

                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="button" id="genp_create" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button>
                               <button type="submit" id="genp_cancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
              </div>
              </div>

         
          
  </script>

   <script type="text/template" id="genpEditFormTpl">

        <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Edit Generic Param</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset> 
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                       <input id="generic_param_id" type="hidden" class="form-control" value="<%=generic_param_id%>" />
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label"> Type</label>
                        <div class="col-sm-9 col-md-4">
                                   <select id="genp_type" name="ddlCountryBilling" class="form-control">
                            <option value="">--Please Select--</option>
                                  <option value="Application"> Application</option>
                                  <option value="Environment"> Environment</option>
                                  <option value="Operations"> Operations</option>

                           </select>   
                           <div id="genp_type_error" style="color:red"></div>              
                            </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label"> Description</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="genp_desc" name="txtFirstNameBilling" type="text" class="form-control" value="<%=genp_desc%>" maxlength="50">
                             <div id="genp_desc_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>   

                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label"> Time Zone</label>
                        <div class="col-sm-9 col-md-4">
                              <input id="genp_app_timezone" name="txtFirstNameBilling" value="<%=genp_app_timezone%>" type="text" class="form-control" maxlength="50">              
                           <div id="genp_app_timezone_error" style="color:red"></div>   
                            </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">  Date</label>
                        <div class="col-sm-9 col-md-4">
                            <input id="genp_app_date_format" name="txtFirstNameBilling" type="text" class="form-control" data-date-format='YYYY-MM-DD'>
                            <div id="genp_app_date_format_error" style="color:red"></div>   
                            </div>
                      </div>
                    </div>
                  </div>  

                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">  Currency</label>
                        <div class="col-sm-9 col-md-4">
                                   <select id="genp_app_currency" name="ddlCountryBilling" class="form-control">
                            <option value="">--Please Select--</option>
                           </select>     
                           <div id="genp_app_currency_error" style="color:red"></div>            
                            </div>
                      </div>
                    </div>
                  </div>

                  <!--  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label"> Currency Symbol</label>
                        <div class="col-sm-9 col-md-4">
                             <input id="genp_app_currency_symbol" name="txtFirstNameBilling" type="text" class="form-control" value="<%=genp_app_currency_symbol%>">      
                             <div id="genp_app_default_language_error" style="color:red"></div>         
                            </div>
                      </div>
                    </div>
                  </div> -->

                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">   Language</label>
                        <div class="col-sm-9 col-md-4">
                                   <select id="genp_app_default_language" name="ddlCountryBilling" class="form-control">
                            <option value="">--Please Select--</option>
                           </select>     
                           <div id="genp_app_default_language_error" style="color:red"></div>            
                            </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label"> Out Going Email Address</label>
                        <div class="col-sm-9 col-md-4">
                              <input id="genp_app_out_going_email_add" name="txtFirstNameBilling" type="text" class="form-control" maxlength="50" value="<%=genp_app_out_going_email_add%>">
                              <div id="genp_app_out_going_email_add_error" style="color:red"></div>
                            </div>          
                            </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="button" id="genp_create" name="btnSubmit" class="btn btn-raised btn-black">Save</button>
                               <button type="submit" id="genp_cancel" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>
  </script>
    

     <!-- Questions and options -->


     <script type="text/template" id="ExamPageTpl">
     <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Examination</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">                   
                    <tbody>                    
                      <tr  class="trrc">
                        <td>Exam Date</td>
                        <td>Start Time</td>
                        <td>End Time</td>
                        <td>Category</td>
                        <td>Subject</td>
                        <td>Topic</td>
                        <td>Tot. Qtns</td>
                       </tr>
                        <tr>
                        <td>22/10/2017</td>
                        <td>17:00</td>
                        <td>18:30</td>
                        <td>Comp Eng</td>
                        <td>Networking</td>
                        <td>Protocol</td>
                        <td>100</td>
                       </tr>
                        <tr border="0">
                          <td colspan="3" align ="right">Attented Question(s) : 10</td>
                          <td colspan="2" align ="right">Remain Question(s): 10</td>
                          <td colspan="2" align ="right">Remain Time : 60 min</td>
                        </tr>
               </tbody>
               </table>

              <B>In the following questions,four options are  given out of which one is correct,Please select the correct answer by clicking on it.</B>

              <table  cellspacing="0" height="50%" width="100%" border="0" style="overflow:auto">
                   <tr>
                     <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered" style="overflow:auto">
                    <tbody id="Questions_list">                    
                    
                     
                   
                    </tbody>
                    </table>                     
                   </tr>

               </table>



              <div class="form-group">
                            <div class="col-sm-offset-4 " >
                             <button type="button" name="btnSubmit" class="btn btn-raised btn-black">Previous</button> 
                              <button type="button" name="btnSubmit" class="btn btn-raised btn-black">Next</button>    <button type="button" name="btnSubmit" onclick="location.href='main_assesments.html';"class="btn btn-raised btn-black">Submit</button> 
                              </div>
                </div>
            
            </div>
          </div>

     </script>

     <script type="text/template" id="ExamTemplate">
       <tr>                       
       <td colspan="2"><%=Questions%></td>
      </tr>
      <tr>
      <td><div class="radio">
      <label>
       <input type="radio" name="rdbGenderHor" value="a1" data-rule-required="true"> <%='Option1'%>
      </label>
      </div> </td>
        <td><div class="radio">
      <label>
      <input type="radio" name="rdbGenderHor" value="male" data-rule-required="true"> <%='Option2'%>
      </label>
      </div></td>
      </tr>
      <tr>
        <td><div class="radio">
      <label>
        <input type="radio" name="rdbGenderHor" value="male" data-rule-required="true"> <%='Option3'%>
      </label>
      </div></td>
            <td> <div class="radio">
      <label>
      <input type="radio" name="rdbGenderHor" value="male" data-rule-required="true"> <%='Option4'%>
      </label>
      </div></td>
      </tr>               
      

     </script>

     <script type="text/template" id="renderingQuestionTmpl">
     <div id="preloader"></div>
         <div class="widget">
         <div class="bix-div-container" style="width: 100%; padding-top: 10px; padding-bottom: 300px;">

         <div class="row">
            <div class="col-md-4">
            <div class="panel panel-default">
             <div class="panel-heading">
                  <h5 class="panel-title">Time Elapsed:<span id=timeElapsed> 0 Minute</span></h5>
                  <h5 id="catName" class="panel-title">Category:</h5>
                  <h5 class="panel-title">Subject:</h5>
                  <h5 class="panel-title">Topic:</h5>
           </div>
            <div class="panel-body" id="questionView">
              <h5>Unanswered:<div id="Unanswered"></div></h5>
              <h5>Reviewed:<div id="Reviewed"></div></h5>
              <div id="renderIndexList"></div>
            </div>
            </div>
          </div>

           
           
          <div class="col-md-8">
               <div id="renderQuestionList"></div>
         </div>
        </div>

          <div class="row">
            <div class="col-md-12">
               <button type="button" style="margin-left:50px;" id="previous_question" class="btn btn-black">Previous</button>   
               <button type="button" id="next_question" style="margin-left:750px;" class="btn btn-black">Next </button>
            </div>
         </div>

         <div class='row'>

           <div align="center">     
           <div id="renderIndexList"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
         <button type="button" style="margin-left:250px;" id="clear_question" class="btn btn-black">Clear</button>
         <button type="button" id="review_question" style="margin-left:20px;" class="btn btn-black">review</button>
         <button type="button" id="question_confirm" style="margin-left:20px;" class="btn btn-black">Confirm</button>
         </div>
         </div>
        </div>
     </script>

     <script type="text/template" id="renderAllquestionTemplate">


     <% if (question_type_id==1) {%>

          <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Q<%=description%>.</h4>
              </div>

              <div class="panel-body">
                   <h5><%=question_txt_format%></h5>
               </div>
             <ul class="list-group">         
                <div id="optiondisplay1"></div>
             </ul>
           </div>
          
             
             
          <% }  else if (question_type_id==2) {%>

     <table class="" width="100%" cellspacing="0" cellpadding="0" border="0">
           
          <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Q<%=description%>.</h4>
              </div>

              <div class="panel-body">
                   <h5><%=question_txt_format%></h5>
               </div>
             <ul class="list-group">         
                <div id="optiondisplay1"></div>
             </ul>
           </div>
          <% }  else if (question_type_id==3) {%>

  
          <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Q<%=description%>.</h4>
              </div>

              <div class="panel-body">
                   <h5><%=question_txt_format%></h5>
               </div>
             <ul class="list-group">         
                <div id="optiondisplay1"></div>
             </ul>
           </div>
          <% }  else if (question_type_id==4) {%>

          <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Q<%=description%>.</h4>
              </div>

              <div class="panel-body">
                   <h5><%=question_txt_format%></h5>
               </div>
             <ul class="list-group">         
                <div id="optiondisplay1"></div>
             </ul>
           </div>
          <% }  else if (question_type_id==5) {%>

    
          <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Q<%=description%>.</h4>
              </div>

              <div class="panel-body">
                   <h5><%=question_txt_format%></h5>
               </div>
             <ul class="list-group">         
                <div id="optiondisplay1"></div>
             </ul>
           </div>
          <% }  else if (question_type_id==6) {%>

     
          <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Q<%=description%>.</h4>
              </div>

              <div class="panel-body">
                   <h5><%=question_txt_format%></h5>
               </div>
             <ul class="list-group">         
                <div id="optiondisplay1"></div>
             </ul>
           </div>
          <% }  else if (question_type_id==7) {%>

    
          <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Q<%=description%>.</h4>
              </div>

              <div class="panel-body">
                   <h5><%=question_txt_format%></h5>
               </div>
             <ul class="list-group">         
                <div id="optiondisplay1"></div>
             </ul>
           </div>
          <% }  else if (question_type_id==8) {%>

     
          <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Q<%=description%>.</h4>
              </div>

              <div class="panel-body">
                   <h5><%=question_txt_format%></h5>
               </div>
             <ul class="list-group">         
                <div id="optiondisplay1"></div>
             </ul>
           </div>
          <% }  else if (question_type_id==9) {%>

          <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Q<%=description%>.</h4>
              </div>

              <div class="panel-body">
                   <h5><%=question_txt_format%></h5>
               </div>
             <ul class="list-group">         
                <div id="optiondisplay1"></div>
             </ul>
           </div>
          <% }  else if (question_type_id==10) {%>

     
          <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Q<%=description%>.</h4>
              </div>

              <div class="panel-body">
                   <h5><%=question_txt_format%></h5>
               </div>
             <ul class="list-group">         
                <div id="optiondisplay1"></div>
             </ul>
           </div>

          <% }
          %> 
        
     </script>




     <!-- product catalog -->
        <script type="text/template" id="ProductCatalogPageTpl">
                <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Product Catalog</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form  class="form-horizontal">
                                   
                      <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <div class="col-sm-8 col-md-2">
                            <input id="productCatalogSearch" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                            </div>
                              <button type="button" id="createproductCatalog" name="btnSubmit" class="btn btn-raised btn-black">Add</button> 
                              
                              <button id="productCatalog_deleteall" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                            </div>
                      </div>
                      <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr  class="trrc">
                        
                        <th>Name</th>    
                        <th>Category</th>
                        <th>Subject</th>
                        <th>Client</th>
                        <th>ClientGroup</th>
                        <th>STATUS</th>        
                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="productcatalogList"></tbody>
                     <div id="findStatus"></div>
                  </table>   
                 
                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button id="productCatalog_load_more" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>
                 <div id="myModalProduct" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Product Catalog</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="prodcid">
                  <button type="button" class="btn btn-black" id="del_prod_cat">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>
                </form>
            </div>
          </div>
        </script>

        <script type="text/template" id="productCatalogTemplate">
        
          <td><a  data-container="body" data-toggle="popover" data-content="<%=name%>" ><%=(name.length > 30 ? name.substring(0, 30) + "..." : name)%></a>
      </td>

      <td><a  data-container="body" data-toggle="popover" data-content="<%=category_name%>" ><%=(category_name.length > 30 ? category_name.substring(0, 30) + "..." : category_name)%></a>
      </td>

      <td><a  data-container="body" data-toggle="popover" data-content="<%=subject_name%>" ><%=(subject_name.length > 30 ? subject_name.substring(0, 30) + "..." : subject_name)%></a>
      </td>

        <td><a  data-container="body" data-toggle="popover" data-content="<%=clnt_name%>" ><%=(clnt_name.length > 30 ? clnt_name.substring(0, 30) + "..." : clnt_name)%></a>
      </td>

      <td><a  data-container="body" data-toggle="popover" data-content="<%=clnt_group_name%>" ><%=(clnt_group_name.length > 30 ? clnt_group_name.substring(0, 30) + "..." : clnt_group_name)%></a>
      </td>

     
      <td><%=is_active%></td> 
      <td>

        <span style="display:inline-block; width: 20px;">
        <a id="edit_product_catalog" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
        </span>
        <span style="display:inline-block; width: 20px;">
        <a id="activate_product_catalog" data-toggle="tooltip" data-placement="top" title="Activate"><i class="glyphicon glyphicon-ban-circle"></i></a>  
        </span>
        <span style="display:inline-block; width: 20px;">
        <a id="delete_product_catalog" data-toggle="tooltip" data-placement="top" title="Delete"  data-toggle="modal" data-target="#myModalProduct"><i class="glyphicon glyphicon-minus-sign"></i></a>
        </span>
      </td>
        </script>

        <script type="text/template" id="productcatalogCreateFormTpl">

         <div class="widget">
            <div class="widget-heading">
                 <h3 class="widget-title">Create Product Catalog</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Name</label>
                        <div class="col-sm-5 col-md-5">
                            <input id="name_catalog" name="txtFirstNameBilling" type="text" class="form-control" maxlength="150">
                            <div id="product_catalog_name_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label"> Description</label>
                        <div class="col-sm-5 col-md-5">
                        <textarea id="description_catalog" name="txtFirstNameBilling" type="text" class="form-control" maxlength="300"></textarea>
                            <div id="description_catalog_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div>
                   
                  <div class="row">
                  <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Category</label>
                            <div class="col-sm-5 col-md-5">
                                <select id="questionCategory" name="ddlProductCategory" class="form-control">
                              </select> 
                                <div id="productCategory_not_select_error" style="color:red"></div>
                              </div>
                          </div>
                        </div>
                   

                    
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Subject</label>
                             <div class="col-sm-5 col-md-5">
                                  <select id="questionSubject" name="ddlProductSubject" class="form-control">
                               </select> 
                                <div id="productSubject_not_select_error" style="color:red"></div>
                              </div>
                          </div>
                        </div>
                      </div>
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Topic</label>
                            <div class="col-sm-5 col-md-5">
                                     <select id="questionTopic" name="ddlProductTopic" class="form-control">
                               </select> 

                             <div id="productTopic_not_select_error" style="color:red"></div>

                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Label</label>
                            <div class="col-sm-5 col-md-5">
                                     <input id="labeleDesign" name="ddlProductTopic" class="form-control" readonly>
                             <div id="labeleDesign_not_select_error" style="color:red"></div>

                            </div>
                          </div>
                        </div>
                      </div>
            <div class="widget-heading">
              <h3 class="widget-title">Product Commercial</h3>
            </div>
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Currency</label>
                            <div class="col-sm-5 col-md-5">
                                     <select id="genp_app_currency" name="ddlProductTopic" class="form-control">
                                     <option value="">--PleaseSelect--</option>
                               </select> 

                             <div id="productCurrency_not_select_error" style="color:red"></div>

                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Price</label>
                             <div class="col-sm-5 col-md-5"> 
                               <input id="productPrice" name="txtFirstNameBilling" type="text" class="form-control" maxlength="10">
                                <div id="productPrice_not_select_error" style="color:red"></div>
                              </div>
                          </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Discount(%)</label>
                            <div class="col-sm-5 col-md-5">
                              <input id="productDiscount" name="txtFirstNameBilling" type="text" class="form-control" maxlength="3">

                             <div id="productDiscount_not_select_error" style="color:red"></div>

                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Bundle Price</label>
                             <div class="col-sm-5 col-md-5">
                                  <input id="ProductBundlePrice" name="txtFirstNameBilling" type="text" class="form-control" maxlength="9">
                                <div id="ProductBundlePrice_not_select_error" style="color:red"></div>
                              </div>
                          </div>
                        </div>
                        </div>
                      <div class="row">  
                      <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">SGST(%)</label>
                            <div class="col-sm-5 col-md-5">
                            <input id="productsgst" name="txtFirstNameBilling" type="text" class="form-control" maxlength="3" > 

                             <div id="productsgst_not_select_error" style="color:red"></div>

                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">CGST(%)</label>
                             <div class="col-sm-5 col-md-5">
                                  <input id="productcgst" name="txtFirstNameBilling" type="text"  class="form-control" maxlength="3" > 
                                <div id="productcgst_not_select_error" style="color:red"></div>
                              </div>
                          </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">IGST(%)</label>
                            <div class="col-sm-5 col-md-5">
                            <input id="productigst" name="txtFirstNameBilling" type="text" class="form-control" maxlength="3" > 

                             <div id="productigst_not_select_error" style="color:red"></div>

                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Other Tax1(%)</label>
                             <div class="col-sm-5 col-md-5">
                                  <input id="producttax" name="txtFirstNameBilling" type="text"  class="form-control" maxlength="3" placeholder="OPTIONAL"> 
                                <div id="producttax_not_select_error" style="color:red"></div>
                              </div>
                          </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Other Tax2(%)</label>
                            <div class="col-sm-5 col-md-5">
                            <input id="producttax1" name="txtFirstNameBilling" type="text"  class="form-control" maxlength="3" placeholder="OPTIONAL"> 

                             <div id="producttax1_not_select_error" style="color:red"></div>

                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Other Tax3(%)</label>
                             <div class="col-sm-5 col-md-5">
                                  <input id="producttax2" name="txtFirstNameBilling" type="text"  class="form-control" maxlength="3" placeholder="OPTIONAL"> 
                                <div id="producttax2_not_select_error" style="color:red"></div>
                              </div>
                          </div>
                        </div>
                        </div>
            <div class="widget-heading">
              <h3 class="widget-title">Product Controls</h3>
            </div>
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Language</label>
                            <div class="col-sm-5 col-md-5">
                                     <select id="genp_app_default_language" name="ddlProductTopic" class="form-control">
                                     <option value="">--PleaseSelect--</option>
                               </select> 

                             <div id="productLanduage_not_select_error" style="color:red"></div>

                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Employee Band</label>
                             <div class="col-sm-5 col-md-5">
                                  <input id="productemployeeband" name="txtFirstNameBilling" type="text" class="form-control" maxlength="2"> 
                                <div id="productemployeeband_not_select_error" style="color:red"></div>
                              </div>
                          </div>
                        </div>
                        </div>
                    <div class="row"> 
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Effective From</label>
                        <div class="col-sm-5 col-md-5">
                          <div id="datetimepicker1" class="input-group date">
                            <input id="pro_cat_from_date" data-date-format='YYYY-MM-DD' name="txtFirstNameBilling" type="text" class="form-control" style="width:275px">
                             <div id="pro_cat_from_date_error" class="" style="font-size: 12px; color: #FF0000; "></div>
                             </div>
                          </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Effective To</label>
                        <div class="col-sm-5 col-md-5">
                        <div id="datetimepicker1" class="input-group date">
                               <input id="pro_cat_to_date" data-date-format='YYYY-MM-DD' name="txtFirstNameBilling" type="text" class="form-control" style="width:275px">
                                <div id="pro_cat_to_date_error" class="" style="font-size: 12px; color: #FF0000; "></div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="instruction_type" class="col-sm-3 col-md-4 control-label">Type of Attempt</label>
                        <div class="col-sm-5 col-md-5">
                             <select id="Product_type" name="Product_type_name" class="form-control">
                             <option value="">--PleaseSelect--</option>
                            <option  value="1">MOCK</option>
                            <option value="2">Single</option>
                            <option value="3">Multiple</option>
                            </select>                 
                           <div id="instruction_type_error" style="color:red"></div>
                           </div>                
                        </div>
                      </div>
                      <div id ="type1" class="col-md-6" >
                        <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Validity In Days</label>
                             <div class="col-sm-5 col-md-5">
                                  <input id="productattempt" name="productattempt" type="test" class="form-control" maxlength="3"> 
                                <div id="productattempt_not_select_error" style="color:red"></div>
                              </div>
                          </div>
                        </div>
                        </div>
                     <div class="row">  
                    <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Poupulate All</label>
                            <div class="col-sm-9 col-md-8">
                                     <label>
                            <input type="radio" class="q_desc" name="productPoupulate" value="1" data-rule-required="true"> Yes
                          </label>&nbsp;<label>
                            <input type="radio" class="q_desc" name="productPoupulate" value="0" data-rule-required="true"> No
                          </label>
                              <div id="poupulate_not_select_error" style="color:red"></div>                          

                            </div>
                          </div>
                        </div> 
                      <div id = "type2" class="col-md-6" >
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label" >No OF Attempts</label>
                             <div class="col-sm-5 col-md-5">
                                  <input id="productvalidity" name="productvalidity"  class="form-control" maxlength="3"> 
                                <div id="productvaliditty_not_select_error" style="color:red"></div>
                              </div>
                          </div>
                       </div>
                       </div>   

                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="button" id="save-product" name="btnSubmit" class="btn btn-raised btn-black" data-toggle="modal" data-target="#myModalPopup">Save</button>
                               <button type="submit" id="cancel-product" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>



        </script>

      <script type="text/template" id="productcatalogEditFormTpl">

         <div class="widget">
            <div class="widget-heading">
                 <h3 class="widget-title">Edit Product Catalog</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                
                <fieldset>



                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                     
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Name</label>
                        <div class="col-sm-5 col-md-5">
                            <input id="name_catalog"  name="txtFirstNameBilling" type="text" class="form-control" value="<%=name%>" maxlength="150">
                            <div id="product_catalog_name_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label"> Description</label>
                        <div class="col-sm-5 col-md-5">
                        <textarea id="description_catalog" name="txtFirstNameBilling" type="text" class="form-control" maxlength="300"><%=description%></textarea>
                            <div id="description_catalog_error" style="color:red"></div>
                            </div>
                      </div>
                    </div>
                  </div> 
                 
                <div class="row">
                  <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Category</label>
                            <div class="col-sm-5 col-md-5">
                                <select id="questionCategory" name="ddlProductCategory" class="form-control">
                              </select> 
                                <div id="productCategory_not_select_error" style="color:red"></div>
                              </div>
                          </div>
                        </div>
                   

                    
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Subject</label>
                             <div class="col-sm-5 col-md-5">
                                  <select id="questionSubject" name="ddlProductSubject" class="form-control">
                               </select> 
                                <div id="productSubject_not_select_error" style="color:red"></div>
                              </div>
                          </div>
                        </div>
                      </div>
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Topic</label>
                            <div class="col-sm-5 col-md-5">
                                     <select id="questionTopic" name="ddlProductTopic"  class="form-control">
                               </select> 

                             <div id="productTopic_not_select_error" style="color:red"></div>

                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Label</label>
                            <div class="col-sm-5 col-md-5">
                                     <input id="labeleDesign" name="ddlProductTopic" class="form-control" value="<%=label%>" readonly>
                             <div id="labeleDesign_not_select_error" style="color:red"></div>

                            </div>
                          </div>
                        </div>
                      </div>

            <div class="widget-heading">
              <h3 class="widget-title">Product Commercial</h3>
            </div>
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Currency</label>
                            <div class="col-sm-5 col-md-5">
                                     <select id="genp_app_currency" name="ddlProductTopic" class="form-control">
                                     <option value="">--PleaseSelect--</option>
                               </select> 

                             <div id="productCurrency_not_select_error" style="color:red"></div>

                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Price</label>
                             <div class="col-sm-5 col-md-5"> 
                               <input id="productPrice" name="txtFirstNameBilling" type="text" class="form-control" value="<%=price%>" maxlength="12">
                                <div id="productPrice_not_select_error" style="color:red"></div>
                              </div>
                          </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Discount(%)</label>
                            <div class="col-sm-5 col-md-5">
                              <input id="productDiscount" name="txtFirstNameBilling" type="text" class="form-control" value="<%=discount%>" maxlength="3">

                             <div id="productDiscount_not_select_error" style="color:red"></div>

                            </div>
                          </div>
                        </div>                       
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Bundle Price</label>
                             <div class="col-sm-5 col-md-5">
                                  <input id="ProductBundlePrice" name="txtFirstNameBilling" type="text" class="form-control" value="<%=bundle_price%>" maxlength="12">
                                <div id="ProductBundlePrice_not_select_error" style="color:red"></div>
                              </div>
                          </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">SGST(%)</label>
                            <div class="col-sm-5 col-md-5">
                            <input id="productsgst" name="txtFirstNameBilling" type="text" class="form-control" value="<%=sgst%>" maxlength="3"> 

                             <div id="productsgst_not_select_error" style="color:red"></div>

                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">CGST(%)</label>
                             <div class="col-sm-5 col-md-5">
                                  <input id="productcgst" name="txtFirstNameBilling" type="text"  class="form-control"  maxlength="3" value="<%=cgst%>"> 
                                <div id="productcgst_not_select_error" style="color:red"></div>
                              </div>
                          </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">IGST(%)</label>
                            <div class="col-sm-5 col-md-5">
                            <input id="productigst" name="txtFirstNameBilling" type="text" class="form-control"  maxlength="3" value="<%=igst%>"> 

                             <div id="productigst_not_select_error" style="color:red"></div>

                            </div>
                          </div>
                        </div>                      
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Other Tax1(%)</label>
                             <div class="col-sm-5 col-md-5">
                                  <input id="producttax" name="txtFirstNameBilling" type="text"  class="form-control"  maxlength="3" value="<%=other_tax1%>" placeholder="OPTIONAL"> 
                                <div id="producttax_not_select_error" style="color:red"></div>
                              </div>
                          </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Other Tax2(%)</label>
                            <div class="col-sm-5 col-md-5">
                            <input id="producttax1" name="txtFirstNameBilling" type="text"  class="form-control"  maxlength="3" value="<%=other_tax2%>" placeholder="OPTIONAL"> 

                             <div id="producttax1_not_select_error" style="color:red"></div>

                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Other Tax3(%)</label>
                             <div class="col-sm-5 col-md-5">
                                  <input id="producttax2" name="txtFirstNameBilling" type="text"  class="form-control"  maxlength="3" value="<%=other_tax3%>" placeholder="OPTIONAL"> 
                                <div id="producttax2_not_select_error" style="color:red"></div>
                              </div>
                          </div>
                        </div>
                        </div>
            <div class="widget-heading">
              <h3 class="widget-title">Product Controls</h3>
            </div>
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Language</label>
                            <div class="col-sm-5 col-md-5">
                                     <select id="genp_app_default_language" name="ddlProductTopic" class="form-control">
                                     <option value="">--PleaseSelect--</option>
                               </select> 

                             <div id="productLanduage_not_select_error" style="color:red"></div>

                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Employee Band</label>
                             <div class="col-sm-5 col-md-5">
                                  <input id="productemployeeband" name="txtFirstNameBilling" type="text" class="form-control" value="<%=employee_band%>" maxlength="2"> 
                                <div id="productemployeeband_not_select_error" style="color:red"></div>
                              </div>
                          </div>
                        </div>
                        </div>
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Effective From</label>
                        <div class="col-sm-5 col-md-5">
                          <div id="datetimepicker1" class="input-group date">
                            <input id="pro_cat_from_date" data-date-format='YYYY-MM-DD' name="txtFirstNameBilling" type="text" value="<%=valid_from%>" class="form-control" style="width:275px">
                             <div id="pro_cat_from_date_error" class="" style="font-size: 12px; color: #FF0000; "></div>
                             </div>
                          </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Effective To</label>
                        <div class="col-sm-5 col-md-5">
                        <div id="datetimepicker1" class="input-group date">
                               <input id="pro_cat_to_date" data-date-format='YYYY-MM-DD' name="txtFirstNameBilling" type="text" value="<%=valid_to%>" class="form-control" style="width:275px">
                                <div id="pro_cat_to_date_error" class="" ></div>
                            </div>
                        </div>
                      </div>
                    </div> 
                    </div>
                    <div class="row">         
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="instruction_type" class="col-sm-3 col-md-4 control-label">Type of Attempt</label>
                        <div class="col-sm-5 col-md-5">
                             <select id="Product_type" name="Product_type_name" class="form-control">
                             <option value="">--PleaseSelect--</option>
                             <option  value="1">MOCK</option>
                            <option value="2">Single</option>
                            <option value="3">Multiple</option>
                            </select>                 
                           <div id="instruction_type_error" style="color:red"></div>
                           </div>                
                      </div>
                    </div>
                    <div id ="type1" class="col-md-6" >
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Validity In Days</label>
                             <div class="col-sm-5 col-md-5">
                                  <input id="productattempt" name="productattempt" type="test" class="form-control" value="<%=valid_days%>" maxlength="3"> 
                                <div id="productattempt_not_select_error" style="color:red"></div>
                              </div>
                          </div>
                        </div>
                        </div>
                    <div class="row">
                    <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Poupulate All</label>
                            <div class="col-sm-9 col-md-8">
                        <label>
                          <input type="radio" class="q_desc" name="productPoupulate"  value="1" data-rule-required="true" <%=(populate_all == '1')?"checked":"" %> > Yes
                      </label>&nbsp;<label>
                        <input type="radio" class="q_desc" name="productPoupulate" value="0" data-rule-required="true"  <%=(populate_all == '0')?"checked":"" %> > No
                      </label>
                              <div id="poupulate_not_select_error" style="color:red"></div>                          

                            </div>
                          </div>
                        </div>
                       
                        <div id = "type2" class="col-md-6" >
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label" >No Of Attempts</label>
                             <div class="col-sm-5 col-md-5">
                                  <input id="productvalidity" name="productvalidity"  class="form-control" value="<%=no_of_attempts%>" maxlength="3"> 
                                <div id="productvaliditty_not_select_error" style="color:red"></div>
                              </div>
                          </div>
                       </div> 
                       </div>     

                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="button" id="save-product" name="btnSubmit" class="btn btn-raised btn-black">Save</button>
                               <button type="submit" id="cancel-product" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                 
                </fieldset>
              </form>
            </div>
          </div>



        </script>



<!-- Exam Design Management -->



<script type="text/template" id="examDesignPageTpl">
                <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Exam Design </h3>
            </div>
            <div class="widget-body" style="padding:6px;">
            <form  class="form-horizontal">
                                   
                      <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-12" >
                             <div class="col-sm-8 col-md-2">
                            <input id="examDesignSearch" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Search">
                            </div>
                              <button type="button" id="createExamDesign" name="btnSubmit" class="btn btn-raised btn-black">Add</button> 
                              
                              <button id="examDesign_deleteall" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Del All</button>
                            </div>
                      </div>
                      <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr  class="trrc">
                        
                        <th>Product Catalog</th>
                        <th>Category</th>
                        <th>Subject</th>
                        <th>Actions</th>                       
                      </tr>
                    </thead>
                    <tbody id="examDesignList"></tbody>
                     <div id="findStatus"></div>
                  </table>   
                 
                       <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4" >                          
                              <button id="examDesign_load_more" type="submit" name="btnSubmit" class="btn btn-raised btn-black">Load More</button>
                            </div>
                      </div>
                <div id="myModalExmDes" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Exam Design</h4>
                              <h6>Deleting Exam Design will delete all Products under this Design.</h6>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="exmid">
                  <button type="button" class="btn btn-black" id="del_exm_des">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div>
                </form>
            </div>
          </div>
        </script>

        <script type="text/template" id="examDesignTemplate">
        
          <td><a  data-container="body" data-toggle="popover" data-content="<%=name%>" ><%=(name.length > 50 ? name.substring(0, 50) + "..." : name)%></a>
      </td>

      <td><a  data-container="body" data-toggle="popover" data-content="<%=category_name%>" ><%=(category_name.length > 50 ? category_name.substring(0, 50) + "..." : category_name)%></a>
      </td>

      <td><a  data-container="body" data-toggle="popover" data-content="<%=subject_name%>" ><%=(subject_name.length > 50 ? subject_name.substring(0, 50) + "..." : subject_name)%></a>
      </td>

       

     
      
      <td>

        <span style="display:inline-block; width: 20px;">
        <a id="edit_exam_design" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a> 
        </span>        
        <span style="display:inline-block; width: 20px;">
        <a id="delete_exam_design" data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#myModalExmDes"><i class="glyphicon glyphicon-minus-sign"></i></a>
        </span>
      </td>
        </script>

        <script type="text/template" id="examDesignCreateFormTpl">

         <div class="widget">
            <div class="widget-heading">
                 <h3 class="widget-title">Create Exam Design</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                <fieldset>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Product Catalog</label>
                        <div class="col-sm-5 col-md-5">
                             <select id="product_catalog_id" name="ddlCreditCardType" class="form-control">
                            <option value="">--Please Select--</option></select>
                            <div id="product_catalog_select_error" style="color:red"></div>
                            </div>
                         </div>
                      </div>
                     </div>   
                  <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Category</label>
                          <div class="col-sm-8 col-md-8">
                          <input id="cat_design"  name="txtFirstNameBilling" type="text" class="form-control" readonly>
                              <div id="Category_exam_error" style="color:red"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Subject</label>
                          <div class="col-sm-8 col-md-8">
                         <input id="sub_design"  name="txtFirstNameBilling" type="text" class="form-control" readonly>
                              <div id="Subject_exam_error" style="color:red"></div>
                              </div>
                        </div>
                      </div>                    
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Topic</label>
                          <div class="col-sm-8 col-md-8">
                         <input id="top_design"  name="txtFirstNameBilling" type="text" class="form-control" readonly>
                              <div id="Topic_exam_error" style="color:red"></div>
                              </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Duration [Mins]</label>
                          <div class="col-sm-5 col-md-5">
                          <input id="duration"  name="txtFirstNameBilling" type="text" class="form-control" maxlength ="3">
                              <div id="Duration_exam_error" style="color:red"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Total Marks</label>
                          <div class="col-sm-5 col-md-5">
                          <input id="total_mark"  name="txtFirstNameBilling" type="text" class="form-control" maxlength ="6">
                              <div id="total_marks_error" style="color:red"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">No Of Questions</label>
                          <div class="col-sm-5 col-md-5">
                          <input id="no_of_question"  name="txtFirstNameBilling" type="text" class="form-control" maxlength ="6">
                              <div id="no_of_question_exam_error" style="color:red"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Negative Marks</label>
                            <div class="col-sm-9 col-md-8">
                                     <label>
                            <input type="radio" id ="neg_mark" class="mark_desc" name="markPoupulate" value="1" data-rule-required="true"> Yes
                          </label>&nbsp;<label>
                            <input type="radio" id ="neg_mark" class="mark_desc" name="markPoupulate" value="0" data-rule-required="true"> No
                          </label>
                              <div id="negative_mark_not_select_error" style="color:red"></div>                          

                            </div>
                          </div>
                        </div> 
                    </div>
                     <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Exam Time Alert Message [%]</label>
                          <div class="col-sm-5 col-md-5">
                          <input id="flashMsg"  name="txtFirstNameBilling" type="text" class="form-control" maxlength ="3">
                              <div id="flash_msg_error" style="color:red"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Pass Marks</label>
                          <div class="col-sm-5 col-md-5">
                          <input id="pass_mark"  name="txtFirstNameBilling" type="text" class="form-control" maxlength ="6">
                              <div id="pass_marks_error" style="color:red"></div>
                          </div>
                        </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Exam Time Alert Intervel [Mins]</label>
                          <div class="col-sm-5 col-md-5">
                          <input id="flash_msg_intervel"  name="txtFirstNameBilling" type="text" class="form-control" maxlength ="6">
                              <div id="flash_msg_intervel_error" style="color:red"></div>
                          </div>
                        </div>
                      </div>
                    </div>
              <div class="widget-heading">
              <h3 class="widget-title">Complexity Factor </h3>
            </div>

              <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Simple[%]</label>
                          <div class="col-sm-5 col-md-5">
                          <input id="simple"  name="txtFirstNameBilling" type="text" class="form-control" maxlength ="3">
                              <div id="simple_exam_error" style="color:red"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                     <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">medium[%]</label>
                          <div class="col-sm-5 col-md-5">
                          <input id="medium"  name="txtFirstNameBilling" type="text" class="form-control" maxlength ="3">
                              <div id="medium_exam_error" style="color:red"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                     <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">complex[%]</label>
                          <div class="col-sm-5 col-md-5">
                          <input id="complex"  name="txtFirstNameBilling" type="text" class="form-control" maxlength ="3">
                              <div id="complex_exam_error" style="color:red"></div>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="button" id="save_exam_design" name="btnSubmit" class="btn btn-raised btn-black"  data-toggle="modal" data-target="#myModalPopup">Save</button>
                               <button type="submit" id="cancel_exam_design" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                    
                 




                  </fieldset>
                      </div>
                   </div>
           



        </script>
         <script type="text/template" id="examDesignEditFormTpl">

         <div class="widget">
            <div class="widget-heading">
                 <h3 class="widget-title">Edit Exam design</h3>
            </div>
            <div class="widget-body" style="padding:6px;">
              <form id="form" class="form-horizontal">
                <fieldset>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Product Catalog</label>
                        <div class="col-sm-5 col-md-5">
                             <select id="product_catalog_id" name="ddlCreditCardType" class="form-control" disabled="true">
                            <option value="">--Please Select--</option></select>
                            <div id="product_catalog_select_error" style="color:red"></div>
                            </div>
                         </div>
                      </div>
                     </div>   
                  <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Category</label>
                          <div class="col-sm-8 col-md-8">
                          <input id="cat_design"  name="txtFirstNameBilling" type="text" class="form-control" readonly>
                              <div id="Category_exam_error" style="color:red"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Subject</label>
                          <div class="col-sm-8 col-md-8">
                         <input id="sub_design"  name="txtFirstNameBilling" type="text" class="form-control" readonly>
                              <div id="Subject_exam_error" style="color:red"></div>
                              </div>
                        </div>
                      </div>                    
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Topic</label>
                          <div class="col-sm-8 col-md-8">
                         <input id="top_design"  name="txtFirstNameBilling" type="text" class="form-control" readonly>
                              <div id="Topic_exam_error" style="color:red"></div>
                              </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Duration [Mins]</label>
                          <div class="col-sm-5 col-md-5">
                          <input id="duration"  name="txtFirstNameBilling" type="text" class="form-control" maxlength ="3">
                              <div id="Duration_exam_error" style="color:red"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Total Marks</label>
                          <div class="col-sm-5 col-md-5">
                          <input id="total_mark"  name="txtFirstNameBilling" type="text" class="form-control" maxlength ="6">
                              <div id="total_marks_error" style="color:red"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">No Of Questions</label>
                          <div class="col-sm-5 col-md-5">
                          <input id="no_of_question"  name="txtFirstNameBilling" type="text" class="form-control" maxlength ="6">
                              <div id="no_of_question_exam_error" style="color:red"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Negative Marks</label>
                            <div class="col-sm-9 col-md-8">
                                     <label>
                            <input type="radio" id ="neg_mark" class="mark_desc" name="markPoupulate" value="1" data-rule-required="true"> Yes
                          </label>&nbsp;<label>
                            <input type="radio" id ="neg_mark" class="mark_desc" name="markPoupulate" value="0" data-rule-required="true"> No
                          </label>
                              <div id="negative_mark_not_select_error" style="color:red"></div>                          

                            </div>
                          </div>
                        </div> 
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Flash Message [%]</label>
                          <div class="col-sm-5 col-md-5">
                          <input id="flashMsg"  name="txtFirstNameBilling" type="text" class="form-control" maxlength ="3">
                              <div id="flash_msg_error" style="color:red"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Pass Marks</label>
                          <div class="col-sm-5 col-md-5">
                          <input id="pass_mark"  name="txtFirstNameBilling" type="text" class="form-control" maxlength ="6">
                              <div id="pass_marks_error" style="color:red"></div>
                          </div>
                        </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Flash Message Time Intervel [Mins]</label>
                          <div class="col-sm-5 col-md-5">
                          <input id="flash_msg_intervel"  name="txtFirstNameBilling" type="text" class="form-control" maxlength ="6">
                              <div id="flash_msg_intervel_error" style="color:red"></div>
                          </div>
                        </div>
                      </div>
                    </div>
              <div class="widget-heading">
              <h3 class="widget-title">Complexity Factor </h3>
            </div>

              <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Simple[%]</label>
                          <div class="col-sm-5 col-md-5">
                          <input id="simple"  name="txtFirstNameBilling" type="text" class="form-control" maxlength ="3">
                              <div id="simple_exam_error" style="color:red"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                     <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">medium[%]</label>
                          <div class="col-sm-5 col-md-5">
                          <input id="medium"  name="txtFirstNameBilling" type="text" class="form-control" maxlength ="3">
                              <div id="medium_exam_error" style="color:red"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                     <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">complex[%]</label>
                          <div class="col-sm-5 col-md-5">
                          <input id="complex"  name="txtFirstNameBilling" type="text" class="form-control" maxlength ="3" >
                              <div id="complex_exam_error" style="color:red"></div>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="button" id="save_exam_design" name="btnSubmit" class="btn btn-raised btn-black">Save</button>
                               <button type="submit" id="cancel_exam_design" name="btnSubmit" class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                    
                 




                  </fieldset>
                      </div>
                   </div>               



        </script>


        <script type="text/template" id="promoCodeApplyTpl">
          
          <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title"> Assign Promo Code to employee</h3>
            </div>

            <form id="form-tabs" class="form-horizontal">
             <fieldset>
                    <div class="col-md-6">
                     <div class="widget">
                      <div class="widget-heading">
                        <h6 class="widget-title">Search Employee</h6>
                      </div>

                      <!-- <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-7" >
                         <input id="search_emp"  type="text" class="form-control" placeholder="Search">
                       </div>
                       </div> -->

                        <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Number</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="number_search"  type="text" maxlength="10">
                          <div id="" style="color:red"></div>
                        </div>
                      </div>

                     <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Band</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="band_search"  type="text" maxlength="2">
                          <div id="" style="color:red"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Deparment</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="dept_search"  type="text">
                          <div id="" style="color:red"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Location</label>
                        <div class="col-sm-9 col-md-8">
                          <input id="loc_search"  type="text">
                          <div id="" style="color:red"></div>
                        </div>
                      </div>

                      </div>
                    </div>

                     <div class="col-md-6">
                     <div class=" widget">
                     <div class="collapse1" style="height: 260px;">
                      <div class="widget-heading">
                        <h6 class="widget-title"> Exams List</h6>
                      </div>
                      <br>

                     

                       <div class="widget-body" style="height: 170px;">

                          <table id="example-1"  cellspacing="0" width="100%" class="table table-striped table-bordered scroll">
                                    <thead class="sublist">
                                      <tr  class="trrc">
                                      
                                        <th>Exams</th>
                                        <th> Available </th> 
                                        <th> <i class="glyphicon glyphicon-ok-sign"></i> </th>                        
                                                            
                                      </tr>
                                    </thead>
                                    <tbody id="exams_list">                        
                                    </tbody>
                                    <div id="findStatus"  style="margin-bottom: -50px;"></div>
                                  </table>   
                        </div>
                        
                    </div>
                    </div>
                   </div>

                 <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                               <button type="submit" id="search-employee" class="btn btn-raised btn-black">Search</button>                           
                            </div>
                      </div>
                    </div>
                  </div>


            
                



            </fieldset>
          </form>
        </div>

        <div class="widget" id="emphide">

        <form id="form-tabs" class="form-horizontal">
             <fieldset>

             <div class="widget-heading">
                        <h6 class="widget-title"> Employee List</h6>
             </div>

             <div class="row" >
                    <div class="col-md-12">
                        <div class="form-group">

          <div id="render_empsearch" class="col-sm-offset-2 col-sm-7">

           <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                                    <thead class="sublist">
                                      <tr  class="trrc">
                                      <th>Emp No</th>
                                        <th>FirstName / LastName</th>
                                        <th> Department </th>      

                                        <th> Location </th> 
                                        <th> Select  </th>                   
                                                            
                                      </tr>
                                    </thead>
                                    <tbody id="emp_list">

                                    </tbody>
                           </table>
                          </div>
                       </div>
                  </div>

                   <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                               <button type="submit" id="promo_apply_save" class="btn btn-raised btn-black">Submit</button><button type="submit" id="close_search" class="btn btn-raised btn-black" style="margin-left: 20px;">Close</button>                        
                            </div>

                              
                      </div>
<!--                     <div class="form-group">
                      <div class="col-sm-offset-4 col-sm-12">
                                                          
                            </div>
                     </div> -->       
                    </div>
                </div>
             </fieldset>
             </form>
          </div>

        </script>

        <script type="text/template" id="searchEmployeeTemplate">
          
                                  <tr>
                                  
                                      <td><%=employee_no%></td>
                                      <td><%=emp_first_name%> /  <%=emp_last_name%></td>
                                      <td><%=emp_dept_name%></td>
                                      <td><%=city_full_name%></td>
                                      <td><input type="checkbox" id="<%=emp_employee_id%>" class="checkbox"  ></td>
                                                  
                                  </tr>
                                    
                                  
        </script>

        <script type="text/template" id="pcExamTemplate">
               
                                    <tr>
                                   
                                      <td><%=name%></td>
                                      <td><%=promo_count%></td>
                                      
                                      <td><input type="radio" class="checkbox" name ="exams" value="<%=id%>"  id="<%=id%>"></td>
                                 </tr>                 
            </script>        
                                

      <script type="text/template" id="cartDetailsPageTpl">
        <div class="col-md-9" id="cartAdmin"> 
        <div class="panel panel-default">
        <div class="panel-heading">  
          <h3 class="panel-title">Your Cart</h3> 
        </div>
        <table class="table">  
        <thead>
          <tr class = "trrc">
          <th>Product Name</th>
          <th>Description</th> 
          <th>Quantity</th>
          <th>Tax(₹)</th>
          <th>Discount(₹)</th>
          <th>Price(₹)</th>
          <th>Delete</th> 
         </tr> 
        </thead> 
        <tbody id="cartPageList"> </tbody> 
         </table></div></div> 
         <button type="submit" id="placeOrderCart" class="btn btn-raised btn-black">Place Order</button>
          <button type="submit" id="backShop" class="btn btn-raised btn-black">Back</button>
          <div id="cartHide"></div>
      </script>

    
      <script  type="text/template" id="ProductCatalogTpl">
      <div class="advanced_selection">
            <table cellpadding="0" cellspacing="0" class="product_checks">
              <tr  class="trrc">
                <td><span>Category</span></td>
                <td><span>Subject</span></td>
                <td><span>Topic<span></td>
              </tr>
              <tr class="checks">
                <td id="selectCategoryoption">
                  <ul class="selectCategory">
                   
                  </ul>
                </td>
                <td id="selectedSubjectogoption">
                  <ul class="selectSubject">
                   
                  </ul>
                </td>
                <td id="selectedTopicoption">
                  <ul class="selectTopic">
                  </ul>
                </td>
              </tr>
            </table>
            <div style="clear: both;">
              <button type="submit" id="search" class="btn btn-raised btn-black">Search</button>
              <button type="submit" id="clear" class="btn btn-raised btn-black">Clear</button>
            </div>
            <div style="clear: both;"></div>
        </div><br>
      <div id="examTable"></div>
    
       <div id="productTable"></div>
      </script>

      <script type="text/template" id="ProductCatalogTbl">
   
                        <tr>
                          <td><%=name%></td>
                          <td><%=examName%></td>
                          <td><%=no_of_attempts%></td>
                          <td><%=valid_days%></td>
                          
                          <td><input type="checkbox" class="checkbox" name="checkbox"  id="<%=id%>"></td>
                        </tr>
                   
      </script>

      <script type="text/template" id="productListTableTbl">
   
            <tr>
              <td><%=name%></td>
              <td><%=examName%></td>
              <td><%=label%></td>
              <td><%=price%></td>
              <td><%=discount%></td>
              <td><%=valid_days%></td>
             
            </tr>
                   
      </script>

      <script type="text/template" id="addingCart">
         <tr id="a<%=id%>">
            <td><%=name%></td>
            <td><%=description%></td>
            <td><div><button id = "a2" class="minus" iid="<%=id%>" field="quantity"><i iid="<%=id%>" class="glyphicon glyphicon-minus" ></i></button> &nbsp &nbsp<input type='text' id="quantity" name='quantity' value='1' class='qty' readonly="readonly" style=" width: 40px; height: 25px; text-align: center;"/><button id = "a2" class="add" iid="<%=id%>" field="quantity"><i iid="<%=id%>" class="glyphicon glyphicon-plus"></i></button> </div>

            </td>
            <td id="tax"><%=tax%></td>
            <td id="discount"><%=discount%></td>
            <td id="price"><%=price%></td>
            <td><span style="display:inline-block; width: 20px;">
            <a class="del_cart"   data-toggle="tooltip" data-placement="top" title="Delete" val="<%=id%>"><i class="glyphicon glyphicon-minus-sign" ></i></a>
            </span></td>
          </tr>
      </script>

       <script type="text/template" id="performaPageTpl">
       <div id="pdftemplate">
        <div class="widget">
         <div class="widget-heading">
              <center><h3 class="widget-title">Performa Page</h3></center>
          </div>

            <form id="form-tabs" class="form-horizontal">
             <fieldset>
                    <div class="col-md-6">
                     <div class="widget">
                      <div class="widget-heading">
                        <h6 class="widget-title">Seller/shipper information</h6>
                      </div>
                     <br>
                   <div class="row"> 
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker"   value="Eprayoga" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>
                                   
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Address</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker"   value="eprayoga" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Country</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker"   value="India" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Tax number</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker"  value="EPR1234" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                    </div>
                      </div>
                  </div>


                  <div class="col-md-6">
                     <div class="widget">
                      <div class="widget-heading">
                        <h6 class="widget-title">Consignee information</h6>
                      </div>
                     <br>
                   <div class="row"> 
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker"  value="<%=consignee_first_name%>" type="">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>
                                   
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Address</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker"  value="<%=consignee_add_line_1%>" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Country</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker"  value="<%=country_full_name%>" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Tax number</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker"  value="<%=consignee_pan%>" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                    </div>
                      </div>
                  </div>

                  <div class="col-md-6">
                     <div class="widget">
                     <br>
                   <div class="row"> 
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Invoice date/number</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="invoiceDate" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>
                                   
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Order number/date</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="orderDate" value="<%=order_date%>" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Other references</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="start_time" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                    </div>
                      </div>
                  </div>

               
                 <div class="col-md-6">
                     <div class="widget">
                     <br>
                   <div class="row"> 
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Terms and conditions</label>
                        <div class="col-sm-9 col-md-8">
                         <textarea></textarea>
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>
                                   
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Currency of Sale</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="orderDate" value="<%=order_date%>" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                    </div>
                      </div>
                  </div>

                  
                  </fieldset>
                  </form>
            </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="widget">              
                <div class="widget-body" style="padding:6px;">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr  class="trrc">
                          <th>Complete Commodity Description</th>
                          <th>Quantity</th>
                          <th>Rate(₹)</th>
                          <th>Discount(₹)</th>
                          <th>Tax(₹)</th>
                          <th>Price(₹)</th>
                          <th>Amount(₹)</th>

                        </tr>
                      </thead>
                      <tbody id="examCartList">
                       
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            </div>
        </div>
         <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                               <button type="submit" id="confirmOrder" class="btn btn-raised btn-black">Confirm Order</button> 
                               <button type="submit" id="admingeneratepdf" class="btn btn-raised btn-black">Generate pdf</button>
                               <button type="submit" id="backShop" class="btn btn-raised btn-black">Back</button>                         
                            </div>
                      </div>
                    </div>
                  </div>
      </script>

       <script type="text/template" id="examListTpl">
          <tr>
            <td><%=name%></td>
            <td><%=quantity%></td>
            <td><%=rate%></td>
            <td><%=discount%></td>
            <td><%=tax%></td>        
            <td><%=totalprice%></td>
            <td><%=amount%></td>
            
          </tr>
       </script>

      <script type="text/template" id="cartDetailsPageTpl">
        <div class="col-md-9">
        <div class="panel panel-default">
        <div class="panel-heading"> 
          <h3 class="panel-title">Your Cart</h3>
        </div>
        <table class="table"> 
        <thead>
          <tr class ="trrc">
          <th>Product Name</th>
          <th>Description</th>
          <th>Quantity</th>
          <th>Delete</th>
         </tr>
        </thead>
        <tbody id="cartPageList"> </tbody>
         </table></div></div>
         <button type="submit" id="placeOrderCart" class="btn btn-raised btn-black">Place Order</button>
          <button type="submit" id="backShop" class="btn btn-raised btn-black">Back</button>
      </script>

      <script type="text/template" id="cartDetailsRowTpl">
          <tr id="a<%=id%>">
            <td class = "name"><%=name%></td>
            <td><%=description%></td>
            <td><div><button id="minus" class = "minusclass" iid="<%=id%>" field="quantity"><i iid="<%=id%>" class="glyphicon glyphicon-minus" ></i></button> &nbsp &nbsp<input type='text' id="quantity1" name='quantity' value='1' class='qty' readonly="readonly" style=" width: 40px; height: 25px; text-align: center;"/><button id="add" class = "addclass"  iid="<%=id%>" field="quantity"><i  iid="<%=id%>" class="glyphicon glyphicon-plus"></i></button> </div>

                 <div id="myModal" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Cart</h4>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h5>Do You Want to Continue ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="countrid">
                  <button type="button" class="btn btn-black" id="del_Country_id" iid="<%=id%>">Yes</button>
                  <button type="button" class="btn btn-black" data-dismiss="modal">No</button>
                  </div>
                </div>
               </div>
              </div> 
                
            </td>
            <td class= "tax"><%=tax%></td>
            <td class = "discount"><%=discount%></td>
            <td class = "price"><%=totalprice%></td>
            <td><span style="display:inline-block; width: 20px;">
            <a id="deleteCart"   data-toggle="tooltip" data-placement="top" title="Delete" iid="<%=id%>"><i iid="<%=id%>" class="glyphicon glyphicon-minus-sign" ></i></a>
            </span></td>
            </span></td>
          </tr>
      </script>

      <script type="text/template" id="InvoicePageTpl">
        <div id="pdftemplate">
        <div class="widget">
         <div class="widget-heading">
              <center><h3 class="widget-title">Commercial Invoice</h3></center>
          </div>

            <div id="form-tabs" class="form-horizontal">
             <fieldset>
                    <div class="col-md-6">
                     <div class="widget">
                      <div class="widget-heading">
                        <h6 class="widget-title">Seller/shipper information</h6>
                      </div>
                     <br>
                   <div class="row"> 
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="start_time" value="Eprayoga" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>
                                   
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Address</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="start_time" value="eprayoga" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Country</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="start_time" value="India" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Tax number</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="start_time" value="EPR1234" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>
                </div>
                </div>
             


                  <div class="col-md-6">
                     <div class="widget">
                      <div class="widget-heading">
                        <h6 class="widget-title">Consignee information</h6>
                      </div>
                     <br>
                   <div class="row"> 
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="start_time" value="<%=consignee_first_name%>" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>
                                   
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Address</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="start_time" value="<%=consignee_add_line_1%>" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Country</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="start_time" value="<%=country_full_name%>" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Tax number</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="start_time" value="<%=consignee_pan%>" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                    </div>
                      </div>
                  </div>

                  <div class="col-md-6">
                     <div class="widget">
                     <br>
                   <div class="row"> 
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Invoice date/number</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="invoiceDate" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>
                                   
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Order number/date</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="orderConfirmDate" value="<%=order_date%>" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Other references</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="start_time" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                    </div>
                      </div>
                  </div>

               
                 <div class="col-md-6">
                     <div class="widget">
                     <br>
                   <div class="row"> 
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Terms and conditions</label>
                        <div class="col-sm-9 col-md-8">
                         <textarea></textarea>
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>
                                   
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Currency of Sale</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="orderDate" value="<%=order_date%>" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                    </div>
                      </div>
                  </div>

                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                                                      
                            </div>
                      </div>
                    </div>
                  </div>
                  </fieldset>
                  </div>
                  <button  class="btn btn-raised btn-black" id="promoGenerate" style="float: right;"  data-toggle="modal" data-target="#myModal">Promo Code Generation</button>
                    <button  class="btn btn-raised btn-black" id="generatepdf2" style="float: right;">generatepdf</button>

                   <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Promo Code Generation</h4>
                           </div>
                        <div class="modal-body" id ="com_ques">
                        <h5>Do You Want to generate Promo Code ?<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                  <button type="button" id="promoCodeCartGenerate" class="btn btn-black">Yes</button>
                  <button type="button" id="Stay_page" class="btn btn-black">No</button>
                  </div>
                </div>
               </div>
              </div>
            </div>
            
      </script>

       <script type="text/template" id="performaPageCartTpl">
        <div id="pdftemplate">
        <div class="widget">
         <div class="widget-heading">
              <center><h3 class="widget-title">Performa Page</h3></center>
          </div>

            <form id="form-tabs" class="form-horizontal">
             <fieldset>
                    <div class="col-md-6">
                     <div class="widget">
                      <div class="widget-heading">
                        <h6 class="widget-title">Seller/shipper information</h6>
                      </div>
                     <br>
                   <div class="row"> 
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="start_time" value="Eprayoga" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>
                                   
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Address</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="start_time" value="eprayoga" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Country</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="start_time" value="India" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Tax number</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="start_time" value="EPR1234" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                    </div>
                      </div>
                  </div>


                  <div class="col-md-6">
                     <div class="widget">
                      <div class="widget-heading">
                        <h6 class="widget-title">Consignee information</h6>
                      </div>
                     <br>
                   <div class="row"> 
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Name</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="start_time" value="<%=consignee_first_name%>" type="">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>
                                   
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Address</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="start_time" value="<%=consignee_add_line_1%>" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Country</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="start_time" value="<%=country_full_name%>" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Tax number</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="start_time" value="<%=consignee_pan%>" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                    </div>
                      </div>
                  </div>

                  <div class="col-md-6">
                     <div class="widget">
                     <br>
                   <div class="row"> 
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Invoice date/number</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="invoiceDate" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>
                                   
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Order number/date</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="orderDateCart" value="<%=order_date%>" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Other references</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="start_time" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                    </div>
                      </div>
                  </div>

               
                 <div class="col-md-6">
                     <div class="widget">
                     <br>
                   <div class="row"> 
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Terms and conditions</label>
                        <div class="col-sm-9 col-md-8">
                         <textarea></textarea>
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>
                                   
                      <div class="form-group">
                        <label for="txtLastNameBilling" class="col-sm-3 col-md-4 control-label">Currency of Sale</label>
                        <div class="col-sm-9 col-md-8">
                          <input class="timepicker" id="orderDate" value="<%=order_date%>" type="text">
                          <div id="cust_last_name_error" style="color:red"></div>
                        </div>
                      </div>

                    </div>
                      </div>
                  </div>

                  </fieldset>
                  </form>
            </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="widget">              
                <div class="widget-body" style="padding:6px;">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr  class="trrc">
                          <th>Complete Commodity Description</th>
                          <th>Quantity</th>
                          <th>Rate(₹)</th>                      
                          <th>Discount(₹)</th>
                          <th>Tax(₹)</th>
                          <th>Price(₹)</th>
                          <th>Amount(₹)</th>
                        </tr>
                      </thead>
                      <tbody id="examShopCartList">
                       
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            </div>
        </div>
        </div>
                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                               <button type="submit" id="confirmOrderCart" class="btn btn-raised btn-black">Confirm Order</button> 
                               <button type="submit" id="generatepdf" class="btn btn-raised btn-black">Generate pdf</button>
                               <button type="submit" id="backShop" class="btn btn-raised btn-black">Back</button>                       
                            </div>
                      </div>
                    </div>
                  </div>
      </script>

    <script type="text/template" id="shotcartTmpl">
        <div class="shop-page1-area" style="margin-top:-113px">
            <div class="container" style="margin-top:40px">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 col-md-push-3">
                        <div class="row" id="shopList">
                            <!-- Tab panes -->
                             </div>
                              

                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 col-md-pull-9">
                        <div class="">
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Search</h3>
                                    <div class="sidebar-find-course">
                                        <form id="checkout-form">
                                            <div class="form-group course-name">
                                                <input id="prodSearch" placeholder="Course Name" class="form-control" type="text" data-toggle="modal" data-target="#myModalCust"/>
                                            </div>
                                        
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Select Category</h3>
                                     <table class="product_checks">
                                    
                                      <tr class="checks">
                                        <td id="selectCategoryoption">
                                          <ul class="selectCategory" style="height: fit-content;max-height: 141px;">
                                           
                                          </ul>
                                        </td>
                                     
                                      </tr>
                                    </table>
                                    
                                </div>
                            </div>
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Select Subject</h3>
                                    <table class="product_checks" >
                                    
                                      <tr class="checks">
                                        <td id="selectedSubjectogoption">
                                          <ul class="selectSubject" style="height: fit-content;max-height: 141px;">
                                           
                                          </ul>
                                        </td>
                                     
                                      </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Topic</h3>
                                     <table class="product_checks">
                                    
                                      <tr class="checks">
                                        <td id="selectedTopicoption">
                                          <ul class="selectTopic" style="height: fit-content;max-height: 141px;">
                                           
                                          </ul>
                                        </td>
                                     
                                      </tr>
                                    </table>
      
                                    <button class="ghost-full-width-btn disabled" id="search" type="submit" value="Login" style="margin-top: 35px;">Search</button>

                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>

     
      <div id="paginationList"></div>
    
    </script>

    <script type="text/template" id="shopCartRowTpl">
          
            <div role="tabpanel" class="tab-pane shop-page1-xs-width" id="gried-view">
                
            <!-- Listed product show -->
            <div role="tabpanel" class="tab-pane active" id="list-view">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-box2">
                        <div class="media">
                            <div class="media-body">
                                <div class="product-box2-content">
                                    <h3 style="padding:0px;">Product Name: <%=name%></h3>
                                    <span id="notdiscprice">Amount: Rs.<%=notdiscprice%></span>
                                    <span id="perdisc">Discount: <%=perdisc%>%</span>
                                    <p>Description: <%=description%></p>
                                     <ul class="product-box2-cart">
                                     <li><a href="#" class="addCart" id="<%=id%>" data-toggle="modal" data-target="#myModalPopup">Add To Cart</a></li>
                                     <li><a href="#" class="buyNow" id="<%=id%>">Buy Now</a></li>
                                     </ul>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </script>

   <script type="text/template" id="shopCartRowTplSearch">
          
            <div role="tabpanel" class="tab-pane shop-page1-xs-width" id="gried-view">
                
            <!-- Listed product show -->
            <div role="tabpanel" class="tab-pane active" id="list-view">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-box2">
                        <div class="media">
                            <div class="media-body">
                                <div class="product-box2-content" id="<%=id%>">
                                    <h3 style="padding:0px;">Product Name: <%=name%></h3>
                                    <span id="notdiscprice"></span>
                                    <span id="perdisc"></span>
                                    <p>Description: <%=description%></p>
                                     <ul class="product-box2-cart">
                                     <li><a href="#" class="addCart" id="<%=id%>">Add To Cart</a></li>
                                     <li><a href="#" class="buyNow" id="<%=id%>">Buy Now</a></li>
                                     </ul>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </script>

    <script type="text/template" id="reportPageTpl">
        <div class="widget">
        <div class="widget-heading">
          <center><h3 class="widget-title">Category Listing</h3></center>
        </div>
        <div class="widget-body" style="padding:6px;">
        <form class="form-horizontal">
               <fieldset>                  
                <div class="form-group">
                    <div class="col-sm-offset-8 col-sm-12" >
                     <div class="col-sm-8 col-md-2">
                           <h5>Client Name</h5>
                    </div>
                     <select id="questionClient"></select>
                    </div>
              </div>


              <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                <thead>
                  <tr  class="trrc">
                    
                    <th>Category Code</th>
                    <th>Category Name</th>
                    <th>Category Description</th>
                  
                  </tr>
                </thead>
                <tbody id="categoryReportList">
                </tbody>
              </table>   

                 
            </fieldset>
            </form>
        </div>
      </div>
    </script>

   <script type="text/template" id="reportSubjectPageTpl">
        <div class="widget">
        <div class="widget-heading">
          <center><h3 class="widget-title">Subject Listing</h3></center>
        </div>
        <div class="widget-body" style="padding:6px;">
        <form class="form-horizontal">
               <fieldset>                  
                <div class="form-group">
                    <div class="col-sm-offset-8 col-sm-12" >
                     <div class="col-sm-8 col-md-2">
                           <h5>Client Name</h5>
                    </div>
                     <select id="questionClient1"></select>
                    </div>
              </div>


              <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                <thead>
                  <tr class="trrc">
                    <th>Category Description</th>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Subject Description</th>
                  
                  </tr>
                </thead>
                <tbody id="subjectReportList">
                </tbody>
              </table>   
             
            </fieldset>
            </form>
        </div>
      </div>
    </script>

    <script type="text/template" id="reportTopicPageTpl">
        <div class="widget">
        <div class="widget-heading">
          <center><h3 class="widget-title">Topic Listing</h3></center>
        </div>
        <div class="widget-body" style="padding:6px;">
        <form class="form-horizontal">
               <fieldset>                  
                <div class="form-group">
                    <div class="col-sm-offset-8 col-sm-12" >
                     <div class="col-sm-8 col-md-2">
                           <h5>Client Name</h5>
                    </div>
                     <select id="questionClient2"></select>
                    </div>
              </div>


              <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                <thead>
                  <tr class="trrc">            
                    <th>Category Description</th>
                    <th>Subject Description</th>
                    <th>Topic Description</th>
                    <th>Topic Code</th>
                    <th>Topic Name</th>                  
                  </tr>
                </thead>
                <tbody id="topicReportList">
                </tbody>
              </table>   

                 
            </fieldset>
            </form>
        </div>
      </div>
    </script>

    <script type="text/template" id="reportExamPageTpl">
        <div class="widget">
        <div class="widget-heading">
          <center><h3 class="widget-title">Exam Listing</h3></center>
        </div>
        <div class="widget-body" style="padding:6px;">
        <form class="form-horizontal">
               <fieldset>                  
                <div class="form-group">
                    <div class="col-sm-offset-8 col-sm-12" >
                     <div class="col-sm-8 col-md-2">
                           <h5>Client Name</h5>
                    </div>
                     <select id="questionClient3"></select>
                    </div>
              </div>


              <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                <thead>
                  <tr class="trrc">            
                    <th>Category </th>
                    <th>Subject </th>
                    <th>Topic </th>
                    <th>Exam Code</th>
                    <th>Exam Name</th>   
                    <th>No of Questions</th>   
                    <th>Total Marks</th>      
                    <th>Currency</th>
                    <th>Price</th>
                    <th>Validity</th>      
                  </tr>
                </thead>
                <tbody id="examReportList">
                </tbody>
              </table>   

                 
            </fieldset>
            </form>
        </div>
      </div>
    </script>

    <script type="text/template" id="reportSalesSummaryPageTpl">
        <div class="widget">
        <div class="widget-heading">
          <center><h3 class="widget-title">Sales Summary</h3></center>
        </div>
        <div class="widget-body" style="padding:6px;">
        <form class="form-horizontal">
               <fieldset>                  
               <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">From Date</label>
                      <div class="col-sm-8 col-md-8">
                       <div id="datetimepicker1" class="input-group date">
                               <input id="salesFrom" data-date-format='YYYY-MM-DD' name="txtFirstNameBilling" type="text" class="form-control">
                                <div id="news_date_error" class="" style="font-size: 12px; color: #FF0000; "></div>
                            </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">To Date</label>
                      <div class="col-sm-8 col-md-8">
                       <div id="datetimepicker1" class="input-group date">
                               <input id="salesTo" data-date-format='YYYY-MM-DD' name="txtFirstNameBilling" type="text" class="form-control">
                                <div id="news_date_error2" class="" style="font-size: 12px; color: #FF0000; "></div>
                            </div>
                          </div>
                    </div>
                  </div>                    
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Client Name</label>
                      <div class="col-sm-8 col-md-8">
                        <select id="questionClient"></select>
                      </div>
                    </div>
                  </div>
                </div>
            <div id="noData">
              <table id="salesTable" cellspacing="0" width="100%" class="table table-striped table-bordered">
                <thead>
                  <tr class="trrc">            
                    <th>Exam Code </th>
                    <th>Exam Name</th>
                    <th>Currency</th>
                    <th>Rate</th>   
                    <th>Quantity</th>   
                    <th>Tax Amount</th>      
                    <th>Total Amount</th>     
                  </tr>
                </thead>
                <tbody id="salesSummaryList">
                </tbody>
              </table>   
            </div>
                 
            </fieldset>
            </form>
        </div>
      </div>
    </script>

    <script type="text/template" id="reportExamSummaryPageTpl">
        <div class="widget">
        <div class="widget-heading">
          <center><h3 class="widget-title">Exam Summary</h3></center>
        </div>
        <div class="widget-body" style="padding:6px;">
        <form class="form-horizontal">
               <fieldset>                  
               <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">From Date</label>
                      <div class="col-sm-8 col-md-8">
                       <div id="datetimepicker1" class="input-group date">
                               <input id="examFrom" data-date-format='YYYY-MM-DD' name="txtFirstNameBilling" type="text" class="form-control">
                                <div id="news_date_error" class="" ></div>
                            </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">To Date</label>
                      <div class="col-sm-8 col-md-8">
                       <div id="datetimepicker1" class="input-group date">
                               <input id="examTo" data-date-format='YYYY-MM-DD' name="txtFirstNameBilling" type="text" class="form-control">
                                <div id="news_date_error2" class="" ></div>
                            </div>
                          </div>
                    </div>
                  </div>                    
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Client Name</label>
                      <div class="col-sm-8 col-md-8">
                        <select id="questionClient"></select>
                      </div>
                    </div>
                  </div>
                </div>

              <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                <thead>
                  <tr class="trrc">            
                    <th>Employee Id</th>
                    <th>Employee Name</th>
                    <th>Exam Code</th>
                    <th>Exam Name</th>   
                    <th>Time-Start</th>      
                    <th>Time-End</th> 
                    <th>No of Attempt</th>    
                  </tr>
                </thead>
                <tbody id="examSummaryList">
                </tbody>
              </table>   

                 
            </fieldset>
            </form>
        </div>
      </div>
    </script>

        <script type="text/template" id="reportExamSummaryCustPageTpl">
        <div class="widget">
        <div class="widget-heading">
          <center><h3 class="widget-title">Exam Summary</h3></center>
        </div>
        <div class="widget-body" style="padding:6px;">
        <form class="form-horizontal">
               <fieldset>                  
               <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">From Date</label>
                      <div class="col-sm-8 col-md-8">
                       <div id="datetimepicker1" class="input-group date">
                               <input id="examFrom" data-date-format='YYYY-MM-DD' name="txtFirstNameBilling" type="text" class="form-control">
                                <div id="news_date_error" class="" ></div>
                            </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">To Date</label>
                      <div class="col-sm-8 col-md-8">
                       <div id="datetimepicker1" class="input-group date">
                               <input id="examTo" data-date-format='YYYY-MM-DD' name="txtFirstNameBilling" type="text" class="form-control">
                                <div id="news_date_error2" class="" ></div>
                            </div>
                          </div>
                    </div>
                  </div>                    
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Customer Name</label>
                      <div class="col-sm-8 col-md-8">
                        <select id="questionClient"></select>
                      </div>
                    </div>
                  </div>
                </div>

              <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                <thead>
                  <tr class="trrc">            
                    <th>Customer Id</th>
                    <th>Customer Name</th>
                    <th>Exam Code</th>
                    <th>Exam Name</th>   
                    <th>Time-Start</th>      
                    <th>Time-End</th> 
                    <th>No of Attempt</th>    
                  </tr>
                </thead>
                <tbody id="examSummaryCustList">
                </tbody>
              </table>   

                 
            </fieldset>
            </form>
        </div>
      </div>
    </script>
    
    <script type="text/template" id="reportExamPerformanceSummaryCustPageTpl">
        <div class="widget">
        <div class="widget-heading">
          <center><h3 class="widget-title">Exam Performance Summary</h3></center>
        </div>
        <div class="widget-body" style="padding:6px;">
        <form class="form-horizontal">
               <fieldset>                  
               <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Client Name</label>
                      <div class="col-sm-8 col-md-8">
                        <select id="questionClient"></select>
                      </div>
                    </div>
                  </div>
                 </div>
                                 
                <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Customer Name</label>
                      <div class="col-sm-8 col-md-8">
                        <select id="questionCustomer"></select>
                      </div>
                    </div>
                  </div>
                </div>

              <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                <thead>
                  <tr class="trrc">            
                    <th>Exam Code</th>
                    <th>Exam Name</th> 
                    <th>No of Questions</th>
                    <th>Correct</th>
                    <th>Wrong</th>
                    <th>Unattended</th>
                    <th>Total Marks</th>
                    <th>Awarded Marks</th>
                    <th>Pass Mark</th>  
                    <th>Status</th>       
                  </tr>
                </thead>
                <tbody id="examPerformanceSummaryClntList">
                </tbody>
                <tbody id="examPerformanceSummaryCustList"></tbody>
              </table>   

                 
            </fieldset>
            </form>
        </div>
      </div>
    </script>


    <script type="text/template" id="categoryReportTpl">
    <tr>      
        <td id=""><%=category_code%></td>
        <td id=""><%=category_name%></td>
        <td id=""><%=category_description%></td>       
    </tr>
    </script>

    <script type="text/template" id="subjectReportTpl">
    <tr>
        <td id=""><%=category_description%></td>
        <td id=""><%=subject_code%></td>       
        <td id=""><%=subject_name%></td>
        <td id=""><%=sub_description%></td>       
    </tr>
    </script>

    <script type="text/template" id="topicReportTpl">
    <tr>        
        <td id=""><%=category_description%></td>
        <td id=""><%=sub_description%></td>
        <td id=""><%=topic_description%></td>      
        <td id=""><%=topic_code%></td>
        <td id=""><%=topic_name%></td>
        
    </tr>
    </script>

    <script type="text/template" id="examReportTpl">
    <tr id="<%=id%>">        
        <td id=""><%=category_name%></td>
        <td id=""><%=subject_name%></td>
        <td id=""><%=topic_name%></td>      
        <td id=""><%=product_catalog_code%></td>
        <td id=""><%=name%></td>
        <td id="no_of_question"></td>
        <td id="total_mark"></td>
        <td><%=currency_name%></td>
        <td><%=price%></td>
        <td><%=valid_days%></td>
        
    </tr>
    </script>

    <script type="text/template" id="salesSummaryReportTpl">
    <tr id="<%=id%>">        
        <td id=""><%=exam_trans_ref_no%></td>
        <td id=""><%=name%></td>
        <td id=""><%=currency_name%></td>      
        <td id=""><%=price%></td>
        <td id=""><%=unit_qty%></td>
        <td><%=total_tax%></td>
        <td><%=grand_total%></td>
        
    </tr>
    </script>


    <script type="text/template" id="examSummaryReportTpl">
    <tr id="<%=id%>">        
        <td id=""><%=emp_employee_id%></td>
        <td id=""><%=emp_first_name%></td>
        <td id=""><%=exam_trans_ref_no%></td>      
        <td id=""><%=name%></td>
        <td id=""><%=start_time%></td>
        <td><%=end_time%></td>
        <td><%=no_of_attempts%></td>       
    </tr>
    </script>

    <script type="text/template" id="examSummaryCustReportTpl">
    <tr id="<%=id%>">        
        <td id=""><%=customer_id%></td>
        <td id=""><%=cust_first_name%></td>
        <td id=""><%=exam_trans_ref_no%></td>      
        <td id=""><%=name%></td>
        <td id=""><%=start_time%></td>
        <td><%=end_time%></td>
        <td><%=no_of_attempts%></td>       
    </tr>
    </script>

    
    <script type="text/template" id="examPerformanceSummaryClntReportTpl">
    <tr id="<%=id%>">        

        <td id=""><%=exam_trans_ref_no%></td>      
        <td id=""><%=exam_name%></td>
        <td id=""><%=no_of_questions%></td>
        <td><%=no_of_questions_right%></td>
        <td><%=no_of_questions_wrong%></td>
        <td><%=no_of_questions_blank%></td>
        <td><%=total_marks%></td>
        <td><%=marks_scored%></td>
        <td><%=exam_passmark%></td>
        <td><%=result%></td>       
    </tr>
    </script>

    <script type="text/template" id="examPerformanceSummaryCustReportTpl">
    <tr id="<%=id%>">        

        <td id=""><%=exam_trans_ref_no%></td>      
        <td id=""><%=exam_name%></td>
        <td id=""><%=no_of_questions%></td>
        <td><%=no_of_questions_right%></td>
        <td><%=no_of_questions_wrong%></td>
        <td><%=no_of_questions_blank%></td>
        <td><%=total_marks%></td>
        <td><%=marks_scored%></td>
        <td><%=exam_passmark%></td>
        <td><%=result%></td>       
    </tr>
    </script>
      <!-- Right Sidebar end-->
    

    <!-- <script type="text/javascript" src="plugins/jquery/dist/jquery.min.js"></script> -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>  
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" ></script>


  <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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

    <!-- Mathquill -->
    <script type="text/javascript" src="js/mathquill/mathquill.js"></script>    
    <!-- <script type="text/javascript" src="js/mathquillWrapper.js"></script>     -->

    <!-- Kekule for Chemistry -->
    <script type="text/javascript" src="plugins/kekule/kekule-expanded.js"></script>
    <script type="text/javascript" src="plugins/kekule/kekule-helper.js"></script>

    <!-- rhill for puzzle -->
    <script type="text/javascript" src="plugins/puzzle/jigsawpuzzle-rhill.js"></script>

    <!-- Models-->
    <script type="text/javascript" src="js/models/PcExamDetailModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/OriginModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/AddressTypeModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/CategoryModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/TopicModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/SubjectModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/UserTypeModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/ComplexityQuestionModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/QuestionTypeModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/InstructionModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/SecurityQuestionModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/ZoneModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/CurrencyModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/FaqCategoryModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/FaqModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/AwsModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/EmailModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/SmsModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/CityModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/StateModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/CountryModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/ScheduleModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/CustomerModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/DepartmentModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/ClientTypeModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/UserAccessModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/ClientModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/ClientGroupModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/EmployeeModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/QuestionModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/FileTypeModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/LanguageModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/PricingModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/GenpModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/RenderQuestionModel.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/models/ProductCatalogList.js?version=1.0.1"></script>
  <script type="text/javascript" src="js/models/ProductCatalogModel.js?version=1.0.1"></script>
  <script type="text/javascript" src="js/models/TaxModel.js?version=1.0.1"></script>
  <script type="text/javascript" src="js/models/ExamDesignModel.js?version=1.0.1"></script>
  <script type="text/javascript" src="js/models/OrderDetailModel.js?version=1.0.1"></script>
  <script type="text/javascript" src="js/models/ProductCatalogList.js?version=1.0.1"></script>
  <script type="text/javascript" src="js/models/ShoppingCartDetailModel.js?version=1.0.1"></script>
  <script type="text/javascript" src="js/models/PerformaModel.js?version=1.0.1"></script>
  <script type="text/javascript" src="js/models/CartDetailModel.js?version=1.0.1"></script>
  <script type="text/javascript" src="js/models/ProductCatalogHomeList.js?version=1.0.1"></script>
  <script type="text/javascript" src="js/models/SendingMailModel.js?version=1.0.1"></script>
  
 

    <!-- Question and option Models -->
  
    <script type="text/javascript" src="js/models/QuestionModel.js?version=1.0.1"></script>
    
     <!-- Question and option Collections -->
    <script type="text/javascript" src="js/collections/QuestionOptionCollection.js?version=1.0.1"></script>

    <!-- Collections-->
    <script type="text/javascript" src="js/collections/PcExamDetailCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/OriginCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/AddressTypeCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/CategoryCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/TopicCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/SubjectCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/UserTypeCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/ComplexityQuestionCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/TotalQuestionCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/QuestionTypeCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/InstructionCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/SecurityQuestionCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/ZoneCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/CurrencyCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/FaqCategoryCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/FaqCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/AwsCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/EmailCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/SmsCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/CityCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/StateCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/CountryCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/ScheduleCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/DepartmentCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/ClientTypeCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/DepartmentCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/ClientTypeCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/UserAccessCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/ClientCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/CustomerCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/ClientGroupCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/PromoEmployeeCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/EmployeeCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/QuestionCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/PricingCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/FileTypeCollection.js?version=1.0.1"></script> 
    <script type="text/javascript" src="js/collections/LanguageCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/GenpCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/RenderQuestionCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/ProductCatalogCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/TaxCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/ExamDesignCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/ProductCatalogUserCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/OrderDetailCollection.js?version=1.0.1"></script>   
    <script type="text/javascript" src="js/collections/PerformaCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/CartDetailCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/CategoryCartCollection.js?version=1.0.1"></script>
     <script type="text/javascript" src="js/collections/SubjectCartCollection.js?version=1.0.1"></script>
      <script type="text/javascript" src="js/collections/TopicCartCollection.js?version=1.0.2"></script>
      <script type="text/javascript" src="js/collections/ProductCatalogCollectionNew.js?version=1.0.2"></script>
      

     <!-- Question and option Collections -->

    <script type="text/javascript" src="js/collections/QuestionOptionCollection.js?version=1.0.1"></script>
    <!-- Views-->

    <script type="text/javascript" src="js/views/PromoCodeApplyView.js?version=1.0.2"></script>


    <script type="text/javascript" src="js/views/RenderingQuestionPageView.js?version=1.0.3"></script>
    <script type="text/javascript" src="js/views/RenderingQuestionTableView.js?version=1.0.2"></script>
    <script type="text/javascript" src="js/views/RenderQuestionRowView.js?version=1.0.1"></script>

    <script type="text/javascript" src="js/views/CustomerRegistrationFormPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/CustomerPageView.js?version=1.0.1"></script>
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
    
    <script type="text/javascript" src="js/views/UserTypePageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/UserTypeFormPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ComplexityQuestionRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ComplexityQuestionTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ComplexityQuestionFormPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ComplexityQuestionPageView.js?version=1.0.1"></script>
     <script type="text/javascript" src="js/views/QuestionTypeRowView.js?version=1.0.1"></script>
     <script type="text/javascript" src="js/views/QuestionTypeTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/QuestionTypeFormPageView.js?version=1.0.1"></script>
     <script type="text/javascript" src="js/views/QuestionTypePageView.js?version=1.0.1"></script>

    <!-- Question and options Views -->
    <script type="text/javascript" src="js/views/ExammainView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ExamView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ExamRowView.js?version=1.0.1"></script>


    <script type="text/javascript" src="js/views/InstructionRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/InstructionTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/InstructionFormPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/InstructionPageView.js?version=1.0.1"></script>

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
    <script type="text/javascript" src="js/views/FaqCategoryFormPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/FaqCategoryRowView.js?version=1.0.1"></script>
     <script type="text/javascript" src="js/views/FaqCategoryTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/FaqCategoryPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgntFaqCategoryItemView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgntFaqCategoryCollectionView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/FaqRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/FaqTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/FaqPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/FaqFormPageView.js?version=1.0.1"></script>
    <!-- aws -->
    <script type="text/javascript" src="js/views/AwsRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/AwsTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/AwsPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/AwsFormPageView.js?version=1.0.1"></script>

    <!-- email -->
    <script type="text/javascript" src="js/views/EmailRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/EmailTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/EmailPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/EmailFormPageView.js?version=1.0.1"></script>

      <!-- sms -->
    <script type="text/javascript" src="js/views/SmsRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/SmsTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/SmsPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/SmsFormPageView.js?version=1.0.1"></script>

    <!-- city -->
    <script type="text/javascript" src="js/views/CityRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/CityTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/CityPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/CityFormPageView.js?version=1.0.1"></script>

     <!-- state -->
    <script type="text/javascript" src="js/views/StateRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/StateTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/StatePageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/StateFormPageView.js?version=1.0.1"></script>

    <!-- state -->
    <script type="text/javascript" src="js/views/CountryRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/CountryTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/CountryPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/CountryFormPageView.js?version=1.0.1"></script>

    <!-- schedule -->
    <script type="text/javascript" src="js/views/SchedulePageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ScheduleFormPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ScheduleRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ScheduleTableView.js?version=1.0.1"></script>
        
    <!-- Client -->
    <script type="text/javascript" src="js/views/ClientPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ClientFormPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ClientRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ClientTableView.js?version=1.0.1"></script>

     <!-- department-->
    <script type="text/javascript" src="js/views/DepartmentRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/DepartmentTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/DepartmentPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/DepartmentFormPageView.js?version=1.0.1"></script>

     <!-- client type-->
    <script type="text/javascript" src="js/views/ClientTypeRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ClientTypeTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ClientTypePageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ClientTypeFormPageView.js?version=1.0.1"></script>

 <!-- user access -->
    <script type="text/javascript" src="js/views/UserAccessRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/UserAccessTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/UserAccessFormPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/UserAccessPageView.js?version=1.0.1"></script>

    <!-- Client Group -->
    <script type="text/javascript" src="js/views/ClientGroupPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ClientGroupFormPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ClientGroupRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/ClientGroupTableView.js?version=1.0.1"></script>
        
     <!-- Employee -->
    <script type="text/javascript" src="js/views/EmployeePageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/EmployeeFormPageView.js?version=1.0.2"></script>
    <script type="text/javascript" src="js/views/EmployeeRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/EmployeeTableView.js?version=1.0.1"></script>

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



    <script type="text/javascript" src="js/views/QuestionRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/QuestionTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/QuestionPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/QuestionFormPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgmtComplexityQuestionItemView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgmtComplexityQuestionCollectionView.js?version=1.0.1"></script>
    
    <!--  

    <script type="text/javascript" src="js/views/MgmtQuestionTypeItemView.js"></script>
    <script type="text/javascript" src="js/views/MgmtQuestionTypeCollectionView.js"></script>

    --> 

    <script type="text/javascript" src="js/views/MgntQuestionTypeCollectionView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgntQuestionTypeItemView.js?version=1.0.1"></script>

     <!-- language -->
    <script type="text/javascript" src="js/views/LanguageRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/LanguageTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/LanguagePageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/LanguageFormPageView.js?version=1.0.1"></script>


    <!-- generic param -->
    <script type="text/javascript" src="js/views/GenpRowView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/GenpTableView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/GenpPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/GenpFormPageView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgmtCurrencyItemView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgmtCurrencyCollectionView.js?version=1.0.1"></script>
     <script type="text/javascript" src="js/views/MgmtLanguageItemView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgmtLanguageCollectionView.js?version=1.0.1"></script>
    

    <script type="text/javascript" src="js/views/MgmtClientGroupCollectionView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgmtClientGroupItemView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgmtDeptCollectionView.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/views/MgmtDeptItemView.js?version=1.0.1"></script>

     <!-- FILE TYPE -->
   <script type="text/javascript" src="js/views/FileTypePageView.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/views/FileTypeTableView.js?version=1.0.1"></script>  
   <script type="text/javascript" src="js/views/FileTypeRowView.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/views/FileTypeFormPageView.js?version=1.0.1"></script>

   <!-- pricing-->
   
   <script type="text/javascript" src="js/views/PricingRowView.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/views/PricingTableView.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/views/PricingPageView.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/views/PricingFormPageView.js?version=1.0.1"></script>

    <!-- Question and options Views -->
   <script type="text/javascript" src="js/views/ExammainView.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/views/ExamView.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/views/ExamRowView.js?version=1.0.1"></script> 
      <!-- product catalog view -->  
   <script type="text/javascript" src="js/views/ProductCatalogMasterPageView.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/views/ProductCatalogTableView.js?version=1.0.1"></script>  
   <script type="text/javascript" src="js/views/ProductCatalogRowView.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/views/ProductCatalogFormPageView.js?version=1.0.1"></script>
     <!-- exam design view -->
       <script type="text/javascript" src="js/views/ReportExamSummaryPageView.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/views/ExamDesignPageView.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/views/ExamDesignFormPageView.js?version=1.0.3"></script>  
   <script type="text/javascript" src="js/views/ExamDesignRowView.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/views/ExamDesignTableView.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/views/MgntProductCatalogCollectionView.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/views/MgntProductCatalogItemView.js?version=1.0.1"></script>
   
   <script type="text/javascript" src="js/views/ProductCatalogPageViewAdmin.js?version=1.0.2"></script>
   <script type="text/javascript" src="js/views/PerformaPageViewAdmin.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/views/CartDetailsPageViewAdmin.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/views/PerformaPageCartViewAdmin.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/views/ReportPageView.js?version=1.0.0"></script>
   <script type="text/javascript" src="js/views/ReportSubjectPageView.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/views/ReportTopicPageView.js?version=1.0.1"></script>   
   <script type="text/javascript" src="js/views/ReportExamListPageView.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/views/ReportSalesSummaryPageView.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/views/ReportExamCustSummaryPageView.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/views/MgntCustCollectionView.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/views/MgntCustItemView.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/views/ReportExamPerformanceSummaryPageView.js?version=1.0.1"></script>
   

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

    <!-- Router -->    
    <script type="text/javascript" src="js/router/adminRouter.js?version=1.0.1"></script>

    <!-- Core JS-->
       
   <script type="text/javascript" src="js/eapp.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/Validation.js?version=1.0.1"></script>


   <script type="text/javascript" src="js/page-content/forms/forms-wizard.js?version=1.0.1"></script>
  
   
   <script type="text/javascript">
     var MQ = MathQuill.getInterface(2); // for backcompat
   </script>
   <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
  </body>
</html>
