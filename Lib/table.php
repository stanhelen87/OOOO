<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 26.11.2014
 * Time: 23:43
 */

class table {
    private $tableName;
    private $fields;
    private $tableSelect;
    private $defaultOrder;
    private $formFields;
    private $validationRules;

    public function __construct($tableName, array $fields) {
        $this->tableName = $tableName;
        $this->fields = $fields;
        $this->tableSelect = $tableName;
        $this->defaultOrder = '';
        $this->formFields = array();
        $this->validationRules = array();
    }

    /**
     * @return string
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @return string
     */
    public function getDefaultOrder()
    {
        return $this->defaultOrder;
    }

    /**
     * @param string $defaultOrder
     */
    public function setDefaultOrder($defaultOrder)
    {
        $this->defaultOrder = $defaultOrder;
    }

    /**
     * @return array
     */
    public function getFormFields()
    {
        return $this->formFields;
    }

    /**
     * @param array $formFields
     */
    public function setFormFields($formFields)
    {
        $this->formFields = $formFields;
    }

    /**
     * @return mixed
     */
    public function getTableSelect()
    {
        return $this->tableSelect;
    }

    /**
     * @param mixed $tableSelect
     */
    public function setTableSelect($tableSelect)
    {
        $this->tableSelect = $tableSelect;
    }

    /**
     * @return array
     */
    public function getValidationRules()
    {
        return $this->validationRules;
    }

    /**
     * @param array $validationRules
     */
    public function setValidationRules($validationRules)
    {
        $this->validationRules = $validationRules;
    }

}