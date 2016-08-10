
<ul class="nav nav-tabs">
    <li class=""><a href="#games" data-toggle="tab" aria-expanded="false">Встречи</a></li>
    <li class=""><a href="#tournaments" data-toggle="tab" aria-expanded="true">Турниры</a></li>
</ul>
<div id="myTabContent" class="tab-content">
    <div class="tab-pane fade" id="games">
        <p>
            {if $playedGames}

            {else}
                {include file="../elements/empty/tpl.tpl" text=Language::noAchivments($LANGUAGE)}
            {/if}


        </p>
    </div>
    <div class="tab-pane fade active in" id="tournaments">
        <p>
            {if $playedTournaments}

            {else}
                {include file="../elements/empty/tpl.tpl" text="Нет сиграных турниров"}
            {/if}

        </p>
    </div>

</div>