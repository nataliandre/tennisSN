 <form method="POST" action="{$admin_save}">
		<div class="form-group">
		<h5>Title</h5>
	    <input type="text" class="form-control" value="{$book.name}" id="title" onkeyup="translit('#title','#tid')" name="name"/>
	    </div>
	    <div class="form-group">
		<h5>Cover URL</h5>
	    <input type="text" class="form-control" value="{$book.image}" name="image"/>
	    </div>
		<div class="form-group">
		<h5>URL</h5>
	    <input type="text" class="form-control" value="{$book.tid}" id="tid" name="tid"/>
	    <input type="hidden" value="article" name="article"/>
	    </div>
	    <div class="form-group">
		<h5>Download URL</h5>
	    <input type="text" class="form-control" value="{$book.download}" name="download"/>
	   
	    </div>
	    <div class="form-group">
		<h5>Приоритет</h5>
	    <input type="text" class="form-control" value="{$book.priority}" name="priority"/>
	    </div>
	    
	    
	    <div class="form-group">
		<h5>Тело</h5>
	    <textarea class="form-control" rows="15" name="smContent">{$book.smContent}</textarea>
	    </div>
	    {if $book}
	    <div class="form-group">
	    <h5>Удалить <input type="checkbox" name="delete" value="1"/></h5> 
	    
	    </div>
	    {/if}
	    <div class="form-group">
		    <button type="submit" class="btn btn-successs">Сохранить</button>
		</div>
	    </form>
	    
