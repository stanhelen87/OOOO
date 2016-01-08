<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 27.11.2014
 * Time: 16:27
 */

class table_import extends table {

    public function __construct() {
        parent::__construct('import',
            array('id_product' => 'i',
                'id_buyer' => 'i'));
       // parent::setFormFields(
         //   array('id_product' => array('text', ''  ),
            //    'id_buyer' => array('text', ''  )));
         }
}
