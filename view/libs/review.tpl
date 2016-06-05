
{extends file=$EXTENDER}
   
{block name="body"}   

 
   <div class="c__page__main__content">
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
	<div class="book__body__field">
		{$alert}

		<div class="book__desc__field">
			<h3 class="page__article__cards__title">{$book.name}</h3>
			<p>
			{$book.smContent|unescape}
			</p>
			 Поделитесь с друзьями: {include file='../modules/pluso__article.tpl' }
			<div class="book__download__form">
				<p><strong>Мы отправим вам книгу на почту</strong></p>
				<input type="text" class="form-control hidden" name="email" />
				{if $download}
				<a href="{$book.download}" class="btn btn-success">Скачать</a>
				{else}
				<div class="row form-group js__result__text__holder">
					
				<div class="col-xs-5  ">
						    <input type="text" class="form-control" name="mail" placeholder="Ваш mail"/>
				</div>
				<div class="col-xs-4  ">
						    <input type="text" class="form-control" name="city" placeholder="Ваш город"/>
				</div>
				<div class="col-xs-2  ">
							<button class="btn btn-success js__toggle__download" >Скачать</button>
				</div>
				<div class="col-xs-1  "></div>
				</div>
				
				
				<script>
						
						$('.js__toggle__download').click(function(e){
						
								if($('input[name="city"]').val()=='' || $('input[name="mail"]').val()==''){
									alert('Пустые поля!');
								}else{
									$.ajax({
									  method: "POST",
									  url: "http://rhetoric-hall.com.ua/subscribe/mail__book?ajax=1",
									  data: { city: $('input[name="city"]').val(), mail: $('input[name="mail"]').val(),book: '{$book.name}',link: '{$book.download}' }
									})
									  .done(function( msg ) {
					
					
										$('.arrow_holder_relative').hide();
									    $('.js__result__text__holder').html('<h4 style="color:#337ab7">Проверьте почту!</h4>');
									  });

									
								}
							
							
						});	
						
									
					</script>
				{/if}
			</div>
		</div>
		
		<div class="book__image__field">
			<a href="{$book.image}" rel="shadowbox"><img src="{$book.image}" alt="{$book.name}" /></a>
		</div>
		
		
		
	</div>
	   
	   
	   
	   
	   
	    
	    
	
	{if $admin}
	</div>
    <div role="tabpanel" class="tab-pane" id="profile">
	    {include file='../modules/libs__edit.tpl' article = $article }
	    
	</div>

  </div>

</div>
    {/if}

 <h3 class="page__article__cards__title">Похожие материалы</h3>
 <ul class="page__article__cards">
			{include file='../libs/book_card.tpl' books = $books }
	     </ul>   
     </div>  
     
  



{/block}

