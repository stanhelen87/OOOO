<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 24.11.2014
 * Time: 20:45
 */

class db {

    private $host;
    private $user;
    private $password;
    private $database;
    private $encoding;
    private $pdo;

    /**
     * @return PDO
     */
    public function getPDO() {
        return $this->pdo;
    }

    /**
     *
     */
    public function __construct($host, $user, $password, $database, $encoding) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->encoding = $encoding;
        $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database .
            ';charset=' . $this->encoding, $this->user, $this->password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}