<ul class="nav nav-pills sm-txt">
    <li class="
        {if $activeTab eq 'ClubMain' }
            active
        {/if}
    ">
        <a href="{$ClubLinks->linkToClubView|cat:$club->id}">{Language::clubButtonView($LANGUAGE)}</a>
    </li>


    <li class="
        {if $activeTab eq 'ClubPhotos' }
            active
        {/if}
    ">
        <a href="{$ClubLinks->linkToClubPhotos|cat:$club->id}">{Language::clubButtonPhotos($LANGUAGE)}</a>
    </li>

    {if $club->userId eq $currentUser}
        <li class="
            {if $activeTab eq 'ClubTunes' }
                active
            {/if}
        ">
            <a href="{$ClubLinks->linkToClubTunes|cat:$club->id}">{Language::clubButtonTunes($LANGUAGE)}</a>
        </li>
    {/if}
</ul>