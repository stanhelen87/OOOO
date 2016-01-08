<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 16.11.2014
 * Time: 0:07
 */

//var_dump($_SERVER);
//var_dump($_GET);
require_once('config.php');
function siteAutoload($class) {
    $n = strrpos($class, '_');
    if ($n === false) {
        $path = '';
    } else {
        $path = str_replace('_', '/', substr($class, 0, $n+1));
    }
    include $path . $class . '.php';
}

function libAutoload($class) {
    include '../lib/' . $class . '.php';
}

spl_autoload_register('siteAutoload');
spl_autoload_register('libAutoload');

try {
    $controller = new controller();
    $controller->run();
}
catch(Exception $e) {
    error::showError($e);
}

