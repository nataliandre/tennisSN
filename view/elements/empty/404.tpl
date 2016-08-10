{if !$noWell}
<div class="well well-sm">
    <div class="notFoundContainer">
{/if}
        <img src="/custom/img/404.png" class="{$class}"/>
        {if $message}<p>{$message}</p>{/if}
{if !$noWell}
    </div>
</div>
{/if}