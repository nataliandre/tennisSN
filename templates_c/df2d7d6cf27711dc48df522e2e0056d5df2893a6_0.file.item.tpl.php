<?php
/* Smarty version 3.1.28, created on 2016-05-25 02:35:40
  from "/home/umr1/webstudiomandarin.com/glorytest/view/products/item.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5744e54cb1da96_22971679',
  'file_dependency' => 
  array (
    'df2d7d6cf27711dc48df522e2e0056d5df2893a6' => 
    array (
      0 => '/home/umr1/webstudiomandarin.com/glorytest/view/products/item.tpl',
      1 => 1464132901,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../products/main_tpl.tpl' => 1,
  ),
),false)) {
function content_5744e54cb1da96_22971679 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "body", array (
  0 => 'block_17293469915744e54cb049d0_52210549',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, $_smarty_tpl->tpl_vars['EXTENDER']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, true);
}
/* {block 'body'}  file:view/products/item.tpl */
function block_17293469915744e54cb049d0_52210549($_smarty_tpl, $_blockParentStack) {
?>


    <section class="bg__pink__scale padding-20"></section>

    <section class="bg__bog__poster">
        <div class="wrapper">



            <div class="item-description--text">
                <?php echo $_smarty_tpl->tpl_vars['product']->value['textfile'];?>

            </div>

        </div>
    </section>


    <div class="wrapper">
        <div class="row">
            <div class="col-xs-5">
                <div class="image-holder">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['preview'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
"/>
                </div>
                <p class="item__price"><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</p>
            </div>
            <div class="col-xs-7">
                <div class="well box-shadow-3">
                <h2><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</h2>
                    <p><?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>
</p>
                    <h4>Заказать "<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
" прямо сейчас !</h4>
                    <form action="<?php echo $_smarty_tpl->tpl_vars['actionForm']->value;?>
" method="post">
                    <input type="hidden" name="productName" />
                    <div class="form-group">
                        <input class="form-control input-lg" name="orderName" placeholder="Ваше имя"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control input-lg" name="orderMail" placeholder="Ваше e-mail"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control input-lg" name="orderPhone" placeholder="Ваше номер телефона"/>
                    </div>
                    <div class="form-group">
                        <p class="small-letters">Особенности <?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</p>
                        <textarea name="orderSpec" class="form-control input-lg"  rows="4"></textarea>
                    </div>
                    <div class="form-group align-center">
                        <button class="btn btn-success btn-lg">Заказать</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <section class="bg__pink__scale padding-20">
        <div class="wrapper colorFFF">
            <h1>СМОТРИТЕ ТАКЖЕ</h1>
        </div>
    </section>
    <section >
        <div class="wrapper">
            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../products/main_tpl.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('products'=>$_smarty_tpl->tpl_vars['products']->value), 0, false);
?>

        </div>
    </section>



<?php
}
/* {/block 'body'} */
}
