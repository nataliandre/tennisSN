{extends file=$EXTENDER}
{block name="body"}
    {strip}
        <div class="wrapper">
            <div class="well auth__form">
                <form class="form-horizontal" method="post" action="{$actionForm}">
                    <legend class="align-center">Смена пароля</legend>
                    <div class="flashmessagesContainer">
                        {$FlashMessage}
                    </div>
                    <input type="hidden" name="userId" value="{$userId}"/>
                    <input type="hidden" name="confirmCode" value="{$confirmCode}"/>


                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">Новый пароль</label>
                        <div class="col-lg-8">
                            <input type="password" {if !$accessToChangePassword}disabled="disabled"{/if} class="form-control" name="passwd1" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">Подтверждение</label>
                        <div class="col-lg-8">
                            <input type="password" {if !$accessToChangePassword}disabled="disabled"{/if} class="form-control" name="passwd2" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8">
                            <button type="submit" {if !$accessToChangePassword}disabled="disabled"{/if} class="btn btn-primary">Продолжить</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    {/strip}
{/block}