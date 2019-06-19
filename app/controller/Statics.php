<?php
class Statics extends Controller {
    private $db;
    public function __construct()
    {
        $this->imageModel = $this->Model('Image');
    }
    public function index()
    {
        $id = $_SESSION['user_id'];
        $data = [
            'cmp' => $this->imageModel->nb_cmt($id),
            'like' => $this->imageModel->nb_like($id),
            'photo' => $this->imageModel->nb_photo($id)
        ];
        if (isset($_SESSION['user_id'])) {
            $this->View('static', $data);
        }
        else
            header('Location: '. URLROOT);
    }
}
?>