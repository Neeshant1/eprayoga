<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ePrayoga</title>
    <!-- PACE-->
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
    
    <!-- Toastr-->
    <link rel="stylesheet" type="text/css" href="plugins/toastr/toastr.min.css">
    <!-- SpinKit-->
    <link rel="stylesheet" type="text/css" href="plugins/SpinKit/css/spinners/2-double-bounce.css">
    <!-- Weather Icons-->
    <link rel="stylesheet" type="text/css" href="plugins/weather-icons/css/weather-icons-wind.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/weather-icons/css/weather-icons.min.css">
    <!-- Bootstrap Date Range Picker-->
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Core CSS-->
    <link rel="stylesheet" type="text/css" href="styles/first-layout.css">
  </head>
  <body>
    <!-- Header start-->
    <header>
      <div class="search-bar closed">
      </div>


        <a href="javascript:;" role="button" class="hamburger-menu pull-left"><span></span></a>
      <form class="search-form m-10 pull-right hidden-xs">

        <div class="form-group has-feedback mb-0">
          <input type="text" aria-describedby="inputSearchFor" placeholder="Search for..." style="width: 180px" class="form-control rounded"><span aria-hidden="true" class="ion-search form-control-feedback"></span><span id="inputSearchFor" class="sr-only">(default)</span>
        </div>
      </form>

      <a href="#"><img src="logo.png" alt="" width="100"></a> 
   
     
      
    </header>
    <!-- Header end-->
    <div class="main-container">
      <!-- Main Sidebar start-->
      <aside data-mcs-theme="minimal-dark" class="main-sidebar mCustomScrollbar" >
        <div class="media user">
          <div class="media-left">

          </div>
        </div>

        <ul class="list-unstyled navigation mb-0">
          <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse1" aria-expanded="false" aria-controls="collapse1" class="collapsed"><i class="ion-ios-home-outline bg-purple"></i><span class="sidebar-title">Assesments</span></a>
            <ul id="collapse1" class="list-unstyled collapse">
              <li><a href="#" class="active">Exams</a></li>
              <li><a href="#">New Topics</a></li>
            </ul>
          </li>

          <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse12" aria-expanded="false" aria-controls="collapse12" class="collapsed"><i class="ion-ios-home-outline bg-purple"></i><span class="sidebar-title">Registration</span></a>
            <ul id="collapse12" class="list-unstyled collapse">
              <li><a href="#" class="active">Corporate</a></li>
              <li><a href="#">Corporate Group</a></li> 
              <li><a href="#" class="active">Others</a></li>
            </ul>
          </li>

          <li class="panel"><a href="#"><i class="ion-ios-person-outline bg-success"></i><span class="sidebar-title">Pricing</span></a></li>

          
          <!-- 
          <li class="panel"><a href="chat-dashboard.html"><i class="ion-ios-chatbubble-outline bg-primary"></i><span class="sidebar-title">About Us</span></a></li> -->

           <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse2" aria-expanded="false" aria-controls="collapse2" class="collapsed"><i class="ion-ios-printer-outline bg-danger"></i><span class="sidebar-title">About Us</span></a>
            <ul id="collapse2" class="list-unstyled collapse">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Features</a></li>
              <li><a href="#">Testimonals</a></li>
               <li><a href="#">Blog</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
          </li>

          <li class="panel"><a href="calendar.html"><i class="ion-ios-calendar-outline bg-info"></i><span class="sidebar-title">Help</span></a></li>

           <li class="panel"><a href="/login"><i class="ion-ios-calendar-outline bg-info"></i><span class="sidebar-title">Login</span></a></li>
         
      
        </ul>
      
      </aside> 
      <!-- Main Sidebar end-->



       <div class="page-container">
        <div class="page-content container-fluid">

        <div class="row">
            <div class="col-md-4">
              <div class="widget">
                <div class="widget-body">
                  <div class="media">
                    <div class="media-body"><span class="fs-12 text-muted text-uppercase">Total Topics</span>
                      <div class="fs-36 fw-300 counter">5,500</div>
                    </div>
                    <div class="media-right"><i class="ion-ios-list-outline fs-36"></i></div>
                  </div>
                </div>
                <div id="flot-order" style="height: 50px; margin-top: -30px"></div>
              </div>
            </div>
           <!--  <div class="col-md-3">
              <div class="widget">
                <div class="widget-body">
                  <div class="media">
                    <div class="media-body"><span class="fs-12 text-muted text-uppercase">Total Revenue </span><span class="text-success"><i class="ion-arrow-up-c"></i> 6.54%</span>
                      <div class="fs-36 fw-300">$<span class="counter">20,320</span></div>
                    </div>
                    <div class="media-right"><i class="ion-ios-pulse fs-36"></i></div>
                  </div>
                </div>
                <div id="flot-revenue" style="height: 50px; margin-top: -30px"></div>
              </div>
            </div> -->
            <div class="col-md-4">
              <div class="widget">
                <div class="widget-body">
                  <div class="media">
                    <div class="media-body"><span class="fs-12 text-muted text-uppercase"> Users </span><span class="text-danger">
                      <div class="fs-36 fw-300 counter">7,860</div>
                    </div>
                    <div class="media-right"><i class="ion-ios-person-outline fs-36"></i></div>
                  </div>
                </div>
                <div id="flot-user" style="height: 50px; margin-top: -30px"></div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="widget">
                <div class="widget-body">
                  <div class="media">
                    <div class="media-body"><span class="fs-12 text-muted text-uppercase">Courses</span><span class="text-success">
                      <div class="fs-36 fw-300 counter">500</div>
                    </div>
                    <div class="media-right"><i class="ion-ios-compose-outline fs-36"></i></div>
                  </div>
                </div>
                <div id="flot-feedback" style="height: 50px; margin-top: -30px"></div>
              </div>
            </div>
          </div>


          <div class="widget">
               <div class="widget-body">
          <div class="row">
              <div class="col-lg-12">
                  <p></p>
                  <div id="carousel-example-captions" data-ride="carousel" data-interval="4000" class="carousel slide">
                    <ol class="carousel-indicators">
                      <li data-target="#carousel-example-captions" data-slide-to="0" class="active"></li>
                      <li data-target="#carousel-example-captions" data-slide-to="1"></li>
                      <li data-target="#carousel-example-captions" data-slide-to="2"></li>
                    </ol>
                    <div role="listbox" class="carousel-inner">
                      <div class="item active"><img src="pp-3.jpg" width="100%" height="100%"alt="">
                        <div class="carousel-caption">
                          <h3>ePrayoga</h3>
                          <p>Online Assesment</p>
                        </div>
                      </div>
                      <div class="item"><img src="pp-4.jpg"  width="100%" height="100%" alt="">
                        <div class="carousel-caption">
                          <h3>ePrayoga</h3>
                          <p>Online Assesment</p>
                        </div>
                      </div>
                      <div class="item"><img src="pp-5.jpg"  width="100%" height="100%" alt="">
                        <div class="carousel-caption">
                       <h3>ePrayoga</h3>
                          <p>Online Assesment</p>
                        </div>
                      </div>
                    </div><a href="#carousel-example-captions" role="button" data-slide="prev" class="left carousel-control"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span><span class="sr-only">Previous</span></a><a href="#carousel-example-captions" role="button" data-slide="next" class="right carousel-control"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span><span class="sr-only">Next</span></a>
                  </div>
                </div>
                </div>
                </div>
              </div>
            </div> 
          </div>
          </div>
        </div>      
      </aside>
      <!-- Right Sidebar end-->
    </div>
    <!-- jQuery-->
    <script type="text/javascript" src="plugins/jquery/dist/jquery.min.js"></script>
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
    <!-- MomentJS-->
    <script type="text/javascript" src="plugins/moment/min/moment.min.js"></script>
    <!-- jQuery BlockUI-->
    <script type="text/javascript" src="plugins/blockUI/jquery.blockUI.js"></script>
    <!-- jQuery Counter Up-->
    <script type="text/javascript" src="plugins/jquery-waypoints/waypoints.min.js"></script>
    <script type="text/javascript" src="plugins/Counter-Up/jquery.counterup.min.js"></script>
    <!-- Flot Charts-->
    <script type="text/javascript" src="plugins/flot/jquery.flot.js"></script>
    <script type="text/javascript" src="plugins/flot/jquery.flot.resize.js"></script>
    <script type="text/javascript" src="plugins/flot.curvedlines/curvedLines.js"></script>
    <script type="text/javascript" src="plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <!-- Bootstrap Date Range Picker-->
    <script type="text/javascript" src="plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Core JS-->
    <script type="text/javascript" src="build/js/first-layout/app.js"></script>
    <script type="text/javascript" src="build/js/first-layout/demo.js"></script>
    <script type="text/javascript" src="build/js/page-content/dashboard/index.js"></script>
  </body>
</html>