{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}
        <div class="well well-lg">
            <form class="form-horizontal" enctype="multipart/form-data" id="addClubForm" method="post" action="{$actionNextStep}">
                <h4>Создание нового турнира</h4>
                <div class="flashmessagesContainer">
                    {$FlashMessage}
                </div>
                <input type="hidden" name="userId" value="{$userId}">
                <div class="form-group">
                    <div class="col-xs-12">
                        <p class="sm-txt">Название турнира</p>
                        <input type="text" class="form-control" name="title" placeholder="Название турнира">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        <p class="sm-txt">Расположение</p>
                        <input type="text" class="form-control" name="location" placeholder="Расположение">
                    </div>

                    <div class="col-xs-6">
                        <p class="sm-txt">Город</p>
                        <select class="form-control" name="cityId">
                            {foreach from=$cities item=$city}
                                <option value="{$city->id}">{$city->title}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
                <div class="form-group">

                    <div class="col-xs-4">
                        <p class="sm-txt">Дата начала</p>
                        {$startDateDatapicker}
                    </div>
                    <div class="col-xs-4">
                        <p class="sm-txt" >Дата окончания </p>
                        {$endDateDatapicker}
                    </div>
                    <div class="col-xs-4">
                        <p class="sm-txt">К-во игроков</p>
                        <input type="text" class="form-control" name="countPlayers" placeholder="К-во игроков">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <p class="sm-txt">Информация</p>
                        <textarea class="form-control textareaInfo" name="info"></textarea>
                    </div>
                </div>
                <div class="form-group align-center">
                    <button type="submit" class="btn btn-success">Добавить</button>
                </div>
            </form>
        </div>
    {/strip}
{/block}