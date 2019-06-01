<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="<?php echo URLROOT?>public/css/login.css">
</head>
<body id="LoginForm">
<div id="loginF">
    <div class="container">
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>Camagru Login</h2>
                    <p>Please enter your (email / login) and password</p>
                </div>
                <form id="Login">
                    <div class="form-group">
                        <input type="email" class="form-control" id="inputEmail" placeholder="(Email Address / Login)">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                    <div class="forgot">
                        <a href="reset.html">Forgot password?</a>
                    </div>
                    <button type="submit" class="btn btn-light">Login</button>
                    <br>
                    <br>
                    <a href="<?php echo URLROOT; ?>register/CreateAccount" class="btn btn-warning">Register</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>