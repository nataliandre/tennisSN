{strip}
    <div class="clear"></div>
    <div class="row messageUserContainer">
        <div class="col-xs-2">
            {include file="../images/avatar.tpl" routeUserPage=$routeUserPage class="avatarFriendsMessages" User=$message['infoUser'] }
        </div>
        <div class="col-xs-7 ">
            <a href="{$routeUserPage|cat:$message['infoUser']->id}">
                <p class="sm-txt">
                    {$message['infoUser']->name} {$message['infoUser']->surname}
                </p>
            </a>
            <a href="{$messageSendLink|cat:$message['infoUser']->id}">
            <p class="sm-txt messageUserFrame">
                  {if $message['lastMessage']->sender_id eq $currentUser}Вы: {/if}
                 {$message['lastMessage']->body}
            </p>
            </a>
        </div>
        <div class="col-xs-3">
            <p class="sm-txt">{$message['lastMessage']->time}</p>
            <p class="sm-txt">{$message['lastMessage']->data}</p>
        </div>
    </div>
    <div class="clear"></div>
{/strip}

