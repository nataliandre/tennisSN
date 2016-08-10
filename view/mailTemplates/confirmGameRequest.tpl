<h4 style="text-align: center"  >
    Подтвердите игру "{$game->user_id->name}" - "{$game->opponent_id->name}",<br/>
    {$game->date} в г. {$game->city_id->title}
</h4>
<div style="text-align: center">
<h5>Информацыя от отправителя:</h5>
<h6><em>Профиль отправителя :</em>
    <a href="{$profileLink}{$game->user_id->id}">
        {$game->user_id->name} {$game->user_id->surname}
    </a>
</h6>

<h6>
    <em>Телефон :</em>
    {$game->user_id->phone}
</h6>
<h6>
    <em>Уровень игры:</em>
    {$game->user_id->levelId}
</h6>
</div>

<p style="text-align: center">
<a href="{$confirmGameLink}">Подтвердить</a>
<a href="{$cancelGameLink}">Отказаться</a>
</p>