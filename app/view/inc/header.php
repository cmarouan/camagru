<html>
<head>
    <title></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand text-dark" style="font-family: cursive;" href="<?php echo URLROOT; ?>home">Camagru<small>menu</small></a>
    <?php
    if (isset($_SESSION['user_id'])) {
        echo '<a class="navbar-brand text-dark float-right" href="'. URLROOT .'login/logout"><span style="color: red">Logout</span></a>';
    }
    ?>
    <div class="collapse navbar-collapse" id="navbarNav">
    </div>
</nav>