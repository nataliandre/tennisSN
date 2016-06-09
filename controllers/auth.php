<?
class Auth extends Controller{
    public function  __construct() {
        parent::__construct();
        $this->setting['classBodyCss'] = 'classTennisBackground';
    }
        public function login(){
            $this->setOutput('auth/login.tpl');
        }
        public function register(){
            $this->setOutput('auth/register.tpl');
        }
        public function forgottenPass(){
            $this->setOutput('auth/forgottenPass.tpl');
        }
        public function checkOut(){
            $this->setOutput('auth/checkOut.tpl');
        }
    }