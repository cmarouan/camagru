<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="<?php echo URLROOT?>public/css/register.css">
</head>
<body id="LoginForm">
<div id="loginF">
    <div class="container">
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>Camagru Register</h2>
                    <p>Please enter your information</p>
                </div>
                <form id="Login" action="<?php echo URLROOT; ?>register/CreateAccount" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="inputfirst" id="inputfirst" placeholder="First name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="inputlast" id="inputlast" placeholder="Lat name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="inputPass" id="inputPass" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="inputConfpass" id="inputConfpass" placeholder="Confirme your Password" required>
                    </div>
                    <br>
                    <button class="btn btn-warning" type="submit"> Create </button>
                    <br>
                    <br>
                    <a href="<?php echo URLROOT; ?>login" class="btn btn-light">Back to login</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>