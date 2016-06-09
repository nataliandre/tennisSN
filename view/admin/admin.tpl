{extends file=$EXTENDER}
{block name="body"}
<section class="bg__pink__scale padding-20">
    <div class="wrapper colorFFF">
  
  <article class="page__padding__article top">
  
  <div >Вітаємо в <a href="https://github.com/nataliandre/simple_engine">SimpleEngine</a></div>
  
  
 <div class="admin__buttons">
 
 <a href="{$ADMIN_UPLOAD}" class="btn btn-success">Загрузить файли</a>
 <a href="{$ADMIN_FILES}" class="btn btn-default">Смотреть файлы</a>
 <a href="/drupal/files/mail.csv" download class="btn btn-default">Скачать контакти</a>
 <a href="{$admin_exit_link}" class="btn btn-danger" >Выход</a>


tion_t}</textarea>
<h3 class="page__article__cards__title">Ключевие слова</h3>
<textarea class="form-control" rows="6" name="keywords">{$keywords_t}</textarea>
<h3 class="page__article__cards__title">Соц сети</h3>
 <div class="">
	 <textarea class="form-control" rows="5" name="sieti">{$sieti}</textarea>
</div>
<h3 class="page__article__cards__title">Сми</h3>
 <div class="">
	 <textarea class="form-control" rows="5" name="smi">{$smi}</textarea>
</div>
<h3 class="page__article__cards__title">Отзиви</h3>
 <div class="">
	 <textarea class="form-control" rows="5" name="otzivi">{$otzivi}</textarea>
</div>



<h3 class="page__article__cards__title">Футер</h3>
 <div class="">
	 <textarea id="markItUpI" class="form-control" rows="5" name="footer">{$footer}</textarea>
</div>
<h3 class="page__article__cards__title">Гавная изображения</h3>
 <div class="">
	 <input type="text" class="form-control" name="hero_image" value="{$hero_image}"/>
</div>


<button type="submit" class="btn btn-success">Сохранить</button>
</form>




 </div>
</article>
    </div>
</section>

{/block}

