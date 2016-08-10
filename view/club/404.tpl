{extends file=$EXTENDER_TPL}
{block name="userBody"}
{strip}

    {include file="{$route404tpl}" message="Message"}
{/strip}
{/block}