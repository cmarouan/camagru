<?php
class Reinitialise extends Controller {
    private $db;
    public function __construct()
    {
        $this->userModel = $this->Model('User');
    }

    public function index()
    {
        $data = [
          'err' => ''
        ];
        $this->View('reinitialise', $data);
    }

    public function InitPass($token)
    {
        $data = [
            'err' => ''
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $d = $this->userModel->getIdByToken($token);
            if (count($d) > 0){
                if (strlen($_POST['pass']) < 8 || ctype_lower($_POST['pass'])){
                    $data['err'] = "must be more than 8 caracteres with a number or a upper char";
                    $this->View('reinitialise/InitPass/$token', $data);
                }
                else
                {
                    if ($this->userModel->update_password(password_hash($_POST['pass'], PASSWORD_DEFAULT), $d->id_user)) {
                        header('Location: '. URLROOT);
                    }
                    else {
                        $data['err'] = "error";
                        $this->View('reinitialise/InitPass/$token', $data);
                    }
                }
            }
        }
        $this->View('reinitialise', $data);
    }
}
?>