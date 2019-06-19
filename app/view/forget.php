<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="<?php echo URLROOT?>public/css/login.css">
</head>
<body id="LoginForm" >
<div id="loginF">
    <div class="container">
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>Enter your email</h2>
                    <br>
                </div>
                <form id="Login" method="post" action="<?php echo URLROOT; ?>login">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <br>
                    <p style="color: limegreen"> You will get an email now !</p>
                    <button  type="submit" class="btn btn-primary">Continue</button>
                    <br>
                    <a style="margin-top:2%;" href="<?php echo URLROOT; ?>login" class="btn btn-danger">Back to login</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require APPROOT . '/view/inc/footer.php';
?>