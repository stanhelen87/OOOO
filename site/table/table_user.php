<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 27.11.2014
 * Time: 16:23
 */

class table_user extends table {

    public function __construct() {
        parent::__construct('user',
            array('id_user' => 'i',
                'login' => 's',
                'password' => 's',
                'status' => 's'));
        parent::setDefaultOrder('login');
        parent::setFormFields(
            array('login' => array('text', 'Логин'),
                'password' => array('password', 'Пароль'),
                'status' => array('text', 'Статус')));
    }
}

