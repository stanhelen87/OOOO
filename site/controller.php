<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 25.11.2014
 * Time: 0:44
 */

class controller {
    private $router;
    private $route;
    private $user;
//    private $parameters;
    private $model;
    private $view;
    private $data;
    private $page;

    public function __construct() {
        $this->router = new router($_SERVER['REDIRECT_URL']);

        $this->route = $this->router->getRoute();
//		var_dump($this->route);
        $this->parameters = $this->router->getParameters();
        $this->data['form'] = $_POST;
      //  If (!isset($_POST)) $this->data['form']=$_SESSION['post'];
      //var_dump($this->data['form']);
        //$this->data['form'] = $_POST;
        //Foreach  ($_POST as $record){
          //  Foreach    ($record  as $par=>$val){
            //    If ($record['$par']='')  $this->data['form'][$par]=$_SESSION['post']['$val'];
              //  var_dump($this->data['form']);
          //  }
       // }

        $this->data['cookie'] = $_COOKIE;
        $this->user = new user();
        $this->user->setIdUser(1);
        $this->user->setLogin('admin');
        $this->user->setStatus('admin');
    }

    private function runModel() {
        $model = $this->route[0] . '_model';
        $this->model = new $model($this->router, $this->user, $this->data);
        $this->model->run();
    }

    private function runView() {
        $view = $this->route[0] . '_view';
        $this->view = new $view($this->model);
        $this->view->run();
    }

    public function run() {
        session_start();

            $this->runModel();

            $this->runView();
            $this->page = $this->view->getPage();
            echo $this->page;
    }
}