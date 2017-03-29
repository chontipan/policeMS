<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <title>ROYAL THAI POLICE IMMIGRATION Login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/bootstrap-3.3.2/css/bootstrap.min.css">
    <link href="/bootstrap-3.3.2/css/hicss.css" rel="stylesheet" media="screen">

    <!-- Optional theme -->
    <link rel="stylesheet" href="/bootstrap-3.3.2/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/bootstrap-3.3.2/css/dashboard.css">

    <!-- Morris Charts CSS -->
    <link href="/bootstrap-3.3.2/css/plugins/morris.css" rel="stylesheet">



</head>
<body style="background-color: #0077b3">

<div class="col-md-4 col-md-offset-4">
    <div class="login-panel panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">เข้าสู่ระบบ ตรวจคนเข้าเมืองจังหวัดเชียงราย</h3>
        </div>
        @if(Session::has('message'))
            <div class="panel-body bg-danger color-red">
                <% Session::get('message') %>
            </div>
        @endif
        <div class="panel-body">
            <form role="form" method="POST" action="<% url('api/auth/login') %>">
                <input type="hidden" name="_token" value="<% csrf_token() %>">
                <fieldset>
                    <div class="form-group">
                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus value="<% old('username') %>"/>
                        {!!$errors->first('username', '<span  class="control-label color-red" for="username">*:message</span>')!!}
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        {!!$errors->first('password', '<span
                                class="control-label error" for="password">*:message</span>')!!}
                    </div>

                    <!-- Change this to a button or input when using this as a form -->
                    <button class="btn btn-lg btn-success btn-block">เข้าสู่ระบบ</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>
</div>

</body>
</html>

