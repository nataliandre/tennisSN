<?php




class games extends Controller
{

    public function  __construct() {
        parent::__construct();
        if(!$this->bIsAuthentificated()){
            $this->redirectToController('auth/login');
        }
        $this->settings['currentUser'] = $this->getCurrentUser();
        $this->settings['photosPath'] = $this->makeUrlToController($this->_upload_trumb_dir);
        $Links['linkToIncomingRequests'] = $this->makeUrlToController('games/incomingRequests');
        $Links['linkToOutgoingRequests'] = $this->makeUrlToController('games/outgoingRequests');
        $Links['linkToGamesResults'] = $this->makeUrlToController('games/results');
        $Links['linkToFastGames'] = $this->makeUrlToController('games/fastGames');
        $Links['gameResultsLink'] = $this->makeUrlToController('games/addResults/');
        $this->settings['GamesLinks'] = (object)$Links;

    }

    public function add($opponentId){
        $UserModel = Factory::ModelFactory('user/UserModel');
        $this->settings['opponentUser'] = $UserModel->getUserFromId($opponentId);
        $this->settings['opponentId'] = $opponentId;
        $this->setCSSUser('bootstrapSelect/bootstrap-select.css');
        $this->setScriptUser('bootstrapSelect/bootstrap-select.js');
        $this->setSessionParameters('gameAddSession',true);
        $this->settings['dataPicker']  = $this->_generateDataPicker();
        $CityModel = Factory::ModelFactory('city/CityModel');
        $this->settings['cities'] = $CityModel->getAllCities();
        $this->settings['actionNextStep'] = $this->makeUrlToController('games/doAddAction');
        $this->setOutput('games/add.tpl');
    }
    

    public function doAddAction(){
        if($this->getSessionParameters('gameAddSession')){
            $data = $this->oGetRequestObject();
            $GamesModel = Factory::ModelFactory('games/GamesModel');
            $gameId = $GamesModel->setGameRequest($data,$this->getCurrentUser());
            $UserModel  = Factory::ModelFactory('user/UserModel');
            $OpponentUser = $UserModel->getUserFromId($data->opponentId);
            $this->_sendGameConfirmMail($OpponentUser->email,$gameId);

            $this->redirectToController('games/outgoingRequests');
        }else{
            $this->redirectToController('user/page');
        }
    }


    public function results()
    {
        $this->setEndScriptUser('setters/confirmGameResults.js');
        $this->settings['activeTab'] = 'GamesResults';
        $this->_constructGamesGesults('getGameRequests');
        $this->setOutput('games/results.tpl');
    }


    public function addResults($gameId)
    {
        $GamesModel = Factory::ModelFactory('games/GamesModel');
        $Game = $GamesModel->getGameFromId($gameId);
        $GamesResultsModel = Factory::ModelFactory('games/GamesResultsModel');
        $GameResultsHelper = Factory::HelpersFactory('GameResultHelper','NoStatic');
        $GameResultsHelper->setGameResults($GamesResultsModel->getGameResultByGameId($gameId));
        $this->settings['gameResults'] = $GameResultsHelper;

        if($Game->active)
        {
            $this->redirect($this->makeUrlToController('games/outgoingRequests'));
            die;
        }
        $this->settings['FlashMessage'] = $this->getFlashMessage();
        $this->settings['actionForm'] = $this->makeUrlToController('games/doAddResultAction');
        $this->settings['Game'] = $GamesModel->getGameFromId($gameId);
        $this->setOutput('games/addResults.tpl');
    }

    public function doAddResultAction()
    {
        $data = $this->oGetRequestObject();
        $GamesResultsModel = Factory::ModelFactory('games/GamesResultsModel');
        $GameModel  = Factory::ModelFactory('games/GamesModel');
        $Game = $GameModel->getGameFromId($data->gameId);
        $GamesResults = $GamesResultsModel->getGameResultByGameId($data->gameId);

        if(
            !$GamesResults
            ||
            ($GamesResults->opponentConfirmed && !$GamesResults->userConfirmed)
            ||
            ($GamesResults->userConfirmed && !$GamesResults->opponentConfirmed)
        ){
            $GamesResultsModel->addGameResult($data);
            $this->redirect($this->makeUrlToController('games/results'));
        }else{
            $Message = new Informer(ErrorsDetector::errorGamesResultsAlreadyExist());
            $this->setFlashMessage($Message->getErrorMessage());
            $this->redirect($this->makeUrlToController('games/addResults/'.$data->gameId));

        }

    }

    public function incomingRequests()
    {
        $this->tab_active = 'linkUserGames';
        $this->settings['activeTab'] = 'GamesIncomingRequests';
        $GamesModel = Factory::ModelFactory('games/GamesModel');
        $this->setEndScriptUser('setters/confirmGamesRequest.js');
        $this->settings['userGames'] = $GamesModel->getIncomingGameRequests($this->getCurrentUser());
        $this->settings['currentUser'] = $this->getCurrentUser();
        $this->setOutput('games/incomingRequests.tpl');

    }

    public function outgoingRequests()
    {

        $this->tab_active = 'linkUserGames';
        $this->settings['activeTab'] = 'GamesOutgoingRequests';
        $GamesModel = Factory::ModelFactory('games/GamesModel');
        $this->setEndScriptUser('setters/confirmGamesRequest.js');
        $this->settings['userGames'] = $GamesModel->getOutgoingRequests($this->getCurrentUser());
        $this->settings['currentUser'] = $this->getCurrentUser();
        $this->setOutput('games/outgoingRequests.tpl');
    }


    public function fastGames()
    {
        $this->tab_active = 'linkUserGames';
        $this->settings['activeTab'] = 'FastGames';
        $this->_constructGamesGesults('getQuickGames');
        $this->setEndScriptUser('setters/confirmGameResults.js');
        $this->setOutput('games/fastGames.tpl');
    }




    private function _constructGamesGesults($method)
    {
        $GamesModel = Factory::ModelFactory('games/GamesModel');
        $Games = $GamesModel->{$method}($this->getCurrentUser());

        $GamesResultsModel = Factory::ModelFactory('games/GamesResultsModel');
        $GamesResultsFilter = Factory::FiltersFactory('GameResultsFilter');
        $ResultsId = $GamesResultsFilter::filterResultsById($Games);
        $GamesResults = (!empty($ResultsId)) ? $GamesResultsModel->getGamesResultsFromArray($GamesResultsFilter::filterResultsById($Games)) : false;
        $this->settings['GamesResults'] = $GamesResults;
    }

    private function _generateDataPicker(){
        $this->setScriptUser('datapicker/datepicker.min.js');
        $this->setCSSUser('datapicker/datepicker.min.css');
        $params['type'] = 'tMDB';
        $params['name'] = 'gameDate';
        $params['id'] = 'gameDate';
        $params['value'] = date("d.m.Y");
        return HTMLGenerator::datapickerGenerator($params);
    }




    private function _sendGameConfirmMail($email,$gameId)
    {
        $MailData['gameId'] =  $gameId;
        $tplBody = $this->getMailTemplate('gameRequest', (object)$MailData);
        $mailer = new Mailer($email, 'Подтверждение запроса на игру', $tplBody);
        $mailer->send();
    }






}