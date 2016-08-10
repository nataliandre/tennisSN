{extends file=$EXTENDER_TPL}
{block name="userBody"}
{strip}

    <h4> {Language::friendsRequestsTitle($LANGUAGE)}</h4>

        <div class="well well-sm">

            {if $friendsRequest}
                <div class="usersContainer">
                {foreach from=$friendsRequest item=$User}
                    <div class="align-center">
                        <a id="" data-user="{$User->id}" href="#" class="btn btn-success btnAdd confirmUserAdd"> Добавить</a>
                        {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage class="avatarFriends" User=$User }
                        <a href="{$routeUserPage|cat:$User->id}"><p class="sm-txt">{$User->name} {$User->surname}</p></a>

                    </div>
                {/foreach}
                <script>
                    var sessionHash = "{$sessionHash}";
                    var userLink = "{$ajaxController}";
                </script>
                </div>
            {else}
                {include file="../elements/empty/tpl.tpl" text=Language::noFriendsRequests($LANGUAGE)}
            {/if}

        </div>

{/strip}
{/block}