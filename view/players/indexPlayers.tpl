{extends file=$EXTENDER}
{block name="body"}
{strip}
    <div id="alertContainerFixed" class="alertContainerFixed">
    </div>

    <div class="wrapper">
        <h4>Игроки</h4>


        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                            Фильтры</a>
                    </h4>
                </div>
                <form action="{$filtersFormAction}" method="post" id="filtersForm">
                <div id="collapse1" class="panel-collapse collapse in ">
                    <div class="panel-body ">
                        <div class="row">



                            <div class="col-xs-2">
                                <p>Город:</p>
                                <div>
                                    <select name="cityId" class="form-control ">
                                        <option value="0">---</option>
                                        {foreach from=$cities item=$City }

                                            <option value="{$City->id}"
                                                    {if $City->id eq $user->cityId->id}selected{/if}
                                            >
                                                {$City->title}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>


                            <div class="col-xs-2">
                                <p>Уровень игры:</p>
                                <div>
                                    <select name="levelId" class="form-control ">
                                        <option value="0">---</option>
                                        {foreach from=$gameLevelArray item=$GameLevel }
                                            <option value="{$GameLevel->id}"
                                                    {if $GameLevel->id eq $user->levelId->id}selected{/if}
                                            >{$GameLevel->title}</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-3">
                                <p>Профессиональный разряд:</p>
                                <div>
                                    <select name="professionalId" class="form-control ">
                                        <option value="0">---</option>
                                        {foreach from=$professionalSkillsArray item=$professionalSkill }
                                            <option value="{$professionalSkill->id}"
                                                    {if $professionalSkill->id eq $user->professionalId->id}selected{/if}
                                            >{$professionalSkill->title}</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <p>Дни игры:</p>
                                <select name="playDays" class="form-control ">
                                    <option value="0">---</option>
                                    {for $foo=0 to $CountDaysInWeek}
                                        <option value="{$DaysInWeek[$foo]}">{$DaysInWeekRu[$foo]}</option>
                                    {/for}
                                </select>
                            </div>

                            <div class="col-xs-2">
                                <p>Время игры:</p>
                                с
                                  <input type="text" class="form-control inputPlayHours" name="startPlay" />
                                до
                                  <input type="text" class="form-control inputPlayHours" name="endPlay" />
                            </div>


                        </div>


                    </div>
                    <div class="align-right">
                        <a href="javascript:location.reload();" class="btn btn-xs btn-warning">Сбросить фильтр</a>
                        <button type="submit" class="btn btn-xs btn-success">Применить фильтр</button>
                    </div>
                </div>
                </form>
            </div>
        </div>








        <div class="well well-sm">
            <div class="usersContainer">
                {foreach from=$players item=$User}
                    <div>
                        <a href="{$routeUserPage|cat:$User->id}">
                            <p class="xsm-txt align-center">{$User->name} {$User->surname}</p>
                        </a>
                        {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage class="avatarFriends" User=$User }
                        <a href="{$newGameRequestLink|cat:$User->id}" class="btn btn-success btn-sm width-parent">Заявка на игру</a>
                        <a href="{$linkAddQuickGame|cat:$User->id}" class="btn btn-default btn-sm width-parent">Бистрая игра</a>
                        <a href="{$linkMessagesHistory|cat:$User->id}" class="btn btn-warning btn-sm width-parent">Сообщение</a>

                    </div>
                {/foreach}




            </div>
        </div>
    </div>

{literal}
    <script>
        $('#filtersForm').ajaxForm(function(data) {

            var Data = JSON.parse(data);
            if(Data.error)
            {
                $('.usersContainer').html('');
                $('#alertContainerFixed').html(Data.body);
            }
            if(Data.success)
            {
                $('.usersContainer').html('');
                $.each(Data.users,function(key,value){
                    var UserAvater = '/custom/img/avatar.jpg';
                    if(value.avatar !== null)
                    {
                        UserAvater = '/files/images/trumb/'+value.avatar;
                    }

                    var template = '<div><a href="{/literal}{$routeUserPage}{literal}'+value.id+'">';
                    template += '<p class="xsm-txt align-center">'+value.name+' '+value.surname+'</p>';
                    template += '</a>';
                    template += '<a href="{/literal}{$routeUserPage}{literal}'+value.id+'">';
                    template += '<img class="avatarFriends" src="'+UserAvater+'"></a>';
                    if(value.can_catch_requests){
                        template += '<a href="{/literal}{$newGameRequestLink}{literal}'+value.id+'" class="btn btn-success btn-sm width-parent">Заявка на игру</a>';
                        template += '<a href="{/literal}{$linkAddQuickGame}{literal}'+value.id+'" class="btn btn-default btn-sm width-parent">Бистрая игра</a>
                    }
                    template += '<a href="{/literal}{$linkMessagesHistory}{literal}'+value.id+'" class="btn btn-warning btn-sm width-parent">Сообщение</a> </div>';
                    template += '</div>';
                    $('.usersContainer').append(template);
                });
            }
        });

    </script>
{/literal}



{/strip}
{/block}