<?php

class Patients extends DataBase
{
    /**
     * fonction permettant d'ajouter un patient
     * 
     * @param string $lastname: nom du patient
     * @param string $firstname: prénom du patient
     * @param string $birthdate: date de naissance du patient Ex: 1992-12-31
     * @param string $phone : N° de telephone du patient
     * @param string $mail: Adresse Mail du patient
     * 
     * @return void
     */
    public function addPatient(string $lastname, string $firstname, string $birthdate, string $phone, string $mail): void
    {
        $db = $this->connectDb();
        $sql = "INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES (:lastname, :firstname, :birthdate, :phone, :mail)";
        $query = $db->prepare($sql);
        $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
        $query->bindValue(':phone', $phone, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);

        $query->execute();
    }

    // fonction pour voir si le mail est deja existant
    public function checkFreeMail(string $mail): bool
    {
        $db = $this->connectDb();
        $sql = "SELECT `mail`FROM `patients` WHERE `mail` = :mail";
        $query = $db->prepare($sql);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll();

        if (count($result) == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllPatient(): array
    {
        $base = $this->connectDb();
        $sql = "SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients` ORDER BY `id` DESC";

        $resultQuery = $base->query($sql);
        return $resultQuery->fetchAll();
    }

    public function getOnePatient($id): array
    {
        $base = $this->connectDb();
        $sql = "SELECT `id`,`lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients` WHERE `id`= :id";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_INT);
        $resultQuery->execute();

        return $resultQuery->fetch();
    }
    // this = réfere a l'objet actuel
    public function modifyPatient($id, $lastname, $firstname, $mail, $phone, $birthdate)
    {
        $base = $this->connectDb();
        $sql = "UPDATE `patients` SET lastname=:lastname, firstname=:firstname, birthdate=:birthdate, phone=:phone, mail=:mail
        WHERE id=:id ;";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $resultQuery->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $resultQuery->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
        $resultQuery->bindValue(':phone', $phone, PDO::PARAM_STR);
        $resultQuery->bindValue(':mail', $mail, PDO::PARAM_STR);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_STR);

        $resultQuery->execute();
    }

    public function deletePatient($id): void
    {
        $base = $this->connectDb();
        $sql = "DELETE FROM `patients`WHERE `id`= :id";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_INT);
        $resultQuery->execute();

        
    }

   
}
