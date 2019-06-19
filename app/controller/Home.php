<?php
class Home extends Controller {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            $this->View('home');
        }
        else
            header('Location: '. URLROOT);
    }
}
?>