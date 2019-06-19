<?php
class Register extends Controller {

    private $sql;

    public function __construct()
    {
        $this->userModel = $this->Model('User');
    }

    public function index(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
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
            } elseif(strlen($data['password']) < 8){
                $data['password_err'] = 'Password must be at least 8 characters';
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
                $token = 'QWERTYUIOPLBCGqwetzxcv12345678902QWERT!(^^^05Sd)';
                $token = str_shuffle($token);
                $token = substr($token, 0, 10);
                $data['token'] = $token;
                //$t =  mail('merouan.chakour@gmail.com', 'firstName', 'Click here to confirm : ');
                if($this->userModel->register($data)){
                    $this->View('login');
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

}
?>