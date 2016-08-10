<?
class Auth extends Controller{
    public function  __construct() {
        parent::__construct();
        $this->setting['classBodyCss'] = 'classTennisBackground';
    }
        public function login(){
            if($this->bIsAuthentificated()){
                $this->redirectToController('user/page');
            }
            $this->settings['flashMessage'] = $this->getFlashMessage();
            $this->settings['classBodyCss'] = 'bg__tennis__image';
            $this->settings['actionForm'] = linkDoLoginAction;
            $this->setOutput('auth/login.tpl');
        }


        public function doLoginAction(){
            if($this->bIsAuthentificated()){
                $this->redirectToController('user/page');
            }
            $data = $this->oGetRequestObject();
            $UserModel = Factory::ModelFactory('user/UserModel');
            $idUser = $UserModel->authentificateUser($data);
            if(is_numeric($idUser)){
                $this->vAuthentificateUser($idUser);
                $this->redirectToController('user/page');
            }else{
                $this->setFlashMessage($idUser);
                $this->redirectToController('auth/login');
            }
        }


        public function forgottenPass(){
            $this->setOutput('auth/forgottenPass.tpl');
        }

        public function logOut(){
            if($this->bIsAuthentificated()) {
                $this->vLogOutUser();
            }
            $this->redirectToController('auth/login');
        }
    }