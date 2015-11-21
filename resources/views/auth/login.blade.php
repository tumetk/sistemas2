<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>
           Car Wash Xteam
        </title>

        <!-- Bootstrap Core CSS -->
        <link href={{asset("assets/startbootstrap-sb-admin-2-1.0.7/bower_components/bootstrap/dist/css/bootstrap.min.css")}} rel="stylesheet">

        <!-- Custom CSS -->
        <link href={{asset("assets/startbootstrap-sb-admin-2-1.0.7/dist/css/sb-admin-2.css")}} rel="stylesheet">

        <!-- Custom Fonts -->
        <link href={{asset("assets/startbootstrap-sb-admin-2-1.0.7/bower_components/font-awesome/css/font-awesome.min.css")}} rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    @if (session('status'))
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                    @endif
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Login</h3>
                        </div>
                        <div class="panel-body">
                            <form  method = "POST" role="form" action="login">
                                {!! csrf_field() !!}
                                <fieldset>
                                    <div class="form-group">
                                        Email
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        Contraseña
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="">Recordarme
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                     <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="wrapper">
           
        </div>

         <!-- jQuery -->
        <script src = {{asset("assets/startbootstrap-sb-admin-2-1.0.7/bower_components/jquery/dist/jquery.min.js")}}></script>

        <!-- Bootstrap Core JavaScript -->
        <script src = {{asset("assets/startbootstrap-sb-admin-2-1.0.7/bower_components/bootstrap/dist/js/bootstrap.min.js")}} ></script>

        <!-- Custom Theme JavaScript -->
        <script src = {{asset("assets/startbootstrap-sb-admin-2-1.0.7/dist/js/sb-admin-2.js")}} ></script>
    </body>
</html>