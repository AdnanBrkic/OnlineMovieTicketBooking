<?php 
    require_once dirname(__FILE__)."/BaseService.class.php";
    require_once dirname(__FILE__)."/../dao/MoviesDao.class.php";

    class MoviesService extends BaseService{
       
        public function __construct(){
            $this->dao = new MoviesDao(); 
        }

    }
?>