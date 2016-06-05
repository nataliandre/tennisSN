<?php
// HTTP
define('HTTP_SERVER', 'http://glorytest.webstudiomandarin.com/');
define('HTTP_SERVER_R', 'http://glorytest.webstudiomandarin.com/');
date_default_timezone_set('Europe/Kiev');
// HTTPS
define('HTTPS_SERVER', 'http://glorytest.webstudiomandarin.com/');
define('HTTPS_SERVER_CLEAR', '');



define('UILANG','common/main');
define('DOC_ROOT',$_SERVER['DOCUMENT_ROOT']);



// DIR

define('DIR_IMAGE', '/img/');
define('DIR_LANGUAGE','/language/');
define('DIR_IMAGE_BOOKS','/img/preview/');
define('DIR_IMAGE_PRODUCTS','/img/preview/');
define('DIR_DOWNLOAD_BOOKS','http://4businessmind.com/files/books/');



//ROUTES , define TAB_ACTIVE_..(T_A_..) to see the tab changes in menu 



//TRUE LINKS

define('ROUTE_ADMIN', HTTP_SERVER.'admin');
define('ROUTE_TRANES', 'trane');
define('ROUTE_TRANES_VIEW', 'trane/view/');
define('ROUTE_TRANES_ADD', 'trane/add/');
define('INSTITUT__LINK','pro-institut-retorici');
define('CONTACTS__LINK','kontakty');




define('ROUTE_MAKE_ORDER', HTTP_SERVER.'order/make');
define('ROUTE_FIND_ORDER', HTTP_SERVER.'order/find');


define('ARTICLE_LINK','articles/category/');
define('ARTICLE_VIEW_LINK','articles/view/');
define('ARTICLE_ADD_LINK','articles/add/');


define('PRODUCT_CATALOG_LINK','products/catalog/');
define('PRODUCT_ITEM_LINK','products/item/');


define('MEDIA_LINK_ADD','new-media');
define('BOOKS_LINK','libs/');
define('BOOKS_LINK_VIEW','kniga/');
define('BOOK_ADD_LINK','libs/add');
define('ADMIN_UPLOAD','loader/');
define('ADMIN_FILES','loader/files');
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



// DB



// SYSTEM CONST

define('SHOW_PAGES',5);



define('ADMIN__LOGIN','admin12345');
define('ADMIN__PASSWORD','12345');


//coordinats



//
 //CAPTCHA remember 
 
 // templates elements
define('STAND','standart/');
define('CUST','custom/');





?>