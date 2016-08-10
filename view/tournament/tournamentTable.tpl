{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}
        <h4>{$tournament->title}</h4>
        {include file="../tournament/tournamentNav.tpl" TournamentLinks=$TournamentLinks tournament=$tournament activeTab=$activeTab Language=$Language}
        <div class="well well-sm">

        </div>
    {/strip}
{/block}