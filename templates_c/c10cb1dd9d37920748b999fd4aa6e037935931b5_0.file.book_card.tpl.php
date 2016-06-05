<?php
/* Smarty version 3.1.28, created on 2016-05-14 01:20:39
  from "/home/umr1/webstudiomandarin.com/glorytest/view/libs/book_card.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57365337854ea7_95147198',
  'file_dependency' => 
  array (
    'c10cb1dd9d37920748b999fd4aa6e037935931b5' => 
    array (
      0 => '/home/umr1/webstudiomandarin.com/glorytest/view/libs/book_card.tpl',
      1 => 1463002289,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57365337854ea7_95147198 ($_smarty_tpl) {
$_from = $_smarty_tpl->tpl_vars['books']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_book_0_saved_item = isset($_smarty_tpl->tpl_vars['book']) ? $_smarty_tpl->tpl_vars['book'] : false;
$_smarty_tpl->tpl_vars['book'] = new Smarty_Variable();
$__foreach_book_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_book_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['book']->value) {
$__foreach_book_0_saved_local_item = $_smarty_tpl->tpl_vars['book'];
?>
         
		 	<li class="page__article__cards__body book__card">
						<div class="book__image__holder">
							<a href="<?php echo $_smarty_tpl->tpl_vars['book']->value['link'];?>
" ><img src="<?php echo $_smarty_tpl->tpl_vars['book']->value['image'];?>
"/></div></a>
						<a href="<?php echo $_smarty_tpl->tpl_vars['book']->value['link'];?>
"><h4><?php echo $_smarty_tpl->tpl_vars['book']->value['name'];?>
</h4></a>
						<p>
							<?php echo $_smarty_tpl->tpl_vars['article']->value['smContent'];?>

						</p>
					
					</li>

<?php
$_smarty_tpl->tpl_vars['book'] = $__foreach_book_0_saved_local_item;
}
}
if ($__foreach_book_0_saved_item) {
$_smarty_tpl->tpl_vars['book'] = $__foreach_book_0_saved_item;
}
}
}
