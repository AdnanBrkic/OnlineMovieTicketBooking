
<?php
require_once __DIR__.'/BaseDao.class.php';

class CinemaSeatsDao extends BaseDao{
  /**
  * constructor of dao class
  */
  public function __construct(){
    parent::__construct("cinema_seats");
  }
    
}

?>