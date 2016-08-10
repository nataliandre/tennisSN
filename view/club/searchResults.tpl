{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}
        {include file="../elements/forms/searchTournamentForm.tpl" value=$QUERY searchAction=$searchAction }

        <div class="well well-sm">
            <div class="containerClubs">

                {foreach from=$clubs item=$Club}

                    <div class="cardClub">
                        {include file="{$routeAvatarClubsTpl}" routeClubPage=$routeClubPage class="avatarClubMid" Club=$Club }

                        <p class="cardTitle">{$Club->title}</p>
                    </div>
                {/foreach}
            </div>

        </div>
    {/strip}
{/block}