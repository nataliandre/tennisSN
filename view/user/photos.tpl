{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}
        <h4 >{Language::photoTitle($LANGUAGE)}:</h4>
        <a href="{$addNewPhotoLink}" class="btn btn-info btnAdd">{Language::addPhotoButton($LANGUAGE)}</a>

        <div class="well well-sm">
            {if !$userPhotos}
                {include file="../elements/empty/tpl.tpl" text=Language::noPhotos($LANGUAGE)}
            {else}
                {include file="../elements/images/photosGrid.tpl" imageClass="userPhotosGridImageHolder" images=$userPhotos photosPath=$photosPath}
            {/if}

        </div>
    {/strip}
{/block}