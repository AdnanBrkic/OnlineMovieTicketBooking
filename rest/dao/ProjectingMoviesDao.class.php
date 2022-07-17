
<?php
require_once __DIR__.'/BaseDao.class.php';

class ProjectingMoviesDao extends BaseDao{
  /**
  * constructor of dao class
  */
  public function __construct(){
    parent::__construct("projecting_movies");
  }
    
  public function get_movie_project($movie_id){
        return $this->query("SELECT * FROM projecting_movies WHERE movie_id = :movie_id ORDER BY projecting_time DESC", ["movie_id" => $movie_id] );
    }
}

?>