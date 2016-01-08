<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 27.11.2014
 * Time: 16:27
 */

class table_product extends table {

    public function __construct() {
        parent::__construct('product',
            array('cost' => 'i',
                'name_product' => 's',
                'id_producer' => 'i',
                'inkind' => 's',
                   'id_inkind' => 'i',
                   'id_product' => 'i',
                  'id_parent' => 'i',
                 'sum' => 'i',
                'img' => 's',));
        parent::setDefaultOrder('id_parent asc');
        parent::setTableSelect('product natural join inkind ');
      //  parent::setFormFields(
            //array('name_product' => array('text', 'Название продукта'  ),
            //    'id_inkind' => array('', ''  ),
              //  'cost' => array('', ''  ),
            //    'sum' => array('', ''  )));



    }
}
