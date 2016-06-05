<?
class competition extends Controller{
    public function  __construct() {
        parent::__construct();
    }
    public function takePart($id){
        $this->setOutput('competition/takePart.tpl');
    }
    public function tournamentList(){
        $this->setOutput('competition/tournamentList.tpl');
    }
    public function view($id){
        $this->setOutput('competition/view.tpl');
    }
}
