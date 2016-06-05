<?php
/* Smarty version 3.1.28, created on 2016-05-25 03:30:31
  from "/home/umr1/webstudiomandarin.com/glorytest/view/order/status.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5744f227cc24d2_16102391',
  'file_dependency' => 
  array (
    'c4ba79e08b4bc275ddfcb08ec88c0dd4c98884c0' => 
    array (
      0 => '/home/umr1/webstudiomandarin.com/glorytest/view/order/status.tpl',
      1 => 1464136195,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../products/main_tpl.tpl' => 1,
  ),
),false)) {
function content_5744f227cc24d2_16102391 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


  
<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "body", array (
  0 => 'block_10342721915744f227cb14b1_27064843',
  1 => false,
  3 => 0,
  2 => 0,
));
?>



<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, $_smarty_tpl->tpl_vars['EXTENDER']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, true);
}
/* {block 'body'}  file:view/order/status.tpl */
function block_10342721915744f227cb14b1_27064843($_smarty_tpl, $_blockParentStack) {
?>
 
<section class="bg__pink__scale padding-20"> <div class="wrapper colorFFF align-center"> <h2>Заказ номер: <?php echo $_smarty_tpl->tpl_vars['orderNum']->value;?>
</h2> <div class="status--table"> <table class="table colorFFF"> <tbody> <tr> <td>Статус</td> <td><?php echo $_smarty_tpl->tpl_vars['order']->value->orderStatus;?>
</td> </tr> <tr> <td>Дата заказа</td> <td><?php echo $_smarty_tpl->tpl_vars['order']->value->orderTime;?>
</td> </tr> <tr> <td>Имя заказчика</td> <td><?php echo $_smarty_tpl->tpl_vars['order']->value->orderName;?>
</td> </tr> </tbody> </table> </div> </div> </section> <section class="bg__pink__scale padding-20"> <div class="wrapper colorFFF"> <h1>ЗАКАЖИТЕ ТАКЖЕ</h1> </div> </section> <section > <div class="wrapper"><?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../products/main_tpl.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('products'=>$_smarty_tpl->tpl_vars['products']->value), 0, false);
?>
</div> </section>
<?php
}
/* {/block 'body'} */
}
