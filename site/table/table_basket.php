<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 27.11.2014
 * Time: 16:27
 */

class table_basket extends table {

    public function __construct() {
        parent::__construct('buyer',
            array(
                'surname' => 's',
                'name' => 's',
                'middlename' => 's',
                'address' => 's',
                'number' => 's',
                //'id_hours' => 'i',
                'login'=> 's',
                'password'=> 's'));
        parent::setFormFields(
            array('surname' => array('text', 'Фамилия'  ),
                'name' => array('text', 'Имя'  ),
                'middlename' => array('text', 'Отчество'  ),
                'address' => array('text', 'Адрес'  ),
                'number' => array('text', 'Телефон1'),
                'login' => array('text', 'Логин'),
                'password' => array('password', 'Пароль')));
                //'id_hours' => array('radio', 'C 6 00 до 12 00  ','C 12 00 до 18 00  ','C 18 00 до 21 00  ')));
        parent::setValidationRules (
           array(
              'surname' => '/[А-Яа-яЁё]{1,20}/',
               'name' => '/[А-Яа-яЁё]{1,20}/',
              'middlename' => '/[А-Яа-яЁё]{1,20}/',
                'address' => '/[А-Яа-яЁё]{1,20}/',
             'number' => '/\b[0-9]{1,20}\b/',
             'login' => '/[A-Za-z]{1,20}/',
             'password' => '/[A-Za-z]{1,20}/' ));

    }
}
