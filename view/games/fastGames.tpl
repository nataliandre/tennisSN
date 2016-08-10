{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}
        <h4 >{Language::gamesTitle($LANGUAGE)}</h4>
        {include file="../games/gamesNav.tpl" GamesLinks=$GamesLinks   activeTab=$activeTab Language=$Language}


        {foreach from=$GamesResults item=$GameResult}

            {if !$GameResult}
                <div class="well well-sm">
                    {include file="../elements/empty/tpl.tpl" text="У вас пока нет сыгранных встреч"}
                </div>
            {else}
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse{$GameResult->id}">
                                    Результат игры {$GameResult->game_id->user_id->name} - {$GameResult->game_id->opponent_id->name},
                                    {$GameResult->game_id->date} в r. {$GameResult->game_id->city_id->title}</a>
                            </h4>
                        </div>


                        <div id="collapse{$GameResult->id}" class="panel-collapse collapse">
                            <div class="panel-body resultsContainer">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        {for $Set=1 to $GameResult->game_id->countSets}
                                            <th> {Language::gameSetTitle($LANGUAGE)} {$Set}</th>
                                        {/for}

                                        <th>

                                        </th>
                                        <th>
                                            {Language::gameResultsTitle($LANGUAGE)}
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{$GameResult->userSet1}</td>
                                        <td>{$GameResult->userSet2}</td>
                                        <td>{$GameResult->userSet3}</td>
                                        {if $GameResult->game_id->countSets eq 5}
                                            <td>{$GameResult->userSet4}</td>
                                            <td>{$GameResult->userSet5}</td>
                                        {/if}
                                        <td class="
                                    {if $GameResult->userWin}
                                        markerWin
                                    {/if}
                                    ">{$GameResult->game_id->user_id->name}</td>
                                        <td><strong >{$GameResult->userResult}</strong></td>

                                    </tr>
                                    <tr>
                                        <td>{$GameResult->opponentSet1}</td>
                                        <td>{$GameResult->opponentSet2}</td>
                                        <td>{$GameResult->opponentSet3}</td>
                                        {if $GameResult->game_id->countSets eq 5}
                                            <td>{$GameResult->opponentSet4}</td>
                                            <td>{$GameResult->opponentSet5}</td>
                                        {/if}
                                        <td class="
                                    {if $GameResult->opponentWin}
                                        markerWin
                                    {/if}
                                    ">{$GameResult->game_id->opponent_id->name}</td>
                                        <td><strong >{$GameResult->opponentResult}</strong></td>
                                    </tr>

                                    </tbody>
                                </table>
                                <div >
                                    {if $GameResult->game_id->opponent_id->id eq $currentUser && !$GameResult->opponentConfirmed}
                                        <div data-gameResultId="{$GameResult->id}" class="confirmOpponentGameResultsContainer">
                                            <a href="#" data-gameResultId="{$GameResult->id}" class="btn btn-success confirmOpponentGameResults">Подтвердить</a>
                                            <a href="{$GamesLinks->gameResultsLink|cat:$GameResult->game_id->id}" class="btn btn-danger">Изменить результат</a>
                                        </div>
                                    {/if}

                                    {if $GameResult->game_id->user_id->id eq $currentUser && !$GameResult->userConfirmed}
                                        <p>Соперник изменил результат игры</p>
                                        <div data-gameResultId="{$GameResult->id}" class="confirmUserGameResultsContainer">
                                            <a href="#" data-gameResultId="{$GameResult->id}" class="btn btn-success confirmUserGameResults">Подтвердить</a>
                                            <a href="{$GamesLinks->gameResultsLink|cat:$GameResult->game_id->id}" class="btn btn-danger">Изменить результат</a>
                                        </div>
                                    {/if}

                                    {if ($GameResult->game_id->opponent_id->id eq $currentUser && $GameResult->opponentConfirmed && !$GameResult->userConfirmed)
                                    ||
                                    (!$GameResult->opponentConfirmed && $GameResult->game_id->user_id->id eq $currentUser && $GameResult->userConfirmed)
                                    }
                                        Ожидайте подтверждения результатов игры
                                    {/if}
                                    {if $GameResult->opponentConfirmed && $GameResult->userConfirmed}
                                        <p><strong>Результат подтвержден</strong></p>
                                    {/if}


                                </div>




                            </div>
                        </div>

                    </div>

                </div>
            {/if}


        {/foreach}

        <script>
            var userLink = "{$ajaxController}";
        </script>

    {/strip}
{/block}