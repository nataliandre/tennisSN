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
define('LinkRegistrationSecondStepAction',HTTP_SERVER.'registration/confirmMail');
define('LinkRegistrationThirdStepAction',HTTP_SERVER.'registration/addPhoto');
define('LinkRegistrationFoursStepAction',HTTP_SERVER.'registration/otherInfo');
define('linkLoginAction',HTTP_SERVER.'auth/login');
define('linkDoLoginAction',HTTP_SERVER.'auth/doLoginAction');

define('linkMainPage',HTTP_SERVER);
define('linkMainAuthentificatedPage',HTTP_SERVER.'user/page');
define('mailTemplateLink',HTTP_SERVER.'mailTemplates/');



//userPageLink
define('linkUserCompetitions',HTTP_SERVER.'user/competition');
define('linkUserGames',HTTP_SERVER.'user/games');
define('linkUserMessages',HTTP_SERVER.'user/messages');
define('linkUserPhotos',HTTP_SERVER.'user/photos');
define('linkUserSends',HTTP_SERVER.'user/sends');
define('linkUserTunes',HTTP_SERVER.'user/tunes');

define('linkLogOut',HTTP_SERVER.'auth/logOut');




//TRUE LINKS

//ADMIN DIR

//varibles


/*LANGUAGE SETTINGS*/



define('LANG','language');
define('DEF_LANGUAGE','ru/');
// define the languages^ wich would you use in your project, it must be seem to folder names in DIR_LANGUAGE
define('LANGUAGES','en,ua,ru,pl');



define('TRANSLATION_FOLDER','translation');


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