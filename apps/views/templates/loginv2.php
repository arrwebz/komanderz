<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" type="image/png" href="<?php echo $this->config->item('images_uri')?>favicon.png" />
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
	<style>
		body {
    font-family: "Lato", sans-serif;
}



.main-head{
    height: 150px;
    background: #FFF;
   
}

.sidenav {
    height: 100%;
    background-color: #000;
    overflow-x: hidden;
    padding-top: 20px;
}


.main {
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
}

@media screen and (max-width: 450px) {
    .login-form{
        margin-top: 10%;
		margin-bottom: 100%;
    }

    .register-form{
        margin-top: 10%;
    }
}

@media screen and (min-width: 768px){
    .main{
        margin-left: 40%; 
    }

    .sidenav{
        width: 40%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
    }

    .login-form{
        margin-top: 30%;
    }

    .register-form{
        margin-top: 20%;
    }
}


.login-main-text{
    margin-top: 20%;
    padding: 60px;
    color: #fff;
}

.login-main-text h2{
    font-weight: 300;
}

.btn-black{
    background-color: #000 !important;
    color: #fff;
}
	</style>
	<script src="https://www.google.com/recaptcha/api.js?render=6LdbldIZAAAAAIJovP0kZoFF4J1k4pqZKWTlhzkZ"></script>
</head>
<body style="background-image: url('<?php echo $this->config->item('images_uri')?>bg-new.JPG');background-size: cover;background-repeat: no-repeat;">

<div class="sidenav">
         <div class="login-main-text">
            <h2>Application<br> Login Page</h2>
            <p>Login or register from here to access.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
			<div class="login-logo">
    <a href="#" style="color: #ffffff;"><b>KOM</b>ANDERS</a>
  </div>
               <form>
                  <div class="form-group">
                     <label></label>
                     <input type="text" class="form-control" placeholder="nama akun">
                  </div>
                  <div class="form-group">
                     <label></label>
                     <input type="password" class="form-control" placeholder="kata sandi">
                  </div>
                  <button type="submit" class="btn btn-black">Login</button>
                  <button type="submit" class="btn btn-secondary">Register</button>
               </form>
            </div>
         </div>
      </div>
<!-- /.login-box -->
<?php $this->carabiner->display('js_content');?>
   <script>
        grecaptcha.ready(function() { 
          grecaptcha.execute('6LdbldIZAAAAAIJovP0kZoFF4J1k4pqZKWTlhzkZ', {action: 'login/validate'}).then(function(token) {
              // Add your logic to submit to your backend server here.
			  //console.log(token);
			  document.getElementById('token').value = token;
          }); 
        });
  </script> 
</body>
</html>