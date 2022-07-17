
<?php
require_once __DIR__.'/BaseDao.class.php';

class ReservationDao extends BaseDao{
  /**
  * constructor of dao class
  */
  public function __construct(){
    parent::__construct("reservation");
  }
    
     public function get_reservation_by_user($user_id){
        return $this->query("SELECT *
        FROM reservation
        INNER JOIN projecting_movies
        ON reservation.projecting_movie=projecting_movies.id
        INNER JOIN movies
        ON projecting_movies.movie_id = movies.id
        WHERE user_id = :user_id", ["user_id" => $user_id] );
    }
    
    /*
    
    public function get_reservation_by_user($user_id){
        return $this->query("SELECT reservation.user_id, reservation.vip_ticket, reservation.regular_ticket, reservation.love_ticket, projecting_movies.projecting_date, projecting_movies.projecting_time, movies.movie_name, movies.movie_image,
        selected_seats.cinema_seats_id, cinema_seats.seat_type_id
        FROM reservation
        INNER JOIN projecting_movies
        ON reservation.projecting_movie=projecting_movies.id
        INNER JOIN movies
        ON projecting_movies.movie_id=movies.id
        INNER JOIN selected_seats
        ON selected_seats.projecting_movies_id = projecting_movies.id
        INNER JOIN cinema_seats
        ON selected_seats.cinema_seats_id = cinema_seats.id
        WHERE reservation.user_id = :user_id ORDER BY projecting_time ASC", ["user_id" => $user_id] );
    }
    
    */
    
    public function get_reservation_by_barcode($reservation_code){
        return $this->query("SELECT * FROM reservation WHERE reservation_code = :reservation_code", ["reservation_code" => $reservation_code] );
    }
    
}

?>