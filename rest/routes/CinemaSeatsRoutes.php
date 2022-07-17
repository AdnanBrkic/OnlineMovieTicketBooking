<?php

Flight::route('GET /cinema_seats', function(){
    Flight::json(Flight::cinemaSeatsService()->get_all());
});

Flight::route('GET /cinema_seats/@id', function($id){
    Flight::json(Flight::cinemaSeatsService()->get_by_id($id));
});


?>
