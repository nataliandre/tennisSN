<?php
/* Smarty version 3.1.28, created on 2016-05-21 17:21:51
  from "/home/umr1/webstudiomandarin.com/glorytest/view/admin/login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57406eff0700a1_07024912',
  'file_dependency' => 
  array (
    'a9136d5e6fe461888181f7d063584d2cc4f38bae' => 
    array (
      0 => '/home/umr1/webstudiomandarin.com/glorytest/view/admin/login.tpl',
      1 => 1463840506,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57406eff0700a1_07024912 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "body", array (
  0 => 'block_38679956157406eff068e43_07614640',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, $_smarty_tpl->tpl_vars['EXTENDER']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, true);
}
/* {block 'body'}  file:view/admin/login.tpl */
function block_38679956157406eff068e43_07614640($_smarty_tpl, $_blockParentStack) {
?>

<section class="bg__pink__scale padding-20">
<div class="wrapper colorFFF">
<div class="centrall__document__form">
<form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['admin_route']->value;?>
" >

        <div class="row">
        <div class="form-group">
            <label for="icon_prefix">Логин</label>
            <input id="icon_prefix" type="text" name="login" class="validate form-control">

        </div>
        <div class="form-group">
            <label for="icon_telephone">Пароль</label>
            <input id="icon_telephone" type="tel" name="password" class="validate form-control">
        </div>
            <p><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
        <div class="align-center form-group">
	    <button  type="submit" class="waves-effect waves-light btn">LOG IN</button>
	    </div>
</form>
</div>
</div>
</section>
<?php
}
/* {/block 'body'} */
}
