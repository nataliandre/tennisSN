{foreach $books as $book}
         
		 	<li class="page__article__cards__body book__card">
						<div class="book__image__holder">
							<a href="{$book.link}" ><img src="{$book.image}"/></div></a>
						<a href="{$book.link}"><h4>{$book.name}</h4></a>
						<p>
							{$article.smContent}
						</p>
					
					</li>

{/foreach}
