<?php
/* Smarty version 3.1.28, created on 2016-05-14 01:20:39
  from "/home/umr1/webstudiomandarin.com/glorytest/view/libs/main.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5736533782ff93_85679764',
  'file_dependency' => 
  array (
    '1ee6edefb0749da2e57134b1818e07a21d2be41b' => 
    array (
      0 => '/home/umr1/webstudiomandarin.com/glorytest/view/libs/main.tpl',
      1 => 1463002290,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../libs/book_card.tpl' => 1,
  ),
),false)) {
function content_5736533782ff93_85679764 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


  
<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "body", array (
  0 => 'block_2057432111573653378244a8_26978532',
  1 => false,
  3 => 0,
  2 => 0,
));
?>



<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, $_smarty_tpl->tpl_vars['EXTENDER']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, true);
}
/* {block 'body'}  file:view/libs/main.tpl */
function block_2057432111573653378244a8_26978532($_smarty_tpl, $_blockParentStack) {
?>
 
<article class="page__padding__article"> <h3 class="page__article__cards__title">Лучшие книги по риторике и ораторскому искусству</h3> <ul class="page__article__cards"><?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../libs/book_card.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('books'=>$_smarty_tpl->tpl_vars['books']->value), 0, false);
?>
</ul><?php echo $_smarty_tpl->tpl_vars['button__save__media']->value;?>
</article>
<?php
}
/* {/block 'body'} */
}
