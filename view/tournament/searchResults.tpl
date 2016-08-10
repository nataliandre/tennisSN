{extends file=$EXTENDER_TPL}
{block name="userBody"}
{strip}
    {include file="../elements/forms/searchClubForm.tpl" value=$QUERY searchAction=$searchAction }

    <div class="well well-sm">
        <div class="containerClubs">
            {foreach from=$tournaments item=$Tournament}
                <div class="cardClub">
                    {include file="{$routeAvatarTournamentTpl}" routeClubPage=$routeTournamentPage class="avatar80x80" Tournament=$Tournament }
                    <p class="cardTitle">{$Tournament->title}</p>
                </div>
            {/foreach}
        </div>

    </div>
{/strip}
{/block}