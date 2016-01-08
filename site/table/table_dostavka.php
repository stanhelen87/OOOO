<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 27.11.2014
 * Time: 16:27
 */

class table_buyer extends table {
    public function __construct() {
        parent::__construct('buyer',
            array('id_buyer'=> 'i',
                'hours'=> 's',
                'address'=> 's'));
        parent::setTableSelect('buyer natural join product');
        parent::setFormFields(
            array('id_buyer'=> array('', ''),
                'hours' => array('text', 'Желаемое время'),
                'address'=> array('text', 'Адрес')));
        //'id_hours' => array('radio', 'C 6 00 до 12 00  ','C 12 00 до 18 00  ','C 18 00 до 21 00  ')));
        parent::setValidationRules (
            array('hours' => '/\b[0-9]{1,20}\b/',
                'address' => '/[А-Яа-яЁё]{1,20}/' ));
    }
}