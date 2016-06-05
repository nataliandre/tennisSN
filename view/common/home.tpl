
{extends file=$EXTENDER}
{block name="body"}
	{strip}


		<section class="div__straitch__bg">
			<div class="wrapper">
			<ul class="aling__first">
				<li class="video">

				</li>
				<li>
					<div class="first__div__text">
						<h1>Gloria.com</h1>
						<h3>Качество производство</h3>
						<h3 class="first__Div__h3__pading">стрейч пленки</h3>
					</div>
				</li>
			</ul>
			</div>
		</section>


<section class="bg__pink__scale padding-20">
	<div class="wrapper colorFFF align-center">
		<h3>Смотрите статус своего заказа</h3>
		<a class="btn btn-success" href="/order/find">Искать заказ</a>
	</div>
</section>


		<section class="bg__bog__poster">
			<div class="wrapper">



					<p class="description--text">
						Наша компания предлагает товары производственного потребления: стрейч (стретч) пленку, скотч,
						пузырьковую пленку, ПВД, перчатки, пакеты, мусорные мешки, гофрокартон и другую упаковку.
						Особое внимание уделяем стрейч (стретч) пленке «Сильвер». Для изготовления пленки этого сорта
						используется максимально очищенное сырье и первичные материалы. Продукт хорошо выглядит, имеет
						свойства соизмеримые с пленкой из первичного сырья.
					</p>

			</div>
		</section>



		<section class="bg__pink__scale padding-20">
			<div class="wrapper colorFFF">
			<h1>НАШИ ПРОДУКТЫ</h1>
			</div>
		</section>
		<section >
			<div class="wrapper">
			{include file='../products/main_tpl.tpl' products=$products}
			</div>
		</section>


		<section class="bg__pink__scale padding-20">
			<div class="wrapper colorFFF">
			<h1>НОВОСТИ</h1>
			<!--<ul>
				<li class="forth__div__parts">
					<p class="news__title">Банки лишеные лицензии</p>
					<p class="news__date">12.01.2015</p>
					<p class="news__continue">читать далее ></p>
				</li>
				<li class="forth__div__parts">
					<p class="news__title">Банки лишеные лицензии</p>
					<p class="news__date">12.01.2015</p>
					<p class="news__continue">читать далее ></p>
				</li>
			</ul>-->
			</div>
		</section>



	{/strip}
{/block}


