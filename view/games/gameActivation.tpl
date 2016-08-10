{extends file=$EXTENDER}
{block name="body"}
{strip}
    <div class="wrapper">
        {$message}
    </div>
    <div class="align-center">
        <a href="{$link}" class="btn btn-success">Перейти к играм</a>
    </div>
{/strip}
{/block}