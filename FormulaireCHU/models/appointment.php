<?php

class Appointments extends DataBase
{
    public function recordAppointments(string $dateHour, int $idPatient)
    {
        $db = $this->connectDb();
        $sql = "INSERT INTO appointments (dateHour,idPatients) VALUES (:dateHour,:idPatient);";
        $query = $db->prepare($sql);
        $query->bindValue(":dateHour", $dateHour, PDO::PARAM_STR);
        $query->bindValue(":idPatient", $idPatient, PDO::PARAM_INT);
        $query->execute();
    }


    public function getAllRdv(): array
    {
        $base = $this->connectDb();
        $sql = "SELECT * FROM `appointments`
        INNER JOIN `patients`
        ON `appointments`.`idPAtients` = `patients`.`id`
        ORDER BY `dateHour`";
        $resultQuery = $base->query($sql);
        return $resultQuery->fetchAll();
    }


    public function getOneRdv($id): array
    {
        $base = $this->connectDb();
        // $sql = "SELECT `patients`.`id`, `appointments`.`id`, `lastname`, `firstname`, `dateHour` FROM `patients` 
        // INNER JOIN `appointments`
        // ON `patients`.`id` = `appointments`.`idPatients` WHERE `id`= :id";
        $sql = "SELECT * FROM `appointments`
        INNER JOIN `patients`
        ON `appointments`.`idPAtients` = `patients`.`id`
        WHERE `appointments`.`id`=:id";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_INT);
        $resultQuery->execute();

        return $resultQuery->fetch();
    }


    public function deleteRdv($id): void
    {
        $base = $this->connectDb();
        $sql = "DELETE FROM `appointments` WHERE `id`= :id";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_INT);
        $resultQuery->execute();
    }
}
