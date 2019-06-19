<?php
class About extends Controller {
    private $db;
    public function __construct()
    {
        if (isset($_SESSION['user_id'])) {
            $this->imageModel = $this->Model('Image');
        }
        else
            header('Location: '. URLROOT);
    }

    public function index($id)
    {
        $data = [
            'image' => $this->imageModel->findImageById($id),
            'comment' => $this->imageModel->info($id),
            'like' => $this->imageModel->nb_like_img($id),
            'cmt' => $this->imageModel->nb_cmt_img($id),
            'aboutLike' => $this->imageModel->searchLike($id, $_SESSION['user_id'])
        ];
        $this->View('about', $data);
    }

    public function like($img)
    {
        $usr = $_SESSION['user_id'];
        $this->imageModel->like($img, $usr);
        header('Location: '. URLROOT . 'about/' . $img);
    }

    public function comment($img)
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $usr = $_SESSION['user_id'];
        $comment = $_POST['cmt'];
        $this->imageModel->comment($img, $usr, $comment);
        header('Location: '. URLROOT . 'about/' . $img);
    }
}
?>