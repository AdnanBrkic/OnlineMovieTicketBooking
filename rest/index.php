<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require '../vendor/autoload.php';


/* Utility function */  
  Flight::map('query_param', function($name, $default_value = 0){
    $request = Flight::request();
    $query_param = @$request->query->getData()[$name];
    $query_param = $query_param ? $query_param : $default_value; 
    return $query_param;  
  });

  /* utility function for getting header parameters */
Flight::map('header', function($name){
  $headers = getallheaders();
  return @$headers[$name];
});

/* utility function for generating JWT token */
Flight::map('jwt', function($user){
  $jwt = \Firebase\JWT\JWT::encode(["exp" => (time() + Config::JWT_TOKEN_TIME), "id" => $user["id"], "username" =>$user["username"],"aid" => $user["id"], "r" => $user["type"]], Config::JWT_SECRET);
  
  return ["token" => $jwt];
});


require_once __DIR__.'/routes/middleware.php';
require_once __DIR__.'/routes/MoviesRoutes.php';
require_once __DIR__.'/routes/CategoryRoutes.php';
require_once __DIR__.'/routes/ProjectingMoviesRoutes.php';
require_once __DIR__.'/routes/CinemaSeatsRoutes.php';
require_once __DIR__.'/routes/CinemaHallsRoutes.php';
require_once __DIR__.'/routes/SelectedSeatsRoutes.php';
require_once __DIR__.'/routes/UsersRoutes.php';
require_once __DIR__.'/routes/EventsRoutes.php';
require_once __DIR__.'/routes/ReservationRoutes.php';


require_once dirname(__FILE__)."/services/CategoryService.class.php";   
require_once dirname(__FILE__)."/services/CinemaHallsService.class.php";
require_once dirname(__FILE__)."/services/CinemaSeatsService.class.php";   
require_once dirname(__FILE__)."/services/MoviesService.class.php";
require_once dirname(__FILE__)."/services/ProjectingMoviesService.class.php";   
require_once dirname(__FILE__)."/services/SelectedSeatsService.class.php";
require_once dirname(__FILE__)."/services/UserService.class.php"; 
require_once dirname(__FILE__)."/services/EventsService.class.php"; 
require_once dirname(__FILE__)."/services/ReservationService.class.php"; 

Flight::register("categoryService", "CategoryService");
Flight::register("cinemaHallsService", "CinemaHallService");
Flight::register("cinemaSeatsService", "CinemaSeatsService");
Flight::register("moviesService", "MoviesService");
Flight::register("projectingMoviesService", "ProjectingMoviesService");
Flight::register("selectedSeatsService", "SelectedSeatsService");
Flight::register("userService", "UserService");
Flight::register("eventsService", "EventsService");
Flight::register("reservationService", "ReservationService");




Flight::start();
?>
