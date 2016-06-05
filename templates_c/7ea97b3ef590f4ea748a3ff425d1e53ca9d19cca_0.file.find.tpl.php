<?php
/* Smarty version 3.1.28, created on 2016-05-25 03:40:07
  from "/home/umr1/webstudiomandarin.com/glorytest/view/order/find.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5744f467474761_92869516',
  'file_dependency' => 
  array (
    '7ea97b3ef590f4ea748a3ff425d1e53ca9d19cca' => 
    array (
      0 => '/home/umr1/webstudiomandarin.com/glorytest/view/order/find.tpl',
      1 => 1464136803,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../products/main_tpl.tpl' => 1,
  ),
),false)) {
function content_5744f467474761_92869516 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "body", array (
  0 => 'block_1832519945744f467467978_99587696',
  1 => false,
  3 => 0,
  2 => 0,
));
?>



<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, $_smarty_tpl->tpl_vars['EXTENDER']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, true);
}
/* {block 'body'}  file:view/order/find.tpl */
function block_1832519945744f467467978_99587696($_smarty_tpl, $_blockParentStack) {
?>
 
<section class="bg__pink__scale padding-20"> <div class="wrapper colorFFF align-center"> <div class="order__form--search"> <h2>Искать заказ прямо сейчас</h2> <div class="form-group"> <input class="form-control" placeholder="№ заказа" name="inputOrderNum" /> </div> <div class="form-group"> <button class="btn btn-success btn-lg btnSearchOrder">Искать заказ</button> </div> </div> </div> </section>
<?php echo '<script'; ?>
 type="text/javascript">
$('.btnSearchOrder').click(function(){
   var order = $('[name="inputOrderNum"]').val();
    var url      = window.location.href;
    url = url+='/'+order;
    window.location.href = url;
});

<?php echo '</script'; ?>
>
<section class="bg__pink__scale padding-20"> <div class="wrapper colorFFF"> <h1>СМОТРИТЕ ТАКЖЕ</h1> </div> </section> <section > <div class="wrapper"><?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../products/main_tpl.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('products'=>$_smarty_tpl->tpl_vars['products']->value), 0, false);
?>
</div> </section>
<?php
}
/* {/block 'body'} */
}
