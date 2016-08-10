{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}

        <h4 >{Language::gamesTitle($LANGUAGE)}</h4>



        <div class="well well-sm">
            {if !$userGames}
                {include file="../elements/empty/tpl.tpl" text="У вас пока нет встреч"}
            {else}
                {foreach from=$userGames item=$Game}
                    <div class="gameContainer well">
                        <div class="row">
                            <div class="col-xs-3">
                                <p class="lineTitleCard">Создатель заявки</p>
                                {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage class="avatar80x80" User=$Game->user_id }
                                <p class="sm-txt">
                                    <a href="{$routeUserPage|cat:$Game->user_id->id}">
                                    {$Game->user_id->name} {$Game->user_id->surname}
                                    </a>
                                </p>
                            </div>
                            <div class="col-xs-6">
                                <p class="sm-txt"><strong>Локализация:</strong> город {$Game->city_id->title}, адрес {$Game->game_place}</p>

                                <p class="sm-txt"><strong>Дата и время игры: </strong> {$Game->date} {$Game->game_time}</p>

                                <p class="sm-txt"><strong>Количество сетов:</strong> {$Game->count_sets}</p>

                                {if $Game->confirmed}
                                    <p class="sm-txt"> Оппонент потвердил вашу заявку</p>
                                {/if}
                                <p class="sm-txt actionsContainerGames">
                                    <strong>
                                        Действие:
                                    </strong>
                                    {if $currentUser neq $Game->user_id->id}
                                        {if !$Game->confirmed }
                                            <a href="" data-gameId="{$Game->id}" class="btn btn-primary btn-sm confirmRequest">Подтвердить</a>
                                            <a href="" data-gameId="{$Game->id}" class="btn btn-danger btn-sm deleteRequest">Отклонить</a>
                                        {else}
                                            <a href="" data-gameId="{$Game->id}" class="btn btn-danger btn-sm unconfirmRequest">Отказаться</a>
                                        {/if}
                                    {/if}
                                    {if !$Game->opponentVisible}
                                        Заяка отклонена
                                    {/if}


                                </p>
                            </div>
                            <div class="col-xs-3 align-right">
                                <p class="lineTitleCard">Оппонент</p>
                                {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage class="avatar80x80" User=$Game->opponent_id }
                                <p class="sm-txt">
                                    <a href="{$routeUserPage|cat:$Game->opponent_id->id}">
                                        {$Game->opponent_id->name} {$Game->opponent_id->surname}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                {/foreach}
            {/if}


            <p class="partTitle">
                Входящие приглашения
            </p>
            <h6>Новых приглашений на игру: {$iCountNewGames}</h6>

        </div>

        <script>
                var userLink = "{$ajaxController}";
        </script>
    {/strip}
{/block}