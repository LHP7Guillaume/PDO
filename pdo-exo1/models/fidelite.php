<?php

class Fidelite
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
    public function nameFidelite() : array
    { 
        $base = $this->connectDb();
        $sql = "SELECT * FROM `clients` 
        INNER JOIN `cards`
        ON clients.cardNumber = cards.cardNumber
        INNER JOIN `cardTypes`
        ON cards.cardTypesId = cardTypes.id
        WHERE type = 'Fidélité'";
        $resultQuery = $base->query($sql);
        return $resultQuery->fetchAll();
    }
}