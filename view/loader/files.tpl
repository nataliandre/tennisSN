
{extends file=$EXTENDER}
  
{block name="body"} 
{strip} 

 
 
 
 


<article class="page__padding__article">	
	<h3 class="page__article__cards__title">Загруженные файлы</h3>
<table class="table table-striped">
 <thead>
	<tr>
		 <td>#</td>
		 <td>дата</td>
		 <td>путь</td>
	</tr>
 </thead>
 <tbody>
	 {foreach $files as $file}
	 <tr>
		 <td>{$file.i}</td>
		 <td>{$file.name}</td>
		 <td><a href="{$file.link}" target="_blank">{$file.link}</a></td>
	</tr>

	{/foreach}
	</tbody>
		 
</table> 
</article>

{/strip}
{/block}


