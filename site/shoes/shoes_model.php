<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 25.11.2014
 * Time: 12:00
 */

class shoes_model {
    private $router;
    private $route;
    private $user;
    private $parameters;
    private $data;
    private $db;
    private $table;
    private $query;

    public function __construct(router $router, user $user, array $data) {
        $this->router = $router;
        $this->route = $router->getRoute();
        $this->user = $user;
        $this->parameters = $router->getParameters();
        $this->data = $data;
        $this->db = new db(HOST, USER, PASSWORD, DATABASE, ENCODING);
    }

    private function prepareTable($tableName) {
        $tableName = 'table_' . $tableName;
        $table = new $tableName();
        $this->table = $table;
    }

    private function prepareQuery($queryType) {
        if ($queryType == 'select') {
            $this->query = new query($this->db->getPDO(), $this->table, $this->parameters);
            $this->query->setQueryType('select');
            return;
        }
        if ($queryType == 'insert') {
         If (empty($this->data['form'])) $this->data['form']=$_SESSION['post'];

          // var_dump($_POST);
           //var_dump($_SESSION['post']);
          //  var_dump($this->data['form']);
            $_SESSION['post']= $this-> data['form'];
     //       var_dump($_SESSION['post']);
            $this->query = new query($this->db->getPDO(), $this->table, $this->parameters, $this->data['form']);
            $this->query->setQueryType('insert');
            foreach ($this->table->getFormFields() as $par=>$val) {
                if(empty($val[0])) {
                    if ($par == 'id_user') {
                        $this->query->addData(array($par=>$this->user->getIdUser()));
                    } else {
                        if (isset($this->parameters[$par]))
                            $this->query->addData(array($par => $this->parameters[$par]));
                    }
                }
            }
//            var_dump($this->query);
            return;
        }

        if ($queryType == 'delete') {
            $this->query = new query($this->db->getPDO(), $this->table, $this->parameters);
            $this->query->setQueryType('delete');
            return;
        }
        if ($queryType == 'update') {
//            var_dump($this->data);
            $this->query = new query($this->db->getPDO(), $this->table, $this->parameters, $this->data['form']);
            $this->query->setQueryType('update');
            return;
        }
        if ($queryType == 'edit') {
            //Очистка для получения новых данных
            $_SESSION['post']=[];
            $this->query = new query($this->db->getPDO(), $this->table, $this->parameters);
            $this->query->setQueryType('select');

            return;
        }
        if ($queryType == 'search') {
            $this->query = new query($this->db->getPDO(), $this->table, $this->parameters);
            $this->query->setQueryType('select');
            return;
        }
        throw new exception('Запрошенне действие невыполнимо');
    }

    public function run() {
        $this->prepareTable($this->route[1]);
        if ($this->route[2] == 'add') return;//Ничего запрашивать из базы не нужно
        $this->prepareQuery($this->route[2]);
        $this->query->execute();
        $this->data[$this->route[1]] = $this->query->getData();
        //Если для edit выборка прошла по многим значением берем первое
      //  if ($this->route[2] == 'edit')
  //      $this->data[$this->route[1]] =  $this->data[$this->route[1]][0];
   //  var_dump($this->data);
    }

    /**
     * @return array
     */
    public function getData() {
        return $this->data;
    }

    /**
     * @return router
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * @return array
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return table
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}