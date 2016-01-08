<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 29.11.2014
 * Time: 0:01
 */

class shoes_viewForm {
    private $routeString;
    private $data;
    private $html;
    private $form;
    private $table;
    private $method;

    public function __construct(table $table, $method, $routeString, array $data = array()) {
        $this->table = $table;
        $this->method = $method;
        $this->routeString = $routeString;
       // var_dump( $routeString);
        $this->data = $data;
        $this->form = new form($routeString, 'POST');
        $this->page = '';
    }

    public function addControls() {
        $fields = $this->table->getFormFields();
   //  var_dump($fields);
        foreach ($fields as $key=>$val) {
        //    var_dump($key);
          //  var_dump($val);
            if (!empty($val[0])) {
                $controlValue = isset($this->data[$key])? $this->data[$key] : '';
        //       var_dump($this->data['form'][$key]);

                $this->form->addControl($val[1], $val[0], $key, $controlValue);
            }
//          var_dump($val);
        }


        $this->form->addControl('', 'submit', '', 'Отправить');
        $this->html = $this->form->getHTML();
        //var_dump($this->html );
    }

    /**
     * @return string
     */
    public function getHTML()
    {
        return $this->html;
    }
}