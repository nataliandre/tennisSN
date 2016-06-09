<h3 class="page__article__cards__title">Тренинги и курсы</h3>
<table class="page__table__courses">
					<thead>
						<tr>
						<td>Дата 
						</td>
						<td>ГОРОД                               
						</td>
						<td>ПРОграмма 
						</td>
						<td> ТРЕНЕР
						</td>
						
						<td> РЕГИСТРАЦИЯ
						</td>  
						</tr>
					</thead> 
					<tbody>
						
						{foreach $tranes as $trane}
						<tr class="course" data-href="{$trane.link}">
						<td>{$trane.date_load}</td>
						<td>{$trane.city}                                   
						</td>
						<td> {$trane.name} 
						</td>
						<td>    {$trane.person} 
						</td>
						<td> 
							<a href="{$trane.reg}"  target="_blank" class="btn-custom btn-main-inverse">Зарегистрироваться</a>
							
						
							
						</td>
						
						 
						</tr>
						
						{/foreach} 
						{*end__cycle*}
					{if $all_button}
						<tr >
							<td colspan="5" align="center" class="page__table__courses__all"> 
							<a href="{$TRANE_LINK}" class="btn-custom btn-main">Все тренинги и курсы</a>
							</td>
						</tr>
					
					{/if} 
						
					</tbody>
</table>	


{if $admin.trane_edit_menu}
<button data-course="0" class="btn btn-success btn-xs js__course__modal">
Создать курс</button>
{/if}		


<script>
	$('.page__table__courses tbody tr').click(function(){
		
		var href = $(this).attr('data-href');
		window.location.href = href;
		
	});
	
	
	
</script>

		
					
					  
			    
			    


