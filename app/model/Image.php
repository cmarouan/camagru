<?php
    class Image{
        private $db;
        public function __construct()
        {
            $this->db = new Database;
        }

        public function add_image($data){
            $id_user = $data['user_id'];
            $photo = $data['photo_link'];
            $this->db->insert_prepare('insert into images (image_link, user_id, image_date) values (:image_link, :user_id, NOW())');
            $this->db->affect_type(':image_link', $photo);
            $this->db->affect_type(':user_id', $id_user);
            if ($this->db->execute_my_requete())
                return (true);
            else
                return (false);
        }

        public function user_by_email_adrress($img_id){
            $this->db->insert_prepare('SELECT * from users join images on images.user_id = users.id_user where images.image_id = :img_id and active_comment = 1');
            $this->db->affect_type(':img_id', $img_id);
            $row = $this->db->single_data();
            return ($row);
        }

        public function get_images(){
            $this->db->insert_prepare('SELECT * FROM images join users on users.id_user = images.user_id order by image_date desc');
            $row = $this->db->all_data();
            return ($row);
        }

        public function get_my_images($id){
            $this->db->insert_prepare('SELECT * FROM images join users on users.id_user = images.user_id where images.user_id = :id order by image_date desc');
            $this->db->affect_type(':id', $id);
            $row = $this->db->all_data();
            return ($row);
        }

        public function get_image(){
            $this->db->insert_prepare('SELECT max(image_id) as image_id FROM images');
            $row = $this->db->single_data();
            return ($row);
        }

        public function findImageById($id){
            $this->db->insert_prepare('SELECT * FROM images WHERE image_id = :image_id');
            $this->db->affect_type(':image_id', $id);
            $row = $this->db->single_data();
            return ($row);
        }

        public function info($id_image){
            $this->db->insert_prepare('SELECT image_id, username, image_link, image_date, comments from images join users on users.id_user = images.user_id join comments on comments.id_photo = images.image_id where image_id = :image_id');
            $this->db->affect_type(':image_id', $id_image);
            $row = $this->db->all_data();
            return ($row);
        }

        public function deleteImg($id){
            $this->db->insert_prepare("delete from images where image_id = :id");
            $this->db->affect_type(':id', $id);
            if ($this->db->execute_my_requete())
                return (true);
            else
                return (false);
        }

        public function nb_cmt_like($id){
            $this->db->insert_prepare('SELECT COUNT(id_comment) as \'cmt\' , COUNT(id_like) as \'like\'  from comments, likes where likes.id_photo = :image_id GROUP BY comments.id_photo');
            $this->db->affect_type(':image_id', $id);
            $row = $this->db->single_data();
            if (empty($row))
            {
                $row = new stdClass();
                $row->like = 0;
                $row->cmt = 0;
            }
            return ($row);
        }

        public function nb_cmt($id){
            $this->db->insert_prepare('SELECT COUNT(id_comment) as \'cmt\' from comments where id_user = :user_id');
            $this->db->affect_type(':user_id', $id);
            $row = $this->db->single_data();
            if (empty($row))
                return 0;
            $r = $row->cmt;
            return ($r);
        }

        public function nb_cmt_img($id){
            $this->db->insert_prepare('SELECT COUNT(id_comment) as \'cmt\' from comments where id_photo = :id');
            $this->db->affect_type(':id', $id);
            $row = $this->db->single_data();
            $r = $row->cmt;
            return ($r);
        }

        public function nb_like_img($id){
            $this->db->insert_prepare('SELECT COUNT(id_like) as \'like\' from likes where id_photo = :id');
            $this->db->affect_type(':id', $id);
            $row = $this->db->single_data();
            $r = $row->like;
            return ($r);
        }

        public function nb_like($id){
            $this->db->insert_prepare('SELECT COUNT(id_like) as \'like\' from likes where id_user = :user_id');
            $this->db->affect_type(':user_id', $id);
            $row = $this->db->single_data();
            if (empty($row))
                return 0;
            $r = $row->like;
            return ($r);
        }

        public function nb_photo($id){
            $this->db->insert_prepare('SELECT COUNT(*) as \'photo\' from images where user_id = :user_id');
            $this->db->affect_type(':user_id', $id);
            $row = $this->db->single_data();
            if (empty($row))
                return 0;
            $r = $row->photo;
            return ($r);
        }

        public function searchLike($image_id, $user_id){
            $this->db->insert_prepare('SELECT * FROM likes WHERE id_photo = :image_id and id_user = :user_id');
            $this->db->affect_type(':image_id', $image_id);
            $this->db->affect_type(':user_id', $user_id);
            $row = $this->db->single_data();
            if (empty($row))
                return ('');
            return ('Liked !');
        }

        public function like($img, $usr){
            if ($this->searchLike($img, $usr) == '')
            {
                $this->db->insert_prepare('insert into likes (id_user, id_photo) values (:usr, :img)');
                $this->db->affect_type(':usr', $usr);
                $this->db->affect_type(':img', $img);
                $this->db->execute_my_requete();
            }
            else
            {
                $this->db->insert_prepare('delete from likes where id_user = :usr and id_photo = :img');
                $this->db->affect_type(':usr', $usr);
                $this->db->affect_type(':img', $img);
                $this->db->execute_my_requete();
            }
        }

        public function comment($img, $usr, $comment){
            $this->db->insert_prepare('insert into comments (id_user, id_photo, comments, date_comment) values (:usr, :img, :comment, NOW())');
            $this->db->affect_type(':usr', $usr);
            $this->db->affect_type(':img', $img);
            $this->db->affect_type(':comment', $comment);
            $this->db->execute_my_requete();
        }
    }
?>