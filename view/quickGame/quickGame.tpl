{extends file=$EXTENDER_TPL}
{block name="userBody"}
{strip}
    <div class="well well-sm ">
        <form class="form-horizontal" enctype="multipart/form-data" id="addClubForm" method="post" action="{$actionNextStep}">
            <div class="flashmessagesContainer">
                {$FlashMessage}
            </div>

            <h4 class="align-center">Результат быстрой игры игру c "{$Opponent->name} {$Opponent->surname}"</h4>



            <fieldset class="formBody">
                <div class="form-group">
                    <div class="col-xs-12">
                        <p class="sm-txt">Место встречи</p>
                        <input type="text"  class="form-control" name="gamePlace" placeholder="адрес">
                    </div>
                </div>
                <input type="hidden" name="opponentId" value="{$Opponent->id}">

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




                <h4 class="align-center">Счет в игре</h4>

                <div class="form-group ">

                    <div class="row">


                        {for $Set=1 to 5}
                            <div class="col-xs-2" data-setNum="{$Set}">
                                <p class="sm-txt">Счет в сете {$Set}</p>

                                {assign var="varName" value="userSet"|cat:$Set }

                                <input
                                        type="text"
                                        class="form-control"

                                        name="userSet{$Set}"
                                        value=""
                                />

                                <br/>
                                {assign var="varName" value="opponentSet"|cat:$Set }

                                <input type="text"

                                       class="form-control"
                                       name="opponentSet{$Set}"
                                       value=""
                                />
                            </div>
                        {/for}


                        <div class="col-xs-2">
                            <br/>
                            <p class="sm-txt"><strong>Вы</strong></p>
                            <br/>
                            <p class="sm-txt"> {$Opponent->name} {$Opponent->surname}</p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-3">
                           <strong>Вы</strong>
                        </div>
                        <div class="col-xs-2">
                            <input
                                    type="text"
                                    class="form-control"
                                    name="userResult"
                                    value=""
                            />
                        </div>
                        <div class="col-xs-2 align-center">-</div>
                        <div class="col-xs-2">
                            <input
                                    type="text"
                                    class="form-control"
                                    name="opponentResult"
                                    value=""
                            />
                        </div>
                        <div class="col-xs-3 align-right">
                            {$Opponent->name} {$Opponent->surname}
                        </div>
                    </div>
                </div>

                <div class="form-group align-center">
                    <button type="submit" class="btn btn-success btnCustomMarginTop">Отправить запрос</button>
                </div>
            </fieldset>






        </form>
    </div>
{literal}
    <script>
        $('[name="countSets"]').change(function () {
            var Sets = parseInt($(this).val());
            if(Sets === 3)
            {

                $('[data-setnum="4"]').hide();
                $('[data-setnum="5"]').hide();

            }
            if(Sets === 5)
            {
                $('[data-setnum="4"]').show();
                $('[data-setnum="5"]').show();
            }
        });
    </script>
{/literal}

{/strip}
{/block}