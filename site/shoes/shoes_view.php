<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 25.11.2014
 * Time: 12:00
 */

class shoes_view {

    private $page;
    private $model;

    public function __construct(shoes_model $model) {
        $this->model = $model;
        $this->page = '';
    }

    public function run() {
        $router = $this->model->getRouter();
        $route = $this->model->getRoute();
        $data = $this->model->getData();
        switch ($route[2]) {
            case 'select': {
                include __DIR__ . '/view/' . $route[1] . '.php';
                break;
            }
            case 'update': {
                {
                    unset($_SESSION['id_buyer']);
                    for ($i = 1; $i <= $_SESSION['num_inkind']; $i++){
                        //Обнуляем массивы входа в разделы каталога
                $_SESSION["in_$i"]=array();
                        // var_dump($_SESSION["in_$i"]);
                    };
                    header('Location: http://' . $_SERVER['SERVER_NAME'] . $router->previousRouteSelect());
                }
                exit();
            }
            case 'delete': {
                header('Location: http://' . $_SERVER['SERVER_NAME'] . $router->previousRouteSelect());
                exit();
            }
            case 'insert': {

                header('Location: http://' . $_SERVER['SERVER_NAME'] . '/shop/shoes/product/add/id_inkind/'.$_SESSION['id_inkind']);
               // header('Location: http://' . $_SERVER['SERVER_NAME'] . '/shop/shoes/product/select/id_inkind/'.$_SESSION['id_inkind']);
                //  var_dump($_SESSION["in_$id_inkind"]);

                exit();
            }
            case 'add': {
                $form = new shoes_viewForm($this->model->getTable(), 'POST', $router->routeInsert(), $data['form']);
                $form->addControls();
                $html = $form->getHTML();
                include __DIR__ . '/view/' . 'addForm.php';
                break;
            }
            case 'edit': {
               // var_dump($_POST);
               //var_dump($data[$this->model->getTable()->getTableName()]);
               // var_dump( $router->routeUpdate());
              //  var_dump($data[$this->model->getTable()->getTableName()][0]);
                $form = new shoes_viewForm($this->model->getTable(), 'POST', $router->routeUpdate(),
                    $data[$this->model->getTable()->getTableName()][0]);
//var_dump($data[$this->model->getTable()->getTableName()][0]);
              //  var_dump($this-> $data['buyer'][0]);
               // var_dump($data[$this->model->getTable()->getTableName()][0]);
                $form->addControls();
                $html = $form->getHTML();
               // var_dump( $html);
                include __DIR__ . '/view/' . 'editForm.php';

                break;
            }
            case 'search': {
                break;
            }
            default: {
            throw new exception('Запрошеное действие невыполнимо');
            }
        }
    }

    /**
     * @return mixed
     */
    public function getPage() {
        return $this->page;
    }

} 