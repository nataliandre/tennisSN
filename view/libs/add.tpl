
{extends file=$EXTENDER}
  
{block name="body"} 
{strip} 
<article class="page__padding__article">
{include file='../modules/libs__edit.tpl' article = $article }
</article> 
 
{/strip}
{/block}


