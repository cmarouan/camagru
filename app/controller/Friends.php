<?php
class Friends extends Controller {
    private $db;
    public function __construct()
    {
        if (!isset($_SESSION['currentPage']))
            $_SESSION['currentPage'] = 0;
        $this->imageModel = $this->Model('Image');
    }

    public function index()
    {
        $this->system_pagination(1);        
    }

    public function system_pagination($prevNext){
        if ($prevNext == 1)
            $_SESSION['currentPage'] += 1;
        $nbStart = ($_SESSION["currentPage"] * 5) - 5;
        $allImages = $this->imageModel->get_images();
        $nbImages = count($allImages);
        $nbPages =  ceil($nbImages / 5);
        if ($_SESSION["currentPage"] <= $nbPages && $_SESSION["currentPage"] > 0)
        {
            $data = [
                'images' => $this->imageModel->img_pagination($nbStart, 5),
                'nbStart' => 1,
                'currentPage' => $_SESSION['currentPage'],
                'nbPages' => $nbPages
            ];
            $this->View('friends', $data);
        }
        else
        {
            if ($prevNext == 1)
                $_SESSION['currentPage'] = 1;
            else
                $_SESSION['currentPage'] = $nbPages;
            $data = [
                'images' => $this->imageModel->img_pagination(0, 5),
                'nbStart' => 1,
                'currentPage' => $_SESSION['currentPage'],
                'nbPages' => $nbPages
            ];
            $this->View('friends', $data);
        }
    }

    public function next(){
        $this->system_pagination(1);
    }

    public function debut(){
        $_SESSION['currentPage'] = 0;
        $this->system_pagination(1);
    }
}
?>