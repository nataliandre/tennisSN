{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}
        <h4> {Language::friendsTitle($LANGUAGE)}</h4>
        {include file="../elements/forms/searchFriendsForm.tpl" searchAction=$searchAction }
        <a href="{$friendsRequestsLink}" class="btn btn-info btnAdd">
            {Language::friendsTitleRequest($LANGUAGE)}
            {if $iCountNewFriends}
                (+{$iCountNewFriends})
            {/if}
        </a>

        <div class="well well-sm">
            {if !$friendsUsers}
                {include file="../elements/empty/tpl.tpl" text=Language::emptyFriendsUser($LANGUAGE)}
            {else}
            <div class="usersContainer">
                {foreach from=$friendsUsers item=$User}
                    <div class="align-center">
                        {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage class="avatarFriends" User=$User }
                        <a href="{$routeUserPage|cat:$User->id}"><p class="sm-txt">{$User->name} {$User->surname}</p></a>
                    </div>
                {/foreach}
            </div>
            {/if}
        </div>







    {/strip}
{/block}