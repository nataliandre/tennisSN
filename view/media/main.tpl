
{extends file=$EXTENDER}
  
{block name="body"} 
{strip} 

 
 
 
 
 {* admin side *}

 {if $admin}
    <div>
	     <ul class="nav nav-tabs" role="tablist">
		 <li role="presentation" class="{if !$active}active{/if}">
		 <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Просмотр</a>
		 </li>
         <li role="presentation" class="{if $active}active{/if}">
         <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Редактировать</a>
         </li>
         </ul>
  


  <div class="tab-content">
    <div role="tabpanel" class="tab-pane {if !$active}active{/if}" id="home">
	{/if}  
	 {* admin side *}
  
  
  <div class="media__video__placeholder">
	  <div class="media__video__placeholder__video">
		  {$media.source}
	  </div>
	  <div class="media__video__placeholder__description">
		<h2>{$media.title}</h2>
		<p class="date">{$media.data_load}</p>
		<p>{$media.description}</p>
		<hr/>
		
		 Поделиться: {include file='../modules/pluso__media.tpl' }
	  </div>
  </div>
  
  
  
  
  
  
  
 {* admin side *} 
  {if $admin}
	</div>
    <div role="tabpanel" class="tab-pane {if $active}active{/if}" id="profile">
	    <div class="media__video__placeholder">
		    
	    <form method="POST" action="{$admin_save}">
		    
		<div class="media__video__placeholder__video">
			{$alert}
		<div class="form-group">
		<h5>source</h5>
	    <textarea class="form-control" rows="10"  name="source">{$media.source}</textarea>
	    </div>
	    <div class="form-group">
		<h5>URL</h5>
	    <input type="text" class="form-control" value="{$media.tid}" id="tid" name="tid"/>
	    <input type="hidden"  name="article" value="{$media.tid}" />
	    <div class="form-group">
		<h5>Приоритет</h5>
	    <input type="text" class="form-control" value="{$media.priority}" name="priority"/>
	    </div>
	    </div>
		<div class="form-group">
		<h5>Date</h5>
	    <input type="text" class="form-control"    value="{$media.data_load}" name="data_load"/>
	    </div>

				</div>
	    <div class="media__video__placeholder__description">
		<div class="form-group">
		<h5>Title</h5>
	    <input type="text"  id="title" onkeyup="translit('#title','#tid')"  class="form-control" value="{$media.title}" name="title"/>
	    </div>
		<div class="form-group">
		<h5>Description</h5>
	     <textarea class="form-control" rows="5" name="description">{$media.description}</textarea>
	    </div>
	    <div class="form-group">
		<h5>Keywords</h5>
	    <input type="text" class="form-control" value="{$media.tags}" name="tags"/>
	    </div>
	    <div class="form-group">
	    <h5>Удалить <input type="checkbox" name="delete" value="1"/></h5> 
	    
	    </div>

	    <div class="form-group">
		    <button type="submit" class="btn btn-successs">Сохранить</button>
		</div>
		</div>
	    </form>
	    </div>
	    
	    
	</div>

  </div>

</div>
    {/if}
 {* admin side *}
  
  
  
  
  
  
  
  <article class="page__padding__article">
	  <div class="media__video__other">
		 <ul>
			{foreach $medias as $media}
			<li>
			<a href="{$media.link}">
			<div class="video-cover">
			</div>
			</a>
			{$media.source}
			<p>{$media.title}</p>
			{$media.data_load}

			</li>
			{/foreach} 
	     </ul> 
	  </div>
	  {$button__save__media}
	  
  </article>
  
  
  
 

{/strip}
{/block}


