<?php

Flight::route('GET /cinema_halls', function(){
    Flight::json(Flight::cinemaHallsService()->get_all());
});

Flight::route('GET /cinema_halls/@id', function($id){
    Flight::json(Flight::cinemaHallsService()->get_by_id($id));
});


?>
