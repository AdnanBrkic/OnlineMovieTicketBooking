<?php
require_once dirname(__FILE__). '/BaseService.class.php';
require_once dirname(__FILE__).'/../dao/UsersDao.class.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class UserService extends BaseService{
 

  public function __construct(){
    $this->dao = new UsersDao();
  }
    
    
  public function register($user){
 
      $user = parent::add([
          "username" => $user['username'],
          "email" => $user['email'],
          "password" => md5($user['password']),
          "status" => "PENDING",
          "token" => md5(random_bytes(16))
      ]);
      
      return $user;
  }
    
  public function confirm($token){
      $user = $this->dao->get_user_by_token($token);
      
      if (!isset($user['id'])) throw Exception("Invalid token");
      
      $this->dao->update($user['id'], ["status" => "ACTIVE"]);
  }
    
public function get_user_by_token($id){
    return ($this->dao->get_user_by_token($id));
}
    
    public function get_user_by_username($username){
    return ($this->dao->get_user_by_username($username));
}
    

  public function login($login){
    $user = $this->dao->get_user_by_email($login['email']);

    if(isset($user['id'])){

      if($user['password'] == md5($login['password'])){
        //unset($user['password']);
        $jwt = JWT::encode($user, Config::JWT_SECRET(), 'HS256');
        Flight::json(['token' => $jwt]);
      }else{
        Flight::json(["message"=>"Password is incorrect"], 404);
      }
    }else{
      Flight::json(["message"=>"User with that username doesn't exist"], 404);
    }
  }
    
    
    
}

?>
