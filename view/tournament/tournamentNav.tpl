<ul class="nav nav-pills sm-txt">
    <li class="
    {if $activeTab eq 'TournamentView' }
    active
    {/if}
    ">
        <a href="{$TournamentLinks->linkToTournamentView|cat:$tournament->id}">{Language::tournamentButtonView($LANGUAGE)}</a>
    </li>


    <li class="
    {if $activeTab eq 'TournamentPhotos' }
    active
    {/if}
    ">
        <a href="{$TournamentLinks->linkToTournamentPhotos|cat:$tournament->id}">{Language::clubButtonPhotos($LANGUAGE)}</a>
    </li>
    <li class="
    {*{if $activeTab eq 'TournamentTable' }*}
    {*active*}
    {*{/if}*}
    {*">*}
        {*<a href="{$TournamentLinks->linkToTournamentTable|cat:$tournament->id}">{Language::tournamentButtonTable($LANGUAGE)}</a>*}
    {*</li>*}
    {if $tournament->headId eq $currentUser}
        <li class="
         {if $activeTab eq 'TournamentTunes' }
         active
         {/if}
        ">
            <a href="{$TournamentLinks->linkToTournamentTunes|cat:$tournament->id}">{Language::tournamentButtonTunes($LANGUAGE)}</a>
        </li>
    {/if}
</ul>