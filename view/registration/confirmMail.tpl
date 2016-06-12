{extends file=$EXTENDER}
{block name="body"}
    {strip}

        <div class="wrapper">
            <div class="well auth__form">
                <form class="form-horizontal" method="post" action="{$actionNextStep}">
                    <fieldset>
                        <legend class="align-center">Аутентификация</legend>
                        <p>Шаг 2 из 3</p>
                        <div class="form-group" id="errorMessages">

                        </div>

                        <div class="form-group">
                            <label for="inputEmail"  class="col-lg-4 control-label">Код подтверждения</label>
                            <div class="col-lg-8">
                                <input type="text" id="activationCodeChecker" class="form-control" name="activationCode" placeholder="код">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-4 control-label">Ваш пароль</label>
                            <div class="col-lg-8">
                                <input type="password" class="form-control" name="passwd1" placeholder="Ваш пароль">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-4 control-label">Повторите пароль</label>
                            <div class="col-lg-8">
                                <input type="password" class="form-control"  name="passwd2" placeholder="Повторите пароль">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <input type="hidden" name="userId" value="{$idNewUser}">
                                <button type="reset" class="btn btn-default">Очистить</button>
                                <button type="submit" class="btn btn-primary">Продолжить</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    {/strip}
{/block}