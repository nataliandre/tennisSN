{extends file=$EXTENDER}
{block name="body"}
    {strip}
        <div class="wrapper">
            <div class="well auth__form">
                <form name="startRegistrationForm" class="form-horizontal" method="post" action="{$actionNextStep}">
                    <fieldset>
                        <legend class="align-center">Контактние данние</legend>
                        <p>Шаг 1 из 3</p>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Имя</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="name" placeholder="Имя">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Фамилия</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control"  name="surname" placeholder="Фамилия">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Телефон</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control"  name="phone" placeholder="Телефон">
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


        <script>
            var validator = new FormValidator('startRegistrationForm', [{
                name: 'name',
                display: 'required',
                rules: 'min_length[2]'
            },
            {
                name: 'email',
                rules: 'valid_email',
                depends: function() {
                    return Math.random() > .5;
                }
            }], function(errors, event) {
                if (errors.length > 0) {
                    alert('errors');
                }
            });
        </script>
    {/strip}
{/block}