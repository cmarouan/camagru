<?php
class Edit extends Controller {
    public function __construct()
    {
       $this->userModel = $this->Model('User');
    }

    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            $this->View('edit');
        }
        else
            header('Location: '. URLROOT);
    }

    public function editInfo()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data =[
                    'username' => trim($_POST['username']),
                    'mail' => trim($_POST['mail']),
                    'err' => ''
                ];
                $id = $_SESSION['user_id'];
                if(empty($data['mail']) || empty($data['username'])){

                    $data['err'] = 'All input are required';
                    $this->View('edit', $data);
                    //exit();
                }else if (!filter_var($data['mail'], FILTER_VALIDATE_EMAIL)){
                    $data['err'] = 'Incorrect mail format';
                    $this->View('edit', $data);
                    //exit();
                }else if ($this->userModel->findUserByEmailNone($data['email'], $_SESSION['user_id']) == false || $this->userModel->findUserByUsernameNone($data['username'], $_SESSION['user_id']) == false)
                {
                    $data['err'] = 'Mail or username already exist';
                    $this->View('edit', $data);
                    //exit();
                }
                else if (empty($data['err']))
                {
                    if ($this->userModel->update_mail_usernanme($data['username'], $data['mail'], $id)) {
                        $user = $this->userModel->fetch_data($data['username']);
                        $_SESSION['user_id'] = $user->id_user;
                        $_SESSION['user_email'] = $user->email;
                        $_SESSION['username'] = $user->username;
                        header('Location: '. URLROOT . 'edit');
                        //exit();
                    }
                }
        }
    }
    public function editPass()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $id = $_SESSION['user_id'];
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data =[
                'pass' => trim($_POST['pass']),
                'newPass' => trim($_POST['newPass']),
                'err_2' => ''
            ];
            if(empty($data['pass']) || empty($data['newPass'])){
                $data['err_2'] = 'All input are required';
                $this->View('edit', $data);
            }
            else if ($data['pass'] != $data['newPass']){
                $data['err_2'] = 'Password doesn\'t match';
                $this->View('edit', $data);
            }
            else if (empty($data['err_2'])){
                if ($this->userModel->update_password(password_hash($data['pass'], PASSWORD_DEFAULT), $id)) {
                    unset( $_SESSION['user_id']);
                    unset( $_SESSION['user_email']);
                    unset( $_SESSION['username']);
                    session_destroy();
                    header('Location: '. URLROOT);
                    //exit();
                }
            }
        }
    }
}
?>