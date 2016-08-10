{extends file=$EXTENDER}
{block name="body"}
	{strip}
	<div class="wrapper">


		<div class="jumbotron tennisHeroContainer bgSlide1">
			<h1>+ {$countPlayers} игроков</h1><br/>
			<p>Выбери достойного соперника на tennis.com</p><br/>
			<p><a href="{$linkPlayersPage}" class="btn btn-primary btn-lg">Посмотреть</a></p>
		</div>


		<div class="jumbotron tennisHeroContainer bgSlide2">
			<h1>+ {$countTournaments} активных турниров</h1><br/>
			<p>Скорей присоединяйся к турнирам на tennis.com</p><br/>
			<p><a href="{$linkClubsPage}" class="btn btn-primary btn-lg">Посмотреть</a></p>
		</div>


	</div>
	{/strip}
{/block}
