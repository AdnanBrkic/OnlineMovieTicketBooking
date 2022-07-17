<?php

Flight::route('GET /reservation', function(){
    Flight::json(Flight::reservationService()->get_all());
});

Flight::route('GET /locked/reservation/user/@id', function($id){
    Flight::json(Flight::reservationService()->get_reservation_by_user($id));
});

Flight::route('GET /reservation/barcode/@id', function($id){
    Flight::json(Flight::reservationService()->get_reservation_by_barcode($id));
});

Flight::route('POST /reservation', function(){
    Flight::json(Flight::reservationService()->add(Flight::request()->data->getData()));
});


Flight::route('PUT /reservation/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::reservationService()->update($id, $data));
});


?>
