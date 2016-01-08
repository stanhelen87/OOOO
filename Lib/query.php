<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 24.11.2014
 * Time: 21:33
 */

class query {
    protected $pdo;
    protected $pdostmt;
    protected $table;
    protected $fields;
    protected $order;
    protected $limit;
    protected $data;
    protected $queryType;
    protected $queryText;
    protected $parameters;

    public function __construct(PDO $pdo, table $table, array $parameters = array(), array $data = array()) {
        $this->pdo = $pdo;
        $this->table = $table;
        $this->fields = '';
        $this->order = $table->getDefaultOrder();
        $this->limit = array();
        $this->data = $data;
        $this->queryType = '';
        $this->queryText = '';
        $this->parameters = $parameters;
       $this->validationRules = $table->getValidationRules();


    }



    public function execute() {
        $this->constructQuery();
//        var_dump($this->queryText);
     //  var_dump($this->data);
//        var_dump($this->parameters);
        $this->pdostmt = $this->pdo->prepare($this->queryText);
        $num = 1;
        for ($i = 0; $i< count($this->data); $i++) {
            $this->pdostmt->bindValue($num, $this->data[$i][1], $this->data[$i][0]);
//            var_dump($this->data[$i]);
            $num++;
        }
        for ($i = 0; $i < count($this->parameters); $i++) {
            $this->pdostmt->bindValue($num, $this->parameters[$i][1], $this->parameters[$i][0]);
//            var_dump($this->parameters[$i]);
            $num++;
        }
        $this->pdostmt->execute();
        if ($this->queryType == 'select') {
            $this->data = $this->pdostmt->fetchAll(PDO::FETCH_ASSOC);
        }

       // var_dump($this->data['form']);
        //var_dump($this->parameters);
       //throw new exception('Че-то не так');
    }

    protected function constructQuery() {
        if ($this->queryType == 'select') {
            $this->queryText = 'select ';
            if (empty($this->fields)) $this->fields = array_keys($this->table->getFields());
            $this->queryText .= implode(',', $this->fields) . ' from ' . $this->table->getTableSelect();
            $where = $this->prepareParameters($this->parameters, ' and ');
            if (!empty($where)) $this->queryText .= ' where ' . $where;
            if (!empty($this->order)) $this->queryText .= ' order by ' . $this->order;
            if (!empty($this->limit)) $this->queryText .= ' limit ' . $this->limit[0] . ',' . $this->limit[1];
          //  var_dump($this->queryText);
            return;

        }
        if ($this->queryType == 'delete') {
            $this->queryText = 'delete from ' . $this->table->getTableName();
            $where = $this->prepareParameters($this->parameters, ' and ');
            if (!empty($where)) $this->queryText .= ' where ' . $where;
            if (!empty($this->order)) $this->queryText .= ' order by ' . $this->order;
            if (!empty($this->limit)) $this->queryText .= ' limit ' . $this->limit[0] . ',' . $this->limit[1];
            return;
        }
        if ($this->queryType == 'insert') {

            var_dump($this->validationRules);
            var_dump($this->data);
            $v=$this->validationRules;
            $d=$this->data;
           foreach ($d as $par=>$val){
        If (isset($v[$par])) {

           $k=preg_match($v[$par],$d[$par]);
       //    var_dump($k);
        //  var_dump($par);var_dump($v[$par]);

               If ($k!=1) throw new Exception("В поле $par введены не корректные значения.Попробуйте еще раз.");
           };
         };

            $this->queryText = 'insert into ' . $this->table->getTableName();
            $this->queryText .= ' set ' . $this->prepareParameters($this->data, ',');
            $this->parameters = array();
        //    var_dump( $this->queryText);
         //   var_dump( $this->data);
            return;
        }
        if ($this->queryType == 'update') {
            $this->queryText = 'update ' . $this->table->getTableName();
            $this->queryText .= ' set ' . $this->prepareParameters($this->data, ',');
            $where = $this->prepareParameters($this->parameters, ' and ');
//            var_dump($this->parameters);
            if (!empty($where)) $this->queryText .= ' where ' . $where;
            if (!empty($this->order)) $this->queryText .= ' order by ' . $this->order;
            if (!empty($this->limit)) $this->queryText .= ' limit ' . $this->limit[0] . ',' . $this->limit[1];
            return;

        }
        throw new exception('Неверный тип запроса');
    }

    /**
     *
     */
/*    public function constructFind() {
        foreach ($this->parameters as $key=>$value) {
            $condition[] = str_replace(array('_eq', '_lt', '_gt', '_le', '_ge', '_ne', '_lk'),
                array('=?', '<?', '>?', '<=?', '>=?', '!=?', ' like concat(\'%\',?,\'%\')'), $key );
            $this->where = implode(' and ', $condition);
        }
        $this->parameters = array_values($this->parameters);
    }
*/

    protected function prepareParameters(array &$parameters, $delimiter) {
        $fields = $this->table->getFields();
       //var_dump($this->fields);
        $params = array();
        $strArray = array();
        foreach ($parameters as $par=>$val){
            if (isset($fields[$par])) {
          // var_dump($fields[$par]);
                $strArray[] = $par . '=?';
                if ($fields[$par]=='i') $params[] = array(PDO::PARAM_INT, intval($val));
                    elseif ($fields[$par]=='b') $params[] = array(PDO::PARAM_BOOL, boolval($val));
                        else $params[] = array(PDO::PARAM_STR, strval($val));
            }
        }
        $parameters = $params;
       // var_dump($strArray);
        return implode($delimiter, $strArray);
    }

    /**
     * @param array $fields
     */
    public function setFields(array $fields) {
        $this->fields = $fields;
    }

    /**
     * @param string $order
     */
    public function setOrder($order) {
        $this->order = $order;
    }

    /**
     * @param array $limit
     */
    public function setLimit(array $limit) {
        $this->limit = $limit;
    }

    /**
     * @param string $queryType - 'select', 'delete', 'insert', 'update'
     */
    public function setQueryType($queryType) {
        $this->queryType = $queryType;
    }

    public function addParameters(array $parameters) {
        $this->parameters = array_merge($this->parameters, $parameters);
    }

    public function addData(array $data) {
        $this->data = array_merge($this->data, $data);
    }

    /**
     * @return array
     */
    public function getData() {
        return $this->data;
    }
}