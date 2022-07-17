
<?php
require_once __DIR__.'/BaseDao.class.php';

class SelectedSeatsDao extends BaseDao{
  /**
  * constructor of dao class
  */
  public function __construct(){
    parent::__construct("selected_seats");
  }
    
    public function get_seat_status($projecting_movies_id){
        return $this->query("SELECT * FROM selected_seats WHERE projecting_movies_id = :projecting_movies_id LIMIT 30 OFFSET 0", ["projecting_movies_id" => $projecting_movies_id]);
    }
    
}

?>