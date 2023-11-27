<?php

class EventScheduleCrud
{

    private $pdoCrud;

    public function __construct()
    {
        $this->pdoCrud = new PDOCrud;
    }

    public function submit($idEvent, $dateFrom, $dateTo, $title, $description, $userId)
    {
        $pdo = array(
            ":idEvent"     => $idEvent,
            ":dateFrom"    => $dateFrom,
            ":dateTo"      => $dateTo,
            ":title"       => $title,
            ':description' => $description,
            ':userId'      => $userId
        );

        $columns = "idEvent, dateFrom, dateTo, title, description, userId";
        $values = ":idEvent, :dateFrom, :dateTo, :title, :description, :userId";

        return $this->pdoCrud->insert("eventos", $columns, $values, $pdo);
    }

    public function update($idEvent, $dateFrom, $dateTo, $title, $description, $userId)
    {
        $pdo = array(
            ":idEvent"     => $idEvent,
            ":dateFrom"    => $dateFrom,
            ":dateTo"      => $dateTo,
            ":title"       => $title,
            ':description' => $description,
            ':userId'      => $userId
        );

        $clausule = "WHERE idEvent = :idEvent AND userId = :userId";
        $values   = "dateFrom = :dateFrom, dateTo = :dateTo, title = :title, description = :description";

        return $this->pdoCrud->update("eventos", $values, $clausule, $pdo);
    }

    public function delete($idEvent, $userId)
    {
        return $this->pdoCrud->deleteMap("eventos", "idEvent = :idEvent AND userId", array(
            ':id'      => $userId,
            ':idEvent' => $idEvent
        ));
    }
}
