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
                    <h2>Enter your new password</h2>
                    <br>
                </div>
                <form id="Login" method="post" action="<?php $url = rtrim($_GET['url'], '/'); $url = filter_var($url, FILTER_SANITIZE_URL); $url = explode('/', $url); echo URLROOT . 'reinitialise/InitPass/' . $url[2]; ?>">
                    <div class="form-group">
                        <input type="password" name="pass" class="form-control" id="pass" placeholder="New password">
                    </div>
                    <br>
                    <p style="color: red;"><?php echo $data['err'];?></p>
                    <button  type="submit" class="btn btn-primary">Continue</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require APPROOT . '/view/inc/footer.php';
?>