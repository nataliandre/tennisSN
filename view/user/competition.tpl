{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}

        {include file="../elements/forms/searchTournamentForm.tpl" searchAction=$searchAction }

        <a href="{$addNewCompetition}" class="btn btn-info btnAdd">Добавить турнир</a>


        <div class="well well-sm">
            <p class="partTitle">
                Участвие в турнирах
            </p>

            {if !$userTournaments}
                {include file="../elements/empty/tpl.tpl" text="У вас пока нет турниров"}
            {else}
                <div class="containerClubs">

                    {foreach from=$userTournaments item=$Tournament}

                        <div class="cardClub">
                            {include file="{$routeAvatarTournamentTpl}" routeClubPage=$routeTournamentPage class="avatar80x80" Tournament=$Tournament }
                            <p class="cardTitle">{$Tournament->title}</p>
                        </div>
                    {/foreach}
                </div>
            {/if}


            <p class="partTitle">
                Администрирование турниров
            </p>
            {if !$userTournamentsAdministrate}
                {include file="../elements/empty/tpl.tpl" text="У вас пока нет турниров"}
            {else}
                <div class="containerClubs">

                    {foreach from=$userTournamentsAdministrate item=$Tournament}

                        <div class="cardClub">
                            {include file="{$routeAvatarTournamentTpl}" routeClubPage=$routeTournamentPage class="avatar80x80" Tournament=$Tournament }

                            <p><a href="{$routeTournamentPage|cat:$Tournament->id}" class="sm-txt">{$Tournament->title}</a></p>
                        </div>
                    {/foreach}
                </div>
            {/if}


        </div>
    {/strip}
{/block}