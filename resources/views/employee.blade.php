<!DOCTYPE html>
<html lang="en">
@if (is_null(Session::get('user_type')))
<script type="text/javascript">
window.location="/";
</script>
@elseif (Session::get('user_type') == 'T')
<script type="text/javascript">
window.location="/admin_main";
</script>
@elseif (Session::get('user_type') == 'S')
<script type="text/javascript">
window.location="/admin_main";
</script>
@elseif (Session::get('user_type') == 'C')
<script type="text/javascript">
window.location="/user_exam";
</script>
@elseif (Session::get('user_type') == 'E')
<script type="text/javascript">
window.location="/employee#examCart";
</script>
@endif
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ePrayoga - User Console</title>

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
    <!-- Main Menu CSS -->
    <link rel="stylesheet" href="js/css/meanmenu.min.css">
    <!-- Datetime Picker Style CSS -->
    <link rel="stylesheet" href="js/css/jquery.datetimepicker.css">
    <!-- ReImageGrid CSS -->
    <link rel="stylesheet" href="js/css/reImageGrid.css">
     <!-- Bootstrap Date Range Picker-->
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Bootstrap DatePicker-->
    <link rel="stylesheet" type="text/css" href="plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
     <link rel="stylesheet" type="text/css" href="plugins/PACE/themes/blue/pace-theme-flash.css">
    <script type="text/javascript" src="plugins/PACE/pace.min.js"></script>
    <!-- jQuery Steps-->
    <link rel="stylesheet" type="text/css" href="plugins/jquery.steps/demo/css/jquery.steps.css">
        <!-- Custom CSS -->
    <link rel="stylesheet" href="js/style.css">
    <!-- Core CSS-->
    <link rel="stylesheet" type="text/css" href="styles/first-layout.css">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css">

    <!-- Mathquill css -->
    <link rel="stylesheet" type="text/css" href="js/mathquill/mathquill.css">   
     <!-- Kekule for Chemistry -->
    <link rel="stylesheet" type="text/css" href="plugins/kekule/themes/default/kekule.css"> 


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

    <div id="preloader"></div>

    <div id="wrapper">


  <header>

      <div id="header2" class="header4-area">
                <div class="header-top-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="header-top-left">
                                    <div class="logo-area" >
										<a href="{{url('/')}}">
                                        <img class="img-responsive" src="js/img/logo.png" alt="logo">
										</a>
									</div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" style="padding-top: 16px;">
                                <div class="header-top-right ra" >
                                    <ul>
                                        <li ><i class="fa fa-phone" aria-hidden="true"></i><a>+91 98400 40441</a></li>
                                        <li ><i class="fa fa-envelope" aria-hidden="true"></i><a>Hi,  {{Session::get('user_category') }}:  {{Session::get('first_name') }} {{Session::get('last_name')}} !</a></li>
                                         <li>
                                              <a class="login-btn-area" href="/eprayoga/logout" ><i class="fa fa-lock" aria-hidden="true"></i> Logout</a>
                                              
                                      </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   

        <div class="mobile-menu-area">

                <div class="container">

                    <div class="row">

                        <div class="col-md-12">
                          

                            <div class="mobile-menu">
                                <nav id="dropdown">
                                       <ul>                                        
                                        <li>
                                              <a class="login-btn-area" href="/eprayoga/logout" ><i class="fa fa-lock" aria-hidden="true"></i> Logout</a>
                                        </li>
                                       
                                    </ul> 
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                    

            <!-- Mobile Menu Area Start -->
            <!--  <div class="main-menu-area bg-primary" id="sticker">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                <nav id="desktop-nav" style="margin-right: 450px;">
                                    <ul>

                                        <li class="active"><a href="/">Home</a>
                                        </li>
                                        <li><a href="/shopCart" id="shop1">Offering</a>

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
 -->

  </header>


        <!-- Header Area End Here -->

        <script type="text/template" id="popupscript"> 

                <div id="myModalCust" class="modal fade" role="dialog">
                         <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                           </div>
                        <div class="modal-body">
                        <div id="texval"></div>
                        <h4><div id = "messagepop"></div></h4>
                 
                        </div>
                   <div class="modal-footer">
                   <input type="hidden" id="cateid">
                  <button type="button" class="btn btn-black" data-dismiss="modal">0k</button>
                  </div>
                </div>
               </div>
              </div>
        </script>


   <input type="hidden" value='2' name="typecheck" id="typecheck">
         <div id="exitBrowserDialog1" class="modal fade" role="dialog">
          <div role="document" class="modal-dialog modal-sm">
                      <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 id="mySmallModalLabel1" class="modal-title">Data you entered may not saved</h4>
                           </div>
                        <div class="modal-body">
                        <h5>Do You Want to leave this page<div></div></h5>
                 
                        </div>
                   <div class="modal-footer">
                  <button type="button" data-dismiss="modal" id="leaveCurrentPageOK" class="btn btn-black">Leave</button>
                  <button type="button" data-dismiss="modal" id="leaveCurrentPageCancel" class="btn btn-black">Stay</button>
                  </div>
                </div>
               </div>
              </div>
          </div>    
   

    <div id="exam" class="page-container">
        <div class="page-content container-fluid" style="padding: 30px 0px 0 0;">
          <div class="row">
            <div class="col-lg-12">
              <div class="widget no-border exam">
                <div id="page-section" style="margin-top: 65px;"></div>

              </div>
            </div>
          </div>
        </div>
      </div>
 <footer>
              
            <div class="foot-area-bottom" style="bottom:0; left:0;"> <hr style="bottom:0; left:0;margin-top: 20px; margin-bottom: 20px; border: 0; margin-left: 20%; margin-right: 20%; border-top: 2px solid #eee;">
                <div class="container" align="center">
                    <p>&copy; 2017 Academics All Rights Reserved. &nbsp; Designed by<a target="_blank"><font color="Black"> Vahai Technologies</font></a></p>
                </div>
            </div>
    </footer>


    <script  type="text/template" id="ProductCatalogTpl">
    <div class="advanced_selection">
            <table cellpadding="0" cellspacing="0" class="product_checks">
              <tr class="trrc">
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
            <td><div><button class="minus" field="quantity"><i class="glyphicon glyphicon-minus" ></i></button> &nbsp &nbsp<input type='text' id="quantity" name='quantity' value='1' class='qty' readonly="readonly" style=" width: 40px; height: 25px; text-align: center;"/><button class="add" field="quantity"><i class="glyphicon glyphicon-plus"></i></button> </div></td>
            <td><span style="display:inline-block; width: 20px;">
            <a class="del_cart"   data-toggle="tooltip" data-placement="top" title="Delete" val="<%=id%>"><i class="glyphicon glyphicon-minus-sign" ></i></a>
            </span></td>
          </tr>
      </script>

      <script type="text/template" id="examCartPage">

      <div class="widget-heading">

          @if (session('message'))
            
              <div id="clr_msg" class="alert alert-success"> {{ session('message') }}  </div>
            
         @endif
            <h3 class="widget-title">Exams</h3>
          </div>
          
          <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr class="trrc">             
                         <th>name</th>
                         <th>Description</th>
                         <th>product catalog code</th>
                         <th>Date</th>   
                         <th>Start Time </th> 
                         <th>End Time </th>                   
                       
                        <th>Actions</th>
                        <th>no of Attempt</th>

                         <th>Exam</th>
                      </tr>
                    </thead>
                    <tbody id="examcart">

          


                  </tbody>
           </table>  
          
           <div id="scheduleform"></div> 

            <div class="widget-heading">
            <h3 class="widget-title">Completed Exams</h3>
             </div>
        <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr class="trrc">        
                        <th>name</th>
                        <th>Description</th>
                        <th>product catalog code</th>
                        <th>Date</th>   
                         <th>Start Time </th> 
                         <th>End Time </th>
                         <th>Score Card</th>                    
                      </tr>
                    </thead>
                    <tbody id="completedexamcart">

          


                    </tbody>
        </table>  


          </div>
          </script>
        <script type="text/template" id="comexamCartTemplate">
            <td><%=name%></td> 
            <td><%=description%></td>        
            <td><%=product_catalog_code%></td>  
            <td> <%=exam_planned_date%>  </td>  
            <td> <%=start_time%> </td>
            <td>  <%=end_time%> </td>
            <td><a id="<%=exam_schedule_id%>" class="result">Score Card</a></td>
        </script>
       <script type="text/template" id="examCartTemplate">
        <% if (is_schedule==false) {%>
            <td><%=name%></td> 
            <td><%=description%></td>        
            <td><%=product_catalog_code%></td>  
            <td>_______</td> 
            <td>_______</td> 

            <td>_______</td>  
             
            <td id="schedule_page"><a>schedule</a></td>  
             <td></td>
          
         <td><a id="start_exam">Start </a></td> 

         <% }  else if (is_schedule==true) {%> 
            <td><%=name%></td> 
            <td><%=description%></td>        
            <td><%=product_catalog_code%></td>  

            <td> <%=exam_planned_date%>  </td>  
            <td> <%=start_time%> </td>
            <td>  <%=end_time%> </td>

            <td id="re_schedule_page"><a>Re-Schedule</a></td>  

             <td></td> 
              <%if(time_elapsed != 0){%>
            <td><a id="start_exam" data-toggle="modal" data-target="#myModalCust">Resume </a></td> 
            <%}else{%>
            <td><a id="start_exam" data-toggle="modal" data-target="#myModalCust" >Start </a></td> 
            <%}%>

           <% }   else if (is_schedule==null) {%> 
     
            <td><%=name%></td> 
            <td><%=description%></td>        
            <td><%=product_catalog_code%></td>  
            <td>_______</td> 
            <td>_______</td> 

            <td>_______</td>  
             
            <td id="schedule_page"><a>schedule</a></td>  
             <td></td>
          
         <td><a id="start_exam">Start </a></td> 

         <% }    %>

          
    
      </script>

      <script type="text/template" id="scheduleFormPage">

        <div class="widget">
         <div class="widget-heading">
            <h3 class="widget-title">Schedule</h3>
          </div>
          <div class="widget-body">
            <div id="form-tabs" class="form-horizontal">
             <fieldset>
                   <div class="row">
                    <div class="col-md-6">

                      <div class="form-group">
                        <label for="" class="col-sm-3 col-md-4 control-label">Exam Date</label>
                         <div class="col-sm-9 col-md-8">
                          <input id="exam_date" data-date-format='YYYY-MM-DD' type="text">
                          <div id="news_date_error" class="" style="font-size: 12px; color: #FF0000; "></div>
                        </div>
                      </div>
                    </div>
                </div>

                  <div class="row">
                    <div class="col-md-6">
                    
                      <div class="form-group">
                        <label for="" class="col-sm-3 col-md-4 control-label">Start Time</label>
                        <div class="col-sm-9 col-md-8" >

                          <select placeholder="hh" id="timepicker1" style="width: 60px;">
                          <option value="00">00</option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                         
                          </select>

                          <select placeholder="mm" id="timepicker2" style="width: 60px;">
                          <option value="00">00</option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                          <option value="32">32</option>
                          <option value="33">33</option>
                          <option value="34">34</option>
                          <option value="35">35</option>
                          <option value="36">36</option>
                          <option value="37">37</option>
                          <option value="38">38</option>
                          <option value="39">39</option>
                          <option value="40">40</option>
                          <option value="41">41</option>
                          <option value="42">42</option>
                          <option value="43">43</option>
                          <option value="44">44</option>
                          <option value="45">45</option>
                          <option value="46">46</option>
                          <option value="47">47</option>
                          <option value="48">48</option>
                          <option value="49">49</option>
                          <option value="50">50</option>
                          <option value="51">51</option>
                          <option value="52">52</option>
                          <option value="53">53</option>
                          <option value="54">54</option>
                          <option value="55">55</option>
                          <option value="56">56</option>
                          <option value="57">57</option>
                          <option value="58">58</option>
                          <option value="59">59</option>

                        </select>

                        <select placeholder="ss" id="timepicker3" style="width: 60px;" >
                          <option value="00">00</option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                          <option value="32">32</option>
                          <option value="33">33</option>
                          <option value="34">34</option>
                          <option value="35">35</option>
                          <option value="36">36</option>
                          <option value="37">37</option>
                          <option value="38">38</option>
                          <option value="39">39</option>
                          <option value="40">40</option>
                          <option value="41">41</option>
                          <option value="42">42</option>
                          <option value="43">43</option>
                          <option value="44">44</option>
                          <option value="45">45</option>
                          <option value="46">46</option>
                          <option value="47">47</option>
                          <option value="48">48</option>
                          <option value="49">49</option>
                          <option value="50">50</option>
                          <option value="51">51</option>
                          <option value="52">52</option>
                          <option value="53">53</option>
                          <option value="54">54</option>
                          <option value="55">55</option>
                          <option value="56">56</option>
                          <option value="57">57</option>
                          <option value="58">58</option>
                          <option value="59">59</option>

                           </select>

                          <div id="start_time_error" style="color:red"></div>
                        </div>

                      </div>
                    </div>
          
                    <div class="col-md-6">

                      <div class="form-group">
                        <label for="" class="col-sm-3 col-md-4 control-label">End Time</label>
                        <div class="col-sm-9 col-md-8">
                        <div id="endtimepicker1" class="input-group date">
                     <select placeholder="hh" class="timepicker" id="end_time"  style="width: 60px;" disabled="true" >
                     <option value="00">00</option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                         
                    </select>

                        <select placeholder="mm" class="timepicker" id="end_time2"  style="width: 60px;" disabled="true">
                          <option value="00">00</option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                          <option value="32">32</option>
                          <option value="33">33</option>
                          <option value="34">34</option>
                          <option value="35">35</option>
                          <option value="36">36</option>
                          <option value="37">37</option>
                          <option value="38">38</option>
                          <option value="39">39</option>
                          <option value="40">40</option>
                          <option value="41">41</option>
                          <option value="42">42</option>
                          <option value="43">43</option>
                          <option value="44">44</option>
                          <option value="45">45</option>
                          <option value="46">46</option>
                          <option value="47">47</option>
                          <option value="48">48</option>
                          <option value="49">49</option>
                          <option value="50">50</option>
                          <option value="51">51</option>
                          <option value="52">52</option>
                          <option value="53">53</option>
                          <option value="54">54</option>
                          <option value="55">55</option>
                          <option value="56">56</option>
                          <option value="57">57</option>
                          <option value="58">58</option>
                          <option value="59">59</option>
                        </select>

                        <select placeholder="ss" class="timepicker" id="end_time3" style="width: 60px;" disabled="true">
                          <option value="00">00</option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                         <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                          <option value="32">32</option>
                          <option value="33">33</option>
                          <option value="34">34</option>
                          <option value="35">35</option>
                          <option value="36">36</option>
                          <option value="37">37</option>
                          <option value="38">38</option>
                          <option value="39">39</option>
                          <option value="40">40</option>
                          <option value="41">41</option>
                          <option value="42">42</option>
                          <option value="43">43</option>
                          <option value="44">44</option>
                          <option value="45">45</option>
                          <option value="46">46</option>
                          <option value="47">47</option>
                          <option value="48">48</option>
                          <option value="49">49</option>
                          <option value="50">50</option>
                          <option value="51">51</option>
                          <option value="52">52</option>
                          <option value="53">53</option>
                          <option value="54">54</option>
                          <option value="55">55</option>
                          <option value="56">56</option>
                          <option value="57">57</option>
                          <option value="58">58</option>
                          <option value="59">59</option>

                        </select>
                             <div id="end_time_error" class="" style="font-size: 12px; color: #FF0000; " ></div>
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
                              <button type="submit" id="saveschedule"  class="btn btn-raised btn-black">Save</button> 
                               <button type="submit" id="cancelCq"  class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                  </fieldset>
                
            </div>
          </div>
      </script>


      <script type="text/template" id="rescheduleFormPage">

        <div class="widget ddd">
         <div class="widget-heading">
            <h3 class="widget-title">Re Schedule</h3>
          </div>
          <div class="widget-body" align="center">
            <div id="form-tabs" class="form-horizontal">
             <fieldset>
                   <div class="row">
                    <div class="col-md-6">

                      <div class="form-group">
                        <label for="" class="col-sm-3 col-md-4 control-label">Exam Date</label>
                         <div class="col-sm-9 col-md-8">
                          <input id="exam_date" data-date-format='YYYY-MM-DD' type="text">
                          <div id="news_date_error" class="" style="font-size: 12px; color: #FF0000; "></div>
                        </div>
                      </div>
                    </div>
                          </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="" class="col-sm-3 col-md-4 control-label dont">Start Time</label>
                        <div class="col-sm-9 col-md-8">
                          <select id="timepicker1" style="width: auto;">
                          <option value="00">00</option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          
                          </select>
                         <select placeholder="mm"  id="timepicker2" style="width: auto;">
                         <option value="00">00</option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                          <option value="32">32</option>
                          <option value="33">33</option>
                          <option value="34">34</option>
                          <option value="35">35</option>
                          <option value="36">36</option>
                          <option value="37">37</option>
                          <option value="38">38</option>
                          <option value="39">39</option>
                          <option value="40">40</option>
                          <option value="41">41</option>
                          <option value="42">42</option>
                          <option value="43">43</option>
                          <option value="44">44</option>
                          <option value="45">45</option>
                          <option value="46">46</option>
                          <option value="47">47</option>
                          <option value="48">48</option>
                          <option value="49">49</option>
                          <option value="50">50</option>
                          <option value="51">51</option>
                          <option value="52">52</option>
                          <option value="53">53</option>
                          <option value="54">54</option>
                          <option value="55">55</option>
                          <option value="56">56</option>
                          <option value="57">57</option>
                          <option value="58">58</option>
                          <option value="59">59</option>

                          </select>

                           <select placeholder="ss"  id="timepicker3" style="width: auto;" >
                           <option value="00">00</option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                          <option value="32">32</option>
                          <option value="33">33</option>
                          <option value="34">34</option>
                          <option value="35">35</option>
                          <option value="36">36</option>
                          <option value="37">37</option>
                          <option value="38">38</option>
                          <option value="39">39</option>
                          <option value="40">40</option>
                          <option value="41">41</option>
                          <option value="42">42</option>
                          <option value="43">43</option>
                          <option value="44">44</option>
                          <option value="45">45</option>
                          <option value="46">46</option>
                          <option value="47">47</option>
                          <option value="48">48</option>
                          <option value="49">49</option>
                          <option value="50">50</option>
                          <option value="51">51</option>
                          <option value="52">52</option>
                          <option value="53">53</option>
                          <option value="54">54</option>
                          <option value="55">55</option>
                          <option value="56">56</option>
                          <option value="57">57</option>
                          <option value="58">58</option>
                          <option value="59">59</option>

                          </select>
                          <div id="start_time_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">

                      <div class="form-group">
                        <label for="" class="col-sm-3 col-md-4 control-label dont">End Time</label>
                        <div class="col-sm-9 col-md-8">
                        <div id="endtimepicker1" class="input-group date">
                    <select class="timepicker" id="end_time" style="width: auto;" disabled="true">
                        <option value="00">00</option>

                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                         </select>

                        <select placeholder="mm" class="timepicker" id="end_time2" style="width: auto;" disabled="true">
                        <option value="00">00</option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                          <option value="32">32</option>
                          <option value="33">33</option>
                          <option value="34">34</option>
                          <option value="35">35</option>
                          <option value="36">36</option>
                          <option value="37">37</option>
                          <option value="38">38</option>
                          <option value="39">39</option>
                          <option value="40">40</option>
                          <option value="41">41</option>
                          <option value="42">42</option>
                          <option value="43">43</option>
                          <option value="44">44</option>
                          <option value="45">45</option>
                          <option value="46">46</option>
                          <option value="47">47</option>
                          <option value="48">48</option>
                          <option value="49">49</option>
                          <option value="50">50</option>
                          <option value="51">51</option>
                          <option value="52">52</option>
                          <option value="53">53</option>
                          <option value="54">54</option>
                          <option value="55">55</option>
                          <option value="56">56</option>
                          <option value="57">57</option>
                          <option value="58">58</option>
                          <option value="59">59</option>
                     </select>
                    <select placeholder="ss" class="timepicker" id="end_time3" style="width: auto;" disabled="true">
                        <option value="00">00</option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                          <option value="32">32</option>
                          <option value="33">33</option>
                          <option value="34">34</option>
                          <option value="35">35</option>
                          <option value="36">36</option>
                          <option value="37">37</option>
                          <option value="38">38</option>
                          <option value="39">39</option>
                          <option value="40">40</option>
                          <option value="41">41</option>
                          <option value="42">42</option>
                          <option value="43">43</option>
                          <option value="44">44</option>
                          <option value="45">45</option>
                          <option value="46">46</option>
                          <option value="47">47</option>
                          <option value="48">48</option>
                          <option value="49">49</option>
                          <option value="50">50</option>
                          <option value="51">51</option>
                          <option value="52">52</option>
                          <option value="53">53</option>
                          <option value="54">54</option>
                          <option value="55">55</option>
                          <option value="56">56</option>
                          <option value="57">57</option>
                          <option value="58">58</option>
                          <option value="59">59</option>

                    </select>
                             <div id="end_time_error" class="" style="font-size: 12px; color: #FF0000; "></div>
                        </div>
                       </div>
                      </div>
                    </div>
                  </div>

                   </div>
                   </fieldset>
                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="saveschedule"  class="btn btn-raised btn-black">Save</button> 
                               <button type="submit" id="cancelCq"  class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                  
               
            </div>
          </div>
      </script>

      <script type="text/template" id="performaPageTpl">
      <div id="userpdftemplate">
        <div class="widget">
         <div class="widget-heading">
              <center><h3 class="widget-title">Performa Page</h3></center>
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
                  </div>
            </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="widget">               
                <div class="widget-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                       <th>Complete Commodity Description</th>
                          <th>Quantity</th>
                          <th>Rate</th>
                          <th>Discount</th>
                          <th>Tax</th>
                          <th>Price</th>
                          <th>Amount</th>
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
                               <button type="submit" id="useronegeneratepdf" class="btn btn-raised btn-black">Generate pdf</button>
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
        <div class="col-md-9" id="cartUser"> 
        <div class="panel panel-default">
        <div class="panel-heading">  
          <h3 class="panel-title">Your Cart</h3> 
        </div>
        <table class="table">  
        <thead>
          <tr>
          <th>Product Name</th>
          <th>Description</th> 
          <th>Quantity</th>
          <th>Tax</th>
          <th>Discount</th>
          <th>Price</th>
          <th>Delete</th> 
         </tr> 
        </thead> 
        <tbody id="cartPageList"> </tbody> 
         </table></div></div> 
         <button type="submit" id="placeOrderCart" class="btn btn-raised btn-black">Place Order</button>
          <button type="submit" id="backShop" class="btn btn-raised btn-black">Back</button>
          <div id="cartHide"></div>
      </script>

       <script type="text/template" id="cartDetailsRowTpl">
          <tr id="a<%=id%>">
            <td><%=name%></td>
            <td><%=description%></td>
            <td><div><button id="minus" iid="<%=id%>" field="quantity"><i iid="<%=id%>" class="glyphicon glyphicon-minus" ></i></button> &nbsp &nbsp<input type='text' id="quantity1" name='quantity' value='1' class='qty' readonly="readonly" style=" width: 40px; height: 25px; text-align: center;"/><button id="add"  iid="<%=id%>" field="quantity"><i  iid="<%=id%>" class="glyphicon glyphicon-plus"></i></button> </div></td>
            <td><%=tax%></td>
            <td><%=discount%></td>
            <td><%=totalprice%></td>
            <td><span style="display:inline-block; width: 20px;">
            <a id="deleteCart"   data-toggle="tooltip" data-placement="top" title="Delete" iid="<%=id%>"><i iid="<%=id%>" class="glyphicon glyphicon-minus-sign" ></i></a>
            </span></td>
            </span></td>
          </tr>
      </script>

      <script type="text/template" id="InvoicePageTpl">
      <div id="userpdftemplate">
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
                   <button  class="btn btn-raised btn-black" id="promoCodeCartGenerate" style="float: right;">Promo Code Generation</button>
                   <button type="submit" id="generatepdf2" class="btn btn-raised btn-black">Generate pdf</button>
            </div>

      </script>

       <script type="text/template" id="performaPageCartTpl">
       <div id="userpdftemplate">
        <div class="widget">
         <div class="widget-heading">
              <center><h3 class="widget-title">Performa Page</h3></center>
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
                  </div>
            </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="widget">               
                <div class="widget-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Complete Commodity Description</th>
                          <th>Quantity</th>
                          <th>Rate</th>
                          <th>Discount</th>
                          <th>Tax</th>
                          <th>Price</th>
                          <th>Amount</th>
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
         <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-12">
                               <button type="submit" id="confirmOrderCart" class="btn btn-raised btn-black">Confirm Order</button> 
                               <button type="submit" id="usergeneratepdf" class="btn btn-raised btn-black">Generate pdf</button>
                               <button type="submit" id="backShop" class="btn btn-raised btn-black">Back</button>                       
                            </div>
                       </div>
                    </div>
                </div>
      </script>


    <script type="text/template" id="shotcartTmpl">
        <div class="shop-page1-area" style="margin-top:-113px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 col-md-push-3">
                        <div class="row" id="shopList">
                            <!-- Tab panes -->
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <ul class="pagination-center">
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 col-md-pull-9">
                        <div class="">
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Search</h3>
                                    <div class="sidebar-find-course">
                                        <div id="checkout-form">
                                            <div class="form-group course-name">
                                                <input id="prodSearch" placeholder="Course Name" class="form-control" type="text" />
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Search By Category</h3>
                                     <table class="product_checks" style="margin : -29px">
                                    
                                      <tr class="checks">
                                        <td id="selectCategoryoption">
                                          <ul class="selectCategory">
                                           
                                          </ul>
                                        </td>
                                     
                                      </tr>
                                    </table>
                                    
                                </div>
                            </div>
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Search By Subject</h3>
                                    <table class="product_checks" style="margin : -29px">
                                    
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
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Search By Topic</h3>
                                     <table class="product_checks" style="margin : -29px">
                                    
                                      <tr class="checks">
                                        <td id="selectedTopicoption">
                                          <ul class="selectTopic">
                                           
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
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane shop-page1-xs-width" id="gried-view">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                    <div class="product-box1">
                       
                    </div>
                </div>
           
            </div>
            <!-- Listed product show -->
            <div role="tabpanel" class="tab-pane active" id="list-view">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-box2">
                        <div class="media">
                            <div class="media-body">
                                <div class="product-box2-content">
                                  <h3>Product Name: <%=name%></h3>
                                    <span>Amount: Rs.<%=price%></span>
                                    <span>Discount: <%=discount%>%</span>
                                    <p>Description: <%=description%></p>
                                </div>
                                <ul class="product-box2-cart">
                                    <li><a class="addCartcust" id="<%=id%>">Add To Cart</a></li>
                                    <li><a class="buyNow" id="<%=id%>">Buy Now</a></li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </script>


     <script type="text/template" id="renderingQuestionTmpl">

      <div id="preloader"></div>
        <div id="flashmessage"></div>

