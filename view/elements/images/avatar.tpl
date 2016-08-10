

{strip}
{if $routeUserPage}
<a href="{$routeUserPage|cat:$User->id}">
{/if}
    <img class="{$class}" src="{if $User->avatar eq ""}/custom/img/avatar.jpg{else}/files/images/trumb/{$User->avatar}{/if}"/>
    {if $routeUserPage}
    </a>
    {/if}
{/strip}