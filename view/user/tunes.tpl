{extends file=$EXTENDER_TPL}
{block name="userBody"}
    {strip}
    <h4>Настройки профиля<h4>

  <button type="button" class="btn btn-info btnTrayOpen" data-toggle="collapse" data-target="#user-info">
  {Language::tunesTitleUserInfo($LANGUAGE)}
  </button>

  <div id="user-info" class="collapse {if $activeCollapse eq 'UserInfoAcriveCollapse'}in{/if}">
  {if $activeCollapse eq 'UserInfoAcriveCollapse' && $FlashMessage}
    <div class="FlashMessagesTunesContainer">
        {$FlashMessage}
    </div>
  {/if}
  <form method="post" action="{$actionSaveBirthDateLink}">
        <div class="tableTunesPlaceholder">
        <table class="table  tableTunes">
               <tbody>
                <tr>
                   <td>Дата рождения</td>
                   <td>
                        {$birthDateDataPicker}
                   </td>
                   <td></td>
                   <td></td>
               </tr>
               </tbody>
        </table>
        </div>
        <button type="submit" class="btn btn-success btnSave marginTop-30">{Language::saveButtonTitle($LANGUAGE)}</button>
  </form>
  </div>




  <button type="button" class="btn btn-info btnTrayOpen" data-toggle="collapse" data-target="#contacts-info">
  Контактные данные
  </button>
  <div id="contacts-info" class="collapse {if $activeCollapse eq 'ContactsActiveCollapse'}in{/if}">
  {if $activeCollapse eq 'ContactsActiveCollapse' && $FlashMessage}
    <div class="FlashMessagesTunesContainer">
        {$FlashMessage}
    </div>
  {/if}
  <form method="post" action="{$actionSaveContactsInfoLink}">
   <div class="tableTunesPlaceholder">
        <table class="table tableTunes">
               <tbody>
                <tr>
                   <td>Телефон</td>
                   <td class="editableColumn" name="phone" contenteditable="true">{$user->phone}</td>
                   <td>Город</td>
                   <td>
                       <select name="cityId" class="form-control editableSelect">
                           <option value="0">---</option>
                            {foreach from=$cities item=$City }
                                <option value="{$City->id}"
                                {if $City->id eq $user->cityId->id}selected{/if}
                                >
                                {$City->title}
                                </option>
                            {/foreach}
                       </select>
                   </td>
               </tr>
               </tbody>
        </table>
   </div>
        <button type="submit" class="btn btn-success btnSave marginTop-30">
        {Language::saveButtonTitle($LANGUAGE)}
        </button>
  </form>
  </div>


  <button type="button" class="btn btn-info btnTrayOpen" data-toggle="collapse" data-target="#params-info">
  Параметры
  </button>
   <div id="params-info" class="collapse {if $activeCollapse eq 'ParamsActiveCollapse'}in{/if}">
  {if $activeCollapse eq 'ParamsActiveCollapse' && $FlashMessage}
    <div class="FlashMessagesTunesContainer">
        {$FlashMessage}
    </div>
  {/if}
  <form method="post" action="{$actionSaveParametrsLink}">
   <div class="tableTunesPlaceholder">
        <table class="table  tableTunes">
               <tbody>
                <tr>
                   <td>{Language::optHeightTitle($LANGUAGE)}</td>
                   <td class="editableColumn" name="height" contenteditable="true">{$user->height}</td>
                   <td>{Language::optWeightTitle($LANGUAGE)}</td>
                   <td class="editableColumn" name="weight" contenteditable="true">{$user->weight}</td>
               </tr>
               <tr>
                   <td>Размер футболки</td>
                   <td>

                       <select name="tshortSizeId" class="form-control editableSelect">
                           <option value="0">---</option>
                           {foreach from=$tshortSizeArray item=$TSize }
                               <option value="{$TSize->id}"
                                       {if $TSize->id eq $user->tshortSizeId->id}selected{/if}
                               >{$TSize->title}</option>
                           {/foreach}
                       </select>

                   </td>
                   <td>Играющая рука</td>
                   <td>
                       <select name="handId" class="form-control editableSelect">
                           <option value="0">---</option>


                           {foreach from=$handsArray item=$Hand }
                               <option value="{$Hand->id}"
                                       {if $Hand->id eq $user->handId->id}selected{/if}
                               >{$Hand->title}</option>
                           {/foreach}
                       </select>
                   </td>
               </tr>
               </tbody>
        </table>
   </div>
        <button type="submit" class="btn btn-success btnSave marginTop-30">
        {Language::saveButtonTitle($LANGUAGE)}
        </button>
  </form>
  </div>

  <button type="button" class="btn btn-info btnTrayOpen" data-toggle="collapse" data-target="#player-info">
  Игровые качества
  </button>
  <div id="player-info" class="collapse {if $activeCollapse eq 'PlayersInfoActiveCollapse'}in{/if}">
        {if $activeCollapse eq 'PlayersInfoActiveCollapse' && $FlashMessage}
            <div class="FlashMessagesTunesContainer">
                {$FlashMessage}
            </div>
        {/if}
        <form method="post" action="{$actionSavePlayerInfoLink}">
        <div class="tableTunesPlaceholder">
            <table class="table  tableTunes">
                <tbody>
                       <tr>
                           <td>
                               Профессиональный разряд
                               <span class="helpTooltip" data-toggle="tooltip" data-placement="top" title="Информацыя"> ? </span>

                           </td>
                           <td>
                               <select name="professionalId" class="form-control editableSelect">
                                   <option value="0">---</option>
                                   {foreach from=$professionalSkillsArray item=$professionalSkill }
                                       <option value="{$professionalSkill->id}"
                                               {if $professionalSkill->id eq $user->professionalId->id}selected{/if}
                                       >{$professionalSkill->title}</option>
                                   {/foreach}
                               </select>
                           </td>
                           <td>
                               Уровень игрока
                               <span class="helpTooltip" data-toggle="tooltip" data-placement="top" title="Информацыя"> ? </span>

                           </td>
                           <td>
                               <select name="levelId" class="form-control editableSelect">
                                   <option value="0">---</option>
                                   {foreach from=$gameLevelArray item=$GameLevel }
                                       <option value="{$GameLevel->id}"
                                               {if $GameLevel->id eq $user->levelId->id}selected{/if}
                                       >{$GameLevel->title}</option>
                                   {/foreach}
                               </select>
                           </td>

                       </tr>
                       <tr>
                           <td>
                               Участвие в рейнтингах
                               <span class="helpTooltip" data-toggle="tooltip" data-placement="top" title="Информацыя"> ? </span>

                           </td>
                           <td id="setNewInputButtonHolder" class="setNewInputButtonHolder" >
                               <p class="editableColumn" name="ratings" contenteditable="true">{$user->ratings}</p>
                               <a data-input-holder="setNewInputButtonHolder" data-input-name="ratingsLink[]"  class="btn btn-danger jsAddNewInput setNewIputButton">+</a>
                               {if $RatingLinks}
                                    {foreach from=$RatingLinks item=$RatingLink}
                                        <input
                                               type="text"
                                               name="ratingsLink[{$RatingLink->linkId}]"
                                               class="form-control"
                                               value="{$RatingLink->linkBody}"
                                        />
                                    {/foreach}
                               {/if}
                           </td>
                           {literal}
                                <script>
                                    $('.jsAddNewInput').click(function()
                                    {
                                        var inputHolder = $(this).attr('data-input-holder');
                                        var inputName = $(this).attr('data-input-name');
                                        var inputString = '<input type="text" name="%s" class="form-control" />';
                                        $('#'+inputHolder).append(inputString.replace("%s",inputName));
                                    });
                                </script>
                           {/literal}
                           <td>
                               Тренер
                               <span class="helpTooltip" data-toggle="tooltip" data-placement="top" title="Информацыя"> ? </span>

                           </td>
                           <td>
                               <input type="checkbox" name="isTrainer" class="editableRadio" value="1" {if $user->isTrainer}checked{/if}/>
                           </td>
                       </tr>
                       <tr>
                           <td>
                               Принимать заявки на игру
                               <span class="helpTooltip" data-toggle="tooltip" data-placement="top" title="Информацыя"> ? </span>

                           </td>
                           <td>
                               <input type="checkbox" name="canCatchRequests" class="editableRadio" value="1" {if $user->canCatchRequests}checked{/if}/>
                           </td>
                       </tr>
                 </tbody>
        </table>
        </div>
        <button type="submit" class="btn btn-success btnSave marginTop-30">
        {Language::saveButtonTitle($LANGUAGE)}
        </button>
  </form>
  </div>