<div id="dddd" style="margin-top:40px">
         <div id="ww">
         <div id="mySidebar" class="w3-sidebar w3-bar-block w3-border-right" style="display:none">
         <button onclick="review_close()" class="w3-bar-item w3-large">&times;</button>

         <span class="a1"></span>

         <div class="a2">
                  <span class="catName"></span>&nbsp;&gt; &nbsp;
                  <span class="subName"></span>&nbsp;&gt;&nbsp;
                  <span class="topName"></span>
         </div>

         <div class="a3">
                  <h3>Unanswered&nbsp;&nbsp;:&nbsp;&nbsp;<span class="Unanswered"></span></h3>
                  <h3>Reviewed&nbsp;&nbsp;:&nbsp;&nbsp;<span class="Reviewed"></span></h3>
         </div>
         

         </div>
         <button class="w3-button" onclick="review()">open</button>
         </div>

      <div class="ins">
                <div id="timeElapsed" class="ntb ntb-medium ntb-blue ntb-radius">0 Minute</div>
              </div>
      
         <div class="widget cll">
         <div class="bix-div-container bott" style="width: 100%; padding-top: -1px; padding-bottom: 30px;">

         <div class="row">
            <div class="col-md-4">
            <div id="bord" class="panel panel-default">
             <div class="panel-heading hhh">
                  <!-- <h5 class="panel-title">Time Elapsed:<span id=timeElapsed> 0 Minute</span></h5> -->
                  <h5 class="catName" class="panel-title">Category&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</h5>
                  <h5 class="subName" class="panel-title">Subject&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</h5>
                  <h5 class="topName" class="panel-title">Topic&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</h5>
           </div>
            <div class="panel-body" id="questionView">
            <h5>Total No of Questions&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<span id="totalques"></span></h5>
            <h5>Answered&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<span id="Answered"></span></h5>
            <h5>Unanswered&nbsp;&nbsp;:&nbsp;&nbsp;<span id="Unanswered"></span></h5>
          
            <h5>Question List</h5>
        


        <div class="wrasser" align="center">
        <div class="pagenation-grid">

            <div id="renderIndexList"></div>
        </div>
        </div>
        <div class="row">
        <div align="center">
          <button type="button" id="PreviousPagination" style="margin-left:0px; margin-top:20px;" id="" class="btn btn-black">&lt;&lt; Back</button>   
          <button type="button" id="NextPagination" style="margin-left:0px; margin-top:20px;" id="" class="btn btn-black">Next  &gt;&gt;</button>
        </div>
        </div>


            </div>

            </div>
          </div>

          <div class="col-md-8">
               <div id="renderQuestionList"></div>
         </div>
         <button type="button" id="review_question" style="margin:0px 20px 10px 0px; float:right;" class="btn btn-black">Review</button>
        </div>

          <div class="row">
            <div class="col-md-12">
            <div class="boo" align="center">
               <button type="button" style="margin-left:50px; margin-top:20px;" id="previous_question" class="bot btn btn-black">Previous</button>   
               <button type="button" style="margin-left:50px; margin-top:20px;" id="clear_question" class="bot btn btn-black">Clear</button>
                <button type="button" id="completed_question" style="margin-left:50px; margin-top:30px;" class="bot btn btn-black" data-toggle="modal" data-target="#myModal"><a class="button" href="#popup1"><font color="white">Completed</font></a></button>
               <button type="button" id="question_confirm" style="margin-left:50px; margin-top:20px;" class="bot btn btn-black">Confirm</button>
               <button type="button" id="next_question" style="margin-left:50px; margin-top:20px;" class="bot btn btn-black">Next </button>
            </div>
         </div>
         </div>



         <!-- <div class="row">

            <div class="col-md-12">
            -->

