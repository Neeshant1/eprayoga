<!DOCTYPE html>
<html lang="en" style="height: 100%">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <div class="container">
          <div class="row">
           <div class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                   

                    <form id="target_form" class="form-horizontal" method="POST" action="/password/reset">
                       
                     {{ csrf_field() }}
                    <input type="hidden" name="session_id" value="{{ $session_id }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                         <input id="email" type="email" class="form-control" readonly="readonly" name="email" value="{{ $user_login_id }}" required autofocus>


                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                              <input id="password" type="password" class="form-control" name="password" >
                           <div id="psw_error"  style="font-size: 12px; color: #FF0000; "></div>
                         </div>
                                
                     </div>
                        

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                        <div id="psw_confirm_error"  style="font-size: 12px; color: #FF0000; "></div>
                             
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" id="pwdsubmit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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