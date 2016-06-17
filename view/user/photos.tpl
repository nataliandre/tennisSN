{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}
        <div class="well well-sm">
            <p>Фотогалерея <a href="{$addNewPhotoLink}" class="btn btn-primary btn-sm">
                    <span class="glyphicon glyphicon-plus">
                    </span>
                    Добавить фото
                </a>
            </p>

            {if !$userPhotos}
                {include file="../elements/empty/tpl.tpl" text="У вас пока нет фотографий"}
            {else}

            {/if}

        </div>
    {/strip}
{/block}