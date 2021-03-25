<?php


class User extends Controller
{
   
    public function login()
    {
        if (isset($_POST["login"])) { 
           // var_dump($_POST);
           $sql = "select count(*) from users where login=:login and pass=:pass";
           $query = $this->db->prepare($sql);
           $q = $query->execute(array(':login' => $login, ':pass' => $pass);
            if ($q>0){
              return true;
            }else return false;
        }
    }

    public function logout()
    {
       //  var_dump($_POST);
      //  if (isset($_POST["submit_add_task"])) { 
           // var_dump($_POST);
      //    $tasks_model = $this->loadModel('TasksModel');
     // $tasks_model->addTask($_POST["name"], $_POST["email"],  $_POST["ztext"]);
      //      header('location: ' . URL . 'index.php?url=tasks/add');
      //  }
      //  header('location: ' . URL . 'index.php?url=tasks/add');


        if (isset($_POST["logout"])) { 
           // var_dump($_POST);
          return true;
        } else
        return false;
    }

}
