
<?php
require_once __DIR__.'/BaseDao.class.php';

class UsersDao extends BaseDao{
  /**
  * constructor of dao class
  */
  public function __construct(){
        parent::__construct("users");
    }

    public function get_user_by_id($id){
        return $this->query_unique("SELECT * FROM users WHERE id = :id", ["id" => $id]);
    }

    public function get_user_by_email($email){
       return $this->query_unique("SELECT * FROM users WHERE email = :email", ["email" => $email]);
    }

    public function get_user_by_username($username){
        return $this->query_unique("SELECT * FROM users WHERE username = :username", ["username" => $username]);
    }

    public function get_user_by_token($token){
        return $this->query_unique("SELECT * FROM users WHERE token = :token", ["token" => $token]);
      }
    
}

?>