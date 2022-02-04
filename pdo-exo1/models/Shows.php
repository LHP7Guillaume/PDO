<?php

class Shows extends DataBase
{
    public function nameShowTypes() 
    { 
        $base = $this->connectDb();
        $sql = "SELECT * FROM `showTypes`";
        $resultQuery = $base->query($sql);
        return $resultQuery->fetchAll();
    }

     /**
     * Methode permettant de recuperer tous les clients
     * 
     * @return array tableau associatif
     */
    public function getInfoShows() : array
    { 
        $base = $this->connectDb();
        $sql = "SELECT title, performer, date, startTime FROM shows
        ORDER BY title";
        $resultQuery = $base->query($sql);
        return $resultQuery->fetchAll();
    }
}