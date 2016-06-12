{extends file=$EXTENDER}
{block name="body"}
    {strip}
        <div class="wrapper">
            <div class="row">
                <div class="col-xs-3">

                    <ul class="nav nav-pills nav-stacked">

                        <li
                                {if $tab_active eq 'linkMainPage'} class="active" {/if}
                        >
                            <a href="{$linkMainPage}">Профиль</a>
                        </li>

                        <li
                                {if $tab_active eq 'linkUserCompetitions'} class="active" {/if}
                        ><a href="{$linkUserCompetitions}">Турниры</a>
                        </li>

                        <li
                                {if $tab_active eq 'linkUserGames'} class="active" {/if}
                        ><a href="{$linkUserGames}">Встречи</a>
                        </li>

                        <li
                                {if $tab_active eq 'linkUserMessages'} class="active" {/if}
                        ><a href="{$linkUserMessages}">Сообщения</a>
                        </li>

                        <li
                                {if $tab_active eq 'linkUserPhotos'} class="active" {/if}
                        >
                            <a href="{$linkUserPhotos}">Фотогалерея</a>
                        </li>

                        <li
                                {if $tab_active eq 'linkUserSends'} class="active" {/if}
                        >
                            <a href="{$linkUserSends}">Разсилки</a>
                        </li>
                    </ul>

                </div>
                <div class="col-xs-9">


                    {block name="userBody"}{/block}



                </div>

            </div>
        </div>
    {/strip}
{/block}