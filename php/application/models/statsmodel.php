<?php

class StatsModel
{
   
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    
    public function getAmountOfTasks()
    {
        $sql = "SELECT COUNT(id) AS amount_of_tasks FROM task";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_tasks;
    }
}
