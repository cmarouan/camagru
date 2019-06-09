<?php
class Home extends Controller
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function index()
    {
        $this->View("home");
    }
}
?>