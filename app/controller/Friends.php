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
            $this->View('friends', $data);
    }
}
?>