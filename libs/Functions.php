<?php
  class Functions {
    public $prefix;
    
    
   public function __construct() {
   
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

      public function file_get_content($file){

          //echo 'view/elementy/'.$file.'.txt';
          $fp = fopen('view/elementy/'.$file.'.txt', "r");

          $mytext = '';
          while(!feof($fp)) {
              $mytext.= fgets($fp);
          }
          fclose($fp);
          //echo $mytext;
          return $mytext;
      }

      public function file_set_content($content,$file){


          $fp = fopen('view/elementy/'.$file.'.txt',  'w');
          fwrite($fp,$content);
          fclose($fp);

      }






      /* textualize functions */


      public function makeAroudQuotes($a){
          return '&#171;'.$a.'&#187;';
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






  }
?>