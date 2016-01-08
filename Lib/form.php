<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 28.11.2014
 * Time: 22:07
 */

class form {
    protected $action;
    protected $method;
    protected $controls;
    protected $attributes;

    public function __construct($action, $method, array $attributes = array()) {
        $this->action = $action;
        $this->method = $method;
        $this->controls = array();
        $this->attributes = $attributes;
    }

    public function addControl($label, $type, $name, $value, array $attributes = array()){
        $this->controls[] = new control($label, $type, $name, $value, $attributes);
    }

    public function getHTML() {
        $html = '<form action="' . $this->action . '" method="' . $this->method . '"';
//обработать дополнительные атрибуты
        $html .= '>';
        foreach ($this->controls as $control) {
            $html .= $control->getHTML();
        }
        $html .= '</form>';
        return $html;
    }
}
