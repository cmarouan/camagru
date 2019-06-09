<?php
class Register extends Controller {

    private $sql;

    public function __construct()
    {
        $this->userModel = $this->Model('User');
    }

    public function index()
    {
        $this->View('register');
    }

    public function register(){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Process form
          // Sanitize POST data
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          // Init data
          $data =[
            'firstName' => trim($_POST['inputfirst']),
            'lastName' => trim($_POST['inputlast']),
            'email' => trim($_POST['inputEmail']),
            'password' => trim($_POST['inputPass']),
            'confirm_password' => trim($_POST['inputConfpass']),
            'first_err' => '',
            'last_err' => '',
            'email_err' => '',
            'password_err' => '',
            'confirm_password_err' => ''
          ];
          // Validate Email
          if(empty($data['email'])){
            $data['email_err'] = 'Pleae enter email';
          } else {
            // Check email
            if($this->userModel->findUserByEmail($data['email'])){
              $data['email_err'] = 'Email is already taken';
            }
          }
          // Validate Name
          if(empty($data['name'])){
            $data['name_err'] = 'Pleae enter name';
          }
          // Validate Password
          if(empty($data['password'])){
            $data['password_err'] = 'Pleae enter password';
          } elseif(strlen($data['password']) < 6){
            $data['password_err'] = 'Password must be at least 6 characters';
          }
          // Validate Confirm Password
          if(empty($data['confirm_password'])){
            $data['confirm_password_err'] = 'Pleae confirm password';
          } else {
            if($data['password'] != $data['confirm_password']){
              $data['confirm_password_err'] = 'Passwords do not match';
            }
          }
          // Make sure errors are empty
          if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
            // Validated
            // Hash Password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            // Register User
            if($this->userModel->register($data)){
              flash('register_success', 'You are registered and can log in');
              redirect('users/login');
            } else {
              die('Something went wrong');
            }
          } else {
            // Load view with errors
            $this->view('users/register', $data);
          }
        } else {
          // Init data
          $data =[
            'name' => '',
            'email' => '',
            'password' => '',
            'confirm_password' => '',
            'name_err' => '',
            'email_err' => '',
            'password_err' => '',
            'confirm_password_err' => ''
          ];
  
          // Load view
          $this->view('users/register', $data);
        }
      }
}
?>