
  
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
	{/if}  
	<div class="content__article">
	
	    {$page.page}
	    </div>
	    
	
	{if $admin}
	</div>
    <div role="tabpanel" class="tab-pane" id="profile">
	    <form method="POST" action="{$admin_save}">
		<div class="form-group">
		<h5>Title</h5>
	    <input type="text" class="form-control" value="{$page.title}" name="title"/>
	    </div>
		<div class="form-group">
		<h5>Description</h5>
	    <input type="text" class="form-control" value="{$page.description}" name="description"/>
	    </div>
	    <div class="form-group">
		<h5>Keywords</h5>
	    <input type="text" class="form-control" value="{$page.meta}" name="meta"/>
	    </div>
		<div class="form-group">
		<h5>URL</h5>
	    <input type="text" class="form-control" value="{$page.url}" name="url"/>
	    <input type="hidden" value="article" name="article"/>
	    </div>
	    
	    <div class="form-group">
		<h5>Тело</h5>
	    <textarea id="markItUp" name="page">{$page.page}</textarea>
	    </div>
	    <div class="form-group">
		    <button type="submit" class="btn btn-successs">Сохранить</button>
		</div>
	    </form>
	    <script type="text/javascript" >
  tinymce.init({
  selector: 'textarea',
  height: 500,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css',
    '//rhetoric-hall.com.ua/custom/css/style.css',
    '//rhetoric-hall.com.ua/standart/css/style.css'
  ]
 });
</script>
	    
	</div>

  </div>

</div>
    {/if}
    
    




 
	     
	     

     
     


