<?php 
    require_once dirname(__FILE__)."/BaseService.class.php";
    require_once dirname(__FILE__)."/../dao/CinemaHallsDao.class.php";

    class CinemaHallsService extends BaseService{
       
        public function __construct(){
            $this->dao = new CinemaHallsDao(); 
        }

    }
?>