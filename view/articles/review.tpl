
{extends file=$EXTENDER}
   
 {block name="body"}
<article class="page__padding__article">
	
	 {if $admin}
    <div>
	     <ul class="nav nav-tabs" role="tablist">
		 <li role="presentation" class="active">
		 <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Просмотр</a>
		 </li>
         <li role="presentation">
         <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Редактировать</a>
         </li>
         </ul>



  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
	    {$alert}
	{/if} 
	
	
	
	
         <h1>{$article.name}</h1>
          <p class="top__list">
	          <span>Дата публикации: {$article.date_load}</span>  
			  <span>Автор: {$article.author}</span>
	      
	      </p>
          <div class="top__share">{include file='../modules/pluso__article.tpl' }</div>
		 <div class="content__article">
			{$article.content}
	     </div>
	     
	     
	     
	     
	 
	 
	 {if $admin}
	</div>
    <div role="tabpanel" class="tab-pane" id="profile">
	   {include file='../modules/article_edit.tpl' book = $book }
	    
	</div>

  </div>

</div>
    {/if}
    
    
    <h3 class="page__article__cards__title">Похожие материалы</h3>
    <ul class="page__article__cards">
		 
		 {include file='../articles/article_card.tpl' articles = $articles }		 
	</ul>
	
	

</article>   
{/block}

