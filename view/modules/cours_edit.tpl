  <form method="POST" action="{$admin_save}">
		<div class="form-group">
		<h5>Title</h5>
	    <input type="text" class="form-control" value="{$trane.name|escape}" id="title" onkeyup="translit('#title','#tid','#date')"   name="name"/>
	    </div>
		<div class="form-group">
		<h5>Description</h5>
	    <input type="text" class="form-control" value="{$trane.smContent|escape}" name="smContent"/>
	    </div>
	    <div class="form-group">
		<h5>Date</h5>
	    <input type="text" class="form-control" value="{$trane.date_load}" id="date" name="date_load"/>
	    </div>
	     <div class="form-group">
		<h5>Город</h5>
	    <input type="text" class="form-control" value="{$trane.city}" name="city"/>
	    </div>
	    <div class="form-group">
		<h5>Силка регистрации</h5>
	    <input type="text" class="form-control" value="{$trane.reg}" name="reg"/>
	    </div>
	    <div class="form-group">
		<h5>Оратор</h5>
	    <input type="text" class="form-control" value="{$trane.person}" name="person"/>
	    </div>
	    
	    <div class="form-group">
		<h5>Приоритет</h5>
	    <input type="text" class="form-control" value="{$trane.priority}" name="priority"/>
	    </div>
	    
		<div class="form-group">
		<h5>URL</h5>
	    <input type="text" class="form-control" value="{$trane.tid}" id="tid" name="tid"/>
	    <input type="hidden" value="article" name="article"/>
	    </div>
	    <div class="form-group">
		<h5>Тело</h5>
	    <textarea id="markItUp" name="content">{$trane.content}</textarea>
	    </div>
	    {if $trane}
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

