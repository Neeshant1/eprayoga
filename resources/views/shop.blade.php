<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Eprayoga | Shop </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="js/img/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="js/css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="js/css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="js/css/bootstrap.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="js/css/animate.min.css">
    <!-- Font-awesome CSS-->
    <link rel="stylesheet" href="js/css/font-awesome.min.css">
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
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="js/css/select2.min.css">
    <!-- Magic popup CSS -->
    <link rel="stylesheet" href="js/css/magnific-popup.css">
    <!-- Switch Style CSS -->
    <link rel="stylesheet" href="js/css/hover-min.css">
    <!-- Nouislider Style CSS -->
    <link rel="stylesheet" href="js/vendor/noUiSlider/nouislider.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="js/style.css">
     <link rel="stylesheet" href="css/productcatalog.css">
    <!-- Modernizr Js -->
    <script src="js/modernizr-2.8.3.min.js"></script>
     <script type="text/javascript">

    
    function myFunction()
    {
        var userName = document.getElementById("userName");
        var userPwd = document.getElementById("userPwd");
         var checkBoxMe = document.getElementById("exampleCheckboxRemember");
        if (localStorage.chkbox && localStorage.chkbox != '') 
          {
              userName.value=localStorage.username;
              userPwd.value = localStorage.pass;
              checkBoxMe.checked = true;
          } 
          else 
          {
               userName.innerHTML='';
              userPwd.innerHTML = '';
              checkBoxMe.checked = false;
          }
    }
    function rememberMe(thisObj)
    {
       var userName = document.getElementById("userName");
       var userPwd = document.getElementById("userPwd");
        if( thisObj.checked)
        {
            localStorage.username = userName.value;
            localStorage.pass = userPwd.value;
            localStorage.chkbox = thisObj.checked;
        }
        else
        {
            localStorage.username = '';
            localStorage.pass = '';
            localStorage.chkbox = '';
        }
                  
    }
    function submitMe()
    {
      var checkBoxMe = document.getElementById("exampleCheckboxRemember");
      rememberMe(checkBoxMe);
      return true;
    }
  </script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Add your site or application content here -->
    <div class="alert-box success"></div>
    <div class="alert-box failure"></div>
    <div class="alert-box warning"></div>
    <div id="wrapper">
        <!-- Header Area Start Here -->
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
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" style="padding-top:8px">
                                <div class="header-top-right">
                                    <ul>
                                        <li><i class="fa fa-phone" aria-hidden="true"></i><a href="Tel:++91 98400 40441"> + +91 98400 40441 </a></li>
                                        <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#">info@eprayoga.com</a></li>
                                        <li>
                                            <a class="login-btn-area" href="#" id="login-button"><i class="fa fa-lock" aria-hidden="true"></i> Login</a>
                                            <div class="login-form" id="login-form" style="display: none;">
                                                <div class="title-default-left-bold">Login</div>
                                                  <form class="form-horizontal" method="POST" action="/eprayoga/login">
                                                    <label>User E-mail</label>
                                                    <input type="text" name="email_id" id="userName" placeholder="E-mail ID" />
                                                    <label>Password</label> 
                                                    <input type="password" name="password" id="userPwd" placeholder="Password" />
                                                    <div class="pad">
                                                    <span><input type="checkbox" id="exampleCheckboxRemember" name="remember"/>Remember Me</span>
                                                    <span class="vl"></span>
                                                    <span class="fee"><a href="/forgot_password">Forgot Password?</a></span>
                                                    </div>
                                                    <div>
                                                    <button class="default-big-btn ncn" id="esuccess" type="submit" value="Login">Login</button>
                                                    <button class="default-big-btn ncn form-cancel" type="submit" value="">Cancel</button></div>
                                                </form>
                                            </div>
                                        </li>
                                        <li><a href="{{url('/')}}/sign_up" class="apply-now-btn2">Sign Up</a></li>
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
                                        <li><a href="{{url('/')}}/shopCart" id="shop1">About Us</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="header-search">
                                    <form>
                                        <input type="text" class="search-form" placeholder="Search...." required="">
                                        <a href="#" class="search-button" id="search-button"><i class="fa fa-search" aria-hidden="true"></i></a>
                                    </form>
                                </div>
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
                                         <li><a href="{{url('/')}}/shopCart" id="shop1">About Us</a>
                                        </li>
                                      
                                         <li>
                                            <a class="login-btn-area" id="login-button"><i class="fa fa-lock" aria-hidden="true"></i> Login</a>
                                            <div class="login-form" id="login-form" style="display: none;">
                                                <div class="title-default-left-bold ddd">Login</div>
                                                <form class="form-horizontal" method="POST" action="/eprayoga/login">
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
                                        <li><a href="{{url('/')}}/sign_up" class="apply-now-btn2">Sign Up</a></li>
                                    </ul> 
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Mobile Menu Area End -->
        </header>
        <!-- Header Area End Here -->
        <!-- Inner Page Banner Area Start Here -->
        <div class="inner-page-banner-area" style="background-image: url('js/img/banner/5.jpg');">
            <div class="container">
                <div class="pagination-area">
                    <h1>Shop_01</h1>
                    <ul>
                        <li><a href="#">Home</a> -</li>
                        <li>Shop</li>
                    </ul>
                </div>
            </div>
        </div>

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

        <!-- Inner Page Banner Area End Here -->
        <!-- Shop Page 1 Area Start Here -->
    <script type="text/template" id="shotcartTmpl">
        <div class="shop-page1-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 col-md-push-3">
                        
                        <div class="row" id="shopList">
                            <!-- Tab panes -->
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 col-md-pull-9">
                        <div class="sidebar">
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Search</h3>
                                    <div class="sidebar-find-course">
                                        <form id="checkout-form">
                                            <div class="form-group course-name">
                                                <input id="prodSearch" placeholder="Course Name" class="form-control" type="text" />
                                            </div>
                                        
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-box">
                                <div class="sidebar-bx-inner">
                                    <h3 class="sidebar-title table-title">Search By Category</h3>
                                    
                                     <table class="product_checks" >
                                       
                                      <tr class="checks">
                                        <td id="selectCategoryoption" class="text-left">
                                          <ul class="selectCategory">
                                            
                                          </ul>
                                        </td>
                                     
                                      </tr>

                                    </table>
                                    
                                </div>
                            </div>
                            <div class="sidebar-box">
                                <div class="sidebar-bx-inner">
                                    <h3 class="sidebar-title">Search By Subject</h3>
                                    <table class="product_checks" >
                                    
                                      <tr class="checks">
                                        <td id="selectedSubjectogoption">
                                          <ul class="selectSubject">
                                           
                                          </ul>
                                        </td>
                                     
                                      </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="sidebar-box">
                                <div class="sidebar-bx-inner">
                                    <h3 class="sidebar-title">Search By Topic</h3>
                                     <table class="product_checks" >
                                    
                                      <tr class="checks">
                                        <td id="selectedTopicoption">
                                          <ul class="selectTopic">
                                           
                                          </ul>
                                        </td>
                                     
                                      </tr>
                                    </table>
      
                                    <button class="ghost-full-width-btn disabled" id="search" type="submit" value="Login" style="margin-top: 20px;
    margin-bottom: 10px;">Search</button>

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
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane shop-page1-xs-width" id="gried-view">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                    <div class="product-box1">
                       
                    </div>
                </div>
           
            </div>
            <!-- Listed product show -->
            <div role="tabpanel" class="tab-pane active" id="list-view">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="product-box2">
                        <div class="media">
                            
                            <div class="media-body">
                                <div class="product-box2-content">
                                 <h3>Product Name: <%=name%></h3>
								 <img src="img/home image.jpg" alt="product-image" class="img-responsive">
                                    <span>Amount:Rs.<%=notdiscprice%></span>
                                    <span>Discount: <%=perdisc%>%</span>
                                    <p>Description: <%=description%></p>
                                </div>
                                <ul class="product-box2-cart">
                                     <li><a href="#" class="buyNow">Buy Now</a></li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </script>

    <script type="text/template" id="shopCartRowTplSearch">
          
             <div class="tab-content">
            <div role="tabpanel" class="tab-pane shop-page1-xs-width" id="gried-view">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                    <div class="product-box1">
                       
                    </div>
                </div>
           
            </div>
            <!-- Listed product show -->
            <div role="tabpanel" class="tab-pane active" id="list-view">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="product-box2">
                        <div class="media">
                            
                            <div class="media-body">
                                <div class="product-box2-content" id="<%=id%>">
                                 <h3>Product Name: <%=name%></h3>
								  <img src="img/home image.jpg" alt="product-image" class="img-responsive">
                                    <span id="notdiscprice"></span>
                                    <span id="perdisc"></span>
                                    <p>Description: <%=description%></p>
                                </div>
                                <ul class="product-box2-cart">
                                     <li><a href="#" class="buyNow">Buy Now</a></li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </script>
  
        <!-- Shop Page 1 Area End Here -->
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
    </div>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
     
    <!-- Preloader End Here -->
    <!-- jquery-->
    <script src="js/jquery-2.2.4.min.js" type="text/javascript"></script>

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

    <script type="text/javascript" src="js/models/CategoryModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/TopicModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/SubjectModel.js?version=1.0.1"></script>
     <script type="text/javascript" src="js/models/ProductCatalogModel.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/models/ProductCatalogHomeList.js?version=1.0.1"></script>

    <script type="text/javascript" src="js/collections/ProductCatalogHomeCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/ProductCatalogUserCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/CategoryCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/SubjectCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/TopicCollection.js?version=1.0.1"></script>
    <script type="text/javascript" src="js/collections/CategoryCartCollection.js?version=1.0.1"></script>
     <script type="text/javascript" src="js/collections/SubjectCartCollection.js?version=1.0.1"></script>
      <script type="text/javascript" src="js/collections/TopicCartCollection.js?version=1.0.1"></script>
      <script type="text/javascript" src="js/collections/ProductCatalogCollectionNew.js?version=1.0.1"></script>
      <script type="text/javascript" src="js/collections/ProductCatalogCollectionuser.js?version=1.0.1"></script>

    <script type="text/javascript" src="js/views/ShoppingPageView.js?version=1.0.1"></script>

     <!-- Router -->    
    <script type="text/javascript" src="js/router/adminRouter.js?version=1.0.1"></script>

    <!-- Core JS-->
       
   <script type="text/javascript" src="js/homeapp.js?version=1.0.1"></script>
   <script type="text/javascript" src="js/Validation.js?version=1.0.1"></script>
   <script type="text/javascript" src="build/js/first-layout/demo.js?version=1.0.1"></script>
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
                   
                    var userName = $('#userName').val();
                    var userPwd = $('#userPwd').val();

                    if(userName == '' || userName == undefined || userName == null){

                        return false;
                    }else if (userPwd == '' || userPwd == undefined || userPwd == null){
                        return false;
                    }
                                       
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
