<?php

class EventScheduleData {

    private $pdoQuery;

    public function __construct() {
        $this->pdoQuery = new PDOQuery();
    }

    public function getEvents($userId)
    {
        return $this->pdoQuery->fetchAll("SELECT e.* FROM eventos e WHERE userId = :id", array(
            ':id' => $userId
        ));
    }

    public function getEventsWithoutDescription($userId)
    {
        return $this->pdoQuery->fetchAll("SELECT e.idEvent, e.dateFrom, e.dateTo, e.title  FROM eventos e WHERE userId = :id", array(
            ':id' => $userId
        ));
    }

}