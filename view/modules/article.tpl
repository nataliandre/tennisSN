{strip} 
		             <li class="">
	                    <div class="chip-holder">
			              <div class="chip">{$article.topic}</div>   
					      
					      <a href="{$route_articles|cat:$article.tid}" 
						      title="{$article.name}">
						  <img src="{$article.images}" data-animate="true" alt="{$article.name}" class="full-size"/>     
						  </a>
						  
					      <p>{$article.name} <br/> <em class="small-leters">{$article.date_load}</em></p>
					      <hr />
					      <span class="small-leters">{$article.smContent}</span>
					      
					    </div>
					 </li>
{/strip}



