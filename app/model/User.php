<?php
    class User{
        private $db;
        public function __construct()
        {
            $this->db = new Database;
        }
        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->affect_type(':email', $email);
            $row = $this->db->single_data();
            if($this->db->rowCount() > 0){
              return true;
            } else {
              return false;
            }
          }
    }
?>