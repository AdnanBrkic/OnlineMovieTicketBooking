<?php

Flight::route('GET /events', function(){
    Flight::json(Flight::eventsService()->get_all());
});



?>
