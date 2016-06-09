<?php
// HTTP
define('HTTP_SERVER', 'http://tennis.webstudiomandarin.com/');
define('HTTP_SERVER_R', 'http://tennis.webstudiomandarin.com/');
date_default_timezone_set('Europe/Kiev');




define('UILANG','common/main');
define('DOC_ROOT',$_SERVER['DOCUMENT_ROOT']);



// DIR

define('DIR_IMAGE', '/img/');
define('DIR_LANGUAGE','/language/');




//ROUTES , define TAB_ACTIVE_..(T_A_..) to see the tab changes in menu 
define('LinkRegistrationFirstStepAction',HTTP_SERVER.'registration/start');
define('linkLoginAction',HTTP_SERVER.'auth/login');
define('linkMainPage',HTTP_SERVER);


//TRUE LINKS

//ADMIN DIR

//varibles


/*LANGUAGE SETTINGS*/



define('LANG','language');
define('DEF_LANGUAGE','ru/');
// define the languages^ wich would you use in your project, it must be seem to folder names in DIR_LANGUAGE
define('LANGUAGES','en,ua,ru,pl');



/* write this in .htaccess*/




//ACTIONS

// LOG






// SYSTEM CONST




//coordinats



//
 //CAPTCHA remember 
 
 // templates elements
define('STAND','standart/');
define('CUST','custom/');





?>