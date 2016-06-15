{extends file=$EXTENDER_TPL}
{block name="userBody"}
{strip}
 <div class="row">
  <div class="col-xs-4">
   <div class="well well-sm" >
       <div class="avatar__image__holder">
           {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage class="avatarMainPage" User=$user }
       </div>
       <a href="" class="btn btn-success sm-txt width-parent">Изменить фотографию</a>

    </div>


   </div>
  <div class="col-xs-8">
    <div class="well well-sm">
      <p>{$user->name} {$user->surname}</p>
      <hr/>
      <div class="user__information">
        {$informationNotify}

      </div>
     </div>

     <div class="well well-sm">
       <p class="sm-txt">Фотографии</p>
         <div class="thrumb-photo">
             {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage  User=$user }
         </div>
     </div>

     <div class="well well-sm">
      <p class="sm-txt">Достижения</p>

     </div>
   </div>
 </div>
{/strip}
{/block}