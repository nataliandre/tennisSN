<?php
/* Smarty version 3.1.28, created on 2016-05-12 00:45:26
  from "/home/umr1/webstudiomandarin.com/glorytest/view/articles/article_card.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5733a7f6d98dd5_43230914',
  'file_dependency' => 
  array (
    'f6bc926126b9d70f06783daff7fb1abd5848b26e' => 
    array (
      0 => '/home/umr1/webstudiomandarin.com/glorytest/view/articles/article_card.tpl',
      1 => 1463002281,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5733a7f6d98dd5_43230914 ($_smarty_tpl) {
$_from = $_smarty_tpl->tpl_vars['articles']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_article_0_saved_item = isset($_smarty_tpl->tpl_vars['article']) ? $_smarty_tpl->tpl_vars['article'] : false;
$_smarty_tpl->tpl_vars['article'] = new Smarty_Variable();
$__foreach_article_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_article_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$__foreach_article_0_saved_local_item = $_smarty_tpl->tpl_vars['article'];
?>
         
		 	<li class="page__article__cards__body">
						<a href="<?php echo $_smarty_tpl->tpl_vars['article']->value['link'];?>
" ><img src="<?php echo $_smarty_tpl->tpl_vars['article']->value['images'];?>
"/></a>
						<a href="<?php echo $_smarty_tpl->tpl_vars['article']->value['link'];?>
"><h4><?php echo $_smarty_tpl->tpl_vars['article']->value['name'];?>
</h4></a>
						<p>
							<?php echo $_smarty_tpl->tpl_vars['article']->value['smContent'];?>

						</p>
					
					</li>

<?php
$_smarty_tpl->tpl_vars['article'] = $__foreach_article_0_saved_local_item;
}
}
if ($__foreach_article_0_saved_item) {
$_smarty_tpl->tpl_vars['article'] = $__foreach_article_0_saved_item;
}
}
}
