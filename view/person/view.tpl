{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}
        <div class="row">
            <div class="col-xs-4">
                <div class="well well-sm" style="height: 100px;">
            </div>


        </div>
        <div class="col-xs-8">
            <div class="well well-sm">
                <p>{$user->name} {$user->surname}</p>
                <hr/>
                <div class="user__information">


                </div>
            </div>

            <div class="well well-sm">
                <p class="sm-txt">Фотографии</p>

            </div>

            <div class="well well-sm">
                <p class="sm-txt">Достижения</p>

            </div>
        </div>
        </div>
    {/strip}
{/block}