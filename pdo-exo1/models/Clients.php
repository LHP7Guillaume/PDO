<?php

class Clients extends DataBase
{


    /**
     * Methode permettant de recuperer tous les clients
     * 
     * @return array tableau associatif
     */
    public function getAllClients(): array
    {
        $base = $this->connectDb();
        $sql = "SELECT *, date_format(`birthDate`, '%d/%m/%Y') as birthDate FROM `clients`";
        $resultQuery = $base->query($sql);
        return $resultQuery->fetchAll();
    }

    /**
     * Methode permettant de recuperer tous les clients
     * 
     * @return array tableau associatif
     */
    public function getSomeClients(int $nb): array
    {
        $base = $this->connectDb();
        $sql = "SELECT *, date_format(`birthDate`, '%d/%m/%Y') as birthDate FROM `clients` LIMIT :nb ";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':nb', $nb, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }


    /**
     * Methode permettant de recuperer tous les clients
     * 
     * @return array tableau associatif
     */
    public function getClientsWithCardType(int ...$cardTypesId): array
    {
        $base = $this->connectDb();
        $inQuery = '';
        for ($i = 1; $i <= count($cardTypesId); $i++) {
            $inQuery .= '?,';
        }
        $inQuery = rtrim($inQuery, ',');
        var_dump($inQuery);
        $sql = "SELECT clients.id, lastName, firstName, date_format(`birthDate`, '%d/%m/%Y') as birthDate, `type` FROM `clients` 
        INNER JOIN `cards`
        ON clients.cardNumber = cards.cardNumber
        INNER JOIN `cardTypes`
        ON cards.cardTypesId = cardTypes.id
        WHERE cardTypesId IN ($inQuery)";
        $resultQuery = $base->prepare($sql);
       
        foreach($cardTypesId as $key => $value){
            $resultQuery->bindValue($key+1, $value, PDO::PARAM_INT);
        }
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }

    /**
     * Methode permettant de recuperer tous les clients
     * 
     * @return array tableau associatif
     */
    public function searchClient(string $client): array
    {
        $base = $this->connectDb();
        $sql = "SELECT lastName, firstname FROM clients 
        WHERE lastName like :client ORDER BY lastName";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':client', $client . '%', PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }


    /**
     * Methode permettant de recuperer tous les clients
     * 
     * @return array tableau associatif
     */
    public function getClientsUltimate(): array
    {
        $base = $this->connectDb();
        $sql = "SELECT `lastName`, `firstName`, date_format(`birthDate`, '%d/%m/%Y') as birthDate, `cardTypesID`, `clients`.`cardNumber`
        FROM `clients`
        LEFT JOIN `cards` ON `cards`.`cardNumber` = `clients`.`cardNumber`
        LEFT JOIN `cardTypes` ON `cardTypes`.`id` = `cards`.`cardTypesId`";
        $resultQuery = $base->query($sql);
        return $resultQuery->fetchAll();
    }
}
