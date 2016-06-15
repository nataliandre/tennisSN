{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}
        <div class="well well-sm">
            <p>История сообщений с "{$secondUser->name}"</p>
            <div class="messagesContainer">
                <div class="messagesLine">
                    {foreach from=$userMessages item=$message}
                        {include file="../elements/messages/history.tpl" message=$message currentUser=$currentUser->id }
                    {/foreach}

                </div>
            </div>
            <div class="row">
                <div class="col-xs-2">
                    {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage class="avatarFriendsMessages" User=$currentUser }
                </div>
                <div class="col-xs-8">
                    <div class="form-group">
                        <textarea class="form-control textaresMessageBody" id="textMessageBody"></textarea>
                    </div>
                    <a href="#" id="sendMessage" class="btn btn-success btn-sm" data-user="{$secondUser->id}">Отправить</a>
                </div>
                <div class="col-xs-2">
                    {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage class="avatarFriendsMessages" User=$secondUser }
                </div>
            </div>
        </div>
        <script>
            var sessionHash = "{$sessionHash}";
            var userLink = "{$ajaxController}";
        </script>
    {/strip}
{/block}