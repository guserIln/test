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
    public function getAllTasks($offset, $show_pages)
    {
        $sql = "SELECT  id, name, email, ztext,flag, edited FROM task ORDER BY id  LIMIT $offset, $show_pages";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
       public function getAllTasksSort($offset, $show_pages, $col, $order)
    {


         $sql2 = "UPDATE sort SET name='name', email='email', flag='flag'";
        $query = $this->db->prepare($sql2);
        $query->execute();

    $sql2 = "UPDATE sort SET $col = '$order'";
        $query = $this->db->prepare($sql2);
        $query->execute();

        $sql = "SELECT  id, name, email, ztext,flag,edited FROM task ORDER BY $col $order LIMIT $offset, $show_pages";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    public function addTask($name, $email, $ztext)
    {

        $name = strip_tags($name);
        $email = strip_tags($email);
        if(!preg_match("/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/", $email)){

             exit('Неверный e-mail!');
        }
        $ztext = strip_tags($ztext);
        $sql = "INSERT INTO task (name, email, ztext) VALUES (:name, :email, :ztext)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name, ':email' => $email, ':ztext' => $ztext));
         exit('Запись успешно добавлена!');
    }
      public function editTask($name, $email, $ztext2,$id, $flag)
    {
     
        $name = strip_tags($name);
        $email = strip_tags($email);
        $ztext2 = strip_tags($ztext2);
        
        $sql2 = "SELECT  ztext,status FROM task where id=:id";
         $query2 = $this->db->prepare($sql2);
        $query2->execute();
        $query2->fetchAll();
        $task = $query2->fetchAll();
        if ($flag==''){
             $sql3 = "UPDATE task SET flag=0 where id=:id";
              $query = $this->db->prepare($sql3);
               $query->execute(array(':id' => $id));
        } else {
           $sql3 = "UPDATE task SET flag=1 where id=:id";
              $query = $this->db->prepare($sql3);
               $query->execute(array(':id' => $id));
        }

    
        if ($task->ztext==$ztext2 && $flag==''){
             $sql4 = "UPDATE task SET edited=0 where id=:id";
              $query = $this->db->prepare($sql4);
               $query->execute(array(':id' => $id));
        }
     else {
             $sql4 = "UPDATE task SET edited=1 where id=:id";
              $query = $this->db->prepare($sql4);
               $query->execute(array(':id' => $id));
        }
        $sql5 = "UPDATE task SET name=:name, email=:email, ztext=:ztext where id=:id";
        $query = $this->db->prepare($sql5);
     $query->execute(array(':name' => $name, ':email' => $email, ':ztext' => $ztext2,':id'=>$id));
      }

}
