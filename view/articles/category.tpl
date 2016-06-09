
{extends file=$EXTENDER}
  
{block name="body"} 
{strip} 
 <article class="page__padding__article">
	     <h3 class="page__article__cards__title">{$category}</h3>
	     <hr class="border"/>
	 	 <ul class="page__article__cards">
		 
		 {include file='../articles/article_card.tpl' articles = $articles }		 
		 </ul>
		 {$button__save__media}
 
  </article>
{/strip}
{/block}


