{extends file=$EXTENDER}
   
 {block name="body"}  
    <div class="c__page__main__content">
   {include file='../pages/main_tpl.tpl' page=$page admin=$admin admin_save=$admin_save}
   {if $otzivi}
      {include file='../elementy/otzivi.txt' }
   {/if}
     </div>  
{/block}

