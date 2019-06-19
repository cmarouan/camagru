<?php
class Camera extends Controller {
    private $db;
    public function __construct()
    {
        $this->imageModel = $this->Model("Image");
        $this->userModel = $this->Model("User");
    }

    public function index()
    {
        $data = $this->imageModel->get_my_images($_SESSION['user_id']);
        if (isset($_SESSION['user_id'])) {
            $this->View('camera', $data);
        }
        else
            header('Location: '. URLROOT);
    }

    public function take_pic(){
        $id_user = $_SESSION[user_id];
        $data =  $_POST["img"];
        $filter =  $_POST["filter"];
        list($type, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);
        $one_img = $this->imageModel->get_image();
        if (empty($one_img))
            $id = 0;
        else
            $id = $one_img->image_id;
        $id = $id + 1;
        file_put_contents(PUB . '/img/image' . $id . '.png', $data);
        $sourceImage = PUB . '/img/' . $filter . '.png';
        if (file_exists(PUB . '/img/' . $filter . '.png'))
            echo "touver";
        $destImage = PUB . '/img/image' . $id . '.png';
        list($srcWidth, $srcHeight) = getimagesize($sourceImage);
        $src = imagecreatefrompng($sourceImage);
        $dest = imagecreatefrompng($destImage);
        imagecopyresized($dest, $src, 0, 0, 0, 0, 90, 90, $srcWidth, $srcHeight);
        imagejpeg($dest,PUB . '/img/image' . $id . '.jpg',100);
        $info =[
            'user_id' => $id_user,
            'photo_link' => PUB . '/img/image' . $id . '.jpg'
        ];
        if (!empty($data)) {
            if ($this->imageModel->add_image($info) == true) {
                $data = $this->imageModel->get_images();
                $this->View('camera/take_pic', $data);
            }
        }
    }

    public function deleteImg($id){
        $this->imageModel->deleteImg($id);
        $data = $this->imageModel->get_images();
        header('Location: '. URLROOT . 'camera');
    }

    public function upload_image(){
        $id_user = $_SESSION[user_id];
        $data = $_POST['img'];
        $filter = $_POST['filter'];
        list($type, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);
        list(, $type) = explode('/', $type);
        $data = base64_decode($data);
        $one_img = $this->imageModel->get_image();
        print_r($one_img);
        if (empty($one_img))
            $id = 0;
        else
            $id = $one_img->image_id;
        $id = $id + 1;
        if ($type != 'png')
            $type = 'jpg';
        file_put_contents(PUB . '/img/image' . $id . '.' . $type, $data);
        $sourceImage = PUB . '/img/' . $filter . '.png';
        if (file_exists(PUB . '/img/' . $filter . '.png'))
            echo "touver";
        $destImage = PUB . '/img/image' . $id . '.' . $type;
        list($srcWidth, $srcHeight) = getimagesize($sourceImage);
        $src = imagecreatefrompng($sourceImage);
        $dest = imagecreatefromjpeg($destImage);
        imagecopyresized($dest, $src, 0, 0, 0, 0, 90, 90, $srcWidth, $srcHeight);
        imagejpeg($dest,PUB . '/img/image' . $id . '.jpg',100);
        $info =[
            'user_id' => $id_user,
            'photo_link' => PUB . '/img/image' . $id . '.jpg'
        ];
        if ($this->imageModel->add_image($info) == true) {
            $data = $this->imageModel->get_images();
            $this->View('camera/upload_image', $data);
        }
    }
}
?>