{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}
        <h4> {Language::messagesTitle($LANGUAGE)}</h4>


        <div class="well well-sm">

            {if $userMessages eq false}
                {include file="../elements/empty/tpl.tpl" text="{Language::emptyMessageHistory($LANGUAGE)}"}
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