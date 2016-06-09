{extends file=$EXTENDER}
{block name="body"}
    {strip}
        <div class="wrapper">
            <div class="well auth__form">
            <form class="form-horizontal">
                <fieldset>
                    <legend class="align-center">Вход на сайт</legend>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-lg-2 control-label">Пароль</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Пароль">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
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