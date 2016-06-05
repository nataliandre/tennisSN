<?php
/* Smarty version 3.1.28, created on 2016-05-25 03:43:52
  from "/home/umr1/webstudiomandarin.com/glorytest/view/common/body.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5744f54862f4c7_12420167',
  'file_dependency' => 
  array (
    'e4abaf86cd878e71cbc29d13860d25e8910f5b3b' => 
    array (
      0 => '/home/umr1/webstudiomandarin.com/glorytest/view/common/body.tpl',
      1 => 1464136941,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../elementy/title.txt' => 1,
    'file:../elementy/description.txt' => 1,
    'file:../elementy/keywords.txt' => 1,
  ),
),false)) {
function content_5744f54862f4c7_12420167 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="ru"><head>
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../elementy/title.txt", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
 </title>
    <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
 <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../elementy/description.txt", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
" > 
        <meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
 <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../elementy/keywords.txt", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
" > 
    <?php echo $_smarty_tpl->tpl_vars['styles']->value;?>

    <link rel="shortcut icon" href="/custom/img/favicon.ico" type="image/x-icon">
     <link rel="stylesheet" href="/shadowbox/shadowbox.css">
    <link rel="stylesheet" href="/standart/css/bootstrap.css">
    <link rel="stylesheet" href="/custom/css/css.css">
    <link rel="stylesheet" href="/custom/css/fonts.css">

 	<meta name="Robots" content="ALL">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="revisit-after" content="3 days">
     <?php echo '<script'; ?>
 src="/standart/js/jquery-2.1.4.min.js" ><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/standart/js/bootstrap.js" ><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/standart/js/jquery.form.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/custom/js/translite.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/markitup/jquery.markitup.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" type="text/css" href="/markitup/skins/markitup/style.css" />
<link rel="stylesheet" type="text/css" href="/markitup/sets/default/style.css" />
<?php echo '<script'; ?>
 type="text/javascript" src="/markitup/sets/default/set.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" type="text/css" href="/markitup/sets/html/style.css" />
<?php echo '<script'; ?>
 type="text/javascript" src="/markitup/sets/html/set.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/shadowbox/shadowbox.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
/*Shadowbox.init();*/
<?php echo '</script'; ?>
>   
    <?php echo '<script'; ?>
 type="text/javascript" src="/tinymce/tinymce.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/tinymce/jquery.tinymce.min.js"><?php echo '</script'; ?>
>
    

   
   <link rel="stylesheet" href="http://rhetoric-hall.com.ua/custom/css/style.css">
   
      <link rel="icon" href="" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
  </head>
  <body>



  <body>
  <header>
      <div class="wrapper">
          <ul class="top__menu">
              <li class="logo__top__holder"><a href="/"><span class="logo__top"></span></a></li>
              <li><h4><a href="/contacts">Контакты</a></h4></li>
              <li><h4><a href="/products/catalog">Продукты</a></h4></li>
              <li><h4><a href="/delivery">Доставка</a></h4></li>
              <li><h4><a href="/map">Ми на карте</a></h4></li>
              
          </ul>
          <div class="top__info align-center">
              <h4>Звоните прямо сейчас!</h4>
             <p>8 (495) 902-58-86</p><p>8 (495) 902-58-84</p><p>8 (495) 902-63-01</p>
          </div>
      </div>
  </header>


  <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "body", array (
  0 => 'block_12186672405744f5486263a0_35923502',
  1 => false,
  3 => 0,
  2 => 0,
));
?>



  <footer class="no-select">
      <div class="wrapper">

          <div class="inline-block mdl margin-right-60px"><a href="/"><span class="logo__top"></span></a></div>

          <div class="inline-block mdl margin-right-60px">
              <h4>Качество производство</h4>
                <h4 class="footer__h4__pading">стрейч пленки</h4>
          </div>
          <div class="inline-block mdl margin-right-60px">
              <p>Раскажите друзьям!</p>

          <?php echo '<script'; ?>
 type="text/javascript">(function() {
                  if (window.pluso)if (typeof window.pluso.start == "function") return;
                  if (window.ifpluso==undefined) { window.ifpluso = 1;
                      var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                      s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                      s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                      var h=d[g]('body')[0];
                      h.appendChild(s);
                  }})();<?php echo '</script'; ?>
>
          <div class="pluso" data-background="transparent" data-options="big,round,line,horizontal,nocounter,theme=02" data-services="vkontakte,odnoklassniki,facebook,twitter,google,linkedin,livejournal"></div>
          </div>
          </div>
  </footer>



  </body></html>
<?php }
/* {block 'body'}  file:view/common/body.tpl */
function block_12186672405744f5486263a0_35923502($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'body'} */
}
