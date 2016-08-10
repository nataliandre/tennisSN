{extends file=$EXTENDER_TPL}
{block name="userBody"}
{strip}
    <div class="well well-sm">
    <p>Добавить фото</p>
    <form class="form-horizontal" enctype="multipart/form-data" id="uploadPhotoForm" method="post" action="{$actionNextStep}">
        <fieldset>
            <div class="flashmessagesContainer">
                {$FlashMessage}
            </div>
            {if $dataRequest->type}
                <input type="hidden" name="type" value="{$dataRequest->type}">
            {/if}
            {if $dataRequest->entityId}
                <input type="hidden" name="entityId" value="{$dataRequest->entityId}">
            {/if}

            {include file="../elements/forms/uploadPhoto.tpl" avatarRoute=$photoRoute formId="#uploadPhotoForm"}
            {if $photoRoute}
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
            {/if}
        </fieldset>
    </form>
    </div>
{/strip}
{/block}