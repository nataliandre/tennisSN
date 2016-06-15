<?
class club extends Controller{
    public function  __construct() {
        parent::__construct();
    }
    public function senders(){
        $this->setOutput('club/senders.tpl');
    }
    public function photos(){
        $this->setOutput('club/photos.tpl');
    }
    public function edit(){
        $this->setOutput('club/edit.tpl');
    }
    public function comunity(){
        $this->setOutput('club/comunity.tpl');
    }
    public function index(){
        $this->setOutput('club/index.tpl');
    }
}