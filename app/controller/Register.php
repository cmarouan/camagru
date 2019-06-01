<?php
class Register extends Controller {

    private $sql;

    public function __construct()
    {
        $this->sql = new Database;
    }

    public function index()
    {
        $this->View('register');
    }
}
?>