{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}
        <div class="well well-sm">
            <p>Сообщения</p>
            {if $userMessages eq false}
                <h4>У вас пока нет сообщений</h4>
            {else}
                <div class="userMessagesContainer">
                    {foreach from=$userMessages item=$message }
                        {include file="../elements/messages/user.tpl" routeUserPage=$routeUserPage routeAvatarTpl=$routeAvatarTpl messageSendLink=$messageSendLink message=$message  currDate=$currentDate currentUser=$currentUser->id }
                    {/foreach}
                </div>
            {/if}

        </div>
    {/strip}
{/block}