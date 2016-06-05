
{extends file=$EXTENDER}
  
{block name="body"} 
{strip} 

 
 
 
 


	
<div class="media__video__placeholder">
		    
	
	<form method="POST" action="{$admin_save}"  enctype="multipart/form-data">
		    
		<div class="media__video__placeholder__video">
			{$alert}
		<div>
			<h5>Вибрать файл</h5>
			<div style="background:#fff;">
			<input type="file" name="files"  />
			</div>
		</div>
				</div>
	    <div class="media__video__placeholder__description">




	    <div class="form-group">
		    <h2>Загрузка файлов</h2>
		    <button type="submit" class="btn btn-success">Загрузить</button>
		    <a href="{$ADMIN_FILES}" class="btn btn-default">Смотреть файлы</a>
		</div>
		</div>
	    </form>
	    </div>
	    
	    
	</div>

  </div>



  
  
  
  
  


  
  
 

{/strip}
{/block}


