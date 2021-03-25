<?php


class Tasks extends Controller
{
   
    public function index()
    {
        $tasks_model = $this->loadModel('TasksModel');
        $tasks = $tasks_model->getAllTasks();

       $stats_model = $this->loadModel('StatsModel');
        $amount_of_tasks = $stats_model->getAmountOfTasks();
       
        require 'application/views/_templates/header.php';
        require 'application/views/tasks/index.php';
        require 'application/views/_templates/footer.php';
    }

    public function addTask()
    {
         var_dump($_POST);
        if (isset($_POST["submit_add_task"])) { 
           // var_dump($_POST);
          $tasks_model = $this->loadModel('TasksModel');
      $tasks_model->addTask($_POST["name"], $_POST["email"],  $_POST["ztext"]);
            header('location: ' . URL . 'index.php?url=tasks/add');
        }
        header('location: ' . URL . 'index.php?url=tasks/add');
    }

}
