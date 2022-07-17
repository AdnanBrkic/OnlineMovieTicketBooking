<?php  

Flight::route('POST /user/register', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::userService()->register($data));
});

Flight::route('GET /user/confirm/@token', function($token){
    Flight::userService()->confirm($token);
    Flight::json(["message" => "Your account has been activated"]);
});

Flight::route('GET /users', function(){
    Flight::json(Flight::userService()->get_all());
});

Flight::route('POST /user/login', function(){
    Flight::userService()->login(Flight::request()->data->getData());
});

Flight::route('GET /locked/user/users/@id', function($id){
    $user = Flight::userService()->get_by_id($id);
    Flight::json($user);
});

Flight::route('GET /user/users/@username', function($username){
    $user = Flight::userService()->get_user_by_username($username);
    Flight::json($user);
});

Flight::route('GET /user/token/@token', function($token){
    $user = Flight::userService()->get_user_by_token($token);
    Flight::json($user);
});

Flight::route('POST /users', function(){
    $request = Flight::request();
    $data = $request->data->getData();
    $user = Flight::userService()->add($data); 
    Flight::json($user); 
});


Flight::route('PUT /settings/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::userService()->update($id, $data));
});


Flight::route('GET /user/username',function(){
  $validUser=Flight::get('validUser');
  $user=Flight::json($validUser['username']);
});

Flight::route('GET /locked/password',function(){
  $validUser=Flight::get('validUser');
  $user=Flight::json($validUser['password']);
});

//get id
/**
* @OA\Get(path="/id", tags={"user"}, security={{"ApiKeyAuth": {}}},
*     @OA\Response(response="200", description="Get id of current user")
* )
*/

Flight::route('GET /locked/id',function(){
  $validUser=Flight::get('validUser');
  $user=Flight::json($validUser['id']);
});

//get firstname
/**
* @OA\Get(path="/firstname", tags={"user"}, security={{"ApiKeyAuth": {}}},
*     @OA\Response(response="200", description="Get first name of current user")
* )
*/
Flight::route('GET /email',function(){
  $validUser=Flight::get('validUser');
  $user=Flight::json($validUser['email']);
});

//get lastname
/**
* @OA\Get(path="/lastname", tags={"user"}, security={{"ApiKeyAuth": {}}},
*     @OA\Response(response="200", description="Get last name of current user")
* )
*/
Flight::route('GET /lastname',function(){
  $validUser=Flight::get('validUser');
  $user=Flight::json($validUser['surname']);
});

//get email
/**
* @OA\Get(path="/email", tags={"user"}, security={{"ApiKeyAuth": {}}},
*     @OA\Response(response="200", description="Get email of current user")
* )
*/
Flight::route('GET /email',function(){
  $validUser=Flight::get('validUser');
  $user=Flight::json($validUser['email']);
});

//get date of birth
/**
* @OA\Get(path="/dob", tags={"user"}, security={{"ApiKeyAuth": {}}},
*     @OA\Response(response="200", description="Get date of birth of current user")
* )
*/
Flight::route('GET /dob',function(){
  $validUser=Flight::get('validUser');
  $user=Flight::json($validUser['dateOfBirth']);
});

//get country
/**
* @OA\Get(path="/country/user", tags={"user"}, security={{"ApiKeyAuth": {}}},
*     @OA\Response(response="200", description="Get countryID of current user")
* )
*/
Flight::route('GET /country/user', function(){
  $validUser=Flight::get('validUser');
  $user=Flight::json($validUser['countryID']);
});

//get photo
/**
* @OA\Get(path="/photo", tags={"user"}, security={{"ApiKeyAuth": {}}},
*     @OA\Response(response="200", description="Get photo of current user")
* )
*/
Flight::route('GET /photo',function(){
  $validUser=Flight::get('validUser');
  $user=Flight::json($validUser['photo']);
});





?>