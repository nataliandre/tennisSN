{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}

        {include file="../elements/forms/searchClubForm.tpl" searchAction=$searchAction }
        <a href="{$addNewClubLink}" class="btn btn-info btnAdd">{Language::addClubTitle($LANGUAGE)}</a>

        <div class="well well-sm">
            <p class="partTitle">
                Клубы
            </p>

            {if !$Clubs}
                {include file="../elements/empty/tpl.tpl" text="У вас пока нет клубов"}
            {else}
                <div class="containerClubs">

                    {foreach from=$Clubs item=$Club}

                        <div class="cardClub">
                            {include file="{$routeAvatarClubsTpl}" routeClubPage=$routeClubPage class="avatarClubMid" Club=$Club }

                            <p class="cardTitle">{$Club->title}</p>
                        </div>
                    {/foreach}
                </div>
            {/if}

            <p class="partTitle">Созданые клубы:</p>

            {if $creatorClubs}
                <div class="containerClubs">
                {foreach from=$creatorClubs item=$Club}

                    <div class="cardClub">
                        {include file="{$routeAvatarClubsTpl}" routeClubPage=$routeClubPage class="avatarClubMid" Club=$Club }

                    <p class="cardTitle">{$Club->title}</p>
                    </div>
                {/foreach}
                </div>
            {else}
                {include file="../elements/empty/tpl.tpl" text="У вас пока нет созданых клубов"}
            {/if}

        </div>
    {/strip}
{/block}