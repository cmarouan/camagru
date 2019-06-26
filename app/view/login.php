<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="<?php echo URLROOT?>public/css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body id="LoginForm" >
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand text-dark" style="font-family: cursive;" href="<?php echo URLROOT; ?>">Login<small></small></a>
    <a class="navbar-brand text-dark float-right" href="<?php echo URLROOT; ?>friends"><span>Galerie</span></a>
    <div class="collapse navbar-collapse" id="navbarNav">
    </div>
</nav>
<div id="loginF">
    <div class="container">
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>Camagru Login</h2>
                    <p>Please enter your email and password</p>
                </div>
                <form id="Login" method="post" action="<?php echo URLROOT; ?>login">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" value="<?php echo $data['username'];?>" id="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                    <div style="color : red">
                        <?php echo $data['username_err']; ?>
                    </div>
                    <div style="color : red">
                        <?php echo $data['pass_err']; ?>
                    </div>
                    <a href="<?php echo URLROOT; ?>forget"> Forget password ?</a>
                    <br>
                    <br>
                    <button  type="submit" class="btn btn-primary">Login</button>
                    <br>
                    <a style="margin-top: 2%;" href="<?php echo URLROOT; ?>register" class="btn btn-danger">Register</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require APPROOT . '/view/inc/footer.php';
?>