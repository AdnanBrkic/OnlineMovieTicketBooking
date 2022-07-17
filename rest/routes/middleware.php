<?php
require '../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

//middleware login method
Flight::route('/locked/*', function(){
    /*
    $path = Flight::request()->url;
    if($path == '/user/login' || $path == '/category' || $path == '/movies*' || $path == '/projecting_movies/*' ){
        return TRUE;
    }
    */
    
    $headers = getallheaders();
    if(@!$headers['Authorization']){
        Flight::json(["message" => "Unauthorized access"], 403);
        return FALSE;
    }else{
        try {
            $decoded = (array)JWT::decode($headers['Authorization'], new Key(Config::JWT_SECRET(), 'HS256'));
            Flight::set('validUser', $decoded);
            return TRUE;
        } catch (\Exception $e) {
            Flight::json(["message" => "Token authorization invalid"], 403);
            return FALSE;
        }
    }
});


?>
