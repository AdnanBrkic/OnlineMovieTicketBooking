<?php 
    require_once dirname(__FILE__)."/BaseService.class.php";
    require_once dirname(__FILE__)."/../dao/ProjectingMoviesDao.class.php";

    class ProjectingMoviesService extends BaseService{
       
        public function __construct(){
            $this->dao = new ProjectingMoviesDao(); 
        }
        
        public function get_movie_projection($id){
            return ($this->dao->get_movie_project($id));
        }

    }
?>