<?php
class Forget extends Controller {
    private $db;
    public function __construct()
    {
        $this->userModel = $this->Model('User');
    }

    public function index()
    {
        $data =[
            'err' => '',
            'suc' => ''
        ];
        $this->View('forget', $data);
    }

    public function sendForgetMail(){
        $data =[
            'err' => '',
            'suc' => ''
        ];
        //The FILTER_SANITIZE_STRING filter removes tags and remove or encode special characters from a string.
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $email = $_POST['email'];
        if ($this->userModel->findUserByEmail($email)) {
            $d = $this->userModel->getTokenByEmail($email);
            $to  = $email;
            $subject = 'Change password';
            $message = '
                    <html>
                    <head>
                    </head>
                    <body>
                        <p><a href="localhost/untitled/reinitialise/InitPass/' . $d->token . '">To reset password click here !</a></p>
                    </body>
                    </html>
                ';
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            $headers[] = 'To: ' . $to;
            if (mail($to, $subject, $message , implode("\r\n", $headers)))
                $data['suc'] = "You will receive an email !";
            else
                $data['err'] = "Error";
        }
        else
            $data['err'] = "Email's user not found";
        $this->View('forget', $data);
    }

    public function reinitialise($token)
    {
        $this->View('reinitialise');
    }
}
?>