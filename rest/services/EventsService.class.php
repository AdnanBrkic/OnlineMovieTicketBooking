<?php 
    require_once dirname(__FILE__)."/BaseService.class.php";
    require_once dirname(__FILE__)."/../dao/EventsDao.class.php";

    class EventsService extends BaseService{
       
        public function __construct(){
            $this->dao = new EventsDao(); 
        }
        
    }
?>