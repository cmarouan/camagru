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

    public function send_email($type , $img_id){
        $usr = $this->imageModel->user_by_email_adrress($img_id);
        $to  = $usr->email;
        $subject = 'Camagru notification';
        $message = '
                <html>
                <head>
                </head>
                <body>
                    <p>One of your photo was ' . $type .' </p>
                </body>
                </html>
                ';
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        $headers[] = 'To: ' . $to;
        mail($to, $subject, $message , implode("\r\n", $headers));
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
        $this->send_email("Commented" , $img);
        header('Location: '. URLROOT . 'about/' . $img);
    }
}
?>