{extends file=$EXTENDER_CLUB}
{block name="clubBody"}
{strip}

    {if $club->userId eq $currentUser}
        <a href="{$ClubLinks->linkAddNewPhoto|cat:$club->id}" class="btn btn-info btnAdd">
            {Language::addPhotoButton($LANGUAGE)}
        </a>
    {/if}
    <div class="well well-sm">
        {if !$clubPhotos}
            {include file="../elements/empty/tpl.tpl" text=Language::noPhotos($LANGUAGE)}
        {else}
            {include file="../elements/images/photosGrid.tpl" imageClass="userPhotosGridImageHolder" images=$clubPhotos photosPath=$photosPath}
        {/if}

    </div>
{/strip}
{/block}