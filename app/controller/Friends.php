<?php
class Friends extends Controller {
    private $db;
    public function __construct()
    {
        $this->imageModel = $this->Model('Image');
    }

    public function index()
    {
        $data = $this->imageModel->get_images();
        $nbImages = count($data);
        $nbStart = 0;
        $nbEnd = 5;
        $this->View('friends', $data);
    }

    public function next($start, $end){
        
    }

    public function prev($start, $end){

    }
}
?>