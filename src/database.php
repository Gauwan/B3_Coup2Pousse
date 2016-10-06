<?php
/**
 * Created by PhpStorm.
 * User: Gauthier
 * Date: 05/10/2016
 * Time: 14:05
 */
class database {

    private $_user;
    private $_password;
    private $_pdodsn;

    public function __construct()
    {
        $this->_user = "root"; //workshop
        $this->_password = ""; //azerty
        $this->_pdodsn = "mysql:host=127.0.0.1;dbname=coup2pousse";
    }

    public function connect() {
        try{
            $pdo = new PDO($this->_pdodsn, $this->_user, $this->_password);
        }catch(PDOException $e){
            die('Erreur : '.$e->getMessage());
        }
        return $pdo;
    }

    public function disconnect($pdo) {
        $pdo = null;
    }

    /* Fonction spécifique */



}