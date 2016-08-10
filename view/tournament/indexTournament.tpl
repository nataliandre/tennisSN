{extends file=$EXTENDER}
{block name="body"}
{strip}
<div class="wrapper">
<h4>Турниры</h4>
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
</div>

{/strip}
{/block}