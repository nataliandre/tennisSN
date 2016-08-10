<ul class="nav nav-pills sm-txt">


    <li class="
    {if $activeTab eq 'FastGames' }
    active
    {/if}
    ">
        <a href="{$GamesLinks->linkToFastGames}">Быстрые встречи</a>
    </li>



    <li class="
    {if $activeTab eq 'GamesIncomingRequests' }
    active
    {/if}
    ">
        <a href="{$GamesLinks->linkToIncomingRequests}">{Language::gamesIncomingTitle($LANGUAGE)}</a>
    </li>


    <li class="
    {if $activeTab eq 'GamesOutgoingRequests' }
    active
    {/if}
    ">
        <a href="{$GamesLinks->linkToOutgoingRequests}">{Language::gamesOutgoingTitle($LANGUAGE)}</a>
    </li>
    <li class="
    {if $activeTab eq 'GamesResults' }
    active
    {/if}
    ">
        <a href="{$GamesLinks->linkToGamesResults}">{Language::gamesResultsTitle($LANGUAGE)}</a>
    </li>

</ul>