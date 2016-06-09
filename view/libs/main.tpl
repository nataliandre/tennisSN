
{extends file=$EXTENDER}
  
{block name="body"} 
{strip} 
<article class="page__padding__article">
	  <h3 class="page__article__cards__title">
		  Лучшие книги по риторике и ораторскому искусству
	  </h3>
	  
		  <ul class="page__article__cards">
			{include file='../libs/book_card.tpl' books = $books }
	     </ul> 
	 
	  {$button__save__media}
	  
</article> 
 
{/strip}
{/block}


