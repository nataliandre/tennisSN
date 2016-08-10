{extends file=$EXTENDER}
{block name="body"}
{strip}

    <div class="wrapper">
        <h4>Клубы</h4>


        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                            Фильтры</a>
                    </h4>
                </div>
                <form action="{$filtersFormAction}" method="post" id="filtersForm">
                    <div id="collapse1" class="panel-collapse collapse in ">
                        <div class="panel-body ">
                            <div class="row">



                                <div class="col-xs-5">
                                    <p>Город:</p>
                                    <div>
                                        <select name="cityId" class="form-control ">
                                            <option value="0">---</option>
                                            {foreach from=$cities item=$City }

                                                <option value="{$City->id}"
                                                        {if $City->id eq $user->cityId->id}selected{/if}
                                                >
                                                    {$City->title}
                                                </option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>







                            </div>


                        </div>
                        <div class="align-right">
                            <a href="javascript:location.reload();" class="btn btn-xs btn-warning">Сбросить фильтр</a>
                            <button type="submit" class="btn btn-xs btn-success">Применить фильтр</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



        <div class="well well-sm">
            <div class="containerClubs">
                {foreach from=$clubs item=$Club}
                    <div class="cardClub">
                        {include
                                    file="{$routeAvatarClubsTpl}"
                                    routeClubPage=$routeClubPage
                                    class="avatar80x80"
                                    Club=$Club
                        }
                        <p class="cardTitle">{$Club->title}</p>
                    </div>
                {/foreach}
            </div>
        </div>
    </div>
{/strip}
{/block}