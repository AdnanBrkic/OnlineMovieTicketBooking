<?php 
    require_once dirname(__FILE__)."/BaseService.class.php";
    require_once dirname(__FILE__)."/../dao/ReservationDao.class.php";

    class ReservationService extends BaseService{
       
        public function __construct(){
            $this->dao = new ReservationDao(); 
        }
        
        public function get_reservation_by_user($id){
            return ($this->dao->get_reservation_by_user($id));
        }
        
        public function get_reservation_by_barcode($id){
            return ($this->dao->get_reservation_by_barcode($id));
        }

    }
?>