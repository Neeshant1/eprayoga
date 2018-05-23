<!DOCTYPE html>
<html lang="en" style="height: 100%">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="csrf-token" content="{{ csrf_token() }}" />
         <title>ePrayoga</title>

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="/plugins/bootstrap/dist/css/bootstrap.min.css">
    <!-- Ionicons-->
    <link rel="stylesheet" type="text/css" href="/plugins/Ionicons/css/ionicons.min.css">
    <!-- Itim-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Itim">
    <!-- Core CSS-->
    <link rel="stylesheet" type="text/css" href="/styles/first-layout.css">
     <!-- Sweet Alert-->
    <link rel="stylesheet" type="text/css" href="/plugins/bootstrap-sweetalert/lib/sweet-alert.css">
  </head>

    <body class="body-bg-full">
        <div class="alert-box success"></div>
        <div class="alert-box failure"></div>
        <div class="alert-box warning"></div>
         <div class="container page-container">
      <div class="page-content">
      
        <h3 class="mt-0">Forgot Password</h3>
        <p class="text-muted">Enter the email address associated with your account to reset your password</p>
    <form class="form-horizontal" method="POST" action="/eprayoga/Forgot_password">
     <input type="hidden" name="_token" value="{{ csrf_token() }}" >
          <div class="form-group">
            <input type="text" id="reset_password" name="reset_password" placeholder="Enter Email" class="form-control">
          </div>
          <button type="submit" style="width: 130px" class="btn btn-success btn-rounded">Reset</button>
        </form>
        
      </div>
    </div>



    <script type="text/javascript" src="/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap JavaScript-->
    <script type="text/javascript" src="/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Sweet Alert-->
    <script type="text/javascript" src="/plugins/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
   <script type="text/javascript" src="/js/pwd.js"></script> 


    </body>

    </html>