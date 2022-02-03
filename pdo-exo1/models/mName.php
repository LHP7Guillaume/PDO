<?php

class Mname
{
    private string $_dbName = 'colyseum';
    private string $_user = 'colyseum';
    private string $_password = 'colyseum';

    private function connectDb()
    {
        try {
            $database = new PDO("mysql:host=localhost;dbname=" . $this->_dbName . ";charset=utf8", $this->_user, $this->_password);
            return $database;
        } catch (Exception $errorMessage) {
            die('Erreur : ' . $errorMessage->getMessage());
        }
    }
    
    /**
     * Methode permettant de recuperer tous les clients
     * 
     * @return array tableau associatif
     */
    public function nameMname() : array
    { 
        $base = $this->connectDb();
        $sql = "SELECT lastName, firstname FROM clients 
        WHERE lastname like 'm%'
        ORDER BY lastName";
        $resultQuery = $base->query($sql);
        return $resultQuery->fetchAll();
    }
}
