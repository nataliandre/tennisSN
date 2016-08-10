{strip}
{if $routeClubPage}
<a href="{$routeClubPage|cat:$Club->id}">
{/if}
    <img class="{$class}" src="{if !$Club->avatar}/custom/img/avatar.jpg{else}/files/images/trumb/{$Club->avatar}{/if}"/>
{if $routeClubPage}
</a>
{/if}
{/strip}