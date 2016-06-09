{extends file=$EXTENDER}
{block name="body"}
<section class="bg__pink__scale padding-20">
<div class="wrapper colorFFF">
<div class="centrall__document__form">
<form method="POST" action="{$admin_route}" >

        <div class="row">
        <div class="form-group">
            <label for="icon_prefix">Логин</label>
            <input id="icon_prefix" type="text" name="login" class="validate form-control">

        </div>
        <div class="form-group">
            <label for="icon_telephone">Пароль</label>
            <input id="icon_telephone" type="tel" name="password" class="validate form-control">
        </div>
            <p>{$error}</p>
        <div class="align-center form-group">
	    <button  type="submit" class="waves-effect waves-light btn">LOG IN</button>
	    </div>
</form>
</div>
</div>
</section>
{/block}

