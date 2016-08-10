{extends file=$EXTENDER}
{block name="body"}
    {strip}
        <div class="wrapper">
            <div class="row">
                <div class="col-xs-2">

                    <ul class="nav nav-pills nav-stacked">

                        <li
                                class="sm-txt {if $tab_active eq 'linkMainPage'}active{/if}"
                        >
                            <a href="{$linkUserPage}">Профиль</a>
                        </li>



                        {if $Config->useFriends()}
                            <li class="sm-txt {if $tab_active eq 'linkFriendsPage'}active{/if}">
                                <a href="{$linkFriendsPage}">Друзья
                                {if $iCountNewFriends}
                                    <span cluseFriendsass="badge">{$iCountNewFriends}</span>
                                {/if}
                                </a>
                            </li>
                        {/if}

                        <li
                                class="sm-txt {if $tab_active eq 'linkUserMessages'}active{/if}"
                        ><a href="{$linkUserMessages}">Сообщения
                                {if $iCountNewMessages}
                                    <span class="badge">{$iCountNewMessages}</span>
                                {/if}
                            </a>
                        </li>

                        <li
                                class="sm-txt {if $tab_active eq 'linkUserPhotos'}active{/if}"
                        >
                            <a href="{$linkUserPhotos}">Фотогалерея</a>
                        </li>


                        <li
                                class="sm-txt {if $tab_active eq 'linkUserCompetitions'}active{/if}"
                        ><a href="{$linkUserCompetitions}">Турниры</a>
                        </li>

                        <li
                                class="sm-txt {if $tab_active eq 'linkUserGames'}active{/if}"
                        ><a href="{$linkUserGames}">Встречи
                                {if $iCountNewGames}
                                    <span class="badge">{$iCountNewGames}</span>
                                {/if}
                            </a>
                        </li>


                        <li
                                class="sm-txt {if $tab_active eq 'linkUserClubes'}active{/if}"
                        ><a href="{$linkUserClubes}">Клубы</a>
                        </li>





                        <!--<li
                                class="sm-txt {if $tab_active eq 'linkUserSends'}active{/if}"
                        >
                            <a href="{$linkUserSends}">Разсилки</a>
                        </li>-->
                    </ul>

                </div>
                <div class="col-xs-10">


                    {block name="userBody"}{/block}



                </div>

            </div>
        </div>
    {/strip}
{/block}


<li
        class="sm-txt {if $tab_active eq 'linkEventsPage'}active{/if}"
>
    <a href="{$linkEventsPage}">События</a>
</li>