<!DOCTYPE html>
<html lang="en" style="height: 100%">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ePrayoga</title>
  <!--   <link rel='shortcut icon' type='image/x-icon' href='/images/logo/favicon.ico' /> -->
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap/dist/css/bootstrap.min.css">
    <!-- Ionicons-->
    <link rel="stylesheet" type="text/css" href="plugins/Ionicons/css/ionicons.min.css">
    <!-- Itim-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Itim">
    <!-- Core CSS-->
    <link rel="stylesheet" type="text/css" href="styles/first-layout.css">
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
  <body class="body-bg-full" ">
    <div class="container page-container">
      <div class="page-content">
        <div class="logo"> 
          <img src="images/logo.png" style="width: 200px; height:50px;"></div>
        
        <div id="error" style="font-size: medium; color: #cccccc";> </div>
            @if (session('message'))
              <div id="clr_msg" class="alert alert-success"> {{ session('message') }}  </div>        
            @endif
        <form class="form-horizontal" method="POST" action="/eprayoga/login">
          <div class="form-group">
            <div class="col-xs-12">
              <input type="text" name="email_id"  id="userName" placeholder="Email" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <input type="password" name="password" id="userPwd" placeholder="Password" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <div class="checkbox-inline checkbox-custom pull-left">
                <input id="exampleCheckboxRemember" type="checkbox" value="remember" ">
                <label for="exampleCheckboxRemember">Remember me</label>
              </div>
              <div class="pull-right"><a href="#" class="inline-block form-control-static">Forgot Password?</a></div>
            </div>
          </div>
          <div class="col-md-6">
          <div>
          <!-- <button id="sign_up" class="btn btn-success btn-rounded btn-block" > -->
          <a href="/sign_up">Sign Up</a>
         <!--  </button> -->
          </div>
          
          </div>
          <div class="col-md-6">
          
          <button type="submit" class="btn btn-primary btn-rounded" >
          Sign in 
          </button>
          
          </div>
        </form>

        <!--  <li class="panel"><a href="/main_index"><i class="ion-ios-calendar-outline bg-info"></i><span class="sidebar-title">Login</span></a></li>
                   <button id="sign_up" class="btn btn-success btn-rounded btn-block" >
          <a href="/main_index">Sign Up</a>
          </button></div> -->
    </div> 
    <!-- jQuery-->
    <script type="text/javascript" src="plugins/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript"> $('#userName').on('click',function(){$('#clr_msg').remove()});</script>
    <!-- Bootstrap JavaScript-->
    <script type="text/javascript" src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html> 
