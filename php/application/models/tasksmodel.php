<?php

class TasksModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    public function getAllTasks()
    {
        $sql = "SELECT id, name, email, ztext FROM task";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    public function addTask($name, $email, $ztext)
    {
        $name = strip_tags($name);
        $email = strip_tags($email);
        $ztext = strip_tags($ztext);
$sql = "INSERT INTO task (name, email, ztext) VALUES (:name, :email, :ztext)";
$query = $this->db->prepare($sql);
$query->execute(array(':name' => $name, ':email' => $email, ':ztext' => $ztext));
       // header('location: ' . URL . 'index.php?url=tasks/add');
    }
}
