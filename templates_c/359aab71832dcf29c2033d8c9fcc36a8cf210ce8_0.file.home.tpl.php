<?php
/* Smarty version 3.1.28, created on 2016-05-26 18:04:32
  from "/home/umr1/webstudiomandarin.com/glorytest/view/common/home.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_574710806d79a1_12040691',
  'file_dependency' => 
  array (
    '359aab71832dcf29c2033d8c9fcc36a8cf210ce8' => 
    array (
      0 => '/home/umr1/webstudiomandarin.com/glorytest/view/common/home.tpl',
      1 => 1464216074,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../products/main_tpl.tpl' => 1,
  ),
),false)) {
function content_574710806d79a1_12040691 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "body", array (
  0 => 'block_1456596979574710806bfef8_65938641',
  1 => false,
  3 => 0,
  2 => 0,
));
?>



<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, $_smarty_tpl->tpl_vars['EXTENDER']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, true);
}
/* {block 'body'}  file:view/common/home.tpl */
function block_1456596979574710806bfef8_65938641($_smarty_tpl, $_blockParentStack) {
?>

	<section class="div__straitch__bg"> <div class="wrapper"> <ul class="aling__first"> <li class="video"> </li> <li> <div class="first__div__text"> <h1>Gloria.com</h1> <h3>Качество производство</h3> <h3 class="first__Div__h3__pading">стрейч пленки</h3> </div> </li> </ul> </div> </section> <section class="bg__pink__scale padding-20"> <div class="wrapper colorFFF align-center"> <h3>Смотрите статус своего заказа</h3> <a class="btn btn-success" href="/order/find">Искать заказ</a> </div> </section> <section class="bg__bog__poster"> <div class="wrapper"> <p class="description--text">Наша компания предлагает товары производственного потребления: стрейч (стретч) пленку, скотч,пузырьковую пленку, ПВД, перчатки, пакеты, мусорные мешки, гофрокартон и другую упаковку.Особое внимание уделяем стрейч (стретч) пленке «Сильвер». Для изготовления пленки этого сортаиспользуется максимально очищенное сырье и первичные материалы. Продукт хорошо выглядит, имеетсвойства соизмеримые с пленкой из первичного сырья.</p> </div> </section> <section class="bg__pink__scale padding-20"> <div class="wrapper colorFFF"> <h1>НАШИ ПРОДУКТЫ</h1> </div> </section> <section > <div class="wrapper"><?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../products/main_tpl.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('products'=>$_smarty_tpl->tpl_vars['products']->value), 0, false);
?>
</div> </section> <section class="bg__pink__scale padding-20"> <div class="wrapper colorFFF"> <h1>НОВОСТИ</h1> <!--<ul> <li class="forth__div__parts"> <p class="news__title">Банки лишеные лицензии</p> <p class="news__date">12.01.2015</p> <p class="news__continue">читать далее ></p> </li> <li class="forth__div__parts"> <p class="news__title">Банки лишеные лицензии</p> <p class="news__date">12.01.2015</p> <p class="news__continue">читать далее ></p> </li> </ul>--> </div> </section>
<?php
}
/* {/block 'body'} */
}
