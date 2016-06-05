		             <li class="">
	                    <div class="chip-holder">
			              {if $chip}<div class="chip">Книги</div>{/if}   
					      <a href="{$route_books|cat:$book.tid}" title="{$book.name}">
						      <img src="{$book.image}" data-animate="true" class="full-size"/>
						      
						  </a>
					      <p>{$book.name} <br/> <span class="small-leters">{$book.author}</span></p>
					      <hr />
					      <em class="small-leters"> Скачиваний: {$book.downloaded}</em>
					      
					    </div>
					 </li>
			    
			    
			    


