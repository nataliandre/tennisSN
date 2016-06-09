
{extends file=$EXTENDER}
  
{block name="body"} 
{strip} 

 
 
 

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
	    <input type="text" class="form-control" id="tid" value="{$media.tid}" name="tid"/>
	    <input type="hidden"  name="article" value="article" />
	    </div>

				</div>
	    <div class="media__video__placeholder__description">
		<div class="form-group">
		<h5>Title</h5>
	    <input type="text" class="form-control" id="title" onkeyup="translit('#title','#tid')"  value="{$media.title}" name="title"/>
	    </div>
	    
	    
	    <div class="form-group">
		<h5>Date</h5>
	    <input type="text" class="form-control" id="data_load"   value="{$media.data_load}" name="data_load"/>
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
		    <button type="submit" class="btn btn-successs">Сохранить</button>
		</div>
		</div>
	    </form>
	    </div>
	    



  
  
  
  
  
  

  
  
  
 

{/strip}
{/block}


