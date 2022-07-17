<?php

Flight::route('GET /projecting_movies', function(){
    Flight::json(Flight::projectingMoviesService()->get_all());
});

Flight::route('GET /projecting_movies/@id', function($id){
    Flight::json(Flight::projectingMoviesService()->get_movie_projection($id));
});


?>
