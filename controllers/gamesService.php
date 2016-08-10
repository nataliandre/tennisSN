<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 17.07.16
 * Time: 00:51
 */
class gamesService extends Controller
{


    public function __construct()
    {
        parent::__construct();
    }


    public function  confirmGameRequest($gameId)
    {
        
        
            $this->extender = 'view/common/bodyMessages.tpl';
            $GamesModel = Factory::ModelFactory('games/GamesModel');
            $Game = $GamesModel->getGameFromId($gameId);
        if($Game->id == 0){
            $Informer = new Informer('Игры не найдено!');
            $this->settings['message'] = $Informer->getErrorMessage();
        }else {
            if ($Game->confirmed) {
                $Informer = new Informer('Игра уже активирована');
                $this->settings['message'] = $Informer->getErrorMessage();

            } else {
                $GamesModel->vConfirmGameByIdWithoutVerification($gameId);
                $userMail= $Game->user_id->email;
                $this->_sendConfirmedMail($userMail,$gameId);
                $Informer = new Informer('Игра успешно активирована!');
                $this->settings['message'] = $Informer->getSuccessMessage();
            }
        }
            $this->settings['link'] = $this->makeUrlToController('games/outgoingRequests');
            $this->setOutput('games/gameActivation.tpl');
        
        
    }

    public function  cancelGameRequest($gameId)
    {
        $this->extender = 'view/common/bodyMessages.tpl';
        $GamesModel = Factory::ModelFactory('games/GamesModel');
        $Game = $GamesModel->getGameFromId($gameId);
        if($Game->id == 0){
            $Informer = new Informer('Игры не найдено!');
            $this->settings['message'] = $Informer->getErrorMessage();
        }else {
            if ($Game->confirmed && $Game->opponentVisible) {
                $Informer = new Informer('Нет доступа для отмены игры!');
                $this->settings['message'] = $Informer->getErrorMessage();

            } else {
                $GamesModel->vFailureGameByIdWithoutVerification($gameId);


                $Informer = new Informer('Игра успешно отклонена!');
                $this->settings['message'] = $Informer->getSuccessMessage();
            }
        }
        $this->settings['link'] = $this->makeUrlToController('games/outgoingRequests');
        $this->setOutput('games/gameActivation.tpl');
    }


    public function confirmGameResult($gameId)
    {

    }


    public function _sendConfirmedMail($email,$gameId)
    {
        $MailData['gameId'] =  $gameId;
        $tplBody = $this->getMailTemplate('gameWasConfirmed', (object)$MailData);
        $mailer = new Mailer($email, 'Запрос на игру подтвержден', $tplBody);
        $mailer->send();
    }

}