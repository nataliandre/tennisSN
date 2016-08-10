{extends file=$EXTENDER_TPL}
{block name="userBody"}
{strip}
    <h4>Все люди</h4>
    {include file="../elements/forms/searchFriendsForm.tpl" searchAction=$searchAction value=$QUERY }
    <div class="well well-sm">
        {if !$users}
            {include file="../elements/empty/tpl.tpl" text=Language::emptyFriendsSearchQuery($LANGUAGE)}
        {else}
        <div class="usersContainer">
            {foreach from=$users item=$User}
                <div>
                    {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage class="avatarFriends" User=$User }

                    <a href="{$routeUserPage|cat:$User->id}">
                        <p class="sm-txt">{$User->name} {$User->surname}</p>
                    </a>

                </div>
            {/foreach}
        </div>
        {/if}
    </div>

{/strip}
{/block}