<div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">       
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Exam Status</h4>
      </div>
      <div class="modal-body" id ="com_ques">
         <h5>Do you want to complete the exam ?<div></div></h5>
       
      </div>
      <div class="modal-footer">
        <button type="button" id="completeExam" class="btn btn-black">Yes</button>
        <button type="button" id="Stay_page" class="btn btn-black">No</button>
        </div>
      </div>
     </div>
    </div>


    <div id="myModal1" class="modal fade" role="dialog">
                      <div class="modal-dialog">       
                        <div class="modal-content">
                           <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Alert</h4>
                           </div>
                        <div class="modal-body">
                        <h4><div id="showalert"></div></h4>
                 
                        </div>
                   <div class="modal-footer">
                  <button type="button" data-dismiss="modal" class="btn btn-black">okay</button>
                  </div>
                </div>
               </div>
              </div>
           

            <!-- <div id="popup1" class="overlay">
                <div class="popup">
                    <h2>Exam Status</h2>
                    <a class="close" href="#">&times;</a>
                    <div class="content">
                      <div class="panel-body" id ="com_ques">
                      <h5>Total No of Questions<div id="total_ques"></div></h5>
                      <h5>No of Answered Questions<div id="answered_qus"></div></h5>
                      <a><h5>No of Unanswered Questions<div id="Unanswered_qus"></div></h5></a>
                      <a><h5>No of Reviewed Questions<div id="Reviewed_qus"></div></h5></a>
                      <div align="right" class="col-md-12">
                      <button type="button" id="submitTest" class="btn btn-black">Submit</button>
                      </div>
                        </div>
                    </div>
                </div>
            </div>
            </div> -->
         </div>
        </div>
     </script>

    <script type="text/template" id="ResultTemplate">
 
    <h1 class="text-center">Score Card</h1><br>
    <h2 class="text-center" id="pass"><font color="green">Congratulations! </font>You have Successfully Completed</h2><br>
    <h2 class="text-center" id="fail"><font color="Red">Sorry! </font>We are unhappy to say that you got Negative Result. Exam Completed.</h2><br>

    <table id="" cellspacing="0" style="width:60%; margin-left: 300px;" align="center" class="table table-striped table-bordered">
    <tbody>
    <tr><td class="scr">Exam Name</td><td id="examName" class="text-center" style="width:20%"></td></tr>
    <tr><td class="scr">Total No of Questions</td><td class="text-center" id="total_ques"></td></tr>
    <tr><td class="scr">No of Answered Questions</td><td class="text-center" id="answered_qus"></td></tr>
    <tr><td class="scr">No of Unanswered Questions</td><td class="text-center" id="Unanswered_qus"></td></tr>
    <tr><td class="scr">No of Correct Answers</td><td id="correctAns" class="text-center">fbh</td></tr> 
    <tr><td class="scr">Acquired Score</td><td id="score" class="text-center"></td></tr>
    <tr><td class="scr">Date of Exam</td><td id="date" class="text-center"></td></tr>   
    </tbody>
    </table>
