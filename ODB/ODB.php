<?php
  class ODB{

	   private $table;
	   private $driver;
               
        public function __construct($table) {
	          $this->table = $table; 
              require_once('ODB/driver.php');
              $this->driver = new Driver();
                        
              
        }
        
        
        
        
        
        
        public function get($args,$conditions = ''){
	        $args = ($args!="*") ? $this->executeArgs($args) : '*';
			$table = $this->table;
	        $entities = DB_PREFIX.'entity';
	        $SQL = "SELECT $args 
	        	   FROM $table AS a
	        	   LEFT JOIN $entities AS e ON e.entityId = a.id";
	        	   if(!empty($conditions) &&  $this->checkConditions($conditions)){ 
		        	   $conditions_where = $this->executeConditions($conditions); 
		        	   $conditions_wh = $conditions_where['where'];
		        	   $SQL.=" WHERE e.delete = 0 ";
		        	   if(!empty($conditions_where['where'])){
	        	         $SQL.= " AND $conditions_wh ";
	        	       }
	        	   }
	        	   if($conditions['ORDER'] && $conditions_where ){
			        	$SQL.=$conditions_where['order'];
		        	}else{
			        	$conditions_where = $this->executeConditions($conditions); 
			        	$SQL.=$conditions_where['order'];
			        	
		        	}
		           if($conditions['limit']){
			        	   $SQL.=" LIMIT ".$conditions['limit'];
		        	}
		        	
	        	  

	        	//echo $SQL;
	       return $this->driver->select($SQL);
        }
        
        
        public function checkConditions($conditions){
	        unset($conditions['limit']);
	        if(!empty($conditions)){
		       	return true;
	        }
	        else{
		        return false;
	        }
        }
        
        
        public function executeConditions($conditions){
	        //execute WHERE CONDITIONS
	        $condition = '';
	        if($conditions['WHERE']){
		        $no_and = true;
		        foreach($conditions['WHERE'] as $where){
			        $condition.=($no_and) ? '' : ' AND ';
			        if($where['oper'] == 'IN'){
				        $condition.= $where['column'].' '.$where['oper'].' ('.$where['value'].')';   
			        }else{
				    	$condition.= $where['column'].$where['oper'].'"'.$where['value'].'"';  
			        }
			        
			      	$no_and = false;
		        }
		        
	        }
	        if($conditions['ORDER']){
		        $order = ' ORDER BY '.$conditions['ORDER']['field'].' '.$conditions['ORDER']['by'];
		        
	        }
	        if($condition){
	       			$array['where'] = $condition;
	        }
	        if($order){
	        		$array['order'] = $order;
	        }
	        return $array;
	        
        }
        
        
        public function executeArgs($args){
	        sort($args);
	       	for($i=0;$i<count($args);$i++){
		       	if(empty($args[$i])){
			     unset($args[$i]);
			     continue;  
			    }
		        $args[$i]= 'a.'.$args[$i]; 
	        }
	        return implode(",", $args);
        }
        
        
        public function getCount(){
	        $table = $this->table; 
	        $SQL = "SELECT COUNT(*) FROM $table";
	        $a = $this->driver->select($SQL);
	        return $a[0][0];
        }
        
        public function getAllId($conditions = false){
	        $table = $this->table; 
	        $SQL = "SELECT id FROM $table";
	        if($conditions){
		         $conditions_where = $this->executeConditions($conditions); 
		         $conditions_where = $conditions_where['where'];
	        	 $SQL.=" WHERE $conditions_where ";
	        }
	       	$a = $this->driver->select($SQL);
	        return $a;
        }
        
        public function insertInto($condition){
	        $date_unix = strtotime("now");
			$date = $today = date("j n Y");
	        $SQL = "INSERT INTO bm_entity  (unix_date,date) VALUES ('$date_unix ','$date')";
	        $this->driver->insert($SQL);
	        $entityId = $this->driver->lastEntityId();
	        $table= $this->table;
	        $colums = 'id';
	        $values =  $entityId;
	        foreach($condition as $key=>$value){
		      
		    	   $colums .=",".$key;
		    	   $values .= ',"'.$value.'"';
	        }
	        
	        $SQL = "INSERT INTO $table ($colums) VALUES ($values)";
	        $this->driver->insert($SQL);
	        
	        
        }
        
        public function save($data,$conditions){
	        
	       
	        $conditions = $this->executeConditions($conditions);
	        $conditions_where = $conditions['where'];
	        $table = $this->table;
	        
	        foreach($data as $key=>$value){
		      
		    	   
		    	   $values[]= $key.'=\''.$value.'\'';
	        }
	        $values = implode(',',$values);
	        //echo $conditions_where;
	        $SQL = "UPDATE $table SET $values WHERE $conditions_where";
	        $this->driver->update($SQL);
	           
        }
        
        
        public function delete($condition){
	        $conditions = $this->executeConditions($condition);
	        $conditions_where = $conditions['where'];
	        $table = $this->table;
	        $entities = DB_PREFIX.'entity';
	        
	        $SQL = "UPDATE $entities AS e LEFT JOIN $table AS a ON e.entityId = a.id SET e.delete = 1 
	        	    WHERE $conditions_where";
	        	   
	        //echo $SQL;	  
	        $this->driver->update($SQL);	    

	        
	        
        }
        
        
        

      
      
      
      
      
      
      
  }
?>