<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 04.12.2014
 * Time: 15:13
 */

class router {
    private $route;
    private $parameters;
    private $routeString;

    public function __construct($routeString = '') {
        $routeString = str_ireplace(strtolower(SITEBASE), '', strtolower($routeString));
        if (empty($routeString)){
            $this->route[0] = 'shoes';
            $this->route[1] = 'kindparent';
            $this->route[2] = 'select';
            $this->routeString = SITEBASE . 'shoes/kindparent/select';
            $this->parameters = array();
            return;
        }
        $route = explode('/', $routeString);
        $this->route = array_slice($route, 0, 3);
        if (count($route) < 3) {
            if (empty($this->route[1])) $this->route[1] = 'kindparent';
            if (empty($this->route[2])) $this->route[2] = 'select';
            $this->routeString = SITEBASE . 'shoes/kindparent/select';
            $this->parameters = array();
            return;
        }
        $parameters = array_slice($route,3);
        if (count($parameters)%2 == 1) $parameters[] = '';
        $key = array();
        $value = array();
        $f = true;
        foreach ($parameters as $val) {
            if ($f) $key[] = $val; else $value[] = $val;
            $f = !$f;
        }
        $this->parameters = array_combine($key, $value);
    }

    private function routeString(array $route, array $parameters = array()) {
        $routeString = SITEBASE . $route[0] . '/' . $route[1] . '/' .$route[2];
        foreach ($parameters as $key=>$val) {
            $routeString .= '/' .$key . '/' . $val;
        }
        return $routeString;
    }

    public function routeTable($tableName) {
        $route = $this->route;
        $route[1] = $tableName;
        return $this->routeString($route, $this->parameters);
    }

    public function routeSelect() {
        $route = $this->route;
        $route[2] = 'select';
        return $this->routeString($route, $this->parameters);
    }

    public function previousRouteSelect() {
        $route = $this->route;
        $parameters = $this->parameters;
        $route[2] = 'select';
        array_pop($parameters);
        return $this->routeString($route, $parameters);
    }

    public function routeAdd() {
        $route = $this->route;
        $route[2] = 'add';
        return $this->routeString($route, $this->parameters);
    }

    public function routeInsert() {
        $route = $this->route;
        $route[2] = 'insert';
        return $this->routeString($route);
    }

    public function routeEdit() {
        $route = $this->route;
        $route[2] = 'edit';
        return $this->routeString($route, $this->parameters);
    }

    public function routeUpdate() {
        $route = $this->route;
        $route[2] = 'update';
        return $this->routeString($route, $this->parameters);
    }

    public function routeDelete() {
        $route = $this->route;
        $route[2] = 'delete';
        return $this->routeString($route, $this->parameters);
    }

    public function routeSearch() {
        $route = $this->route;
        $route[2] = 'search';
        return $this->routeString($route, $this->parameters);
    }

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param array $route
     */
    public function setRoute($route)
    {
        $this->route = $route;
    }

    /**
     * @return mixed
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    public function __toString() {
        return $this->routeString;
    }
} 