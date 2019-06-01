<?php
class Login extends Controller {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function index()
    {
        $this->View('login');
    }
    public function try_to_log()
    {
        if (isset($_POST)) {
            $email = $_POST['inputEmail'];
            $pass = $_POST['inputPass'];
            $this->db->insert_prepare("select * from users where email = :em");
            $this->db->affect_type(":em", $email);
            $row = $this->db->single_data();
            if ($pass == $row->pass)
                return ($row);
        }
        echo "<script> alert('Incorrect password or login');</script>";
    }
}
?>