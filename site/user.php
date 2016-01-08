<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 04.12.2014
 * Time: 11:37
 */

class user {
    private $idUser;
    private $login;
    private $status;

    public function __construct() {
        $this->id_user = 0;
        $this->login = '';
        $this->status = 'guest';
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

} 