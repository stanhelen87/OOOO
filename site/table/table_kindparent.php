<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 27.11.2014
 * Time: 16:30
 */

class table_kindparent extends table {

    public function __construct() {
     parent::__construct('inkind',
       array('inkind' => 's',
           'kindparent' => 's',
              'id_inkind' => 'i',
           'id_parent' => 'i'));
    parent::setDefaultOrder('id_parent asc');
   parent::setTableSelect('inkind natural join kindparent');
       parent::setFormFields(
           array('inkind' => array('text', 'Название вида'  )));

   }
}

