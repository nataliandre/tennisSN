{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}
        <div class="well well-sm">
            <p>Друзья</p>
            <div class="usersContainer">
                {foreach from=$friendsUsers item=$User}
                    <div>
                        {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage class="avatarFriends" User=$User }
                        <a href="{$routeUserPage|cat:$User->id}">
                            <p class="sm-txt">{$User->name} {$User->surname}</p>
                        </a>

                    </div>


                {/foreach}

            </div>




            {if $friendsRequest}
                <p>Заявки в друзья</p>
                <div class="usersContainer">
                    {foreach from=$friendsRequest item=$User}
                        <div>
                            {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage class="avatarFriends" User=$User }
                            <a href="{$routeUserPage|cat:$User->id}">
                                <p class="sm-txt">{$User->name} {$User->surname}</p>
                            </a>
                            <a id="" data-user="{$User->id}" href="#" class="btn btn-success bnt-sm confirmUserAdd">
                               Добавить
                            </a>
                        </div>


                    {/foreach}
                    <script>
                        var sessionHash = "{$sessionHash}";
                        var userLink = "{$ajaxController}";
                    </script>
                </div>



            {/if}


            <p>Все люди</p>
            <div class="usersContainer">
            {foreach from=$allUsers item=$User}
               <div>
                   {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage class="avatarFriends" User=$User }

                   <a href="{$routeUserPage|cat:$User->id}">
                       <p class="sm-txt">{$User->name} {$User->surname}</p>
                   </a>

               </div>
            {/foreach}
            </div>
        </div>
    {/strip}
{/block}