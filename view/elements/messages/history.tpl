{strip}
    <div class="clear"></div>
<div class="row">
    <div class="col-xs-10 {if $message->senderId eq $currentUser}
    messagesLeft
    {else}
    messagesRigth
    {/if}
    ">
        {$message->body}
    </div>
    <div class="col-xs-2">
        {if $message->data eq $currentDate}
            {$message->time}
        {else}
            {$message->data}
        {/if}
    </div>
</div>
    <div class="clear"></div>
{/strip}