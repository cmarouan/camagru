<?php
    $to  = 'merouan.chakour@gmail.com'; // notez la virgule

    // Sujet
    $subject = 'Confirm account';

    // message
    $message = '
      <html>
      <head>
      </head>
      <body>
       <p>To active your account click here</p>
       <a href="localhost/untitled/register/confirm/TY9e5OSWxx">Here</a>
      </body>
     </html>
     ';
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    $headers[] = 'To: ' . $to;
    if (!mail($to, $subject, $message , implode("\r\n", $headers)))
        echo "chakour"
?>