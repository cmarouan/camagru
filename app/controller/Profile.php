<?php
class Profile extends Controller {
    private $db;
    public function __construct()
    {
        if (isset($_SESSION['user_id'])) {
            $this->imageModel = $this->Model('Image');
        }
        else
            header('Location: '. URLROOT);
    }

    public function index()
    {
        $data = $this->imageModel->get_my_images($_SESSION['user_id']);
        $this->View('profile', $data);
    }
}
?>