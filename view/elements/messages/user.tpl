{strip}
    <a href="{$messageSendLink|cat:$message['infoUser']->id}">
    <div class="row messageUserContainer">
        <div class="col-xs-2">
            {include file="../images/avatar.tpl" routeUserPage=false class="avatarFriendsMessages" User=$message['infoUser'] }
        </div>
        <div class="col-xs-7 ">

                <p class="sm-txt">
                    {$message['infoUser']->name} {$message['infoUser']->surname}
                </p>


            <p class="sm-txt messageUserFrame">
                  {if $message['lastMessage']->sender_id eq $currentUser}Вы: {/if}
                 {$message['lastMessage']->body}
            </p>

        </div>
        <div class="col-xs-3">
            <p class="sm-txt">{$message['lastMessage']->time}</p>
            <p class="sm-txt">{$message['lastMessage']->data}</p>
        </div>
    </div>
    </a>
{/strip}

