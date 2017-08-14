
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Masuk</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    {!! Html::style('assets/backend/css/bootstrap.min.css') !!}
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    {!! Html::style('assets/backend/css/AdminLTE.min.css') !!}
    <!-- iCheck -->
    {!! Html::style('assets/backend/css/skins/_all-skins.min.css') !!}

    {!! Html::style('assets/plugins/validator/bootstrap-validator.css') !!}
  </head>
  <style type="text/css" media="screen">
  body {
    background: #5f2c82 !important;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #3a547c, #5f2c82) !important;  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #162d4f, #3a547c) !important; /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  }  
  </style>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#" >Form Login <b>{{$profile[0]->header}}</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
       @if(Session::has('pesan'))
        <div class="callout callout-primary" id="information">
          <p class="login-box-msg">{{ Session::get('pesan') }}</p>
        </div>
        @endif

        <form method="post" id="form_login" action="{{url('getlogin')}}">
        
        {{ csrf_field() }}
          <div class="form-group has-feedback">
           <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-user"></i>
            </div>
            <input type="text" class="form-control" placeholder="Email" name="username_email" id="username_email" />
            </div>
            <!-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> -->
          </div>
          <div class="form-group has-feedback">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-key"></i>
            </div>
            <input type="password" class="form-control" placeholder="Password" name="inputPassword" />
          </div>
            <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
          </div>
          <div class="row">
            <div class="col-xs-8">    
                                     
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

    

        <!-- <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div> --><!-- /.social-auth-links -->

       <!--  <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a> -->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

<!-- <div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="callout callout-warning">
        
        <strong>Title!</strong> Alert body ...
      </div>
    </div>
  </div>
</div> -->

    <!-- jQuery 2.1.3 -->
    {!! Html::script('assets/backend/js/jQuery-2.1.3.min.js') !!}
    {!! Html::script('assets/backend/js/bootstrap.min.js') !!}
    {!! Html::script('assets/backend/js/app.min.js') !!}
    <!-- iCheck -->
    {!! Html::script('assets/plugins/validator/bootstrap-validator.js') !!}
    <script>
      // $(function () {
      //   $('input').iCheck({
      //     checkboxClass: 'icheckbox_square-blue',
      //     radioClass: 'iradio_square-blue',
      //     increaseArea: '20%' // optional
      //   });
      // });

      jQuery(document).ready(function($) {
        $('#form_login').bootstrapValidator({
          button: {
                selector: '[type="submit"]',
            },
          live: 'enabled',
          message: 'This value is not valid',
              feedbackIcons: {
                  valid: 'glyphicon glyphicon-ok',
                  invalid: 'glyphicon glyphicon-remove',
                  validating: 'glyphicon glyphicon-refresh'
              },
              fields: {
                username_email: {
                    validators: {
                        notEmpty: {
                            message: 'Username / Email tidak boleh kosong'
                        },
                        stringLength: {
                            min: 4,
                            max: 300,
                            message: 'minimal karakter 4 max 150'
                        },
                        
                    }
                },
                inputPassword : {
                    message: 'The password tidak valid',
                    validators: {
                        notEmpty: {
                            message: 'Password tidak boleh kosong'
                        },
                        different: {
                            field: 'username_email',
                            message: 'The password tidak boleh sama dengan username/email'
                        },
                        stringLength: {
                            min: 4,
                            max: 150,
                            message: 'minimal karakter 4 max 150'
                        }
                    }
                }
              }
        });
      });

    </script>
  </body>
</html>