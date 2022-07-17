<?php 
    require_once dirname(__FILE__)."/BaseService.class.php";
    require_once dirname(__FILE__)."/../dao/CinemaSeatsDao.class.php";

    class CinemaSeatsService extends BaseService{
       
        public function __construct(){
            $this->dao = new CinemaSeatsDao(); 
        }

    }
?>