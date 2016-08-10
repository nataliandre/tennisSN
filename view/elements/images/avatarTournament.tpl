{strip}
{if $routeTournamentPage}
<a href="{$routeTournamentPage|cat:$Tournament->id}">
{/if}
    <img class="{$class}" src="{if !$Tournament->avatar}/custom/img/avatar.jpg{else}/files/images/trumb/{$Tournament->avatar}{/if}"/>
{if $routeTournamentPage}
</a>
{/if}
{/strip}