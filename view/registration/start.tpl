{extends file=$EXTENDER}
{block name="body"}
    {strip}
    <div class="wrapper">
        <div class="well auth__form">
            <form class="form-horizontal">
                <fieldset>
                    <legend class="align-center">Регистрация</legend>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control"  placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label">Имя</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control"  placeholder="Имя">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label">Фамилия</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control"  placeholder="Фамилия">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label">Телефон</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control"  placeholder="Телефон">
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