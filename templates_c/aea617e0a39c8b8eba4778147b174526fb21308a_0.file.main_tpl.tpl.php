<?php
/* Smarty version 3.1.28, created on 2016-05-24 01:08:43
  from "/home/umr1/webstudiomandarin.com/glorytest/view/products/main_tpl.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57437f6b3e6b52_61170185',
  'file_dependency' => 
  array (
    'aea617e0a39c8b8eba4778147b174526fb21308a' => 
    array (
      0 => '/home/umr1/webstudiomandarin.com/glorytest/view/products/main_tpl.tpl',
      1 => 1464041318,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57437f6b3e6b52_61170185 ($_smarty_tpl) {
?>
<ul class="products--cards">
<?php
$_from = $_smarty_tpl->tpl_vars['products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_product_0_saved_item = isset($_smarty_tpl->tpl_vars['product']) ? $_smarty_tpl->tpl_vars['product'] : false;
$_smarty_tpl->tpl_vars['product'] = new Smarty_Variable();
$__foreach_product_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_product_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$__foreach_product_0_saved_local_item = $_smarty_tpl->tpl_vars['product'];
?>
<li>
	<div class="row">
		<div class="col-xs-5">
			<img class="bubble-img" src="<?php echo $_smarty_tpl->tpl_vars['product']->value['preview'];?>
">
		</div>
		<div class="col-xs-6">


				<h4><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</h4>
				<p><?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>
</p>
				<a href="<?php echo $_smarty_tpl->tpl_vars['product']->value['tid'];?>
" class="btn-glory">ПОСМОТРЕТЬ</a>

		</div>
	</div>
</li>
<?php
$_smarty_tpl->tpl_vars['product'] = $__foreach_product_0_saved_local_item;
}
}
if ($__foreach_product_0_saved_item) {
$_smarty_tpl->tpl_vars['product'] = $__foreach_product_0_saved_item;
}
?>
</ul>



 
	     
	     

     
     


<?php }
}