<button type="button" class="btn btn-info btnTrayOpen" data-toggle="collapse" data-target="#playingTime-info">
    Время игры
</button>
{$rangeMonday->initializeDisableFunction()}
<div id="playingTime-info" class="collapse {if $activeCollapse eq 'PlayingGamesAcriveCollapse'}in{/if}">
    {if $activeCollapse eq 'PlayingGamesAcriveCollapse' && $FlashMessage}
        <div class="FlashMessagesTunesContainer">
            {$FlashMessage}
        </div>
    {/if}
    <form method="post" action="{$actionSavePlayingTimeLink}">
        <div class="tableTunesPlaceholder userPlanPlaceholder">
            <table class="table  tableTunes">
                <tbody>

                <tr>
                    <td >
                        Пн.
                        <br/>
                        {$rangeMonday->getDisabler()} Не играю в понеделник
                    </td>

                    <td >
                        {$rangeMonday->getDivObject()}
                        {$rangeMonday->setInputHandlers()}
                    </td>
                    {$rangeMonday->getScriptStructure()}
                    {$rangeMonday->getDisablerScript()}



                    <td >
                        Вт.
                        <br/>
                        {$rangeTuesday->getDisabler()} Не играю во вторник
                    </td>
                    <td>
                        {$rangeTuesday->getDivObject()}
                        {$rangeTuesday->setInputHandlers()}
                    </td>
                    {$rangeTuesday->getScriptStructure()}
                    {$rangeTuesday->getDisablerScript()}
                </tr>

                <tr>
                    <td >
                        Ср.
                        <br/>
                        {$rangeWednesday->getDisabler()} Не играю в среду
                    </td>

                    <td >
                        {$rangeWednesday->getDivObject()}
                        {$rangeWednesday->setInputHandlers()}
                    </td>
                    {$rangeWednesday->getScriptStructure()}
                    {$rangeWednesday->getDisablerScript()}



                    <td >
                        Чт.
                        <br/>
                        {$rangeThursday->getDisabler()} Не играю в четверг
                    </td>
                    <td>
                        {$rangeThursday->getDivObject()}
                        {$rangeThursday->setInputHandlers()}
                    </td>
                    {$rangeThursday->getScriptStructure()}
                    {$rangeThursday->getDisablerScript()}

                </tr>

                <tr>
                    <td >
                        Пт.
                        <br/>
                        {$rangeFriday->getDisabler()} Не играю в среду
                    </td>

                    <td >
                        {$rangeFriday->getDivObject()}
                        {$rangeFriday->setInputHandlers()}
                    </td>
                    {$rangeFriday->getScriptStructure()}
                    {$rangeFriday->getDisablerScript()}



                    <td >
                        Сб.
                        <br/>
                        {$rangeSaturday->getDisabler()} Не играю в четверг
                    </td>
                    <td>
                        {$rangeSaturday->getDivObject()}
                        {$rangeSaturday->setInputHandlers()}
                    </td>
                    {$rangeSaturday->getScriptStructure()}
                    {$rangeSaturday->getDisablerScript()}

                </tr>

                <tr>
                    <td >
                        Вс.
                        <br/>
                        {$rangeSunday->getDisabler()} Не играю в среду
                    </td>

                    <td >
                        {$rangeSunday->getDivObject()}
                        {$rangeSunday->setInputHandlers()}
                    </td>
                    {$rangeSunday->getScriptStructure()}
                    {$rangeSunday->getDisablerScript()}



                    <td class="align-center">

                    </td>
                    <td>

                    </td>


                </tr>

                </tbody>
            </table>
        </div>
        <button type="submit" class="btn btn-success btnSave marginTop-30">{Language::saveButtonTitle($LANGUAGE)}</button>
    </form>
