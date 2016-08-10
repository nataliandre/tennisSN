{extends file=$EXTENDER_CLUB}
{block name="clubBody"}
{strip}





    <div class="row rowAligner">

        <div class="col-xs-8">
            <div class="well well-sm">


                <div class="clubInformationContainer">
                <p>{$club->info}</p>
                <hr/>
                <p>Адрес клуба: {$club->location}</p>
                <p>Город: {$club->city_id->title}</p>

                </div>

                {if !$isTakePart}
                    <form action="{$takePartInClub}" method="post" id="takePartInClub">
                    <input type="hidden" name="clubId" value="{$club->id}" />
                    <button type="submit" class="btn btn-info btnMore ">
                        Стать участником клуба
                    </button>
                    </form>
                    {literal}
                        <script>
                            $('#takePartInClub').ajaxForm(function(data){
                                $('#ajaxMessagesContainer').html(data);
                                setTimeout(function (){window.location.reload();},500);
                            });
                        </script>
                    {/literal}
                {else}
                    <form action="{$leaveClub}" method="post" id="leaveClub">
                        <input type="hidden" name="clubId" value="{$club->id}" />
                        <button type="submit" class="btn btn-danger btnMore ">
                            Покинуть клуб
                        </button>
                    </form>
                    {literal}
                    <script>
                        $('#leaveClub').ajaxForm(function(data){
                            $('#ajaxMessagesContainer').html(data);
                            setTimeout(function (){window.location.reload();},500);
                        });
                    </script>
                    {/literal}
                {/if}
            </div>

            <div class="well well-sm">
                <p class="partTitleSm">{Language::photoTitle($LANGUAGE)}</p>
                {include file="../elements/images/photosGrid.tpl" imageClass="userPagePhotosGridImageHolder" images=$clubPhotos photosPath=$photosPath}
                <a href="{$ClubLinks->linkToClubPhotos|cat:$club->id}" class="btn btn-info btnMore">
                    {Language::allPhotoTitle($LANGUAGE)}
                </a>
            </div>
            {* Новости клуба *}
            <div class="well well-sm">
                <p class="partTitleSm">Новости клуба</p>
                {if $isClubAdministrator}
                    <form action="{$addClubNews}" method="post" id="addClubNews">
                        <input type="hidden" name="clubId" value="{$club->id}" />
                        <p id="messageTarget" class="editableColumn clubMessageTextarea" name="Message" contenteditable="true"></p>
                        <input type="hidden" name="message" id="messageHolder" />
                        <button type="submit" class="btn btn-info btnMore ">
                            Отправить новость
                        </button>
                    </form>
                    {literal}
                        <script>
                            $('#messageTarget').on("blur",function(){
                                var messageBody = $(this).html();
                                $('#messageHolder').val(messageBody);
                            });
                            $('#addClubNews').ajaxForm(function(data){
                                setTimeout(function (){window.location.reload();},500);
                            });
                        </script>
                    {/literal}
                {/if}
                {* Площадка для новостей *}
                {if $news}
                 <div class="newsContainer">
                     {foreach from=$news item=$new}
                         <div >
                             {$new->message}
                             <p class="sm-txt right-aligner">{$new->date}</p>
                         </div>
                     {/foreach}
                 </div>
                {else}
                    {include file="../elements/empty/tpl.tpl" text="В клубе пока нет новостей"}
                {/if}
            </div>







        </div>


        <div class="col-xs-4">
            <div class="well well-sm" >
                <div class="avatar__image__holder">
                    {include file="{$routeAvatarClubsTpl}" routeClubPage=$routeClubPage class="avatarMainPage" Club=$club }
                </div>

                <a href="/messages/send/{$clubCreator->id}" class="btn btn-success btnAdd">
                   Написать администратору
                </a>

                {if $club->userId eq $currentUser}
                    <a href="{$ClubLinks->linkToChangeAvatarPhoto|cat:$club->id}" class="btn btn-info btnAdd">
                        {Language::addPhotoButton($LANGUAGE)}
                    </a>
                {/if}



            </div>
            <div class="well well-sm" >
                <p class="partTitleSm">Участники ({$countUsersInClub})</p>

                    {if $usersInClub}
                        <div class="usersSmallContainer">
                        {foreach $usersInClub as $Club}
                        <div>
                            {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage class="avatarUsersSmallContainer" User=$Club }
                            <a href="{$routeUserPage|cat:$Club->id}">
                                <p >
                                    {$Club->name} {$Club->surname}
                                </p>
                            </a>
                        </div>
                        {/foreach}
                        </div>
                    {else}
                        {include file="../elements/empty/tpl.tpl" text="В клубе пока нету участников"}
                    {/if}



            </div>
            <div class="well well-sm" >
                 <p class="partTitleSm">Администратор</p>
                 <div class="usersSmallContainer">
                      <div>
                      {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage class="avatarUsersSmallContainer" User=$clubCreator }
                       <a href="{$routeUserPage|cat:$clubCreator->id}">
                           <p >
                               {$clubCreator->name} {$clubCreator->surname}
                           </p>
                       </a>
                      </div>
                 </div>
            </div>
        </div>
    </div>

{/strip}
{/block}