<br>

<div class="row">
    <div class="center" style="margin-left:38%">
    <button type="button" id="home" class="btn btn-gre" style="margin:8px; padding:8px;">Home</button>
    <button type="button" id="scoreId" class="btn btn-gre" style="margin:8px; padding:8px;">Download Scorecard</button>
    <button type="button" id="mail" class="btn btn-gre" style="margin:8px; padding:8px;" data-toggle="modal" data-target="#myModalCust">Email</button>
    <button type="button" id="" class="btn btn-gre" style="margin:8px; padding:8px;">Send SMS</button>
    <!-- <button type="button" id="" class="btn btn-gre" style="margin:8px; padding:8px;">View & Download Certificate</button></div></div> -->
    </script>


     <script type="text/template" id="renderAllquestionTemplate">

     
     <% if (question_type_id==1) {%>

          <div class="panel panel-default">
          
              <div class="panel-heading">
              

                <h5 class="panel-title">Q<%=description%></h5><br>
                
                <!-- include mathquill condition -->
                <% if (question_txt_format.indexOf(':LATEX_GROUP_SEPERATOR:') >= 0) { %>
                <h5><span id="mathquill"></span></h5>
                <% } else if (question_txt_format.indexOf(':KEKULE_MARKER:') >= 0) { %>
                <h5><span id="kekule"></span></h5>                
                <% } else { %> 
                <h5><%=question_txt_format%></h5>
                 <% } %>

               </div>
             <ul class="list-group">         
                <div id="optiondisplay1" class="scr"></div>
             </ul>
           </div>
          
             
             
          <% }  else if (question_type_id==2) {%>

     <table class="" width="100%" cellspacing="0" cellpadding="0" border="0">
           
          <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Q<%=description%>.</h4>
              </div>

             <!-- include mathquill condition -->
                <% if (question_txt_format.indexOf(':LATEX_GROUP_SEPERATOR:') >= 0) { %>
                <h5><span id="mathquill"></span></h5>
                <% } else if (question_txt_format.indexOf(':KEKULE_MARKER:') >= 0) { %>
                <h5><span id="kekule"></span></h5>                
                <% } else { %> 
                   <h5><%=question_txt_format%></h5>
                   <% } %>
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

             <!-- include mathquill condition -->
                <% if (question_txt_format.indexOf(':LATEX_GROUP_SEPERATOR:') >= 0) { %>
                
                <h5><span id="mathquill"></span></h5>
                <% } else if (question_txt_format.indexOf(':KEKULE_MARKER:') >= 0) { %>
                <h5><span id="kekule"></span></h5>                
                <% } else { %> 
                <h5><%=question_txt_format%></h5>
                <% } %>

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

             <!-- include mathquill condition -->
                <% if (question_txt_format.indexOf(':LATEX_GROUP_SEPERATOR:') >= 0) { %>
                <h5><span id="mathquill"></span></h5>
                <% } else if (question_txt_format.indexOf(':KEKULE_MARKER:') >= 0) { %>
                <h5><span id="kekule"></span></h5>                
                <% } else { %> 
                <h5><%=question_txt_format%></h5>
                <% } %>
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
                   <div id='optiondisplay3' class ='optiondis3'><h5><%=question_txt_format%></h5></div>
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
                <div id="optiondisplay2"></div>

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
                 <div id="finalDiv" style="height:fit-content; margin-top:20px; min-height:50px; box-shadow: 0px 1px 17px #aaaaaa; background: #f6f5f6" ondrop="drop(event)" ondragover="allowDrop(event)">
                <div id="optiondisplay2"></div>
                </div>
             </ul>
           </div>
           <% }  else if (question_type_id==10) {%>

     
          <div class="panel panel-default">
              <div class="panel-heading">
                <h5 class="panel-title">Q<%=description%>.</h5><br>
              
                   <h5><%=question_txt_format%></h5>
               </div>

             <ul class="list-group">         
                <div id="optiondisplay1">
                  <canvas id="c" width="480px" height="480px"></canvas>
                </div>
             </ul>
           </div>

          <% }
          %> 
        
     </script>
     
      <script type="text/template" id="custExamsListTpl">
          
    <div class="widget">
      <div class="widget-heading">
        <h3 class="widget-title"> Exams List </h3>
      </div>

      <div id="form-tabs" class="form-horizontal">
        <fieldset>
              <div class="col-md-12">
                <div class="widget">
                  <div class="widget-heading">
                    <h6 class="widget-title">My orders</h6>
                  </div>
                  <br>

                   <div class="widget-body">
                      <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                        <thead class="sublist">
                          <tr>
                            <th>Exams</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Exam Type</th>
                            <th>Valid TO</th>
                          </tr>
                        </thead>
                        <tbody id="examsCustList">                        
                        </tbody>
                        <div id="findStatus"></div>
                        </table>   
                    </div>
                </div>
               </div>

               <div class="col-md-12">
                <div class="widget">
                  <div class="widget-heading">
                    <h6 class="widget-title">Exams yet to taken</h6>
                  </div>
                  <br>

                   <div class="widget-body">
                      <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                        <thead class="sublist">
                          <tr>
                            <th>Exams</th>
                            <th>Status</th>
                            <th>Promo Code</th>
                            <th>Date</th>
                            <th>Start time</th>
                            <th>End time</th>
                            <th>Schedule</th>
                            <th>Start</th>                                                                         
                          </tr>
                        </thead>
                        <tbody id="examsCustList2">                        
                        </tbody>
                        <div id="findStatus"></div>
                        </table>   
                    </div>
                </div>
               </div>

              <div class="col-md-12">
                <div class="widget">
                  <div class="widget-heading">
                    <h6 class="widget-title">Exams taken</h6>
                  </div>
                  <br>

                   <div class="widget-body">
                      <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                        <thead class="sublist">
                          <tr>
                            <th>Exams</th>
                            <th>Promo Code</th>
                            <th>Date</th>
                            <th>Start time</th>
                            <th>End time</th>                                 
                          </tr>
                        </thead>
                        <tbody id="examsCustList3">                        
                        </tbody>
                        <div id="findStatus"></div>
                        </table>   
                    </div>
                </div>
               </div>

 
        </fieldset>
      </div>
    </div>

  </script>

  <script type="text/template" id="custExamTemplate">
        <tr>
            <td><%=name%></td> 
            <td><%=description%></td> 
            <td><%=unit_qty%></td>
            <td><%=exname%></td>
            <td><%=valid_to%></td>

        </tr>   
    
    </script>

     <script type="text/template" id="custExamTemplate1">
    <% if (is_schedule==false) {%>
        <tr>
            <td><%=name%></td>
            <td><%=status%></td> 
            <td><%=promo_code%></td> 
            <td>_______</td> 
            <td>_______</td> 

            <td>_______</td>  
             
            <td class="scheduleCustPage" id="<%=order_detail_id%>"><a>schedule</a></td>  
             <td></td>
          
         <td><a class="start_exam" prodId="<%=product_catalog_id%>" odId="<%=order_detail_id%>" >Start </a></td> 
        </tr>
          

         <% }  else if (is_schedule==true) {%> 
          <tr>
             <td><%=name%></td> 
             <td><%=status%></td> 
            <td><%=promo_code%></td> 
            <td> <%=exam_planned_date%>  </td>  
            <td> <%=start_time%> </td>
            <td>  <%=end_time%> </td>

            <td class="reScheduleCustPage" id="<%=exam_schedule_id%>" prodId="<%=product_catalog_id%>" odId="<%=order_detail_id%>"  promoId="<%=promo_id%>"><a>Re-Schedule</a></td>  
            <td><a class="start_exam" prodId="<%=product_catalog_id%>" odId="<%=order_detail_id%>">Start </a></td> 

            </tr>
           <% }   else if (is_schedule==null) {%> 
            <tr>
            <td><%=name%></td> 
            <td><%=status%></td> 
            <td><%=promo_code%></td> 
            
            <td>_______</td> 
            <td>_______</td> 
            <td>_______</td>  
            <td class="scheduleCustPage" id="<%=id%>" prodId="<%=product_catalog_id%>" odId="<%=order_detail_id%>" promoId="<%=promo_id%>"><a>schedule</a></td>  
           
         <td><a class="start_exam" prodId="<%=product_catalog_id%>" odId="<%=order_detail_id%>">Start </a></td> 
            </tr>

           

         <% }    %>
    
    </script>

    <script type="text/template" id="custExamTemplate2">
        <tr>
            <td><%=name%></td> 
            <td><%=no_of_attempts%></td>
            <td><%=promo_code%></td> 
            <td> <%=exam_planned_date%>  </td>  
            <td> <%=start_time%> </td>
            <td>  <%=end_time%> </td>

        </tr>   
    
    </script>

     <script type="text/template" id="rescheduleFormPage2">

        <div class="widget">
         <div class="widget-heading">
            <h3 class="widget-title">Re Schedule</h3>
          </div>
          <div class="widget-body">
            <div id="form-tabs" class="form-horizontal">
             <fieldset>
                   <div class="row">
                    <div class="col-md-6">

                      <div class="form-group">
                        <label for="" class="col-sm-3 col-md-4 control-label">Exam Date</label>
                         <div class="col-sm-9 col-md-8">
                          <input id="exam_date" data-date-format='YYYY-MM-DD' type="text">
                          <div id="news_date_error" class="" style="font-size: 12px; color: #FF0000; "></div>
                        </div>
                      </div>
                    </div>
                          </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="" class="col-sm-3 col-md-4 control-label">Start Time</label>
                        <div class="col-sm-9 col-md-8">
                          <select id="timepicker1" style="width: 60px;">
                          <option value="00">00</option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          
                          </select>
                         <select placeholder="mm"  id="timepicker2" style="width: 60px;">
                         <option value="00">00</option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                          <option value="32">32</option>
                          <option value="33">33</option>
                          <option value="34">34</option>
                          <option value="35">35</option>
                          <option value="36">36</option>
                          <option value="37">37</option>
                          <option value="38">38</option>
                          <option value="39">39</option>
                          <option value="40">40</option>
                          <option value="41">41</option>
                          <option value="42">42</option>
                          <option value="43">43</option>
                          <option value="44">44</option>
                          <option value="45">45</option>
                          <option value="46">46</option>
                          <option value="47">47</option>
                          <option value="48">48</option>
                          <option value="49">49</option>
                          <option value="50">50</option>
                          <option value="51">51</option>
                          <option value="52">52</option>
                          <option value="53">53</option>
                          <option value="54">54</option>
                          <option value="55">55</option>
                          <option value="56">56</option>
                          <option value="57">57</option>
                          <option value="58">58</option>
                          <option value="59">59</option>

                          </select>

                           <select placeholder="ss"  id="timepicker3" style="width: 60px;" >
                           <option value="00">00</option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                          <option value="32">32</option>
                          <option value="33">33</option>
                          <option value="34">34</option>
                          <option value="35">35</option>
                          <option value="36">36</option>
                          <option value="37">37</option>
                          <option value="38">38</option>
                          <option value="39">39</option>
                          <option value="40">40</option>
                          <option value="41">41</option>
                          <option value="42">42</option>
                          <option value="43">43</option>
                          <option value="44">44</option>
                          <option value="45">45</option>
                          <option value="46">46</option>
                          <option value="47">47</option>
                          <option value="48">48</option>
                          <option value="49">49</option>
                          <option value="50">50</option>
                          <option value="51">51</option>
                          <option value="52">52</option>
                          <option value="53">53</option>
                          <option value="54">54</option>
                          <option value="55">55</option>
                          <option value="56">56</option>
                          <option value="57">57</option>
                          <option value="58">58</option>
                          <option value="59">59</option>

                          </select>
                          <div id="start_time_error" style="color:red"></div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">

                      <div class="form-group">
                        <label for="" class="col-sm-3 col-md-4 control-label">End Time</label>
                        <div class="col-sm-9 col-md-8">
                        <div id="endtimepicker1" class="input-group date">
                    <select class="timepicker" id="end_time" style="width: 60px;" disabled="true">
                        <option value="00">00</option>

                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                         </select>

                        <select placeholder="mm" class="timepicker" id="end_time2" style="width: 60px;" disabled="true">
                        <option value="00">00</option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                          <option value="32">32</option>
                          <option value="33">33</option>
                          <option value="34">34</option>
                          <option value="35">35</option>
                          <option value="36">36</option>
                          <option value="37">37</option>
                          <option value="38">38</option>
                          <option value="39">39</option>
                          <option value="40">40</option>
                          <option value="41">41</option>
                          <option value="42">42</option>
                          <option value="43">43</option>
                          <option value="44">44</option>
                          <option value="45">45</option>
                          <option value="46">46</option>
                          <option value="47">47</option>
                          <option value="48">48</option>
                          <option value="49">49</option>
                          <option value="50">50</option>
                          <option value="51">51</option>
                          <option value="52">52</option>
                          <option value="53">53</option>
                          <option value="54">54</option>
                          <option value="55">55</option>
                          <option value="56">56</option>
                          <option value="57">57</option>
                          <option value="58">58</option>
                          <option value="59">59</option>
                     </select>
                    <select placeholder="ss" class="timepicker" id="end_time3" style="width: 60px;" disabled="true">
                        <option value="00">00</option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                          <option value="32">32</option>
                          <option value="33">33</option>
                          <option value="34">34</option>
                          <option value="35">35</option>
                          <option value="36">36</option>
                          <option value="37">37</option>
                          <option value="38">38</option>
                          <option value="39">39</option>
                          <option value="40">40</option>
                          <option value="41">41</option>
                          <option value="42">42</option>
                          <option value="43">43</option>
                          <option value="44">44</option>
                          <option value="45">45</option>
                          <option value="46">46</option>
                          <option value="47">47</option>
                          <option value="48">48</option>
                          <option value="49">49</option>
                          <option value="50">50</option>
                          <option value="51">51</option>
                          <option value="52">52</option>
                          <option value="53">53</option>
                          <option value="54">54</option>
                          <option value="55">55</option>
                          <option value="56">56</option>
                          <option value="57">57</option>
                          <option value="58">58</option>
                          <option value="59">59</option>

                    </select>
                             <div id="end_time_error" class="" style="font-size: 12px; color: #FF0000; "></div>
                        </div>
                       </div>
                      </div>
                    </div>
                  </div>

                   </div>
                   </fieldset>
                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-12">
                              <button type="submit" id="saveschedule"  class="btn btn-raised btn-black">Save</button> 
                               <button type="submit" id="cancelCq"  class="btn btn-raised btn-black">Cancel</button>
                              
                            </div>
                      </div>
                    </div>
                  </div>
                  
               
            </div>
          </div>
      </script>


      <script type="text/template" id="examScoreCard">
      <h2>Exam Score Card</h2>


     <table id="com_ques" cellspacing="0" style="width:60%; margin-left: 300px;" align="center" class="table table-striped table-bordered">
    <tbody>
    <tr><td class="scc">Exam Name</td><td id="examName" class="text-center" style="width:20%"><%=exam_name%></td></tr>
    <tr><td class="scc">Total No of Questions</td><td class="text-center" id="totalQues"><%=no_of_questions%></td></tr>
    <tr><td class="scc">No of Questions Right</td><td class="text-center" id="rightQus"><%=no_of_questions_right%></td></tr>
    <tr><td class="scc">No of Questions Wrong</td><td class="text-center" id="wrongQus"><%=no_of_questions_wrong%></td></tr>
    <tr><td class="scc">No of Questions Blank</td><td class="text-center" id="blanQus"><%=no_of_questions_blank%></td></tr>
    <tr><td class="scc">Total marks</td><td class="text-center" id="totalMarks"><%=total_marks%></td></tr> 
    <tr><td class="scc">Marks Scored</td><td class="text-center" id="scoredMarks"><%=marks_scored%></td></tr>
    <tr><td class="scc">Negative mark</td><td class="text-center" id="negativeMarks"><%=negative_marks%></td></tr> 
    <tr><td class="scc">Result</td><td class="text-center" id=""><%=result%></td></tr>  
    </tbody>
    </table>

    <div class="row">
    <div class="center" style="margin-left:38%">
    <button type="button" id="backExam" class="btn btn-gre" style="margin:8px; padding:8px;">Home</button>
    <button type="button" id="ScoreIdOne" class="btn btn-gre" style="margin:8px; padding:8px;">Download Scorecard</button>
    <button type="button" id="mailOne" class="btn btn-gre" style="margin:8px; padding:8px;" data-toggle="modal" data-target="#myModalCust">Email</button>
    <button type="button" id="" class="btn btn-gre" style="margin:8px; padding:8px;">Send SMS</button></div></div>
    </script>

      <script type="text/template" id="fillintheblank">
      
        <option value="<%=question_option_txt%>"><%=question_option_txt%></option>
     
      
    </script>

     <script type="text/template" id="messageTpl">
        <h2 class="text-center" id=""><font color="red">Sorry! </font>Question bank has insufficient Questions.Please Contact Administrator.</h2>
     </script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   
     <!-- jQuery Steps-->
    <script type="text/javascript" src="plugins/jquery.steps/build/jquery.steps.min.js"></script>
    <!-- Backbone & underscore-->
    <script type="text/javascript" src="js/lib/underscore-min.js"></script>
    <script type="text/javascript" src="js/lib/backbone.js"></script> 

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script> 
    <script type="text/javascript" src="js/lib/binary.js"></script>
    <script type="text/javascript" src="js/lib/websocket_support.js"></script>
    <script type="text/javascript" src="js/lib/socketworker.js"></script>

     <!-- Plugins js -->
    <script src="js/plugins.js" type="text/javascript"></script>
    <!-- WOW JS -->
    <script src="js/wow.min.js"></script>
    <!-- Owl Cauosel JS -->
    <script src="js/vendor/OwlCarousel/owl.carousel.min.js" type="text/javascript"></script>
    <!-- Meanmenu Js -->
    <script src="js/jquery.meanmenu.min.js" type="text/javascript"></script>
    <!-- Srollup js -->
    <script src="js/jquery.scrollUp.min.js" type="text/javascript"></script>
    <!-- Countdown js -->
    <script src="js/jquery.countdown.min.js" type="text/javascript"></script>
    <!-- Custom Js -->
    <script src="js/main.js" type="text/javascript"></script>

      <!-- Bootstrap JavaScript-->
    <script type="text/javascript" src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jQuery DatePicker start-->
    <script type="text/javascript" src="plugins/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Bootstrap DatePicker-->
    <script type="text/javascript" src="plugins/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
   

    <!--models-->
    <script type="text/javascript" src="js/models/UserRenderQuestionModel.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/models/OrderDetailModel.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/models/ProductCatalogList.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/models/CategoryModel.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/models/SubjectModel.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/models/TopicModel.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/models/ShoppingCartDetailModel.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/models/PerformaModel.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/models/CartDetailModel.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/models/ProductCatalogModel.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/models/CustExamDetailModel.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/models/CustExamEmpModel.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/models/SendingMailModel.js?version=1.0.0"></script>
     
    <!--collection-->

    <script type="text/javascript" src="js/collections/UserRenderQuestionCollection.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/collections/ProductCatalogUserCollection.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/collections/OrderDetailCollection.js?version=1.0.0"></script>    
    <script type="text/javascript" src="js/collections/CategoryCollection.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/collections/SubjectCollection.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/collections/TopicCollection.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/collections/PerformaCollection.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/collections/CartDetailCollection.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/collections/CategoryCartCollection.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/collections/CustExamEmpCollection.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/collections/SubjectCartCollection.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/collections/TopicCartCollection.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/collections/CustExamDetailCollection.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/collections/CustExamDetailCollection1.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/collections/CustExamDetailCollection2.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/collections/ProductCatalogCollectionNew.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/collections/ProductCatalogCollectionuser.js?version=1.0.0"></script>


    <!--views-->
    <script type="text/javascript" src="js/views/UserRenderingQuestionTableView.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/views/UserRenderQuestionRowView.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/views/ScheduleFormPage.js?version=1.0.0"></script>

    <script type="text/javascript" src="js/views/RenderingQuestionPageView.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/views/RenderingQuestionTableView.js?version=1.0.0"></script>


    <script type="text/javascript" src="js/views/OrderDetailRowView.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/views/OrderDetailComRowView.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/views/OrderDetailPageView.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/views/ProductCatalogPageView.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/views/PerformaPageView.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/views/CartDetailsPageView.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/views/PerformaPageCartView.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/views/CustExamCatalogPageView.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/views/CustExamCatalogRowView.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/views/ScheduleCustomerFormPage.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/views/ComplitedExamView.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/views/UserConfirmationPageView.js?version=1.0.0"></script>
    
    

    <script type="text/javascript" src="js/router/userRouter.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/router/adminRouter.js?version=1.0.0"></script>

    <script type="text/javascript" src="js/userapp.js?version=1.0.0"></script>
    <script type="text/javascript" src="js/eapp.js?version=1.0.0"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

    <!-- Mathquill -->
    <script type="text/javascript" src="js/mathquill/mathquill.js"></script>    
    
    <!-- Kekule for Chemistry -->
    <script type="text/javascript" src="plugins/kekule/kekule-expanded.js"></script>
    <script type="text/javascript" src="plugins/kekule/kekule-helper.js"></script>
    
    <script>
    function review() {
       document.getElementById("mySidebar").style.display = "block";
    }
    function review_close() {
       document.getElementById("mySidebar").style.display = "none";
    }
    </script>
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