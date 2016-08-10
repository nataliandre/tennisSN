<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 16.07.16
 * Time: 13:22
 */
class tunesService extends Controller
{
    public function saveBirthDateAction()
    {
        $data  = $this->oGetRequestObject();
        $FromatedData['column'] = 'birthDate';
        $FromatedData['value'] = $data->birthDate;
        $UserModel = Factory::ModelFactory('user/UserModel');
        $UserModel->setParametr((object)$FromatedData,$this->getCurrentUser());
        $this->_SetFlashMessage();
        $this->_SetActiveCollapse('UserInfoAcriveCollapse');
        $this->redirectToController('user/tunes');
        die;
    }


    public function saveContactsInfoAction()
    {
        $this->_SetFlashMessage();
        $this->_SetActiveCollapse('ContactsActiveCollapse');
        $this->redirectToController('user/tunes');
    }

    public function saveParamsAction()
    {
        $this->_SetFlashMessage();
        $this->_SetActiveCollapse('ParamsActiveCollapse');
        $this->redirectToController('user/tunes');
    }

    public function savePlayersInfoAction()
    {
        $data = $this->oGetRequestObject();

        $RatingLinkModel = Factory::ModelFactory('link/RatingLinkModel');

        $UserId = $this->getCurrentUser();

        foreach ($data->ratingsLink as $index => $link)
        {

            $RatingLinkModel->setRatingLink($UserId,$link,$index);
        }
        $this->_SetFlashMessage();
        $this->_SetActiveCollapse('PlayersInfoActiveCollapse');
        $this->redirectToController('user/tunes');
    }

    public function savePasswordAction()
    {

        $this->_SetActiveCollapse('PasswordActiveCollapse');
        $UserModel = Factory::ModelFactory('user/UserModel');
        $CurrentUser = $UserModel->getUserFromId($this->getCurrentUser());
        $data = $this->oGetRequestObject();
        if($CurrentUser->passwd != md5($data->oldPassword))
        {
            $Informer = new Informer('Неправильный старый пароль!');
            $this->setFlashMessage($Informer->getErrorMessage());
            $this->redirectToController('user/tunes');
            die;
        }else{
            if($data->newPassword != $data->confirmPassword)
            {
                $Informer = new Informer('Новые пароли не совпадают!');
                $this->setFlashMessage($Informer->getErrorMessage());
                $this->redirectToController('user/tunes');
                die;
            }
            else
            {
                $FormatedData['userId'] = $this->getCurrentUser();
                $FormatedData['passwd1'] = $data->newPassword;
                $UserModel->vUpdateUserInformationPasswordAction((object)$FormatedData);
                $this->_SetFlashMessage();
                $this->redirectToController('user/tunes');
                die;
            }
        }



    }


    public function savePlaingTimeAction()
    {
        $data = $this->oGetRequestObject();
        $UserPlanModel = Factory::ModelFactory('user/UserPlanModel');
        $UserPlanModel->saveUserPlan($data,$this->getCurrentUser());
        $this->_SetActiveCollapse('PlayingGamesAcriveCollapse');
        $this->_SetFlashMessage();
        $this->redirectToController('user/tunes');
        die;
    }




    private function _SetActiveCollapse($sActiveCollapse)
    {
        $this->setSessionParameters('activeCollapse',$sActiveCollapse);
    }

    private function _SetFlashMessage()
    {
        $Informer = new Informer('Информацыя сохранена!');
        $this->setFlashMessage($Informer->getSuccessMessage());
    }

}