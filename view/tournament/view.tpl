{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}
        <h4>{$tournament->title}</h4>

        {include file="../tournament/tournamentNav.tpl" TournamentLinks=$TournamentLinks tournament=$tournament activeTab=$activeTab Language=$Language}

        <div class="row rowAligner">

            <div class="col-xs-8">
                <div class="well well-sm">

                    <div class="clubInformationContainer">
                        <p>{$tournament->info}</p>
                        <hr/>
                        <p>Адрес клуба: {$tournament->location}</p>
                        <p>Город: {$tournament->city_id->title}</p>

                    </div>
                </div>

                <div class="well well-sm">
                    <p class="partTitleSm">{Language::photoTitle($LANGUAGE)}</p>
                    {include file="../elements/images/photosGrid.tpl" imageClass="userPagePhotosGridImageHolder" images=$tournamentPhotos photosPath=$photosPath}
                    <a href="{$TournamentLinks->linkToTournamentPhotos|cat:$tournament->id}" class="btn btn-info btnMore">
                        {Language::allPhotoTitle($LANGUAGE)}
                    </a>
                </div>

                <div class="well well-sm align-center">
                    {if !$isTakePart}
                        {include file="{$route404tpl}" noWell=true class="image100x100 margin15px"}
                        {if $buttonTakePart}
                            <div class="btn btn-sm btn-success fs">{Language::takePart($LANGUAGE)}</div>
                        {else}
                            <p class="sm-txt">{Language::takePartIfAutorize($LANGUAGE)}</p>
                        {/if}
                    {/if}
                </div>


                <div class="well well-sm">
                    <p class="partTitleSm">Участники турнира</p>
                </div>
            </div>


            <div class="col-xs-4">
                <div class="well well-sm" >
                    <div class="avatar__image__holder">
                        {include file="{$routeAvatarTournamentTpl}"  class="avatarMainPage" Tournament=$tournament }
                    </div>
                    {if $tournament->headId eq $currentUser}
                        <a href="{$TournamentLinks->linkAddAvatarPhoto|cat:$tournament->id}" class="btn btn-info btnAdd">
                            {Language::addPhotoButton($LANGUAGE)}
                        </a>
                    {/if}
                </div>

                <div class="well well-sm" >
                    <p class="partTitleSm">Организаторы турнира</p>
                    <div class="usersSmallContainer">
                        <div>
                            {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage class="avatarUsersSmallContainer" User=$clubCreator }
                            <a href="{$routeUserPage|cat:$clubCreator->id}">
                                <p >
                                    {$clubCreator->name} {$clubCreator->surname}
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    {/strip}
{/block}