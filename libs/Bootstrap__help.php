<?php


 class Bootstrap_help{
	 public $db_host  = DB_HOSTNAME;
	 public $db_user = DB_USERNAME;
	 public $db_pass = DB_PASSWORD;
	 public $db_base = DB_DATABASE;

	public function __construct(){

	}

	public function select($sql)
        {
              $result = mysqli_query($this->db_connect(),$sql);
              $result = $this->db_res_arr($result);
              return $result;
    }

    public  function db_res_arr($result){
            $res_arr = array ();
            $count = 0;
            while($row = mysqli_fetch_array($result))
            {
                $res_arr[$count] = $row;
                $count++;
            }
            return $res_arr;
    }


    public function db_connect(){

        $host = $this->db_host;
        $user = $this->db_user;
        $pswd = $this->db_pass;
        $db   = $this->db_base;

        $connection = mysqli_connect($host,$user,$pswd,$db);

            mysqli_query($connection,"set_client='utf8'");
            mysqli_query($connection,"set character_set_results='utf8'");
            mysqli_query ($connection,"set collation_connection='utf8_general_ci'");
            mysqli_query ($connection,"SET NAMES utf8");
            if(!$connection || !mysqli_select_db($connection,$db)){   return false;  }
            return $connection;

   }



	public function math_url($url){
		$SQL = "SELECT rewrite FROM mod_rewrite  WHERE url='$url'";
		$url  = $this->select($SQL);
		if(!empty($url)){
			return $url[0][0];
		}else{
			return false;
		}



	}
	
	public function match_book($url){
		$url = urldecode($url);
		$SQL = "SELECT tid FROM bm_books WHERE tid='$url'";
		$url  = $this->select($SQL);
		if(!empty($url)){
			return true;
		}else{
			return false;
		}
	}



 }







?>
