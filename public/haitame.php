<?php
echo "hello";
$success = mail('merouan.chakour@gmail.com',  "message", "From: sender@gmail.com");
if (!$success) {
    $errorMessage = error_get_last()['message'];
}

?>