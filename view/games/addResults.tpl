{extends file=$EXTENDER_TPL}
{block name="userBody"}
{strip}
    <h4>Результат игры {$Game->user_id->name} - {$Game->opponent_id->name}, {$Game->date} в r. {$Game->city_id->title}</h4>
    <div class="well well-sm form-padding">
        <form action="{$actionForm}" method="post">
            <input type="hidden" name="gameId" value="{$Game->id}"/>
            <input type="hidden" name="countSets" value="{$Game->countSets}">
            <div class="flashmessagesContainer">
                {$FlashMessage}
            </div>
            <div class="form-group ">

                <div class="row">
                    {for $Set=1 to $Game->countSets}
                    <div class="col-xs-2">
                        <p class="sm-txt">Счет в сете {$Set}</p>

                        {assign var="varName" value="userSet"|cat:$Set }

                        <input
                                type="text"
                                class="form-control"
                                name="userSet{$Set}"
                                value="{$gameResults->getParam($varName)}"
                        />

                        <br/>
                        {assign var="varName" value="opponentSet"|cat:$Set }

                        <input type="text"
                               class="form-control"
                               name="opponentSet{$Set}"
                               value="{$gameResults->getParam($varName)}"
                        />

                    </div>
                    {/for}
                    <div class="col-xs-2">
                        <br/>
                        <p class="sm-txt">{$Game->user_id->name}</p>
                        <br/>
                        <p class="sm-txt">{$Game->opponent_id->name}</p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-3">
                        {$Game->user_id->name} {$Game->user_id->surname}
                    </div>
                    <div class="col-xs-2">
                        <input
                                type="text"
                                class="form-control"
                                name="userResult"
                                value="{$gameResults->userResult()}"
                        />
                    </div>
                    <div class="col-xs-2 align-center">-</div>
                    <div class="col-xs-2">
                        <input
                                type="text"
                                class="form-control"
                                name="opponentResult"
                                value="{$gameResults->opponentResult()}"
                        />
                    </div>
                    <div class="col-xs-3 align-right">
                        {$Game->opponent_id->name} {$Game->opponent_id->surname}
                    </div>
                </div>
            </div>
            <div class="form-group align-center">
                <button type="submit" class="btn btn-success btn-sm">Подтвердить</button>
            </div>
        </form>
    </div>
{/strip}
{/block}