</div>











            <button type="button" class="btn btn-info btnTrayOpen" data-toggle="collapse" data-target="#password-info">
                Сменить пароль
            </button>
            <div id="password-info" class="collapse {if $activeCollapse eq 'PasswordActiveCollapse'}in{/if}">
                {if $activeCollapse eq 'PasswordActiveCollapse' && $FlashMessage}
                    <div class="FlashMessagesTunesContainer">
                        {$FlashMessage}
                    </div>
                {/if}
                <form method="post" action="{$actionSavePasswordLink}">
                    <div class="tableTunesPlaceholder">
                        <table class="table  tableTunes">
                            <tbody>
                            <tr>
                                <td>Старый пароль</td>
                                <td><input type="text" class="form-control" name="oldPassword"></td>
                                <td></td>
                                <td></td>

                            </tr>
                            <tr>
                                <td>Новый пароль</td>
                                <td><input type="text" class="form-control" name="newPassword"></td>
                                <td>Повторите новый пароль</td>
                                <td><input type="text" class="form-control" name="confirmPassword"></td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-success btnSave marginTop-30">
                        {Language::saveButtonTitle($LANGUAGE)}
                    </button>
                </form>
            </div>




            <script>
                var sessionHash = "{$sessionHash}";
                var userLink = "{$ajaxController}";

                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                })
            </script>

    {/strip}
{/block}



            {block name="script"}
                <script src="/custom/nouislider/nouislider.min.js"></script>
            {/block}

            {block name="css"}
                <link rel="stylesheet" href="/custom/nouislider/nouislider.css"/>
            {/block}

