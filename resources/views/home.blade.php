<!doctype html>
<html class="no-js" lang="">
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
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Eprayoga | Home </title>
    <meta name="description" content="">
     <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    <!-- Magic popup CSS -->
    <link rel="stylesheet" href="js/css/magnific-popup.css">
    <!-- Switch Style CSS -->
    <link rel="stylesheet" href="js/css/hover-min.css">
    <!-- ReImageGrid CSS -->
    <link rel="stylesheet" href="js/css/reImageGrid.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="js/style.css">
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

    function getCustomerCount(){
      $.ajax({
                  url: "/eprayoga/admin/get_customer_count",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                   
                      $('#customer_count').html('<h2 class="about-counter title-bar-counter" id="customer_count" data-num="'+data+'">'+data+'</h2> <p>No Of Customers Enrolled</p>');

                        
                     //self.origindata = data;
                  },
                  error: function(data) {
                      errorhandle(data);
                  }
                })


    }

    function getEnroll(){
        $.ajax({
                  url: "/eprayoga/admin/get_client_count",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                   
                     
                  $('#client_count').html('<h2 class="about-counter title-bar-counter" id="client_count" data-num="'+data+'">'+data+'</h2> <p>No Of Clients Enrolled</p>');
                        
                        
                     //self.origindata = data;
                  },
                  error: function(data) {
                      errorhandle(data);   
                  }
                })


    }
  </script>
</head>

