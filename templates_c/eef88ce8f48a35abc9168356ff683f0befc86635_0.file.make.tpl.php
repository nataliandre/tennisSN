<?php
/* Smarty version 3.1.28, created on 2016-05-26 01:21:23
  from "/home/umr1/webstudiomandarin.com/glorytest/view/order/make.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5746256322c9e9_10184441',
  'file_dependency' => 
  array (
    'eef88ce8f48a35abc9168356ff683f0befc86635' => 
    array (
      0 => '/home/umr1/webstudiomandarin.com/glorytest/view/order/make.tpl',
      1 => 1464214846,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../elements/progressLine.tpl' => 1,
    'file:../products/main_tpl.tpl' => 1,
  ),
),false)) {
function content_5746256322c9e9_10184441 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "body", array (
  0 => 'block_201371197857462563217585_66585485',
  1 => false,
  3 => 0,
  2 => 0,
));
?>



<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, $_smarty_tpl->tpl_vars['EXTENDER']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, true);
}
/* {block 'body'}  file:view/order/make.tpl */
function block_201371197857462563217585_66585485($_smarty_tpl, $_blockParentStack) {
?>

<section class="bg__pink__scale padding-20"> <div class="wrapper colorFFF align-center"> <h1>Спасибо за заказ</h1> <div><img src="/img/smiley_icon_white.png" width="100"></div> <h4>Номер вашего заказа: <?php echo $_smarty_tpl->tpl_vars['orderNum']->value;?>
</h4> <p>Следите за вашим заказом с помощью <a href="<?php echo $_smarty_tpl->tpl_vars['orderLinkFind']->value;?>
">функции слежения</a></p> </div> </section> <div class="wrapper align-center padding-tb-30px"><?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../elements/progressLine.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div> <section class="bg__pink__scale padding-20"> <div class="wrapper colorFFF"> <h1>СМОТРИТЕ ТАКЖЕ</h1> </div> </section> <section > <div class="wrapper"><?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../products/main_tpl.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('products'=>$_smarty_tpl->tpl_vars['products']->value), 0, false);
?>
</div> </section>
<?php
}
/* {/block 'body'} */
}
