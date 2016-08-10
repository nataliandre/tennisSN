{extends file=$EXTENDER_TPL}
{block name="userBody"}
{strip}
 <div class="row">
  <div class="col-xs-4">
   <div class="well well-sm" >
       <div class="avatar__image__holder">
           {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage class="avatarMainPage" User=$user }
       </div>
       <a href="{$userChangeAvatarRoute}" class="btn btn-success sm-txt width-parent">Изменить фотографию</a>
    </div>


      {if $UserPlan}
          <h5 >График игры</h5>
          <div class="well well-sm">
              {foreach from=$UserPlan item=$UserP}
                  {if !$UserP->playDay}
                      <div>
                          <p class="sm-txt">{$UserP->title}</p>
                          <p> c {$UserP->minValue} до {$UserP->maxValue} </p>
                      </div>
                  {/if}
              {/foreach}
          </div>

      {/if}




   </div>
  <div class="col-xs-8">
      <h4>{$user->name} {$user->surname}</h4>

      <h5 >{Language::userInfoTitle($LANGUAGE)}</h5>
    <div class="well well-sm">
        {include file='../elements/containers/userOptions.tpl' user=$user }
        <a href="{$tunesLink}" class="btn btn-info btnAdd">{Language::userTunesTitleXL($LANGUAGE)}</a>

    </div>
      <h5 >{Language::photoTitle($LANGUAGE)}</h5>
     <div class="well well-sm">
         {if $userPhotos}
         {include file="../elements/images/photosGrid.tpl" imageClass="userPagePhotosGridImageHolder" images=$userPhotos photosPath=$photosPath}
         {else}
         {include file="../elements/empty/tpl.tpl" text=Language::noPhotos($LANGUAGE)}
         {/if}
     </div>
      <h5 >{Language::userAchievementTitle($LANGUAGE)}</h5>
     <div class="well well-sm">
         {include file="../user/tabCampionships.tpl"}
     </div>
   </div>
 </div>
{/strip}
{/block}