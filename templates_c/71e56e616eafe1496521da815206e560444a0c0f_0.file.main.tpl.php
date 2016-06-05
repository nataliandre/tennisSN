<?php
/* Smarty version 3.1.28, created on 2016-05-24 02:55:47
  from "/home/umr1/webstudiomandarin.com/glorytest/view/products/main.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57439883526ba8_79771226',
  'file_dependency' => 
  array (
    '71e56e616eafe1496521da815206e560444a0c0f' => 
    array (
      0 => '/home/umr1/webstudiomandarin.com/glorytest/view/products/main.tpl',
      1 => 1464047744,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../products/main_tpl.tpl' => 1,
  ),
),false)) {
function content_57439883526ba8_79771226 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "body", array (
  0 => 'block_2119766234574398835216d1_60651211',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, $_smarty_tpl->tpl_vars['EXTENDER']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, true);
}
/* {block 'body'}  file:view/products/main.tpl */
function block_2119766234574398835216d1_60651211($_smarty_tpl, $_blockParentStack) {
?>

<section class="bg__pink__scale padding-20"></section>
<div class="wrapper">
   <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../products/main_tpl.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('products'=>$_smarty_tpl->tpl_vars['products']->value), 0, false);
?>

</div>
<section class="bg__pink__scale padding-20"></section>
<?php
}
/* {/block 'body'} */
}
