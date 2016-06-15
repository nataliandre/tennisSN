

{strip}
<a href="{$routeUserPage|cat:$User->id}">

    <img class="{$class}" src="{if $User->avatar eq ""}/custom/img/avatar.jpg{else}/files/images/trumb/{$User->avatar}{/if}"/>
</a>
{/strip}