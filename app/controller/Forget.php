<?php
class Forget extends Controller {
    private $db;
    public function __construct()
    {
            $this->userModel = $this->Model('User');
    }

    public function index()
    {
        $this->View('forget');
    }

    public function reinitialise($email, $token)
    {
        $this->View('reinitialise');
    }
}
?>