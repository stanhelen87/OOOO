<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 28.11.2014
 * Time: 22:14
 */

class control {
    protected $type;
    protected $name;
    protected $value;
    protected $attributes;
    protected $label;

    public function __construct($label, $type, $name, $value, array $attributes = array()) {
        $this->label = $label;
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->attributes = $attributes;
    }

    public function getHTML() {
        $html = '';
        switch ($this->type) {
            case 'textarea': {
                $html = '<p>' .$this->label . '<textarea name="' . $this->name . '">' . $this->value . '</textarea></p>';
                break;
            }
            case 'text': {
                $html = '<p>' .'<input type="text" name="' . $this->name . '" value="' . $this->value .'">'. $this->label.'</p>';
                break;
            }
            case 'password': {

                $html = '<p>' .'<input type="password" name="' . $this->name . '" value="' . $this->value .'">'. $this->label.'</p>';
                break;
            }
            case 'radio': {

             $this->name='radio';
               $html = '<p>' . '<input type="radio" name=radio"  value="' . $this->name. '">'.$this->label.'</p>';
                //var_dump($this->name);
                //var_dump($this->value);
              //  '<input type="radio"name="mood"value="good">ничего<br>'
                 break;
            }
            case 'checkbox': {

                break;
            }
            case 'select': {

                break;
            }
            case 'hidden': {

                break;
            }
            case 'submit': {
                $html = '<p>' .$this->label . '<input type="submit" value="' . $this->value . '"/></p>';
                break;
            }
            case 'reset': {

                break;
            }
        }
        return $html;
    }
} 