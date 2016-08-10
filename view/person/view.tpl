{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}
        <div class="row">
            <div class="col-xs-4">
                <div class="well well-sm" >

                    <div class="avatar__image__holder">
                        {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage class="avatarMainPage" User=$user }
                    </div>
                    {if $user->canCatchRequests}
                        <a href="{$newGameRequestLink|cat:$user->id}" class="btn btn-success btn-sm width-parent">Заявку на игру</a>
                    {/if}
                    <a href="{$linkMessagesHistory|cat:$user->id}" class="btn btn-default btn-sm width-parent">Сообщение</a>



                    {if $Config->useFriends()}
                            {if !$isInFriends}
                            <a href="#" id="addToFriendButton" class="btn btn-default btn-sm width-parent">
                                {if $hasFriendsRequest}
                                    Заявка отправлена
                                {else}
                                    Добавить в друзья
                                {/if}
                            </a>
                            {else}
                                 <a href="#" id="deleteFromFriends" class="btn btn-danger btn-sm width-parent">
                                    Удалить з друзей
                                 </a>
                            {/if}
                    {/if}



            </div>

            {if $user->isTrainer}
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">{Language::userTrainerHeadInfo($LANGUAGE)}</h3>
                    </div>
                    <div class="panel-body">
                        {Language::userTrainerHeadContent($LANGUAGE)}
                    </div>
                </div>
            {/if}

            {if $UserPlan}
                <h5 >График игры</h5>
                <div class="well well-sm">
                    {foreach from=$UserPlan item=$UserP}
                        {if !$UserP->playDay}
                        <div>
                            <p class="sm-txt">{$UserP->title}</p>
                            <p> c {$UserP->minValue} до {$UserP->maxValue} </p>
                        </div>
                        {/if}
                    {/foreach}
                </div>

            {/if}

        </div>
        <div class="col-xs-8">
            <h4>{$user->name} {$user->surname}</h4>
            <h5 >{Language::userInfoTitle($LANGUAGE)}</h5>
            <div class="well well-sm">
                {include file='../elements/containers/userOptions.tpl' user=$user }
            </div>
            <h5 >{Language::photoTitle($LANGUAGE)}</h5>
            <div class="well well-sm">
                {if $userPhotos}
                    {include file="../elements/images/photosGrid.tpl" imageClass="userPagePhotosGridImageHolder" images=$userPhotos photosPath=$photosPath}
                {else}
                    {include file="../elements/empty/tpl.tpl" text=Language::noPhotos($LANGUAGE)}
                {/if}
            </div>
            <h5 >{Language::userAchievementTitle($LANGUAGE)}</h5>
            <div class="well well-sm">
                {include file="../user/tabCampionships.tpl"}
            </div>
        </div>
        </div>


        {if $fIsAuthentificatedUser}

        <script>
            var userLink = "{$ajaxController}";
            var userId = {$user->id};
            var sessionHash = "{$sessionHash}";
            var startFunction = {if $hasFriendsRequest} true {else} false {/if};

        </script>

        {else}
        {/if}


    {/strip}
{/block}