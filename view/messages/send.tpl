{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}
        <h4>{Language::messageHistory($LANGUAGE)}"{$secondUser->name}"</h4>
        <div class="well well-sm">

            <div class="messagesContainer">
                <div class="messagesLine">
                    {foreach from=$userMessages item=$message}
                        {include file="../elements/messages/history.tpl" message=$message currentUser=$currentUser->id }
                    {/foreach}

                </div>
            </div>


            <div class="row messageSendContainer">
                <div class="col-xs-2">
                    {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage class="avatar80x80" User=$currentUser }
                    <a href="{$routeUserPage|cat:$currentUser->id}"><p class="xsm-txt">{$currentUser->name} {$currentUser->surname}</p></a>
                </div>
                <div class="col-xs-8">
                    <p class="xsm-txt">{Language::messageSendTitle($LANGUAGE)}:</p>
                    <textarea class="form-control textaresMessageBody"
                              placeholder="" id="textMessageBody"
                    ></textarea>
                    <a href="#" id="sendMessage" class="btn btn-success btnSendMessage" data-user="{$secondUser->id}">
                        {Language::buttonSendTitle($LANGUAGE)}
                    </a>
                </div>
                <div class="col-xs-2">
                    {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage class="avatar80x80" User=$secondUser }
                    <a href="{$routeUserPage|cat:$secondUser->id}"><p class="xsm-txt">{$secondUser->name} {$secondUser->surname}</p></a>
                </div>
            </div>
        </div>
        <script>
            var sessionHash = "{$sessionHash}";
            var userLink = "{$ajaxController}";
        </script>

        <div class="modal" id="ModalMessageError">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <p class="sm-txt">{Language::errorTitle($LANGUAGE)}</p>
                    </div>
                    <div class="modal-body">
                        <p class="sm-txt">{Language::emptyMessageError($LANGUAGE)}</p>
                    </div>
                </div>
            </div>
        </div>
    {/strip}
{/block}