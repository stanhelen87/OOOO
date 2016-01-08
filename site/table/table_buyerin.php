<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 27.11.2014
 * Time: 16:27
 */

class table_buyerin extends table {

    public function __construct() {
        parent::__construct('buyer',
            array(
                'login'=> 's',
                'password'=> 's'));
        parent::setFormFields(
            array(
                'login' => array('text', 'Логин'),
                'password' => array('password', 'Пароль')));
        //'id_hours' => array('radio', 'C 6 00 до 12 00  ','C 12 00 до 18 00  ','C 18 00 до 21 00  ')));
        parent::setValidationRules (
            array('login' => '/[A-Za-z]{1,20}/',
                'password' => '/[A-Za-z]{1,20}/' ));
    }
}