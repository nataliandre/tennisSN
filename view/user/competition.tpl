{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}
        <div class="well well-sm">
            <p>Турниры</p>

            {if !$userPhotos}
                {include file="../elements/empty/tpl.tpl" text="У вас пока нет турниров"}
            {else}

            {/if}


        </div>
    {/strip}
{/block}