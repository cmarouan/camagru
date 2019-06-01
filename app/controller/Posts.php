<?php
class Posts extends Controller {
    public function __construct()
    {
        $this->Model('Post');
    }
    public function about($id)
    {
        //echo "about function ". $id;
    }
    public function login()
    {
        $this->View("login");
    }
}
?>