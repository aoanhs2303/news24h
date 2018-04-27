<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Simple Login Form</title>
<link rel="icon" href="<?php echo base_url() ?>vendor/img/favicon.png">
<link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/bootstrap.min.css">
<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="login-form">
    <form action="<?php echo base_url() ?>login/authentication" method="post">
        <h2 class="text-center">NEWS24H</h2>       
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Tài khoản" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="#" class="pull-right">Forgot Password?</a>
        </div>       
    </form>
    <p class="text-center"><a href="<?php echo base_url() ?>login/register">Create an Account</a></p>
</div>
</body>
</html>                                		                            