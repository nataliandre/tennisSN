{extends file=$EXTENDER}
{block name="body"}
{strip}
<section class="bg__pink__scale padding-20">
	<div class="wrapper colorFFF align-center">

		<h1>Спасибо за заказ</h1>
			<div><img src="/img/smiley_icon_white.png" width="100"></div>
	        <h4>Номер вашего заказа: {$orderNum}</h4>
			<p>Следите за вашим заказом с помощью <a href="{$orderLinkFind}">функции слежения</a></p>








	</div>
</section>
	<div class="wrapper align-center padding-tb-30px">
	{include file='../elements/progressLine.tpl' }
	</div>

	<section class="bg__pink__scale padding-20">
		<div class="wrapper colorFFF">
			<h1>СМОТРИТЕ ТАКЖЕ</h1>
		</div>
	</section>
	<section >
		<div class="wrapper">
			{include file='../products/main_tpl.tpl' products=$products}
		</div>
	</section>

{/strip}
{/block}


