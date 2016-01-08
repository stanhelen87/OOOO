<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 04.12.2014
 * Time: 0:14
 */

class error {
    static function showError(Exception $e) {
        echo $e->getMessage();
    }
} 