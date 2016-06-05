
{extends file=$EXTENDER}
  
{block name="body"} 
{strip} 
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

  
  <h3 class="page__article__cards__title">{$trane.name}</h3>
  <div class="content__article">
  {$trane.content}
  {include file='../elementy/otzivi.txt' }
  </div>
  
  
  
  
  {if $admin}
	</div>
    <div role="tabpanel" class="tab-pane" id="profile">
	   {include file='../modules/cours_edit.tpl' }
	    
	</div>

  </div>

</div>
    {/if}
     
  
  
  
</article>
{/strip}
{/block}


