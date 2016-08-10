{extends file=$EXTENDER_TPL}
{block name="userBody"}
{strip}


    <h4 class="titleSpec1">{$club->title}</h4>
    {include file="../club/clubNav.tpl" ClubLinks=$ClubLinks club=$club activeTab=$activeTab Language=$Language}


    {block name="clubBody"}

    {/block}

{/strip}
{/block}