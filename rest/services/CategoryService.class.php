<?php 
    require_once dirname(__FILE__)."/BaseService.class.php";
    require_once dirname(__FILE__)."/../dao/CategoryDao.class.php";

    class CategoryService extends BaseService{
       
        public function __construct(){
            $this->dao = new CategoryDao(); 
        }

    }
?>