<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 25.06.16
 * Time: 11:49
 */
class Language
{


    private static function _getTranslationObject($L)
    {
        $TranslationFactory = Factory::TranslationJSONFactory($L);
        return $TranslationFactory;
    }




    /** refresh with magic methods implementation */
    /** tournament Languages */
    public static function __callStatic($name,$L)
    {
        $TranslationObject = self::_getTranslationObject($L);
        
        echo $TranslationObject->{$name};
    }






    /** tournament Languages */
    public static function takePart($L){
        switch ($L){
            case "ru":
                return "Участвовать в турнире";
                break;
        }
    }



    public static function takePartIfAutorize($L){
        switch ($L){
            case "ru":
                return "Войдите в свой аккаунт чтобы принять участие";
                break;
        }
    }


    public static function tournamentButtonView($L){
        switch ($L){
            case "ru":
                return "Главная";
                break;
        }
    }

    public static function tournamentButtonPhotos($L){
        return self::photoTitle($L);
    }

    public static function tournamentButtonTable($L){
        switch ($L){
            case "ru":
                return "Турнирная таблица";
                break;
        }
    }

    public static function tournamentButtonTunes($L){
        switch ($L){
            case "ru":
                return "Настройки";
                break;
        }
    }

    public static function tournamentSearchPlaceholder($L){
        switch ($L){
            case "ru":
                return "Поиск по турнирам..";
                break;
        }
    }

    /** }  */

    /** clubsLanguages{
     */

    public static function clubButtonView($L){
        switch ($L){
            case "ru":
                return "Главная";
                break;
        }
    }

    public static function clubButtonPhotos($L){
        return self::photoTitle($L);
    }

    public static function clubButtonTable($L){
        switch ($L){
            case "ru":
                return "Турнирная таблица";
                break;
        }
    }

    public static function clubButtonTunes($L){
        switch ($L){
            case "ru":
                return "Настройки";
                break;
        }
    }

    public static function clubSearchPlaceholder($L){
        switch ($L){
            case "ru":
                return "Поиск по клубам..";
                break;
        }
    }

    public static function addClubTitle($L){
        switch ($L){
            case "ru":
                return "Добавить клуб";
                break;
        }
    }
    /**} */





    /** friendsLanguage{
     */


    public static function friendsSearchPlaceholder($L){
        switch ($L){
            case "ru":
                return "Поиск по пользователям";
                break;
        }
    }

    public static function emptyFriendsUser($L){
        switch ($L){
            case "ru":
                return "У вас пока нет друзей";
                break;
        }
    }

    public static function emptyFriendsSearchQuery($L){
        switch ($L){
            case "ru":
                return "По заданному запросу людей не найдено";
                break;
        }
    }

    public static function friendsRequestsTitle($L){
        switch ($L){
            case "ru":
                return "Заявки в друзья";
                break;
        }
    }





    /** } */


    /** messages Languages{
     * */
    public static function emptyMessageHistory($L){
        switch ($L){
            case "ru":
                return "У вас пока нет сообщеий";
                break;
        }
    }

    public static function messagesTitle($L)
    {
        switch ($L) {
            case "ru":
                return "Сообщения";
                break;
        }
    }
    public static function messageHistory($L)
    {
        switch ($L) {
            case "ru":
                return "История сообщений с ";
                break;
        }
    }

    public static function messageSendTitle($L){
        switch ($L){
            case "ru":
                return "Сообщение";
                break;
        }
    }

    public static function emptyMessageError($L)
    {
        switch ($L){
            case "ru":
                return "Сообщение не может быть пустым";
                break;
        }
    }


    /** }  */

    /** modelFriends{
     * */
    public static function friendsTitle($L)
    {
        switch ($L) {
            case "ru":
                return "Друзья";
                break;
        }
    }
    
    public static function friendsTitleRequest($L)
    {
        switch ($L) {
            case "ru":
                return "Заявки в друзья";
                break;
        }
    }

    public static function noFriendsRequests($L)
    {
        switch ($L) {
            case "ru":
                return "У вас пока нет заявок в друзья";
                break;
        }
    }
    /** }  */


