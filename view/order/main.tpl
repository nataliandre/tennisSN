
{extends file=$EXTENDER}
  
{block name="body"} 
{strip} 
<article class="page__padding__article min__height__200px">
  {include file='../modules/courses.tpl' admin=$admin}
  {$button__save__media}
  <div class="description">
   {include file='../pages/main_tpl.tpl' page=$page admin=$admin admin_save=$admin_save}

				   </div>
  
</article>
{/strip}
{/block}


