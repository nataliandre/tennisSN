<?
class user extends Controller{
    public function  __construct() {
        parent::__construct();
    }
    public function games(){
    $this->setOutput('user/games.tpl');
    }
    public function competition(){
        $this->setOutput('user/competition.tpl');
    }
    public function edit(){
        $this->setOutput('user/edit.tpl');
    }
    public function messages(){
        $this->setOutput('user/messages.tpl');
    }
    public function photos(){
        $this->setOutput('user/photos.tpl');
    }
    public function sends(){
        $this->setOutput('user/sends.tpl');
    }
    public function view($id){
        $this->setOutput('user/view.tpl');
    }
    public function request(){
        $this->setOutput('user/request.tpl');
    }
    }
