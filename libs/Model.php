<?php
  class Model {
  public $tables;
  //services varibles
  public $telegram;
  
    
    
    
    
    
  public function __construct() {
      
        
        
  }


  public function deleteEmptyElement($ARRAY){
        foreach ($ARRAY as $key => $value){
            if($value->id == 0){
                unset($ARRAY[$key]);
            }
        }
        return $ARRAY;
  }
   
   
         
  public function initSQLTroub($string){
    $str = str_replace('\'','',$string);
    return str_replace('"','',$string);
  }
  
  public function file_get_content($file){
	  
	  
	  $fp = fopen('body/'.$file.'.txt', "r");
	  $mytext = '';
      while(!feof($fp)) { 
	    $mytext.= fgets($fp);
	  } 
	  fclose($fp);
	  return $mytext;
  }
  
   public function file_set_content($content,$file){
	  
	  
	  $fp = fopen('body/'.$file.'.txt',  'w');
	  fwrite($fp,$content);
	  fclose($fp);
	 
  }
        
     
     
     public function translite($phrase){
        $str2     = array('А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я','а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',' ','і','ї','Ї','І','&#8217','(',')','+');
        $str      = array('a','b','v','g','d','e','e','gh','z','i','y','k','l','m','n','o','p','r','s','t','u','f','h','c','ch','sh','sch','y','y','y','e','yu','ya','a','b','v','g','d','e','e','gh','z','i','y','k','l','m','n','o','p','r','s','t','u','f','h','c','ch','sh','sch','y','y','y','e','yu','ya','','i','i','I','I','','-','','-');
        return      str_replace($str2,$str,$phrase);
     }
     
        
        
        public function explodeSQLArray($arrays,$id=false){
          $i=0;
          $key_appearence=false;
          foreach($arrays as $array){
            foreach($array as $key=>$value){
              if(!is_int($key)){
                $key = explode('_',$key);
              
                if($key[0] == 'id' && $id && $key_appearence==false){
                   $array_return[$i][$key[$i]] = $value;
                   $key_appearence =  true;
                }
                else{
                  $array_return[$i][end($key)] = $value;
                }
              }
            }
            $i++;
          }
          
          return $array_return;
          
        }
        
        
        public function arrayNotStartNull($array){
          if(count($array) == 1){
            foreach($array[0] as $key => $value){
              $return_array[$key] = $value;
              }
              return $return_array;
          }else{
            return $array;
          }
        }
      
      
      
      
      
        
        
        
        
        
        
         
   public function generate_password()
      {
    $arr = array('a','b','c','d','e','f',
                 'g','h','i','j','k','l',
                 'm','n','o','p','r','s',
                 't','u','v','x','y','z',
                 'A','B','C','D','E','F',
                 'G','H','I','J','K','L',
                 'M','N','O','P','R','S',
                 'T','U','V','X','Y','Z',
                 '1','2','3','4','5','6',
                 '7','8','9','0');
    // Генерируем пароль
    $pass = "";
    for($i = 0; $i < 10; $i++)
    {
      // Вычисляем случайный индекс массива
      $index = rand(0, count($arr) - 1);
      $pass .= $arr[$index];
    }
    return $pass;
    
   
  }
  
  
     
    public function installMessage($array){
              extract($array, EXTR_PREFIX_SAME, "hr");

              ob_start();
              /*
               *
               *1 - success
               *2 - error
               *
               *
               */
              
              
              
              require('view/message/'.$array['type'].'.php');
        
              $this->output = ob_get_contents();
  
              ob_end_clean();
              
              return $this->output; 
      
      
      
    }
    
    
    
       
    
    
    public function searchInStr($line,$symbol){
 
          $len = strlen($line);
          $count = 0;
          for($i=0;$i<$len;$i++){
                  if($line[$i]==$symbol) $count++;
          }
        if($count>=1){
            return true;
        }else{
            return false;
        }
      
    }
    

public function checkArray($array,$value,$key = false){
     
  
  
   for($i=0;$i<count($array);$i++){
	   
	   
	   $elem = ($key) ? $array[$i][$key] : $array[$i];
		   
		   
		   
		   
    if($elem == $value){
      return true;
    }
    else{
      continue;
    }
    return false;
   } 
  
  
}


  
  
  public function setTelegram($message){
    require_once('services/telegram.php');
    $this->telegram = new Telegram($message);  
  }
  
  
  

  
  public function getRandomRange($c,$array){
	  for($j = 0; $j<$c; $j++){
		  
	  		$i = rand(0, count($array));
	  		if(!empty($array[$i][0])){
		  		$a[$j] = $array[$i][0];
		  		unset($array[$i]);
		  		sort($array);
	  		}
	  		else{
		  		$j--;
		  		continue;
	  		}
	  }
	  return $a;
  }
  
  
    
    public function prepare($source){
	    return str_replace("\\'","'",$source);  
    }
     public function preparet($source){
	     return str_replace('\\"','"',$source);
     }
    
     
    public function deprepare($source){
	    return str_replace("'","\\'",$source);  
    }
    
     public function depreparet($source){
	     return str_replace('"','\"',$source);
     }



      /**
       * @param $route
       * @return string
       */
      public  function makeUrlToController($route){
          return HTTP_SERVER.$route;
      }




  }
?>