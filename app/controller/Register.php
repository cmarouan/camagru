<?php
class Register extends Controller {

    private $sql;

    public function __construct()
    {
        $data =[
            'username' => '',
            'email' => '',
            'password' => '',
            'confirm_password' => '',
            'token' => '',
            'email_err' => '',
            'username_err' => '',
            'password_err' => '',
            'confirm_password_err' => ''
        ];
        $this->userModel = $this->Model('User');
    }

    public function index(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data =[
                'username' => trim($_POST['username']),
                'email' => trim($_POST['inputEmail']),
                'password' => trim($_POST['inputPass']),
                'confirm_password' => trim($_POST['inputConfpass']),
                'token' => '',
                'email_err' => '',
                'username_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            if(empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $data['email_err'] = 'Please enter email';
            } else {
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email is already exist';
                }
            }
            if(empty($data['username'])){
                $data['username_err'] = 'Please enter username';
            } else {
                if($this->userModel->findUserByUsername($data['username'])){
                    $data['username_err'] = 'Username is already exist';
                }
            }
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            } elseif(strlen($data['password']) < 8 || ctype_lower($data['password'])){
                $data['password_err'] = 'Password must be at least 8 characters & number / upper char';
            }
            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if($data['password'] != $data['confirm_password']){
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }
            if(empty($data['email_err']) && empty($data['password_err']) && empty($data['username_err']) && empty($data['confirm_password_err'])){
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                $token = 'QWERTYUIOPvcgj4kkjjkvv/jghfhgvhgff[asdghjQAwdgccjllplkmjnMKJHDFGJ[]#3LBCGqwetzxcv12345678902QWERT(05Sd)';
                $token = str_shuffle($token);
                $token = substr($token, 0, 10);
                $data['token'] = $token;
                $to  = $data['email'];
                $subject = 'Confirm account';
                $message = '
                    <html>
                    <head>
                    </head>
                    <body>
                        <p>To active your account click <a href="localhost/untitled/register/confirm/'. $token .'">Here</a></p>
                    </body>
                    </html>
                ';
                $headers[] = 'MIME-Version: 1.0';
                $headers[] = 'Content-type: text/html; charset=iso-8859-1';
                $headers[] = 'To: ' . $to;
                mail($to, $subject, $message , implode("\r\n", $headers));
                if($this->userModel->register($data)){
                    header('Location: '. URLROOT);
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->View('register', $data);
            }
        }
        else {
            $data =[
                'username' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'token' => '',
                'email_err' => '',
                'username_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            $this->View('register', $data);
        }
    }

    public function confirm($token){
        if ($this->userModel->activeAccount($token))
            header('Location: '. URLROOT);
    }
}
?>