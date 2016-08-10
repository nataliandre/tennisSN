{extends file=$EXTENDER}
{block name="body"}
    {strip}

        <div class="wrapper">
            <div class="well photo__form">
                <form class="form-horizontal" enctype="multipart/form-data" id="uploadAvatarForm" method="post" action="{$actionNextStep}">
                    <fieldset>
                        <legend class="align-center">Фото профиля</legend>
                        <p>Шаг 3 из 3</p>
                        <div class="flashmessagesContainer">
                            {$FlashMessage}
                        </div>
                        {include file="../elements/forms/uploadPhoto.tpl" avatarRoute=$avatarRoute formId="#uploadAvatarForm"}
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <input type="hidden" name="userId" value="{$idNewUser}">
                                {if $dataRequest->type}
                                    <input type="hidden" name="type" value="{$dataRequest->type}" />
                                {/if}
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