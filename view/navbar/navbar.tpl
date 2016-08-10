{strip}
<nav class="navbar navbar-default">
    <div class="wrapper">
            <div class="clear"></div>
            <a class="navbar-brand" href="{$linkMainPage}">Tennis</a>
            <ul class="nav navbar-nav">
                <li><a href="{$linkMainPage}">О ресурсе</a></li>
                <li class="{if $headNavActive eq 'PlayersHeadNavActive'}active{/if}">
                    <a href="{$linkPlayersPage}">Игроки</a>
                </li>
                <li class="{if $headNavActive eq 'ClubsHeadNavActive'}active{/if}">
                    <a href="{$linkClubsPage}">Турниры</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{$linkLoginAction}">Вход</a></li>
                <li><a href="{$linkFrogotAction}">Забыл пароль</a></li>
                <li><a href="{$linkRegistrationFirstStepAction}">Регистрация</a>
            </ul>
            <div class="clear"></div>
    </div>
</nav>
{/strip}