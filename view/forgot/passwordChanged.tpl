{extends file=$EXTENDER}
{block name="body"}
{strip}
<div class="wrapper">
    <div class="well auth__form">
        <div class="flashmessagesContainer">
            {$FlashMessage}
        </div>

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <a href="{$linkLoginAction}" class="btn btn-primary">Войти в личный кабинет</a>
            </div>
        </div>
    </div>
</div>
{/strip}
{/block}