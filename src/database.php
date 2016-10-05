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
        $this->_user = "u842697544_admin";
        $this->_password = "Epsi33";
        $this->_pdodsn = "mysql:host=mysql.hostinger.fr;dbname=u842697544_db";
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