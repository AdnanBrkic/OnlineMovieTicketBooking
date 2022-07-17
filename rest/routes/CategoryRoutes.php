<?php

Flight::route('GET /category', function(){
    Flight::json(Flight::categoryService()->get_all());
});

Flight::route('GET /category/@id', function($id){
    Flight::json(Flight::categoryService()->get_by_id($id));
});


?>
