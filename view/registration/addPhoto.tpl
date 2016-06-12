{extends file=$EXTENDER}
{block name="body"}
    {strip}

        <div class="wrapper">
            <div class="well photo__form">
                <form class="form-horizontal" method="post" action="{$actionNextStep}">
                    <fieldset>
                        <legend class="align-center">Фото профиля</legend>
                        <p>Шаг 3 из 3</p>
                        <!-- Upload image and data -->
                        <div class="avatar-upload">
                            <input type="hidden" class="avatar-src" name="avatar_src">
                            <input type="hidden" class="avatar-data" name="avatar_data">
                            <label for="avatarInput">Local upload</label>
                            <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                        </div>

                        <!-- Crop and preview -->
                        <div class="row">
                            <div class="col-md-9">
                                <div class="avatar-wrapper"></div>
                            </div>
                            <div class="col-md-3">
                                <div class="avatar-preview preview-lg"></div>
                                <div class="avatar-preview preview-md"></div>
                                <div class="avatar-preview preview-sm"></div>
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