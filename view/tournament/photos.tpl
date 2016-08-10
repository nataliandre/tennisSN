{extends file=$EXTENDER_TPL}
{block name="userBody"}
{strip}
    <h4>{$tournament->title}</h4>
    {include file="../tournament/tournamentNav.tpl" TournamentLinks=$TournamentLinks tournament=$tournament activeTab=$activeTab Language=$Language}
    {if $tournament->headId eq $currentUser}
        <a href="{$TournamentLinks->linkAddNewPhoto|cat:$tournament->id}" class="btn btn-info btnAdd">
            {Language::addPhotoButton($LANGUAGE)}
        </a>
    {/if}
    <div class="well well-sm">
        {if !$tournamentPhotos}
            {include file="../elements/empty/tpl.tpl" text=Language::noPhotos($LANGUAGE)}
        {else}
            {include file="../elements/images/photosGrid.tpl" imageClass="userPhotosGridImageHolder" images=$tournamentPhotos photosPath=$photosPath}
        {/if}

    </div>
{/strip}
{/block}