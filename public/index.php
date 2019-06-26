<?php
require_once '../app/bootstrap.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    foreach($_POST as &$p){
        $p = htmlspecialchars($p, ENT_QUOTES);
    }
}
$the_core = new Core();