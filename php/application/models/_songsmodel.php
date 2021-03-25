<?php

class TasksModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get all songs from database
     */
    public function getAllTasks()
    {
        $sql = "SELECT id, name, email, ztext FROM task";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Add a song to database
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     */
    public function addTask($name, $email, $ztext)
    {
        // clean the input from javascript code for example
        $name = strip_tags($name);
        $email = strip_tags($email);
        $ztext = strip_tags($ztext);

        $sql = "INSERT INTO task (name, email, ztext) VALUES (:name, email, :ztext)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name, ': email' => $email, ':ztext' => $ztext));
    }

    /**
     * Delete a song in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $song_id Id of song
     */
  //  public function deleteTask($task_id)
  //  {
  //      $sql = "DELETE FROM task WHERE id = :task_id";
  //      $query = $this->db->prepare($sql);
  //      $query->execute(array(':task_id' => $task_id));
  //  }
}
