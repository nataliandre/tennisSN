<?
class user extends Controller{
    public function  __construct() {
        parent::__construct();
        if(!$this->bIsAuthentificated()){
            $this->redirectToController('auth/login');
        }

    }

    public function page(){
        $this->tab_active = 'linkMainPage';
        $idUser = $this->getSessionParameters('idUser');
        $this->modelLoad('user/UserModel');
        $Informer = new Informer('Ваш акаунт пуст. Пожалуйста, заполните на странице <a href="http://tennis.webstudiomandarin.com/user/tunes">"настройки"</a>');
        $this->settings['informationNotify'] = $Informer->getWarningMessage();

        $this->settings['user'] = $this->model->getUserFromId($idUser);

        
        $this->setOutput('user/page.tpl');
    }


    public function games(){
        $this->tab_active = 'linkUserGames';
        
        $this->setOutput('user/games.tpl');
    }
    public function competition(){
        $this->tab_active = 'linkUserCompetitions';
        $this->setOutput('user/competition.tpl');
    }
    public function tunes(){
        $UserModel = $this->modelLoadToVar('user/UserModel');
        
        $this->setOutput('user/tunes.tpl');
    }
    public function messages(){
        $this->tab_active = 'linkUserMessages';
        $MessagesModel = Factory::ModelFactory('messages/MessagesModel');
        $this->settings['userMessages'] = $MessagesModel->getMessagesCurrentUser($this->getCurrentUser());

        $UserModel =  Factory::ModelFactory('user/UserModel');

        $this->settings['currentUser'] = $UserModel->getUserFromId($this->getCurrentUser());
        $this->settings['currentDate'] = date("Y-m-d");
        $this->settings['messageSendLink'] = $this->makeUrlToController('messages/send/');
        $this->setOutput('user/messages.tpl');
    }
    public function photos(){
        $this->tab_active = 'linkUserPhotos';
        $PhotosUserModel = Factory::ModelFactory('photos/PhotosUserModel');
        $this->settings['userPhotos'] = false;
        $this->settings['addNewPhotoLink'] = $this->makeUrlToController('photos/add');


        $this->setOutput('user/photos.tpl');
    }
    public function sends(){
        $this->tab_active = 'linkUserSends';
        $this->setOutput('user/sends.tpl');
    }
    public function view($id){
        $this->setOutput('user/view.tpl');
    }
    public function request(){
        $this->setOutput('user/request.tpl');
    }
    }
