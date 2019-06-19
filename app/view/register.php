<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
                <form id="Login"  method="post" action="<?php echo URLROOT; ?>register">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $data['username']; ?>" required>
                        <span style = "color : red"><?php echo $data['username_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email" value="<?php echo $data['email']; ?>" required>
                        <span style = "color : red"><?php echo $data['email_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="inputPass" id="inputPass" placeholder="Password" value="<?php echo $data['password']; ?>" required>
                        <span style = "color : red"><?php echo $data['password_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="inputConfpass" id="inputConfpass" placeholder="Confirme your Password" value="<?php echo $data['confirm_password']; ?>" required>
                        <span style = "color : red"><?php echo $data['confirm_password_err']; ?></span>
                    </div>
                    <br>
                    <button class="btn btn-primary" type="submit"> Create </button>
                    <br>
                    <br>
                    <a href="<?php echo URLROOT; ?>login" class="btn btn-danger">Back to login</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require APPROOT . '/view/inc/footer.php';
?>