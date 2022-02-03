<?php

class Clients
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
    public function nameClients() : array
    { 
        $base = $this->connectDb();
        $sql = "SELECT * FROM `clients`";
        $resultQuery = $base->query($sql);
        return $resultQuery->fetchAll();
    }
}
