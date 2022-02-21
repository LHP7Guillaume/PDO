<?php

class Appointments extends DataBase
{


    /**
     * Permet d'inserer le rdv dans la bdd
     * 
     * @param string $dateHour: ex. 2022-12-31 13:00:00
     * @param int $idPatient: ex. 12
     */
    public function recordAppointments(string $dateHour, int $idPatient): void
    {
        $db = $this->connectDb();
        $sql = "INSERT INTO appointments (dateHour,idPatients) VALUES (:dateHour,:idPatient);";
        $query = $db->prepare($sql);
        $query->bindValue(":dateHour", $dateHour, PDO::PARAM_STR);
        $query->bindValue(":idPatient", $idPatient, PDO::PARAM_INT);
        $query->execute();
    }


    /**
     * Permet de recuperer tous les rdv dans un tableau associatif 
     * 
     * @return array : tableau associatif avec pour clef le nom des champs de la table appointments
     */
    public function getAllRdv(): array
    {
        //Attention à l'utilisation de "*" car ambiguité avec les ID
        $base = $this->connectDb();
        $sql = "SELECT `patients`.`id` AS patientId, `appointments`.`id` AS rdvId, `lastname`, `firstname`, `dateHour` FROM `appointments`
        INNER JOIN `patients`
        ON `appointments`.`idPAtients` = `patients`.`id`
        ORDER BY `dateHour`";
        $resultQuery = $base->query($sql);
        return $resultQuery->fetchAll();
    }


    /**
     * Permet de recuperer toutes les infos d'un rdv sous forme d'un tableau selon son ID 
     * 
     * @param int $idRdv : ex. 105
     * 
     * @return array : tableau associatif avec pour clef le nom des champs de la table appointments
     */
    public function getOneRdv(int $idRdv): array
    {
        $base = $this->connectDb();
        $sql = "SELECT `patients`.`id` AS patientId, `appointments`.`id` AS rdvId, `lastname`, `firstname`, `dateHour`  FROM `appointments`
        INNER JOIN `patients`
        ON `appointments`.`idPAtients` = `patients`.`id`
        WHERE `appointments`.`id`=:id";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':id', $idRdv, PDO::PARAM_INT);
        $resultQuery->execute();

        return $resultQuery->fetch(PDO::FETCH_ASSOC);
    }


    /**
     * Permet de supprimer un rdv par son Id
     * 
     * @param int $idRdv : ex. 99
     */
    public function deleteRdv(int $idRdv): void
    {
        $base = $this->connectDb();
        $sql = "DELETE FROM `appointments` WHERE `id`= :id";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':id', $idRdv, PDO::PARAM_INT);
        $resultQuery->execute();
    }


/**
 * Permet de modifier un rdv 
 * 
 * @param int $rdvId : .ex class="102">
 * @param string $dateHour : ex. 2022-12-31 13:00:00
 */
    public function modifyAppointment(int $rdvId, string $dateHour): void
    {
        $base = $this->connectDb();
        $sql = "UPDATE `appointments` SET `dateHour`= :dateHour WHERE `id`= :id";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':id', $rdvId, PDO::PARAM_INT);
        $resultQuery->bindValue(':dateHour', $dateHour, PDO::PARAM_STR);
        $resultQuery->execute();
    }
}

