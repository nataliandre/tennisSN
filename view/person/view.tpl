{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}
        <div class="row">
            <div class="col-xs-4">
                <div class="well well-sm" >

                    <div class="avatar__image__holder">
                        {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage class="avatarMainPage" User=$user }
                    </div>
                    <a href="" class="btn btn-success btn_sm width-parent">Заявку на игру</a>
                    <a href="{$linkMessagesHistory|cat:$user->id}" class="btn btn-default btn-sm width-parent">Сообщение</a>
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
            </div>


        </div>
        <div class="col-xs-8">
            <div class="well well-sm">
                <p>{$user->name} {$user->surname}</p>
                <hr/>
                <div class="user__information">


                </div>
            </div>

            <div class="well well-sm">
                <p class="sm-txt">Фотографии</p>
                <div class="thrumb-photo">
                    {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage  User=$user }
                </div>
            </div>

            <div class="well well-sm">
                <p class="sm-txt">Достижения</p>

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