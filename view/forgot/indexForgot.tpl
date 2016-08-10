{extends file=$EXTENDER}
{block name="body"}
{strip}
<div class="wrapper">
    <div class="well auth__form">
        <form class="form-horizontal" method="post" action="{$actionForm}">
            <legend class="align-center">Восстановление пароля</legend>
            <div class="flashmessagesContainer">
                {$FlashMessage}
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Ваш Email</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary">Продолжить</button>
                </div>
            </div>


        </form>
    </div>
</div>
{/strip}
{/block}