<body>

    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Add your site or application content here -->
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <!-- Main Body Area Start Here -->
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
                                        <a href="{{url('/')}}"><img class="img-responsive" src="js/img/logo.png" alt="logo"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" style="padding-top:9px">
                                <div class="header-top-right">
                                    <ul>
                                        <li><i class="fa fa-phone" aria-hidden="true"></i><a>+91 98400 40441</a></li>
                                        <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#">info@eprayoga.com</a></li>
                                        <li>
                                                 
                                            <a href="#" class="login-btn-area" id="login-button"><i class="fa fa-lock" aria-hidden="true"></i> Login</a>
                                            <div class="login-form" id="login-form">
                                            <div class="title-default-left-bold">Login</div>
                                            <div id="error" style="font-size: medium; color: #cccccc";> 
                                              <div id="clr_msg"> </div>
                                                <form class="form-horizontal" method="POST" action="/eprayoga/login">{{ csrf_field() }}
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
                                                    <button class="default-big-btn ncn" id="esuccess" type="submit" value="Login">Login</button>
                                                    <button class="default-big-btn ncn form-cancel" type="submit" value="">Cancel</button></div>

                                                   
                                                </form>
                                            </div>
                                        </li>
                                        <li><a href="{{url('/')}}/sign_up" class="apply-now-btn2"> Sign Up</a></li>
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
                                        <li class="active"><a href="{{ url('/') }}">Home</a>
                                        </li>
                                        <li><a href="{{ url('/') }}/shopCart" id="shop1">Offering</a>
                                        </li>
                                        <li><a href="{{ url('/') }}/shopCart" id="shop1">About Us</a>
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
        <!-- Slider 1 Area Start Here -->
        <div class="slider1-area overlay-default">
            <div class="bend niceties preview-1">
                <div id="ensign-nivoslider-3" class="slides">
                    <img src="js/img/slider/1-3.jpg" alt="slider" title="#slider-direction-1" />
                    <img src="js/img/slider/1-2.jpg" alt="slider" title="#slider-direction-2" />
                    <img src="js/img/slider/1-3.jpg" alt="slider" title="#slider-direction-3" />
                </div>
                <div id="slider-direction-1" class="t-cn slider-direction">
                    <div class="slider-content s-tb slide-1">
                        <div class="title-container s-tb-c">
                            <div class="title1">ePrayoga</div>
                            <p>Transforming the Digital Assessment. </p>
                            <div class="slider-btn-area">
                                <a href="/shopCart" class="default-big-btn">Start a Course</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="slider-direction-2" class="t-cn slider-direction">
                    <div class="slider-content s-tb slide-2">
                        <div class="title-container s-tb-c">
                            <div class="title1">ePrayoga</div>
                            <p>Transforming the Digital Assessment. </p>
                            <div class="slider-btn-area">
                                <a href="/shopCart" class="default-big-btn">Start a Course</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="slider-direction-3" class="t-cn slider-direction">
                    <div class="slider-content s-tb slide-3">
                        <div class="title-container s-tb-c">
                            <div class="title1">ePrayoga</div>
                            <p>Transforming the Digital Assessment. </p>
                            <div class="slider-btn-area">
                                <a href="/shopCart" class="default-big-btn">Start a Course</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider 1 Area End Here -->
        <!-- Service 1 Area Start Here -->
        <div class="service1-area">
            <div class="service1-inner-area">
                <div class="container">
                    <div class="row service1-wrapper">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 service-box1">
                            <div class="service-box-content">
                                <h3><a>What</a></h3>
                                <p>ePrayoga - An Unique Horizontal Platform to test online.  Measure the knowledge of the participant.</p>
                            </div>
                            <div class="service-box-icon">
                                
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 service-box1">
                            <div class="service-box-content">
                                <h3><a>Why</a></h3>
                                <p>ePrayoga - A Comfortable Anline Platform as "SaaS" model to reap higher ROI with Shorter TAT </p>
                            </div>
                            <div class="service-box-icon">
                                
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 service-box1">
                            <div class="service-box-content">
                                <h3><a>How</a></h3>
                                <p>ePrayoga - An Integrated Assessment Platform where an user can optimize their Own Assessment Need.</p>
                            </div>
                            <div class="service-box-icon">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service 1 Area End Here -->
        <!-- About 1 Area Start Here -->
       
        <!-- About 1 Area End Here -->
        <!-- Courses 1 Area Start Here -->
        <div class="courses1-area">
            <div class="container">
                <h2 class="title-default-left">Featured Courses</h2>
            </div>
            <div id="shadow-carousel" class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="20" data-autoplay="false" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="2" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="3" data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="true" data-r-large-dots="false">
                    <div class="courses-box1">
                        <div class="single-item-wrapper">
                            <div class="courses-img-wrapper ">
                                <img class="img-responsive" src="js/img/course/1.png" alt="courses">
                               
                            </div>
                            <div class="courses-content-wrapper">
                                <h3 class="item-title">AWS</h3>
                                <p class="item-content">Cerified Solution Architect</p>
                                <ul class="courses-info">
                                    <li>1 Year
                                        <br><span> Course</span></li>
                                    <li>40
                                        <br><span> Classes</span></li>
                                    <li>10 am - 11 am
                                        <br><span> Classes</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="courses-box1">
                        <div class="single-item-wrapper">
                            <div class="courses-img-wrapper">
                                <img class="img-responsive" src="js/img/course/1.png" alt="courses">
                             
                            </div>
                            <div class="courses-content-wrapper">
                                <h3 class="item-title">AWS</h3>
                                <p class="item-content">Cerified Solution Developer</p>
                                <ul class="courses-info">
                                    <li>3 Months
                                        <br><span> Course</span></li>
                                    <li>30
                                        <br><span> Classes</span></li>
                                    <li>10 am - 11 am
                                        <br><span> Classes</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="courses-box1">
                        <div class="single-item-wrapper">
                            <div class="courses-img-wrapper">
                                <img class="img-responsive" src="js/img/course/2.png" alt="courses">
                              
                            </div>
                            <div class="courses-content-wrapper">
                                <h3 class="item-title">MCSA</h3>
                                <p class="item-content">Microsoft Certified Solution Associate</p>
                                <ul class="courses-info">
                                    <li>1 Year
                                        </li>
                                    <li>40
                                      </li>
                                    <li>10 am - 11 am
                                        </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="courses-box1">
                        <div class="single-item-wrapper">
                            <div class="courses-img-wrapper ">
                                <img class="img-responsive" src="js/img/course/3.png" alt="courses">
                          
                            </div>
                            <div class="courses-content-wrapper">
                                <h3 class="item-title">DevOps</h3>
                                <p class="item-content">DevOps Methodology</p>
                                <ul class="courses-info">
                                    <li>3 Months
                                        <br><span> Course</span></li>
                                    <li>30
                                        <br><span> Classes</span></li>
                                    <li>10 am - 11 am
                                        <br><span> Time</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="courses-box1">
                        <div class="single-item-wrapper">
                            <div class="courses-img-wrapper ">
                                <img class="img-responsive" src="js/img/course/1.png" alt="courses">
                              
                            </div>
                            <div class="courses-content-wrapper">
                                <h3 class="item-title">AWS</h3>
                                <p class="item-content">Certified Cloud Functioner</p>
                                <ul class="courses-info">
                                    <li>2 Months
                                        <br><span> Course</span></li>
                                    <li>24
                                        <br><span> Classes</span></li>
                                    <li>10 am - 11 am
                                        <br><span> Classes</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="courses-box1">
                        <div class="single-item-wrapper">
                            <div class="courses-img-wrapper">
                                <img class="img-responsive" src="js/img/course/1.png" alt="courses">
                                
                            </div>
                            <div class="courses-content-wrapper">
                                <h3 class="item-title"><a href="#">AWS</a></h3>
                                <p class="item-content">Certified Big Data Analyst</p>
                                <ul class="courses-info">
                                    <li>1 Year
                                        <br><span> Course</span></li>
                                    <li>50
                                        <br><span> Classes</span></li>
                                    <li>10 am - 11 am
                                        <br><span> Time</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        <!-- Courses 1 Area End Here -->
        <!-- Video Area Start Here -->
      

        <!-- Video Area End Here -->
        <!-- Lecturers Area Start Here -->
      
        <!-- Lecturers Area End Here -->
        <!-- News and Event Area Start Here -->
        <div class="news-event-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 news-inner-area">
                        <h2 class="title-default-left">Latest News</h2>
                        <ul class="news-wrapper">
                            <li>
                                <div class="news-img-holder">
                                    <img src="js/img/news/11.png" class="img-responsive" alt="news">
                                </div>
                                <div class="news-content-holder">
                                    <h3>AWS</h3>
                                    <div class="post-date">Amazon Web Service, Inc</div>
                                    <p>Authorized Partner - Consulting</p>
                                </div>
                            </li>
                            <li>
                                <div class="news-img-holder">
                                   <img src="js/img/news/11.png" class="img-responsive" alt="news">
                                </div>
                                <div class="news-content-holder">
                                    <h3>AWS</h3>
                                    <div class="post-date">Amazon Web Service, Inc</div>
                                    <p>Authorized Partner - Training</p>
                                </div>
                            </li>
                            <li>
                                <div class="news-img-holder">
                                    <a href="#"><img src="js/img/news/13.png" class="img-responsive" alt="news"></a>
                                </div>
                                <div class="news-content-holder">
                                    <h3>Microsoft</h3>
                                    <div class="post-date">Microsoft Corp</div>
                                    <p>Authorized Parner Cloud Consulting</p>
                                </div>
                            </li>
                            <li>
                                <div class="news-img-holder">
                                    <a href="#"><img src="js/img/news/12.png" class="img-responsive" alt="news"></a>
                                </div>
                                <div class="news-content-holder">
                                    <h3>Google</h3>
                                    <div class="post-date">Google, Inc</div>
                                    <p>Authorized Partner Cloud Consulting </p>
                                </div>
                            </li>
                        </ul>
                       
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 event-inner-area">
                        <h2 class="title-default-left">Upcoming Events</h2>
                        <ul class="event-wrapper">
                            <li class="wow bounceInUp" data-wow-duration="2s" data-wow-delay=".1s">
                                <div class="event-calender-wrapper">
                                    <div class="event-calender-holder">
                                        <h3>26</h3>
                                        <p>Jan</p>
                                        <span>2017</span>
                                    </div>
                                </div>
                                <div class="event-content-holder">
                                    <h3><a href="single-event.html">Html MeetUp Conference 2017</a></h3>
                                    <p>Pellentese turpis dignissim amet area ducation process facilitating Knowledge. Pellentese turpis dignissim amet area ducation process facilitating Knowledge. Pellentese turpis dignissim amet area ducation.</p>
                                    <ul>
                                        <li>04:00 PM - 06:00 PM</li>
                                        <li>Australia , Melborn</li>
                                    </ul>
                                </div>
                            </li>
                            <li class="wow bounceInUp" data-wow-duration="2s" data-wow-delay=".3s">
                                <div class="event-calender-wrapper">
                                    <div class="event-calender-holder">
                                        <h3>26</h3>
                                        <p>Jan</p>
                                        <span>2017</span>
                                    </div>
                                </div>
                                <div class="event-content-holder">
                                    <h3><a href="single-event.html">Workshop On UI Design</a></h3>
                                    <p>Pellentese turpis dignissim amet area ducation process facilitating Knowledge. Pellentese turpis dignissim amet area ducation process facilitating Knowledge. Pellentese turpis dignissim amet area ducation.</p>
                                    <ul>
                                        <li>03:00 PM - 05:00 PM</li>
                                        <li>Australia , Melborn</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <div class="event-btn-holder">
                            <a href="#" class="view-all-primary-btn">View All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- News and Event Area End Here -->
        <!-- Counter Area Start Here -->
        <div class="counter-area bg-primary-deep" style="background-image: url('js/img/banner/4.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" id="customer_count" data-wow-duration=".5s" data-wow-delay=".20s">
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" id="client_count" data-wow-duration=".5s" data-wow-delay=".40s">
                       
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".60s">
                        <h2 class="about-counter title-bar-counter" data-num="56">56</h2>
                        <p>No Of Courses Offered</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".80s">
                        <h2 class="about-counter title-bar-counter" data-num="77">77</h2>
                        <p>No Of Exams Taken</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Counter Area End Here -->
        <!-- Students Say Area Start Here -->
       
        <!-- Students Say Area End Here -->
        <!-- Students Join 1 Area Start Here -->
       
        <!-- Students Join 1 Area End Here -->
        <!-- Brand Area Start Here -->
        <div class="brand-area">
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-r-x-small="2" data-r-x-small-nav="false" data-r-x-small-dots="false" data-r-x-medium="3" data-r-x-medium-nav="false" data-r-x-medium-dots="false" data-r-small="4" data-r-small-nav="false" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="false" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="false" data-r-large-dots="false">
                    <div class="brand-area-box">
                        <a href="#"><img src="js/img/brand/gggg.jpeg" alt="brand"></a>
                    </div>
                    <div class="brand-area-box">
                        <a href="#"><img src="js/img/brand/aws.png" alt="brand"></a>
                    </div>
                    <div class="brand-area-box">
                        <a href="#"><img src="js/img/brand/mmm.jpeg" alt="brand"></a>
                    </div>
                    <div class="brand-area-box">
                        <a href="#"><img src="js/img/brand/ms2.png" alt="brand"></a>
                    </div>
                   <div class="brand-area-box">
                        <a href="#"><img src="js/img/brand/gggg.jpeg" alt="brand"></a>
                    </div>
                    <div class="brand-area-box">
                        <a href="#"><img src="js/img/brand/aws.png" alt="brand"></a>
                    </div>
                   
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand Area End Here -->
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
    <!-- Main Body Area End Here -->
    <!-- jquery-->
    <script src="js/jquery-2.2.4.min.js" type="text/javascript"></script>
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
    <!-- Magic Popup js -->
    <script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
    <!-- Gridrotator js -->
    <script src="js/jquery.gridrotator.js" type="text/javascript"></script>
    <!-- Custom Js -->
    <script src="js/main.js" type="text/javascript"></script>

    <script type="text/javascript"> getCustomerCount();</script>

    <script type="text/javascript"> getEnroll();</script>
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
