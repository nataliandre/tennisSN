{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}
        <div class="well well-sm ">
            <form class="form-horizontal" enctype="multipart/form-data" id="addClubForm" method="post" action="{$actionNextStep}">
                <div class="flashmessagesContainer">
                    {$FlashMessage}
                </div>
                <input type="hidden" name="userId" value="{$userId}">
                <div class="form-group">
                    <label for="title" class="col-lg-2 control-label">Название клуба</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="title" placeholder="Название клуба">
                    </div>
                </div>
                <div class="form-group">
                    <label for="location" class="col-lg-2 control-label">Расположение</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="location" placeholder="Расположение">
                    </div>
                </div>


                <div class="form-group">
                    <label for="cityId" class="col-lg-2 control-label">Город</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="cityId">
                            {foreach from=$cities item=$city}
                                <option value="{$city->id}">{$city->title}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>



                <div class="form-group">
                    <label for="location" class="col-lg-2 control-label">Телефон</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="phone" placeholder="+38(068) 00 38 102">
                    </div>
                </div>

                <div class="form-group">
                    <label for="location" class="col-lg-2 control-label">Ссылка на сайт</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="siteLink" placeholder="">
                    </div>
                </div>


                <div class="form-group">
                    <label for="location" class="col-lg-2 control-label">Корты</label>
                    <div class="col-lg-4">
                        <select class="form-control" name="cortType">
                            {foreach from=$coorts key=$key item=$coort}
                                <option value="{$key}">{$coort}</option>
                            {/foreach}
                        </select>
                    </div>
                    <label for="location" class="col-lg-2 control-label">Количество кортов</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="cortsCount" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="info" class="col-lg-2 control-label">Информацыя</label>
                    <div class="col-lg-10">
                        <textarea class="form-control textareaInfo" rows="6" name="info"></textarea>
                    </div>
                </div>

                <div class="form-group align-center">
                    <button type="submit" class="btn btn-success">Добавить</button>
                </div>
            </form>
        </div>
    {/strip}
{/block}