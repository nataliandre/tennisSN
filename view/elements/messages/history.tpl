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
        {$message->data}
    </div>
</div>
    <div class="clear"></div>
{/strip}