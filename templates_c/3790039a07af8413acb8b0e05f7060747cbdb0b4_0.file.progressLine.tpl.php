<?php
/* Smarty version 3.1.28, created on 2016-05-26 01:20:14
  from "/home/umr1/webstudiomandarin.com/glorytest/view/elements/progressLine.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5746251e90be70_09650077',
  'file_dependency' => 
  array (
    '3790039a07af8413acb8b0e05f7060747cbdb0b4' => 
    array (
      0 => '/home/umr1/webstudiomandarin.com/glorytest/view/elements/progressLine.tpl',
      1 => 1464214807,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5746251e90be70_09650077 ($_smarty_tpl) {
?>
<h1>Как ми работаем?</h1>
<h3 class="center-og-xxlg" id="work-cycle-date">1-3 день</h3>
<h3 class="center-pad20" id="work-cycle">Заказ взят в работу</h3>
<div id="work-cycle-progress" class="progress progress-striped  active">
<div class="progress-bar progress-bar-warning" style=" "></div>
</div>
    
        <?php echo '<script'; ?>
>

            var turns = ['Заказ взят в работу','на производстве ', 'окончание производства','на складе','Загрузка'];
            var turns_days = ['1-3 день', '3-5 день','5-8 день','9-12 день','12-14 день'];
            var current = 0,line = 0;
            setInterval(function(){
                current++;
                line+=25;
                if(current>= turns.length){
                    current = 0;
                    line = 0;

                }
                $('#work-cycle').html(turns[current]);
                $('#work-cycle-date').html(turns_days[current]);
                $('#work-cycle-progress .progress-bar').css('width',line+'%');


            },3000);




        <?php echo '</script'; ?>
>
    
<?php }
}
