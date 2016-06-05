<?php
/* Smarty version 3.1.28, created on 2016-05-12 00:45:26
  from "/home/umr1/webstudiomandarin.com/glorytest/view/modules/courses.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5733a7f6db6317_53731404',
  'file_dependency' => 
  array (
    '6a521c68f7f30a8f8243c4ab98b8261282f4e72a' => 
    array (
      0 => '/home/umr1/webstudiomandarin.com/glorytest/view/modules/courses.tpl',
      1 => 1463002294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5733a7f6db6317_53731404 ($_smarty_tpl) {
?>
<h3 class="page__article__cards__title">Тренинги и курсы</h3>
<table class="page__table__courses">
					<thead>
						<tr>
						<td>Дата 
						</td>
						<td>ГОРОД                               
						</td>
						<td>ПРОграмма 
						</td>
						<td> ТРЕНЕР
						</td>
						
						<td> РЕГИСТРАЦИЯ
						</td>  
						</tr>
					</thead> 
					<tbody>
						
						<?php
$_from = $_smarty_tpl->tpl_vars['tranes']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_trane_0_saved_item = isset($_smarty_tpl->tpl_vars['trane']) ? $_smarty_tpl->tpl_vars['trane'] : false;
$_smarty_tpl->tpl_vars['trane'] = new Smarty_Variable();
$__foreach_trane_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_trane_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['trane']->value) {
$__foreach_trane_0_saved_local_item = $_smarty_tpl->tpl_vars['trane'];
?>
						<tr class="course" data-href="<?php echo $_smarty_tpl->tpl_vars['trane']->value['link'];?>
">
						<td><?php echo $_smarty_tpl->tpl_vars['trane']->value['date_load'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['trane']->value['city'];?>
                                   
						</td>
						<td> <?php echo $_smarty_tpl->tpl_vars['trane']->value['name'];?>
 
						</td>
						<td>    <?php echo $_smarty_tpl->tpl_vars['trane']->value['person'];?>
 
						</td>
						<td> 
							<a href="<?php echo $_smarty_tpl->tpl_vars['trane']->value['reg'];?>
"  target="_blank" class="btn-custom btn-main-inverse">Зарегистрироваться</a>
							
						
							
						</td>
						
						 
						</tr>
						
						<?php
$_smarty_tpl->tpl_vars['trane'] = $__foreach_trane_0_saved_local_item;
}
}
if ($__foreach_trane_0_saved_item) {
$_smarty_tpl->tpl_vars['trane'] = $__foreach_trane_0_saved_item;
}
?> 
						
					<?php if ($_smarty_tpl->tpl_vars['all_button']->value) {?>
						<tr >
							<td colspan="5" align="center" class="page__table__courses__all"> 
							<a href="<?php echo $_smarty_tpl->tpl_vars['TRANE_LINK']->value;?>
" class="btn-custom btn-main">Все тренинги и курсы</a>
							</td>
						</tr>
					
					<?php }?> 
						
					</tbody>
</table>	


<?php if ($_smarty_tpl->tpl_vars['admin']->value['trane_edit_menu']) {?>
<button data-course="0" class="btn btn-success btn-xs js__course__modal">
Создать курс</button>
<?php }?>		


<?php echo '<script'; ?>
>
	$('.page__table__courses tbody tr').click(function(){
		
		var href = $(this).attr('data-href');
		window.location.href = href;
		
	});
	
	
	
<?php echo '</script'; ?>
>

		
					
					  
			    
			    


<?php }
}
