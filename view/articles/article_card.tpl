{foreach $articles as $article }
         
		 	<li class="page__article__cards__body">
						<a href="{$article.link}" ><img src="{$article.images}"/></a>
						<a href="{$article.link}"><h4>{$article.name}</h4></a>
						<p>
							{$article.smContent}
						</p>
					
					</li>

{/foreach}
