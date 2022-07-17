<?php 
    require_once dirname(__FILE__)."/BaseService.class.php";
    require_once dirname(__FILE__)."/../dao/SelectedSeatsDao.class.php";

    class SelectedSeatsService extends BaseService{
       
        public function __construct(){
            $this->dao = new SelectedSeatsDao(); 
        }
        
        public function get_status_of_seat($id){
            return ($this->dao->get_seat_status($id));
        }

    }
?>