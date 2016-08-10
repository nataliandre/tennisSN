{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}
        <div class="well well-lg">

            <form class="form-horizontal" method="post" action="{$actionNextStep}">
                <h4 class="align-center">Новий запрос на игру "{$opponentUser->name} {$opponentUser->surname}"</h4>
                <fieldset class="formBody">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <p class="sm-txt">Место встречи</p>
                            <input type="text"  class="form-control" name="gamePlace" placeholder="адрес">
                        </div>
                    </div>
                    <input type="hidden" name="opponentId" value="{$opponentId}">

                    <div class="form-group">
                        <div class="col-xs-4">
                            <p class="sm-txt">Дата встречи</p>
                            {$dataPicker}
                        </div>
                        <div class="col-xs-4">
                            <p class="sm-txt">Время встречи</p>
                            <select name="hours" class="form-control hoursSelect" data-style="btn-info">
                                {for $foo=6 to 24}
                                    <option value="{if $foo lt 10}0{/if}{$foo}">{if $foo lt 10}0{/if}{$foo}</option>
                                {/for}
                            </select>

                            <select name="minutes" class="form-control hoursSelect" data-style="btn-info">
                                <option value="00">00</option>
                                <option value="30">30</option>
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <p class="sm-txt">Город</p>
                            <select class="form-control" name="cityId">
                                {foreach from=$cities item=$city}
                                    <option value="{$city->id}">{$city->title}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-3">
                            <p class="sm-txt">Количество сетов</p>
                        </div>
                        <div class="col-xs-3 sm-txt">
                            <input type="radio" name="countSets" value="3" checked=""> 3 сета
                        </div>
                        <div class="col-xs-3 sm-txt">
                            <input type="radio" name="countSets" value="5" checked=""> 5 сетов
                        </div>

                    </div>

                    <div class="form-group align-center">
                        <button type="submit" class="btn btn-success btnCustomMarginTop">Отправить запрос</button>
                    </div>
                </fieldset>
            </form>

        </div>
    {/strip}
{/block}