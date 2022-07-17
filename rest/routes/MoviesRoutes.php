<?php

Flight::route('GET /movies', function(){
    Flight::json(Flight::moviesService()->get_all());
});

Flight::route('GET /movies/@id', function($id){
    Flight::json(Flight::moviesService()->get_by_id($id));
});

Flight::route('POST /movies', function(){
    Flight::json(Flight::moviesService()->add(Flight::request()->data->getData()));
});

Flight::route('PUT /movies/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::moviesService()->update($id, $data));
});


?>
