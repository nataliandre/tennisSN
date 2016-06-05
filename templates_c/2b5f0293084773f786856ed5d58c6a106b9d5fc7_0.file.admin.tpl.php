<?php
/* Smarty version 3.1.28, created on 2016-05-21 17:22:56
  from "/home/umr1/webstudiomandarin.com/glorytest/view/admin/admin.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57406f4039bb78_19437807',
  'file_dependency' => 
  array (
    '2b5f0293084773f786856ed5d58c6a106b9d5fc7' => 
    array (
      0 => '/home/umr1/webstudiomandarin.com/glorytest/view/admin/admin.tpl',
      1 => 1463840571,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57406f4039bb78_19437807 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "body", array (
  0 => 'block_131651114957406f40388826_85995473',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, $_smarty_tpl->tpl_vars['EXTENDER']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, true);
}
/* {block 'body'}  file:view/admin/admin.tpl */
function block_131651114957406f40388826_85995473($_smarty_tpl, $_blockParentStack) {
?>

<section class="bg__pink__scale padding-20">
    <div class="wrapper colorFFF">
  
  <article class="page__padding__article top">
  
  <div >Вітаємо в <a href="https://github.com/nataliandre/simple_engine">SimpleEngine</a></div>
  
  
 <div class="admin__buttons">
 
 <a href="<?php echo $_smarty_tpl->tpl_vars['ADMIN_UPLOAD']->value;?>
" class="btn btn-success">Загрузить файли</a>
 <a href="<?php echo $_smarty_tpl->tpl_vars['ADMIN_FILES']->value;?>
" class="btn btn-default">Смотреть файлы</a>
 <a href="/drupal/files/mail.csv" download class="btn btn-default">Скачать контакти</a>
 <a href="<?php echo $_smarty_tpl->tpl_vars['admin_exit_link']->value;?>
" class="btn btn-danger" >Выход</a>



<form method="post" action="http://rhetoric-hall.com.ua/admin">
<h3 class="page__article__cards__title">Название сайта</h3>
<textarea class="form-control" rows="6" name="title"><?php echo $_smarty_tpl->tpl_vars['title_t']->value;?>
</textarea>
<h3 class="page__article__cards__title">Лого</h3>
<textarea class="form-control" rows="3" name="logo"><?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
</textarea>
<h3 class="page__article__cards__title">Дескрипшн</h3>
<textarea class="form-control" rows="6" name="description"><?php echo $_smarty_tpl->tpl_vars['description_t']->value;?>
</textarea>
<h3 class="page__article__cards__title">Ключевие слова</h3>
<textarea class="form-control" rows="6" name="keywords"><?php echo $_smarty_tpl->tpl_vars['keywords_t']->value;?>
</textarea>
<h3 class="page__article__cards__title">Соц сети</h3>
 <div class="">
	 <textarea class="form-control" rows="5" name="sieti"><?php echo $_smarty_tpl->tpl_vars['sieti']->value;?>
</textarea>
</div>
<h3 class="page__article__cards__title">Сми</h3>
 <div class="">
	 <textarea class="form-control" rows="5" name="smi"><?php echo $_smarty_tpl->tpl_vars['smi']->value;?>
</textarea>
</div>
<h3 class="page__article__cards__title">Отзиви</h3>
 <div class="">
	 <textarea class="form-control" rows="5" name="otzivi"><?php echo $_smarty_tpl->tpl_vars['otzivi']->value;?>
</textarea>
</div>



<h3 class="page__article__cards__title">Футер</h3>
 <div class="">
	 <textarea id="markItUpI" class="form-control" rows="5" name="footer"><?php echo $_smarty_tpl->tpl_vars['footer']->value;?>
</textarea>
</div>
<h3 class="page__article__cards__title">Гавная изображения</h3>
 <div class="">
	 <input type="text" class="form-control" name="hero_image" value="<?php echo $_smarty_tpl->tpl_vars['hero_image']->value;?>
"/>
</div>


<button type="submit" class="btn btn-success">Сохранить</button>
</form>




 </div>
</article>
    </div>
</section>

<?php
}
/* {/block 'body'} */
}