    /**
     * gamesTitle{
     */
    public static function gamesTitle($L)
    {
        switch ($L) {
            case "ru":
                return "Встречи";
                break;
        }
    }

    public static function gameSetTitle($L)
    {
        switch ($L) {
            case "ru":
                return "Сет";
                break;
        }

    }


    public static function gameResultsTitle($L)
    {
        switch ($L) {
            case "ru":
                return "Результаты игры";
                break;
        }
    }



    public static function gamesIncomingTitle($L)
    {
        switch ($L) {
            case "ru":
                return "Входящие запросы";
                break;
        }
    }

    public static function gamesOutgoingTitle($L)
    {
        switch ($L) {
            case "ru":
                return "Выходящие запросы";
                break;
        }
    }

    public static function gamesResultsTitle($L)
    {
        switch ($L) {
            case "ru":
                return "Результаты игр";
                break;
        }
    }

    /** } */

    /**
     * userTitles{
     */

    public static function userTunesTitleXL($L)
    {
        switch ($L) {
            case "ru":
                return "Изменить настройки профиля";
                break;
        }
    }

    public static function userInfoTitle($L)
    {
        switch ($L) {
            case "ru":
                return "Информацыя пользователя";
                break;
        }
    }

    public static function userAchievementTitle($L)
    {
        switch ($L) {
            case "ru":
                return "Достижения";
                break;
        }
    }

    public static function userTrainerHeadInfo($L){
        switch ($L) {
            case "ru":
                return "Тренер";
                break;
        }
    }

    public static function userTrainerHeadContent($L){
        switch ($L) {
            case "ru":
                return "Спросите пользовотеля про тренировку";
                break;
        }
    }

    public static function tunesTitleUserInfo($L)
    {
        switch ($L) {
            case "ru":
                return "Личная информация";
                break;
        }

    }






    /**
     * }
     */

    /**
     * general Languages{
     * */

      public static function saveButtonTitle($L)
      {
          switch ($L){
            case "ru":
                return "Сохранить";
                break;
          }
      }

      public static function photoTitle($L){
          switch ($L){
              case "ru":
                  return "Фотографии";
                  break;
          }
      }

        public static function addPhotoButton($L){
            switch ($L){
                case "ru":
                    return "Добавить фото";
                    break;
            }
        }

        public static function noPhotos($L){
            switch ($L){
                case "ru":
                    return "Пока нет фотографий";
                    break;
            }
        }

        public static function noAchivments($L){
            switch ($L){
                case "ru":
                    return "Нет сыграных игор";
                    break;
            }
        }

        public static function buttonSendTitle($L){
            switch ($L){
                case "ru":
                    return "Отправить";
                    break;
            }
        }

      public static function photoButton($L){
          return self::photoTitle($L);
      }
        public static function errorTitle($L){
            switch ($L){
                case "ru":
                    return "Ошыбка";
                    break;
            }
        }


      public static function allPhotoTitle($L)
      {
          switch ($L) {
              case "ru":
                  return "Все фото";
                  break;
          }
      }
    /** } */



    /**
     *userOptionsTitles{
     */
    public static function optCityTitle($L)
    {
        switch ($L) {
            case "ru":
                return "Город";
                break;
        }
    }

    public static function optTShtSizeTitle($L)
    {
        switch ($L) {
            case "ru":
                return "Размер футболки";
                break;
        }
    }

    public static function optHandTitle($L)
    {
        switch ($L) {
            case "ru":
                return "Играющая рука";
                break;
        }
    }
    public static function optProfSkillsTitle($L)
    {
        switch ($L) {
            case "ru":
                return "Професиональный разряд";
                break;
        }
    }
    public static function optLevelTitle($L)
    {
        switch ($L) {
            case "ru":
                return "Уровень игры";
                break;
        }
    }
    public static function optHeightTitle($L){
        switch ($L) {
            case "ru":
                return "Рост игрока";
                break;
        }
    }
    public static function optWeightTitle($L){
        switch ($L) {
            case "ru":
                return "Вес игрока";
                break;
        }
    }

    /** } */


}