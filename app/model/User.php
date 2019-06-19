<?php
    class User{
        private $db;
        public function __construct()
        {
            $this->db = new Database;
        }
        public function findUserByEmail($email){
            $this->db->insert_prepare('SELECT * FROM users WHERE email = :email');
            $this->db->affect_type(':email', $email);
            $row = $this->db->single_data();
            if($this->db->rowCount() > 0){
              return true;
            } else {
              return false;
            }
        }
        public function findUserByEmailNone($email, $id){
            $this->db->insert_prepare('SELECT * FROM users WHERE email = :email && id_user != :id');
            $this->db->affect_type(':email', $email);
            $this->db->affect_type(':id', $id);
            $row = $this->db->single_data();
            if($this->db->rowCount() == 0){
                return true;
            } else {
                return false;
            }
        }
        public function findUserByUsername($user){
            $this->db->insert_prepare('SELECT * FROM users WHERE username = :user');
            $this->db->affect_type(':user', $user);
            $row = $this->db->single_data();
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }
        public function findUserByUsernameNone($user, $id){
            $this->db->insert_prepare('SELECT * FROM users WHERE username = :user && id_user != :id');
            $this->db->affect_type(':user', $user);
            $this->db->affect_type(':id', $id);
            $row = $this->db->single_data();
            if($this->db->rowCount() == 0){
                return true;
            } else {
                return false;
            }
        }
        public function fetch_data($username){
            $this->db->insert_prepare('SELECT * FROM users WHERE username = :username');
            $this->db->affect_type(':username', $username);
            $row = $this->db->single_data();
            return ($row);
        }
        public function fetch_data_id($id){
            $this->db->insert_prepare('SELECT * FROM users WHERE  = :id');
            $this->db->affect_type(':id_user', $id);
            $row = $this->db->single_data();
            return ($row);
        }
        public function update_mail_usernanme($username , $mail, $id){
            $this->db->insert_prepare('update users set username = :username,email = :mail where id_user = :id');
            $this->db->affect_type(':id', $id);
            $this->db->affect_type(':mail', $mail);
            $this->db->affect_type(':username', $username);
            if ($this->db->execute_my_requete())
                return (true);
            else
                return (false);
        }
        public function update_password($pass, $id){
            $this->db->insert_prepare('update users set pass = :pass where id_user = :id');
            $this->db->affect_type(':id', $id);
            $this->db->affect_type(':pass', $pass);
            if ($this->db->execute_my_requete())
                return (true);
            else
                return (false);
        }
        public function register($data){
            $email = $data['email'];
            $username = $data['username'];
            $pass = $data['password'];
            $token = $data['token'];

            $this->db->insert_prepare('insert into users (username, email, pass, token, active) values (:username, :email, :pass, :token, 0)');
            $this->db->affect_type(':email', $email);
            $this->db->affect_type(':username', $username);
            $this->db->affect_type(':pass', $pass);
            $this->db->affect_type(':token', $token);
            if ($this->db->execute_my_requete())
                return (true);
            else
                return (false);
        }
        public function login($data){
            $username = $data['username'];
            $pass = $data['pass'];
            if ($this->findUserByUsername($username)) {
                //if ($pass == password_hash($data['password'], PASSWORD_DEFAULT))
                $this->db->insert_prepare('SELECT * FROM users WHERE username = :username');
                $this->db->affect_type(':username', $username);
                $row = $this->db->single_data();
                if (password_verify($pass, $row->pass)) {
                    return (true);
                }
            }
            return (false);
        }
    }
?>