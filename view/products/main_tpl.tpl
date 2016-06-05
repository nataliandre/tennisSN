<ul class="products--cards">
{foreach from=$products item=$product}
<li>
	<div class="row">
		<div class="col-xs-5">
			<img class="bubble-img" src="{$product.preview}">
		</div>
		<div class="col-xs-6">


				<h4>{$product.name}</h4>
				<p>{$product.description}</p>
				<a href="{$product.tid}" class="btn-glory">ПОСМОТРЕТЬ</a>

		</div>
	</div>
</li>
{/foreach}
</ul>



 
	     
	     

     
     


