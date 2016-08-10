{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}

        <h4 >{Language::gamesTitle($LANGUAGE)}</h4>
        {include file="../games/gamesNav.tpl" GamesLinks=$GamesLinks   activeTab=$activeTab Language=$Language}


        <div class="well well-sm">
            {if !$userGames}
                {include file="../elements/empty/tpl.tpl" text="У вас пока нет встреч"}
            {else}
                {foreach from=$userGames item=$Game}
                    <div class="gameContainer well">
                        <div class="row">
                            <div class="col-xs-3 ">
                                <p class="lineTitleCard">Оппонент</p>
                                {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage class="avatar80x80" User=$Game->opponent_id }
                                <p class="sm-txt">
                                    <a href="{$routeUserPage|cat:$Game->opponent_id->id}">
                                        {$Game->opponent_id->name} {$Game->opponent_id->surname}
                                    </a>
                                </p>
                            </div>

                            <div class="col-xs-6">
                                <p class="sm-txt"><strong>Локализация:</strong> город {$Game->city_id->title}, адрес {$Game->game_place}</p>

                                <p class="sm-txt"><strong>Дата и время игры: </strong> {$Game->date} {$Game->game_time}</p>

                                <p class="sm-txt"><strong>Количество сетов:</strong> {$Game->count_sets}</p>

                                <p class="sm-txt"><strong>Действие:</strong></p>
                                <p class="sm-txt actionsContainerGames">

                                    {if $Game->active}
                                            {if !$Game->confirmed }
                                                <a href="" data-gameId="{$Game->id}" class="btn btn-primary btn-sm confirmRequest">Подтвердить</a>
                                                <a href="" data-gameId="{$Game->id}" class="btn btn-danger btn-sm failureRequest">Отклонить</a>
                                            {/if}
                                            {if $Game->confirmed && !$Game->userWantToCancelRequest}
                                                <a href="" data-gameId="{$Game->id}" class="btn btn-danger btn-sm iWantToCancelRequest">Заявка на отмену игры</a>
                                            {/if}
                                            {if $Game->userWantToCancelRequest}
                                                <p class="sm-txt">соперник отправил запрос на отмену игры</p>
                                                <a href="" data-gameId="{$Game->id}" class="btn btn-danger btn-sm deleteRequest">Подтвердить отмену игры</a>
                                            {/if}

                                    {else}
                                        Срок активации игры прошел, ожидайте заполнения результатов от создателя игры
                                    {/if}
                                </p>
                            </div>

                            <div class="col-xs-3 align-right">
                                <p class="lineTitleCard">Создатель заявки</p>
                                {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage class="avatar80x80" User=$Game->user_id }
                                <p class="sm-txt">
                                    <a href="{$routeUserPage|cat:$Game->user_id->id}">
                                        {$Game->user_id->name} {$Game->user_id->surname}
                                    </a>
                                </p>
                            </div>

                        </div>
                    </div>
                {/foreach}
            {/if}




        </div>

        <script>
            var userLink = "{$ajaxController}";
        </script>
    {/strip}
{/block}