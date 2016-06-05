  <form method="POST" action="{$admin_save}">
		<div class="form-group">
		<h5>Title</h5>
	    <input type="text" class="form-control" value="{$article.name|escape}" id="title" onkeyup="translit('#title','#tid')"  name="name"/>
	    </div>
		<div class="form-group">
		<h5>Description</h5>
	    <textarea rows="6" class="form-control" name="smContent">{$article.smContent|escape}
	    </textarea>
	   	</div>
	    <div class="form-group">
		<h5>Date</h5>
	    <input type="text" class="form-control" value="{$article.date_load}" name="date_load"/>
	    </div>
	     <div class="form-group">
		<h5>Автор</h5>
	    <input type="text" class="form-control" value="{$article.author}" name="author"/>
	    </div>
	    <div class="form-group">
		<h5>Изображение</h5>
	    <input type="text" class="form-control" value="{$article.images}" name="images"/>
	    </div>
	    
	    <div class="form-group">
		<h5>Категория</h5>
	    <select class="form-control" name="topict">
		   <option value="publikatsii" {if $article.topict eq 'publikatsii'}selected{/if}>Публикации</option>
		   <option value="novosti" {if $article.topict eq 'novosti'}selected{/if}>Новости</option>
		</select>

	    </div>
	    
	    
	    <div class="form-group">
		<h5>Приоритет</h5>
	    <input type="text" class="form-control" value="{$article.priority}" name="priority"/>
	    </div>
	    

	    
		<div class="form-group">
		<h5>URL</h5>
	    <input type="text" class="form-control"  value="{$article.tid}" id="tid" name="tid"/>
	    <input type="hidden" value="article" name="article"/>
	    </div>
	    <div class="form-group">
		<h5>Тело</h5>
	    <textarea id="markItUp" name="content">{$article.content}</textarea>
	    </div>
	    {if $article}
	    <div class="form-group">
	    <h5>Удалить <input type="checkbox" name="delete" value="1"/></h5> 
	    
	    </div>
	    {/if}
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
    'insertdatetime media table contextmenu paste code',
    'media'
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


