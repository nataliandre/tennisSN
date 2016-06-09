
{extends file=$EXTENDER}
  
{block name="body"} 
{strip} 

 <div class="media__video__placeholder">
		    
	
	<form method="POST" action="{$admin_save}"  enctype="multipart/form-data">
		    
		<div class="media__video__placeholder__video">
		<div>
			{if $result}
			<h5>Ссылка на файл:</h5>
			<h3><input type="text" class="form-control" value="{$result}" /></h3>
			{/if}
			{if $error}
			
			<h5>Возможно размер файла превышает допустимый размер </h5>
			{/if}
			</div>
				</div>
	    <div class="media__video__placeholder__description">




	    <div class="form-group">
		    <h2>Загрузка файлов</h2>
		   
		    <a href="http://rhetoric-hall.com.ua/loader/" class="btn btn-default">Загрузить больше</a>
		    <a href="{$ADMIN_FILES}" class="btn btn-default">Смотреть файлы</a>
		</div>
		</div>
	    </form>
	    </div>
	    
	    
	</div>

</div>



{/strip}
{/block}


