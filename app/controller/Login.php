<?php
class Login extends Controller {
    private $db;
    public function __construct()
    {
        $this->userModel = $this->Model('User');
    }

    public function logout(){
        unset( $_SESSION['user_id']);
        unset( $_SESSION['user_email']);
        unset( $_SESSION['username']);
        session_destroy();
        header('Location: '. URLROOT);
    }

    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            header('Location: '. URLROOT . 'home');
        }
        else
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data =[
                    'username' => trim($_POST['username']),
                    'pass' => trim($_POST['pass']),
                    'pass_err' => '',
                    'username_err' => ''
                ];
                if($this->userModel->findUserByUsername($data['username']) == false){
                    $data['username_err'] = 'Username doesn\'t exist';
                    $this->View('login', $data);
                    die();
                }
                if ($this->userModel->login($data) == false) {
                    $data['pass_err'] = 'Error password';
                }
                if (empty($data['pass_err']) && empty($data['username_err'])){
                    $user = $this->userModel->fetch_data($data['username']);
                    $_SESSION['user_id'] = $user->id_user;
                    $_SESSION['user_email'] = $user->email;
                    $_SESSION['username'] = $user->username;
                    header('Location: '. URLROOT . 'home/' . $user->id_user);
                }
                else{

                    $this->View('login', $data);
                }
            }
            else {
                $data =[
                    'username' => '',
                    'pass' => '',
                    'pass_err' => '',
                    'username_err' => ''
                ];
                $this->view('login', $data);
            }

        }

    }
}
?>