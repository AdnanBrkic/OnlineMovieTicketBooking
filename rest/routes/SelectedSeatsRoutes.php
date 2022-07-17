<?php


Flight::route('GET /selected_seats', function(){
    Flight::json(Flight::selectedSeatsService()->get_all());
});

Flight::route('GET /selected_seats/@id', function($id){
    Flight::json(Flight::selectedSeatsService()->get_by_id($id));
});

Flight::route('GET /selected_seats/projecting_movies/@id', function($id){
    Flight::json(Flight::selectedSeatsService()->get_status_of_seat($id));
});

Flight::route('POST /selected_seats', function(){
    Flight::json(Flight::selectedSeatsService()->add(Flight::request()->data->getData()));
});

?>
